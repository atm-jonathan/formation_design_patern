<?php
namespace Src\Model;

require_once __DIR__ . '/../FactoryMethod/MagasinPostesEquipe.php';
require_once __DIR__ . '/../Model/PosteJavaJunior.php';
require_once __DIR__ . '/../Model/PosteWebJunior.php';
require_once __DIR__ . '/../Model/PosteDataJunior.php';

use src\FactoryMethod\MagasinPostesEquipe;

class MagasinEquipeJunior extends MagasinPostesEquipe
{
    public function creerPoste(string $type): \Src\Model\PosteDeTravail
    {
        return match($type) {
            "java" => new PosteJavaJunior(),
            "web"  => new PosteWebJunior(),
            "data" => new PosteDataJunior(),
            default => throw new \InvalidArgumentException("Type inconnu pour l'équipe Junior"),
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