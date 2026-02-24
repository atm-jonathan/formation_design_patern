<?php

namespace Src\Singleton;

class ConfigurationEntreprise {
    // 1. Propriétés d'instance (propres à l'objet créé)
    private string $nomEntreprise;
    private string $proxy;
    private string $depotInterne;
    private string $versionJavaParDefaut;
    private static ?ConfigurationEntreprise $instance = null;
    private function __construct(string $nomEntreprise, string $proxy, string $depotInterne, string $versionJavaParDefaut) {
        $this->nomEntreprise = $nomEntreprise;
        $this->proxy = $proxy;
        $this->depotInterne = $depotInterne;
        $this->versionJavaParDefaut = $versionJavaParDefaut;
    }
    public static function getInstance(): self {
        if (self::$instance === null) {
            self::$instance = new self(
                "Coca Cola",
                "192.168.1.1:8080",
                "/mnt/depot",
                "Java 17"
            );
        }
        return self::$instance;
    }
    public function afficherConfiguration(): string {
        $out = "### CONFIGURATION SYSTÈME ###\n";
        // On utilise $this-> car l'instance existe maintenant
        $out .= "Entreprise : " . $this->nomEntreprise . "\n";
        $out .= "Proxy : " . ($this->proxy ?: "Aucun") . "\n";
        $out .= "Dépôt Interne : " . $this->depotInterne . "\n";
        $out .= "Version Java : " . $this->versionJavaParDefaut . "\n";
        $out .= "----------------------------\n";
        return $out;
    }
}