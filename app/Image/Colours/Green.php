<?php

namespace App\Image\Colours;

class Green extends Colour
{
  function getRed(): int
  {
    return 0;
  }

  function getGreen(): int
  {
    return 255;
  }

  function getBlue(): int
  {
    return 0;
  }
}
