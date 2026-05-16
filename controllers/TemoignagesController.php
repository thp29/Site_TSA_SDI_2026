<?php

require_once 'models/TemoignagesModel.php';

class TemoignagesController

{
    public function afficherPageTemoignages()
    {
        $modele = new TemoignagesModel();

        $liste_temoignages = $modele->getTousTemoignages();

        require 'views/temoignages_View.php';
    }
}
