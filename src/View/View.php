<?php

namespace View;

use Others\dependency\Dependency;

class View
{

    public static $dependency;

    public function __construct()
    {
        self::$dependency = Dependency::loadDependency(array());

    }

    public function sideBar()
    {
        ?>
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height: 100%;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <span class="fs-4">Sidebar</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link active" aria-current="page">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#home"></use>
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#speedometer2"></use>
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#table"></use>
                        </svg>
                        Orders
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#grid"></use>
                        </svg>
                        Products
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#people-circle"></use>
                        </svg>
                        Customers
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>mdo</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1" style="">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>
        </div>
        <?php
    }

    public function header()
    {
        ?>
        <!-- Code HTML pour la barre de navigation -->
        <header
            class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom"
            style="max-height: 10%;">
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Features</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Pricing</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">About</a></li>
            </ul>

            <div class="col-md-3 text-end">
                <button type="button" class="btn btn-outline-primary me-2">Login</button>
                <button type="button" class="btn btn-primary">Sign-up</button>
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
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="Description de votre page">
            <meta name="keywords" content="Mot-clé 1, Mot-clé 2, ...">

            <title>Mon Application</title>
            <!-- Ajoutez ici vos liens vers les fichiers CSS, scripts, etc. -->
            <?php echo static::$dependency["css"]; ?>

            <!-- faire le system pour add les fichier du webroot via la view et les fichier par default
                problème sur le #app
            -->
            <style>
                html,
                body {
                    height: 100%;
                    margin: 0;
                }

                #app {
                    min-height: 100%;
                    position: relative;
                    margin-bottom: -50px;
                }

                body {
                    margin-bottom: 50px;
                }

                footer {
                    height: 50px;
                    position: absolute;
                    bottom: 0;
                    width: 100%;
                }

                header {
                    position: fixed;
                    top: 0;
                    width: 100%;
                    color: #fff;
                    padding: 10px;
                    z-index: 1000;
                }
            </style>


        </head>
        <?php static::header(); ?>

        <body>
            <?php //static::sideBar(); ?>
            <div id="app">
                <?php static::contentBody(); ?>
            </div>

            <?php static::footer(); ?>
        </body>
        <?php echo static::$dependency["js"]; ?>

        </html>
        <?php
    }
}