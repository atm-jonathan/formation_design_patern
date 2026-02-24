<?php


namespace Modele;

class Joueur
{
    private string $nom;
    private int $position = 0;
    private int $score = 0;
    private bool $enPrison = false;
    CONST SCORE_POUR_GAGNER = 6;

    public function __construct(string $nom) {
        $this->nom = $nom;
    }

    public function getNom(): string {return $this->nom;}
    public function getPosition(): int {return $this->position;}
    public function getScore(): int {return $this->score;}
    public function isEnPrison(): bool {return $this->enPrison;}
    public function setNom(string $nom): void {$this->nom = $nom;}
    public function setPosition(int $position): void {$this->position = $position;}
    public function setScore(int $score): void { $this->score = $score;}
    public function setEnPrison(bool $enPrison): void { $this->enPrison = $enPrison;}
    public function avancer(int $nbDe, int $taillePlateau)
    {
        $this->position = ($this->position + $nbDe) % $taillePlateau;
    }
    public function marquerPoint()
    {
        $this->score += 1;
    }
    public function envoyerEnPrison()
    {
        $this->enPrison = true;
    }
    public function liberer()
    {
        $this->enPrison = false;
    }

}
