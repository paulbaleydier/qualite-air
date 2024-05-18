<?php

namespace View\Settings;

use View\View;
use Others\dependency\Dependency;
use Others\dependency\DepEnum;

class UserManager extends View
{


    public function __construct()
    {
        parent::__construct();
        self::$dependency = Dependency::loadDependency(array(), get_class());
    }

    public function contentBody()
    {
?>

        <div class="content-wrapper">
            <div class="content">
                <div class="card m-2" style="top: 1rem;">
                    <h1 class="text-center mt-2">Gestion utilisateur</h1>
                    <div class="card-body">
                        <?php if (!isset($_SESSION["google_id"])) { ?>
                        <div class="callout callout-info row">
                            <div class="col-md-6  d-flex align-items-center">
                                <h5 class="text-left">Modifiez votre mot de passe</h5>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary float-right" id="btnResetMdp" data-userID="<?php echo $_SESSION["id"]; ?>">Cliquez ici</button>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="callout callout-info row">
                            <div class="col-md-6  d-flex align-items-center">
                                <h5 class="text-left">Installation de l'application</h5>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary float-right" id="installButton" disabled>Installer la PWA</button>
                            </div>
                        </div>
                    </div>

                </div>


            </div>

        </div>
    <?php
    }

    public function modal()
    {
    ?>
        <div class="modal modal-dialog-centered fade" id="modalResetMdp"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
