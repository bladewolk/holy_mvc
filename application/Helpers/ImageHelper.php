<?php

namespace application\Helpers;

use claviska\SimpleImage;

class ImageHelper
{
    protected $sourceImage;
    protected $uploadPath;

    CONST WIDTH = 320;
    CONST HEIGHT = 240;

    public function __construct($tmpFile)
    {
        $this->sourceImage = $tmpFile;
        $this->uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/public/uploads/';
    }

    public function save($path = null)
    {
        $newName = round(microtime(true) * 1000) . '.' . pathinfo($this->sourceImage->name, PATHINFO_EXTENSION);

        $image = new SimpleImage();
        $image
            ->fromFile($this->sourceImage->tmp_name)
            ->bestFit(self::WIDTH, self::HEIGHT)
            ->toFile($this->uploadPath . $newName);

        return $newName;
    }
}