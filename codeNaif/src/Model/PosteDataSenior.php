<?php

namespace Src\Model;

class PosteDataSenior extends PosteJava {
    private string $nomPoste;
    private string $os;
    private string $ide;
    private array $outils;
    public function __construct() {
        $this->nomPoste = "Poste Data - Pack Junior";
        $this->os = "Ubuntu 22.04 LTS";
        $this->ide = "VS Code (Light)";
        $this->outils = ["Git", "Maven Mini"];
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