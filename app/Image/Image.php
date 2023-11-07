<?php

namespace App\Image;

class Image
{
    private $resource;

    public function __construct(int $width, int $height)
    {
      $this->resource = imagecreatetruecolor($width, $height);
    }

    public function getResource()
    {
      return $this->resource;
    }
}
