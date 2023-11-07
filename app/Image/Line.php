<?php

namespace App\Image;

use App\Image\Colours\Colour;

class Line
{
  private Image $image;

  public function __construct(Image $image)
  {
     $this->image = $image;
  }

  public function draw(int $x1, int $y1, int $x2, int $y2, Colour $colour)
  {
      imageline(
        $this->image->getResource(),
        $x1, $y1,
        $x2, $y2,
        $colour->getColor()
      );
  }
}
