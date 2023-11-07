<?php

namespace App\Image\Colours;

class White extends Colour
{
  function getRed(): int
  {
    return 255;
  }

  function getGreen(): int
  {
    return 255;
  }

  function getBlue(): int
  {
    return 255;
  }
}
