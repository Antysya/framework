<?php

namespace App\Image;

use App\Image\Colours\Colour;

class Point
{
   private Image $image;

   public function __construct(Image $image)
   {
      $this->image = $image;
   }

   public function drawPoint(
     int $x
     , int $y
     , Colour $color
    ){
      imagesetpixel(
        $this->image->getResource()
        , $x
        , $y
        , $color->getColor()
      );
   }
}
