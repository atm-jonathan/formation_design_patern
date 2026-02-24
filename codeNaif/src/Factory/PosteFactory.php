<?php

namespace Src\Factory;

use Src\Model\PosteJava;
use Src\Model\PosteData;
use Src\Model\PosteWeb;
use Src\Model\PosteMobile;

class PosteFactory
{
    public function creerPoste(string $type)
    {
        switch ($type) {
            case "java":
                return new PosteJava();
            case "web":
                return new PosteWeb();
            case "data":
                return new PosteData();
            case "mobile":
                return new PosteMobile();
            default:
                throw new \InvalidArgumentException("Le type '$type' n'est pas reconnu par la Factory.");
        }
    }
}