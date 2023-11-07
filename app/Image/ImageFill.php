<?php

namespace App\Image;

use App\Image\Colours\Colour;

class ImageFill
{
   private Image $image;

   public function __construct(Image $image)
   {
      $this->image = $image;
   }

   public function fill(Colour $color)
   {
      imagefill(
        $this->image->getResource()
        , 0
        , 0
        , $color->getColor()
      );
   }
}
