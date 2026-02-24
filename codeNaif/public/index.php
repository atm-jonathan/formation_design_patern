<?php

require_once __DIR__ . '/../src/Model/PosteDeTravail.php';
require_once __DIR__ . '/../src/Model/PosteJava.php';
require_once __DIR__ . '/../src/Model/PosteWeb.php';
require_once __DIR__ . '/../src/Model/PosteData.php';
require_once __DIR__ . '/../src/Model/PosteMobile.php';
require_once __DIR__ . '/../src/Model/MagasinPosteNaif.php';
require_once __DIR__ . '/../src/Model/MagasinPostes.php';
require_once __DIR__ . '/../src/Model/MagasinEquipeJunior.php';
require_once __DIR__ . '/../src/Model/MagasinEquipeSenior.php';
require_once __DIR__ . '/../src/Singleton/ConfigurationEntreprise.php';

use Src\Model\MagasinPostesNaif;
use Src\Singleton\ConfigurationEntreprise;
use Src\Model\MagasinEquipeJunior;
use Src\Model\MagasinEquipeSenior;

$config1 = ConfigurationEntreprise::getInstance();
$config2 = ConfigurationEntreprise::getInstance();

echo $config1->afficherConfiguration();

$magasin = new MagasinPostes();

$magasin->preparerPoste('java');
$magasin->preparerPoste('web');
$magasin->preparerPoste('data');
$magasin->preparerPoste('mobile');

if ($config1 === $config2) {
    echo "\n✅ Succès : Les deux variables pointent vers la même instance. C'est bien un Singleton.";
} else {
    echo "\n❌ Erreur : Ce sont deux objets différents.";
}

echo "=== GESTION DES COMMANDES PAR ÉQUIPE ===" . PHP_EOL;

// Client veut du Junior
$magasinJunior = new MagasinEquipeJunior();
$magasinJunior->creerPoste('java');
$magasinJunior->traiterCommande('java');

// Client veut du Senior
$magasinSenior = new MagasinEquipeSenior();
$magasinSenior->creerPoste('web');
$magasinSenior->traiterCommande('web');
