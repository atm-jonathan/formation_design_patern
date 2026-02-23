<?php
declare(strict_types=1);

namespace Legacy;

final class Joueur
{
    public string $nom;
    public int $position = 0;
    public int $score = 0;
    public bool $enPrison = false;
    public bool $peutJouerCeTour = true;

    public function __construct(string $nom)
    {
        $this->nom = $nom;
    }
}