<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Image\Line;
use App\Image\Colours\Black;
use App\Image\Colours\Green;
use App\Image\Colours\White;
use App\Image\ImageFill;
use App\Image\Point;
use App\Image\Image as ImageCanvas;

class Image extends Controller
{
    public function create(Request $request)
    {
        $res = imagecreatetruecolor(1024, 568);

        $backgroundcolor = imagecolorallocate($res, 255, 255, 255);

        imagefill($res, 0, 0, $backgroundcolor);

        $textcolor = imagecolorallocate($res, 0, 0, 255);

        imagestring($res, 5, 0, 0, 'Hello world!', $textcolor);

        $blackcolor = imagecolorallocate($res, 0, 0, 0);

        imageline(
            $res,
            100,
            100,
            1024 - 100,
            568 - 100,
            $blackcolor
        );

        imagettftext(
          $res,
          24,
          0,
          100,
          568 - 100,
          $blackcolor,
          __DIR__ . '/../../TTF/AnandaBlackPersonalUseRegular-rg9Rx.ttf',
          'Academy Top'
        );


        ob_start();
        imagepng($res, null, 0);
        $image = ob_get_contents();
        ob_end_clean();

        $response = Response::make($image, 200);
        $response->header("Content-Type", "image/png");

        return $response;
    }

    public function graph (Request $request)
    {
        $properties = [
          'margin' => [
            'vertical' => 0.1,
            'horizontal' => 0.05,
          ],
          'width' => 1024,
          'height' => 568,
          'hatchHeight' => 10,
        ];

        $image = new ImageCanvas(
          $properties['width']
          , $properties['height']
        );

        $fill = new ImageFill($image);

        $fill->fill(new White($image));

        $dotList = $request->all()['dot'] ?? [];

        $this->drawStartCoordinate($image, $properties);

        $this->drawYAxis($image, $properties);

        $this->drawXAxis($image, $properties);

        $this->drawHatchesOnX($image, $properties, $dotList);

        $this->drawHatchesOnY($image, $properties, $dotList);

        $this->drawPointsAndLines($image, $properties, $dotList);


        ob_start();
        imagepng($image->getResource(), null, 0);
        $image = ob_get_contents();
        ob_end_clean();

        $response = Response::make($image, 200);
        $response->header("Content-Type", "image/png");

        return $response;
    }

    private function drawStartCoordinate($image, $properties)
    {
      $point = new Point($image);

      $point->drawPoint(
          $this->getLeftMargin($properties),
          $this->getBottomMargin($properties),
          new Black($image)
        );
    }

    private function drawYAxis(ImageCanvas $image, array $properties)
    {
        $y = new Line($image);

        $y->draw(
          $this->getLeftMargin($properties),
          $this->getBottomMargin($properties),
          $this->getLeftMargin($properties),
          $this->getTopMargin($properties),
          new Black($image)
        );
    }

    private function getLeftMargin($properties): int
    {
      return floor($properties['width']
        * $properties['margin']['horizontal']);
    }

    private function getBottomMargin($properties): int
    {
      return floor($properties['height']
        - $properties['height']
          * $properties['margin']['vertical']);
    }

    private function getTopMargin($properties): int
    {
      return floor($properties['height']
        * $properties['margin']['vertical']);
    }

    private function getRightMargin($properties): int
    {
      return floor($properties['width']
        - $properties['width']
        * $properties['margin']['horizontal']);
    }

    private function drawXAxis($image, $properties)
    {
        $x = new Line($image);
        $x->draw(
          $this->getLeftMargin($properties),
          $this->getBottomMargin($properties),
          $this->getRightMargin($properties),
          $this->getBottomMargin($properties),

          new Black($image)
        );
    }

    private function drawHatchesOnX($image, $properties, $dotList)
    {
        $sectionLenght = $this->getXSize($properties, $dotList);

          $n = 1;
        foreach ($dotList as $key => $value) {
          $section = new Line($image);

          $section->draw(
            $this->getLeftMargin($properties)
              + $sectionLenght * $n,

            $this->getBottomMargin($properties)
              - $properties['hatchHeight'] / 2,

            $this->getLeftMargin($properties)
              + $sectionLenght * $n,

            $this->getBottomMargin($properties)
                + $properties['hatchHeight'] / 2,
                new Black($image)
          );
          $n++;
        }
    }

    private function getXSize(array $properties, array $dotList): int
    {
      return floor($properties['width']
        - 2
        * $this->getLeftMargin($properties))
        / (count($dotList) + 1);
    }

    private function drawHatchesOnY($image, $properties, $dotList)
    {
        $min = min($dotList) - 1;
        $max = max($dotList) + 1;

        $sectionCount = $max - $min;

        $sectionLenght = floor(
          ($properties['height']
          - 2
          * $this->getTopMargin($properties))
          / $sectionCount);


        for ($i = 1; $i < $sectionCount; $i++)
        {
            $hatch = new Line($image);

            $hatch->draw(
              $this->getLeftMargin($properties)
                  - $properties['hatchHeight'] / 2,
              $this->getTopMargin($properties)
                  + $sectionLenght * $i,
              $this->getLeftMargin($properties)
                  + $properties['hatchHeight'] / 2,
              $this->getTopMargin($properties)
                  + $sectionLenght * $i,
            new Black($image)
            );
        }
    }

    private function drawPointsAndLines($image, $properties, $dotList)
    {

        $xCount = 1;

        $sectionXLenght = $this->getXSize($properties, $dotList);

        $min = min($dotList) - 1;
        $max = max($dotList) + 1;
        $sectionCount = $max - $min;

        $sectionYLenght = floor(
          ($properties['height']
          - 2
          * $this->getTopMargin($properties)
          )
          / $sectionCount);

          $last = [];

        foreach($dotList as $dot)
        {
          $point = new Point($image);
          $point->drawPoint(
            $this->getLeftMargin($properties)
            + $sectionXLenght * $xCount,
            floor($properties['height']
              - $this->getTopMargin($properties)
                - ($sectionYLenght * ($dot - $min))
                ),
            new Black($image)

          );

          if (!empty($last)) {
            $line = new Line($image);
            $line->draw(
              $last['x'],
              $last['y'],
              $this->getLeftMargin($properties)
              + $sectionXLenght * $xCount,
              floor($properties['height']
                - $this->getTopMargin($properties)
                  - ($sectionYLenght * ($dot - $min))
                  ),
              new Green($image)
            );
          }

          $last = [
            'x' => $this->getLeftMargin($properties)
            + $sectionXLenght * $xCount,
            'y' => floor($properties['height']
              - $this->getTopMargin($properties)
                - ($sectionYLenght * ($dot - $min))
                )
          ];

          $xCount++;
        }

    }

}
