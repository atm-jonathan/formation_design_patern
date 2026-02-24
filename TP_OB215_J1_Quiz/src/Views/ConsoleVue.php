<?php

class ConsoleVue {
    public static function afficherDebutPartie($nomsJoueurs, $scorePourGagner){
        echo "=== JeuQuiz Legacy (TP Refactoring) ===\n";
        //manque implode
        echo "Objectif: atteindre 6 points.\n";
    }
    public static function afficherTour(string $nomJoueur, int $de) :void {
        echo "\n--- Tour de {$nomJoueur} ---\n";
        echo "{$nomJoueur} lance le dé: {$de}\n";
    }
    public static function afficherSortieDePrison(string $nomJoueur) :void {
        echo "{$nomJoueur} sort de prison (dé pair).\n";
    }
    public static function afficherResteEnPrison(string $nomJoueur) :void {
        echo "{$nomJoueur} reste en prison (dé impair).\n";
    }
    public static function afficherDeplacement(string $nomJoueur, int $nouvellePosition) :void {
        echo "{$nomJoueur} avance en case {$nouvellePosition}\n";
    }
    public static function afficherCategorie(string $libelleCategorie) :void{
        echo "Catégorie: {$libelleCategorie}\n";
    }
    public static function afficherQuestion(string $question) :void {
        echo "Question: " . $question . "\n";
    }
    public static function afficherBonneReponse(string $nomJoueur, int $score) :void{
        echo "Bonne réponse ! Score de {$nomJoueur} = {$score}\n";
    }
    public static function afficherMauvaiseReponseEtPrison(string $nomJoueur) :void{
        echo "Mauvaise réponse... {$nomJoueur} va en prison.\n";
    }
    public static function afficherGagnant(string $nomJoueur) :void {
        echo "\n*** {$nomJoueur} a gagné ! ***\n";
    }
    public static function afficherFinPartie() :void {
        echo "\n=== Fin de partie ===\n";
    }
}
