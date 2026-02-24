<?php

namespace Src\Model;

/**
 * Représente un poste destiné au développement Java.
 * Les attributs sont simples et servent surtout à afficher des messages cohérents.
 */
class PosteMobile implements PosteDeTravail
{
    private string $nomPoste;
    private string $os;
    private string $ide;
    private array $outils;

    public function __construct()
    {
        $this->nomPoste = 'Poste Mobile';
        $this->os = 'Windows 10 Pro';
        $this->ide = 'PHP storm';
        $this->outils = ['JDK 22', 'bash'];
    }
    public function installerOS(): void
    {
        echo "[{$this->nomPoste}] Installation du système : {$this->os}" . PHP_EOL;
    }
    public function installerIDE(): void
    {
        echo "[{$this->nomPoste}] Installation de l'IDE / outils : {$this->ide}" . PHP_EOL;
    }

    public function configurer(): void
    {
        echo "[{$this->nomPoste}] Configuration de l'environnement Data : "
            . implode(', ', $this->outils) . PHP_EOL;
    }
    public function livrer(): void
    {
        echo "[{$this->nomPoste}] Poste prêt et livré au développeur." . PHP_EOL;
    }
}