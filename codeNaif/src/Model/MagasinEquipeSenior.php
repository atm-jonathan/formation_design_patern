<?php

namespace Src\Model;
require_once __DIR__ . '/../FactoryMethod/MagasinPostesEquipe.php';
require_once __DIR__ . '/../Model/PosteJavaSenior.php';
require_once __DIR__ . '/../Model/PosteWebSenior.php';
require_once __DIR__ . '/../Model/PosteDataSenior.php';
use src\FactoryMethod\MagasinPostesEquipe;

class MagasinEquipeSenior extends MagasinPostesEquipe
{
    public function creerPoste(string $type): \Src\Model\PosteDeTravail
    {
        return match($type) {
            "java" => new PosteJavaSenior(),
            "web"  => new PosteWebSenior(),
            "data" => new PosteDataSenior(),
            default => throw new \InvalidArgumentException("Type inconnu pour l'équipe Senior"),
        };
    }
    public function installerOS(): void
    {
        echo "[{$this->nomPoste}] Installation du système : {$this->os}" . PHP_EOL;
    }

    public function installerIDE(): void
    {
        echo "[{$this->nomPoste}] Installation de l'IDE : {$this->ide}" . PHP_EOL;
    }

    public function configurer(): void
    {
        echo "[{$this->nomPoste}] Configuration de l'environnement Web : "
            . implode(', ', $this->outils) . PHP_EOL;
    }

    public function livrer(): void
    {
        echo "[{$this->nomPoste}] Poste prêt et livré au développeur." . PHP_EOL;
    }
}