<?php

namespace View\Settings;

use View\View;
use Model\Commands\Commands;
use Model\Produits\Produits;
use Others\dependency\Dependency;

class Settings extends View
{

    public function __construct()
    {
        self::$dependency = Dependency::loadDependency(array(), get_class());
    }

    public function contentBody()
    {
?>
        <div class="card shadow p-3 card-format">
            <div class="card-body">
                <h1>Paramètres</h1>
            </div>
        </div>

        <div class="card shadow p-3 card-format">
            <div class="card-body">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Active</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>

<?php

        $t = Commands::getByID(1001);
        var_dump($t);
        var_dump(Produits::getByID(101));

    }
}
