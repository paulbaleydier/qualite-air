<?php

namespace View;

use Entity\Utilisateur;
use Others\dependency\Dependency;
use Others\dependency\DepEnum;
use Others\Authentification;

class View
{

    public static $dependency;
    public static $controller;
    public static $header = true;
    public static $footer = true;
    public static $sideBar = true;


    public function __construct($accessLogin = true)
    {
        Authentification::redirectionLogin($accessLogin);
        self::$dependency = Dependency::loadDependency(array(DepEnum::DATATABLESJS), get_called_class());
        // self::$controller = str_replace("View", "Controller", get_called_class());

    }

    public function sideBar()
    {
?>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.php?controller=Dashboard&view=Dashboard" class="brand-link text-center">
                <span class="brand-text font-weight-light">QDA</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">
                    <div>
                        <a href="#" class="d-block"><?php echo ucfirst($_SESSION["nom"] ?? "") . " " . ucfirst($_SESSION["prenom"] ?? "") ?></a>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">



                        <li class="nav-item">
                            <a href="index.php?controller=Dashboard&view=Dashboard" class="nav-link">
                                <i class="nav-icon fa-solid fa-chart-line"></i>
                                <p> Tableau de bord </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-solid fa-gear"></i>
                                <p>
                                    Paramètres
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="index.php?controller=Settings&view=UserManager" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Compte</p>
                                    </a>
                                </li>

                                <?php if (Utilisateur::hasPermission(Utilisateur::ADMIN)) { ?>

                                    <li class="nav-item">
                                        <a href="index.php?controller=Settings&view=UsersManagement" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Gestion Utilisateur(s)</p>
                                        </a>
                                    </li>
                                <?php } ?>

                                <?php if (Utilisateur::hasPermission(Utilisateur::ADMIN)) { ?>
                                <li class="nav-item">
                                    <a href="index.php?controller=Analysis&view=GestionAnalysis" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Gestion Analyse</p>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php if (Utilisateur::hasPermission(Utilisateur::ADMIN)) { ?>
                        <li class="nav-item">
                            <a href="index.php?controller=Dev&view=Dev" class="nav-link">
                                <i class="nav-icon fa-solid fa-code"></i>
                                <p> Dev </p>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

    <?php
    }

    public function header()
    {
    ?>
        <!-- Code HTML pour la barre de navigation -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=Authentification&action=logout" role="button">
                        <i class="fas fa-door-open"></i>
                    </a>
                </li>
            </ul>
        </nav>


    <?php
    }

    public function contentBody()
    {
    }

    public function defaultModal()
    {
    }

    public function modal()
    {
    }

    public function footer()
    {
    ?>
        <footer class="main-footer">
            <strong>Copyright © 2024 PVM-TECH.</strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 0.0.1
            </div>
        </footer>
    <?php
    }

    public function render()
    {
    ?>
        <!DOCTYPE html>
        <html lang="fr" style="height: auto;">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="Description de votre page">
            <meta name="keywords" content="Mot-clé 1, Mot-clé 2, ...">
            <link rel="manifest" href="webroot/manifest.json">
            <link rel="shortcut icon" href="/webroot/assets/icons.png" type="image/x-icon">
            <title>Qualité de l'air</title>
            <!-- Ajoutez ici vos liens vers les fichiers CSS, scripts, etc. -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

            <?php echo static::$dependency["css"]; ?>

        </head>

        <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
            <!-- <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed sidebar-collapse"> -->
            <div class="wrapper">
                <?php if (static::$header) static::header(); ?>

                <?php if (static::$sideBar) static::sideBar(); ?>


                <!-- <div class="content-wrapper"></div> -->
                <?php static::contentBody(); ?>

                <!-- <div id="sidebar-overlay"></div> -->
                <?php if (static::$footer) static::footer(); ?>
               
            </div>

        </body>
        
        <?php
        echo self::sw();
        echo static::$dependency["js"];
        echo static::script();
        ?>

        </html>
<?php
    }

    protected function script()
    {
    }

    private function sw()
    {
        $sw = <<<END
        <script>
        
            if ('serviceWorker' in navigator) {
                navigator.serviceWorker.register('/webroot/serviceworker.js')
                    .then(registration => {
                        console.log('Service Worker enregistré avec succès:', registration);
                    })
                    .catch(error => {
                        console.error("Erreur d'enregistrement du Service Worker:", error);
                    });
            }
        </script>
        END;
        return $sw;
    }
}
