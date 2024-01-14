<?php

namespace View;

class View {
    public function __construct() {
    }

    public function navBar() {
        ?>
        <!-- Code HTML pour la barre de navigation -->
        <nav>
            <ul>
                <li><a href="?view=test">Accueil</a></li>
                <li><a href="?view=E404">À propos</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
        <?php
    }

    public function contentBody() {
    }

    public function footer() {
        ?>
        <!-- Code HTML pour le pied de page -->
        <footer>
            <p>&copy; 2022 Mon Application</p>
        </footer>
        <?php
    }

    public function init() {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Mon Application</title>
            <!-- Ajoutez ici vos liens vers les fichiers CSS, scripts, etc. -->
        </head>
        <body>
            <?php static::navBar(); ?>

            <div id="content">
                <?php static::contentBody(); ?>
            </div>

            <?php static::footer(); ?>
        </body>
        </html>
        <?php
    }
}