<?php

require_once 'models/ArticlesModel.php';

class InterfaceAdminController
{

    public function gererPageInterfaceAdmin()
    {
        if (!isset($_SESSION["role"]) || ($_SESSION["role"]) != "admin") {
            header("Location:index.php");
            exit();
        }

        $modelArticles = new ArticlesModel();
        $articles = $modelArticles->getAllArticles();
        require "views/admin_interface_View.php";
    }
}
