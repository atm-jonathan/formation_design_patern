<?php

namespace Src\Model;

/**
 * Représente un poste destiné à la data / analyse.
 */
class PosteData implements PosteDeTravail
{
    private string $nomPoste;
    private string $os;
    private string $ide;
    private array $outils;

    public function __construct()
    {
        $this->nomPoste = 'Poste Data';
        $this->os = 'Ubuntu 24.04';
        $this->ide = 'JupyterLab';
        $this->outils = ['Python 3.12', 'pandas', 'numpy', 'Git'];
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