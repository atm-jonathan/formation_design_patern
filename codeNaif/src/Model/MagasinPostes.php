<?php
require_once __DIR__ . '/../Factory/PosteFactory.php';

use Src\Factory\PosteFactory;

Class MagasinPostes {
    private PosteFactory $factory;

    public function preparerPoste($type) {

        $this->factory = new PosteFactory();
        $poste = $this->factory->creerPoste($type);
        echo PHP_EOL . "=== Préparation d'un postes '{$type}' ===" . PHP_EOL;
        $poste->installerOS();
        $poste->installerIDE();
        $poste->configurer();
        $poste->livrer();
    }

}