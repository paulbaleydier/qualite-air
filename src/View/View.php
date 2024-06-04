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
    public function getStatsSideBar()
    {
        if (isset($_SESSION["_cache"]["sideBar"])) {
            $status = $_SESSION["_cache"]["sideBar"];
            return $status == "true";
        }
        return false;
    }

    public function getThemeDark()
    {
        if (isset($_SESSION["_cache"]["darkTheme"])) {
            $status = $_SESSION["_cache"]["darkTheme"];
            return $status == "true";
        }
        return false;
    }

    public function sideBar()
    {
        ?>
        <aside class="main-sidebar <?php echo ($this->getThemeDark() == true ? "sidebar-dark-primary" : "sidebar-light-primary") ?> elevation-4">
            <!-- Brand Logo -->


            <a href="index.php?controller=Dashboard&view=Dashboard" class="brand-link">
                <img src="webroot/assets/icons.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">QDA</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar ">
                <!-- Sidebar user panel -->

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <!-- <div class="shortName image d-sm-none d-md-block">
                    </div> -->
                    <div class="info d-none d-md-block">
                        <a href="index.php?controller=Settings&view=UserManager"
                            class="d-block"><?php echo ucfirst($_SESSION["prenom"] ?? "") . " " . ucfirst($_SESSION["nom"] ?? "") ?></a>
                    </div>
                    <div class="fullName d-md-none">
                        <a href="index.php?controller=Settings&view=UserManager"
                            class="d-block"><?php echo ucfirst($_SESSION["prenom"] ?? "") . " " . ucfirst($_SESSION["nom"] ?? "") ?></a>
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
                            <a class="nav-link">
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
                                            <p>Gestion utilisateurs</p>
                                        </a>
                                    </li>
                                <?php } ?>

                                <?php if (Utilisateur::hasPermission(Utilisateur::ADMIN)) { ?>
                                    <li class="nav-item">
                                        <a href="index.php?controller=Analysis&view=GestionAnalysis" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Paramètrage mesures</p>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php if (Utilisateur::hasPermission(Utilisateur::ADMIN)) { ?>
                            <!-- <li class="nav-item">
                                <a href="index.php?controller=Dev&view=Dev" class="nav-link">
                                    <i class="nav-icon fa-solid fa-code"></i>
                                    <p> Dev </p>
                                </a>
                            </li> -->
                        <?php } ?>
                    </ul>

                    <ul class="nav nav-pills nav-sidebar flex-column url-end-block" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a id="openNotifications" class="nav-link">
                                <i class="nav-icon fa-solid fa-bell"></i>
                                <p>Notifications</p>
                            </a>
                        </li>
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
        <nav class="main-header navbar navbar-expand ">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" id="btnSideBarCollapse"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class=" nav-link toggle-dark-mode ">
                        <i class="fas fa-moon"></i>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class=" nav-link" href="index.php?controller=Authentification&action=logout">
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
        ?>
        <div class="modal" tabindex="-1" id="modalNotifications">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Notifications</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul id="notifications-list" class="list-group">

                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    public function modal()
    {
    }

    public function footer()
    {
        ?>
        <footer class="main-footer">
            <strong>QDA © 2024.</strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
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
            <link rel="stylesheet"
                href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

            <?php echo static::$dependency["css"]; ?>

        </head>

        <body
            class="hold-transition sidebar-mini <?php echo ($this->getStatsSideBar() == true ? "sidebar-collapse" : "") ?> <?php echo ($this->getThemeDark() == true ? "dark-mode" : "") ?>">
            <!-- <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed sidebar-collapse"> -->
            <div class="wrapper">
                <?php if (static::$header)
                    static::header(); ?>

                <?php if (static::$sideBar)
                    static::sideBar(); ?>


                <!-- <div class="content-wrapper"></div> -->
                <?php static::contentBody(); ?>

                <!-- <div id="sidebar-overlay"></div> -->
                <?php if (static::$footer)
                    static::footer(); ?>

                <?php static::defaultModal(); ?>
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
