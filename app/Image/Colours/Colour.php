<?php

namespace App\Image\Colours;

use App\Image\Image;

abstract class Colour
{
   private Image $image;

   abstract function getRed(): int;

   abstract function getGreen(): int;

   abstract function getBlue(): int;

   public function __construct(Image $image)
   {
      $this->image = $image;
   }

  public function getColor()
  {
    return imagecolorallocate(
      $this->image->getResource()
      , $this->getRed()
      , $this->getGreen()
      , $this->getBlue()
    );
  }
}
