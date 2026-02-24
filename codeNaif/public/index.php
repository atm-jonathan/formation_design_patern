<?php

require_once __DIR__ . '/src/Model/PosteDeTravail.php';
require_once __DIR__ . '/src/Model/PosteJava.php';
require_once __DIR__ . '/src/Model/PosteWeb.php';
require_once __DIR__ . '/src/Model/PosteData.php';
require_once __DIR__ . '/src/Model/MagasinPostesNaif.php';

use Src\Model\MagasinPostesNaif;

$magasin = new MagasinPostesNaif();

$magasin->preparerPoste('java');
$magasin->preparerPoste('web');
$magasin->preparerPoste('data');
