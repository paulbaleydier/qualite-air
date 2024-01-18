<?php

namespace View\Commands;

use Model\Commands\Commands;
use Model\Produits\Produits;
use Others\dependency\Dependency;
use View\View;

class DataTable extends View
{

    public function __construct()
    {
        self::$dependency = Dependency::loadDependency(array(), get_class());
    }

    public function contentBody()
    {
?>
        <h1>Commands Exemple (MVC) !</h1>



        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ref Produit</th>
                    <th scope="col">Nom Produit</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Commander par</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach (Commands::getAll() ?? [] as $comand) {
                    
                    echo "<tr>";
                    echo "<td> " . $comand->commande_id . "</td>";
                    echo "<td> " . $comand->_produit->produit_id . "</td>";
                    echo "<td> " . $comand->_produit->nom_produit . "</td>";
                    echo "<td> " . $comand->_produit->prix . "</td>";
                    echo "<td> " . $comand->_user->nom . "</td>";
                    echo "</tr>";
                    var_dump($comand);
                }

                ?>
            </tbody>
        </table>
<?php


        // var_dump(Produits::getByID(101));

    }
}
