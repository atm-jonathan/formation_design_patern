<?php

namespace Src\Model;

/**
 * Contrat commun à tous les types de postes.
 * Le magasin pourra manipuler n'importe quel poste via cette interface.
 */
interface PosteDeTravail
{
    public function installerOS(): void;

    public function installerIDE(): void;

    public function configurer(): void;

    public function livrer(): void;
}