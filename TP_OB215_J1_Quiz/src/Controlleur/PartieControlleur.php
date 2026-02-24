<?php

namespace Controlleur;

use Modele\Joueur;
use Modele\Categorie;

class PartieControlleur {

    public function __construct (
        private \ConsoleVue $vue,
    ) {
        $joueurs = [
            new Joueur("Alice"),
            new Joueur("Bob"),
            new Joueur("Charly"),
        ];
    }
    public static function Jouer()
    {
        mt_srand(42);



        $questionsScience = [];
        $questionsHistoire = [];
        $questionsPopCulture = [];

        for ($i = 1; $i <= 50; $i++) {
            $questionsScience[] = "Science Q" . $i;
            $questionsHistoire[] = "Histoire Q" . $i;
            $questionsPopCulture[] = "PopCulture Q" . $i;
        }

        \ConsoleVue::afficherDebutPartie($joueurs, Joueur::SCORE_POUR_GAGNER ?? 6);

        $indexJoueurCourant = 0;

        while (true) {
            $j = $joueurs[$indexJoueurCourant];

            $de = self::lancerDe();
            $bonneReponse = self::estBonneReponse();

            \ConsoleVue::afficherTour($j->getNom(), $de);

            if ($j->isEnPrison()) {
                if ($de % 2 === 0) {
                    $j->setPeutJouerCeTour(true); // Utilisation d'un setter au lieu de la propriété publique
                    $j->setEnPrison(false);
                    \ConsoleVue::afficherSortieDePrison($j->getNom());
                } else {
                    $j->setPeutJouerCeTour(false);
                    \ConsoleVue::afficherResteEnPrison($j->getNom());
                }
            } else {
                $j->setPeutJouerCeTour(true);
            }

            if ($j->isPeutJouerCeTour()) {
                $nouvellePosition = ($j->getPosition() + $de) % 12;
                $j->setPosition($nouvellePosition);

                \ConsoleVue::afficherDeplacement($j->getNom(), $j->getPosition());

                $categorieEnum = self::categoriePourPosition($j->getPosition());
                \ConsoleVue::afficherCategorie($categorieEnum->value);

                if ($categorieEnum === Categorie::SCIENCE) {
                    \ConsoleVue::afficherQuestion(self::retirerPremiereQuestion($questionsScience));
                } elseif ($categorieEnum === Categorie::HISTOIRE) {
                    \ConsoleVue::afficherQuestion(self::retirerPremiereQuestion($questionsHistoire));
                } elseif ($categorieEnum === Categorie::POP_CULTURE) {
                    \ConsoleVue::afficherQuestion(self::retirerPremiereQuestion($questionsPopCulture));
                } else {
                    \ConsoleVue::afficherQuestion("???");
                }

                if ($bonneReponse) {
                    // Correction du bug de score global
                    $j->setScore($j->getScore() + 1);
                    \ConsoleVue::afficherBonneReponse($j->getNom(), $j->getScore());

                    if ($j->getScore() >= 6) {
                        \ConsoleVue::afficherGagnant($j->getNom());
                        break;
                    }
                } else {
                    \ConsoleVue::afficherMauvaiseReponseEtPrison($j->getNom());
                    $j->setEnPrison(true);
                }
            }

            $indexJoueurCourant++;
            if ($indexJoueurCourant === count($joueurs)) {
                $indexJoueurCourant = 0;
            }
        }
        \ConsoleVue::afficherFinPartie();
    }

    private static function lancerDe(): int
    {
        return mt_rand(1, 6);
    }

    private static function estBonneReponse(): bool
    {
        return mt_rand(0, 9) < 7;
    }

    private static function retirerPremiereQuestion(array &$questions): string
    {
        if (empty($questions)) {
            return "??? (plus de questions)";
        }
        return array_shift($questions);
    }

    private static function categoriePourPosition(int $position): Categorie
    {
        switch ($position % 4) {
            case 0:
                return Categorie::SCIENCE;
            case 1:
                return Categorie::HISTOIRE;
            case 2:
                return Categorie::SPORT;
            default:
                return Categorie::POP_CULTURE;
        }
    }
}