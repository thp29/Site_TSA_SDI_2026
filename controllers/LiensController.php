<?php

require_once 'models/LiensModel.php';

class LiensController

{
    public function afficherPageLiens()
    {

        $modele = new LiensModel();

        $liste_liens = $modele->getTousLesLiens();


        require 'views/liens_View.php';
    }
}
