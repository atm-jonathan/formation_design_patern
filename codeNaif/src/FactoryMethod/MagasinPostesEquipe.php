<?php

namespace src\FactoryMethod;
require_once __DIR__ . '/../Factory/PosteFactory.php';

use Src\Factory\PosteFactory;
use Src\Model\PosteDeTravail;

abstract class MagasinPostesEquipe
{
    public function traiterCommande(string $type)
    {
        $this->factory = new PosteFactory();
        $poste = $this->creerPoste($type);
        echo PHP_EOL . "=== Préparation d'un postes '{$type}' ===" . PHP_EOL;
        $poste->installerOS();
        $poste->installerIDE();
        $poste->configurer();
        $poste->livrer();
    }
    abstract protected function creerPoste(string $type): PosteDeTravail;
}