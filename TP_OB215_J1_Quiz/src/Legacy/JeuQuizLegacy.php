<?php
declare(strict_types=1);

namespace Legacy;

final class JeuQuizLegacy
{
    public static function main(): void
    {
        // "Pseudo hasard" reproductible (équivalent Random(42) en Java)
        mt_srand(42);

        $joueurs = [
            new Joueur("Alice"),
            new Joueur("Bob"),
            new Joueur("Charly")
        ];

        $questionsScience = [];
        $questionsHistoire = [];
        $questionsPopCulture = [];

        for ($i = 1; $i <= 50; $i++) {
            $questionsScience[] = "Science Q" . $i;
            $questionsHistoire[] = "Histoire Q" . $i;
            $questionsPopCulture[] = "PopCulture Q" . $i;
        }

        echo "=== JeuQuiz Legacy (TP Refactoring) ===\n";
        echo "Objectif: atteindre 6 points.\n";

        $indexJoueurCourant = 0;

        while (true) {
            $j = $joueurs[$indexJoueurCourant];

            $de = self::lancerDe();
            $bonneReponse = self::estBonneReponse();

            echo "\n--- Tour de {$j->nom} ---\n";
            echo "{$j->nom} lance le dé: {$de}\n";

            if ($j->enPrison) {
                if ($de % 2 === 0) {
                    $j->peutJouerCeTour = true;
                    $j->enPrison = false;
                    echo "{$j->nom} sort de prison (dé pair).\n";
                } else {
                    $j->peutJouerCeTour = false;
                    echo "{$j->nom} reste en prison (dé impair).\n";
                }
            } else {
                $j->peutJouerCeTour = true;
            }

            if ($j->peutJouerCeTour) {
                $j->position = ($j->position + $de) % 12;
                echo "{$j->nom} avance en case {$j->position}\n";

                $categorie = self::categoriePourPosition($j->position);
                echo "Catégorie: {$categorie}\n";

                if ($categorie === "Science") {
                    echo "Question: " . self::retirerPremiereQuestion($questionsScience) . "\n";
                } elseif ($categorie === "Histoire") {
                    echo "Question: " . self::retirerPremiereQuestion($questionsHistoire) . "\n";
                } elseif ($categorie === "PopCulture") {
                    echo "Question: " . self::retirerPremiereQuestion($questionsPopCulture) . "\n";
                } else {
                    echo "Question: ???\n";
                }

                if ($bonneReponse) {
                    $j->score++;
                    echo "Bonne réponse ! Score de {$j->nom} = {$j->score}\n";

                    if ($j->score >= 6) {
                        echo "\n*** {$j->nom} a gagné ! ***\n";
                        break;
                    }
                } else {
                    echo "Mauvaise réponse... {$j->nom} va en prison.\n";
                    $j->enPrison = true;
                }
            }

            $indexJoueurCourant++;
            if ($indexJoueurCourant === count($joueurs)) {
                $indexJoueurCourant = 0;
            }
        }

        echo "\n=== Fin de partie ===\n";
    }

    private static function lancerDe(): int
    {
        return mt_rand(1, 6); // 1..6
    }

    private static function estBonneReponse(): bool
    {
        return mt_rand(0, 9) < 7; // ~70%
    }

    private static function retirerPremiereQuestion(array &$questions): string
    {
        if (empty($questions)) {
            return "??? (plus de questions)";
        }
        return array_shift($questions); // retire le premier élément (FIFO)
    }

    private static function categoriePourPosition(int $position): string
    {
        if ($position === 0 || $position === 4 || $position === 8) return "Science";
        if ($position === 1 || $position === 5 || $position === 9) return "Histoire";
        return "PopCulture";
    }
}