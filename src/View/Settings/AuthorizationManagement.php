<?php

namespace View\Settings;

use View\View;
use Others\dependency\Dependency;

class AuthorizationManagement extends View
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
                        <a class="nav-link fs-4" href="./index.php?controller=Settings&view=UserManagement">Gestion des utilisateurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fs-4" href="./index.php?controller=Settings&view=AuthorizationManagement">Gestion des permissions</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <table class="table" style="margin-top: 1rem;">
                            <thead>
                                <tr>
                                    <th>test</th>
                                    <th>test</th>
                                    <th>test</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>test</td>
                                    <td>test</td>
                                    <td>test</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
