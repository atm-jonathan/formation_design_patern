<?php

namespace Src\Model;

/**
 * Représente un poste destiné au développement Java.
 * Les attributs sont simples et servent surtout à afficher des messages cohérents.
 */
class PosteJava implements PosteDeTravail
{
    private string $nomPoste;
    private string $os;
    private string $ide;
    private array $outils;

    public function __construct()
    {
        $this->nomPoste = 'Poste Java';
        $this->os = 'Windows 11 Pro';
        $this->ide = 'IntelliJ IDEA Community';
        $this->outils = ['JDK 17', 'Maven', 'Git'];
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
        echo "[{$this->nomPoste}] Configuration de l'environnement Java : "
            . implode(', ', $this->outils) . PHP_EOL;
    }

    public function livrer(): void
    {
        echo "[{$this->nomPoste}] Poste prêt et livré au développeur." . PHP_EOL;
    }
}