<?php

namespace Src\Model;

/**
 * Représente un poste destiné au développement Web.
 */
class PosteWeb implements PosteDeTravail
{
    private string $nomPoste;
    private string $os;
    private string $ide;
    private array $outils;

    public function __construct()
    {
        $this->nomPoste = 'Poste Web';
        $this->os = 'Ubuntu 24.04';
        $this->ide = 'Visual Studio Code';
        $this->outils = ['Node.js', 'npm', 'Git', 'Chrome'];
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