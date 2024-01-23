<?php

namespace View\Settings;

use View\View;
use Others\dependency\Dependency;
use Others\dependency\DepEnum;

class SettingsPage extends View
{

    public function __construct()
    {
        self::$dependency = Dependency::loadDependency(array(DepEnum::DATATABLESJS), get_class());
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
                        <a class="nav-link active fs-4"
                            data-bs-toggle="tab"
                            data-bs-target="#userList" 
                            type="button" 
                            role="tab"
                            aria-controls="home"
                            aria-selected="true">Gestion des utilisateurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  fs-4"
                            data-bs-toggle="tab"
                            data-bs-target="#userPerm" 
                            type="button" 
                            role="tab"
                            aria-controls="home"
                            aria-selected="false">Gestion des permissions</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="mt-2 tab-pane fade show active" id="userList" role="tabpanel" aria-labelledby="userList-tab">
                        
                        <table class="table" id="DT_UserList" style="margin-top: 1rem;">
                        </table>
                    
                    </div>

                    <div class="tab-pane fade show" id="userPerm" role="tabpanel" aria-labelledby="userPerm-tab">

                        <table class="table" id="DT_PermManage" style="margin-top: 1rem;"></table>
                    
                    </div>
                </div>
            </div>
        </div>

<?php

    }
}
