<?php

namespace Src\Model;

/**
 * Version naïve : le magasin décide lui-même quel type de poste créer.
 * C'est précisément ce qu'on refactorera plus tard avec une Factory.
 */
class MagasinPostesNaif
{
    public function preparerPoste(string $type): void
    {
        $poste = null;

        // Le magasin connaît toutes les classes concrètes.
        // C'est pratique au début, mais ça crée du couplage.
        if ($type === 'java') {
            $poste = new PosteJava();
        } elseif ($type === 'web') {
            $poste = new PosteWeb();
        } elseif ($type === 'data') {
            $poste = new PosteData();
        } else {
            echo "Type de poste inconnu : {$type}" . PHP_EOL;
            return;
        }

        echo PHP_EOL . "=== Préparation d'un poste '{$type}' ===" . PHP_EOL;

        // Pipeline commun (le déroulé métier)
        $poste->installerOS();
        $poste->installerIDE();
        $poste->configurer();
        $poste->livrer();
    }
}