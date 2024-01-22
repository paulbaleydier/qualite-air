<?php

namespace View;

use Others\dependency\Dependency;

class View
{

    public static $dependency;
    public static $header = true;
    public static $footer = true;

    public function __construct()
    {
        self::$dependency = Dependency::loadDependency(array(), get_called_class());
        // self::$controller = str_replace("View", "Controller", get_called_class());
        
    }

    public function sideBar()
    {
        ?>
       
        <?php
    }

    public function header()
    {
        ?>
        <!-- Code HTML pour la barre de navigation -->
        <header
            class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom"
            >
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="index.php?controller=Utilisateurs&view=DataTable" class="nav-link px-2 link-secondary">Utilisateurs</a></li>
                <li><a href="?controller=Produits&view=DataTable" class="nav-link px-2 link-dark">Produits</a></li>
                <li><a href="?controller=Commands&view=DataTable" class="nav-link px-2 link-dark">Commands</a></li>
            </ul>

            <div class="col-md-3 text-end">
                <a type="button" class="btn" href="./index.php?controller=Authentification&action=logout"><i class="fa-solid fa-door-open"></i></a>
                <a type="button" class="btn" href="./index.php?controller=Settings&view=UserManagement"><i class="fa-solid fa-gear"></i></a>
            </div>
        </header>
        <?php
    }

    public function contentBody()
    {
    }

    public function footer()
    {
        ?>
        <!-- Code HTML pour le pied de page -->
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top"
            style="max-height: 10%;">
            <div class="col-md-4 d-flex align-items-center">
                <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <svg class="bi" width="30" height="24">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>
                <span class="text-muted">© 2021 Company, Inc</span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex px-2">
                <span class="text-muted ">Projet BTS SN 2022 - 2024</span>
            </ul>
        </footer>
        <?php
    }

    public function render()
    {
        ?>
        <!DOCTYPE html>
        <html lang="en" class="h-100">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="Description de votre page">
            <meta name="keywords" content="Mot-clé 1, Mot-clé 2, ...">

            <title>Mon Application</title>
            <!-- Ajoutez ici vos liens vers les fichiers CSS, scripts, etc. -->
            <?php echo static::$dependency["css"]; ?>

    
            <!-- <style>
                main {
                    max-height: 80%;
                    overflow: auto;
                }
            </style> -->

        </head>

        <body class="d-flex flex-column h-100">
            <?php //static::sideBar(); ?>

            <?php if (static::$header) static::header(); ?>

            <main class="flex-shrink-0">
                <?php static::contentBody(); ?>
            </main>

            <?php if (static::$footer) static::footer(); ?>
        </body>
        
        <?php echo static::$dependency["js"]; ?>
        </html>
        <?php
    }
}