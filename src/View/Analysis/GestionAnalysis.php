<?php

namespace View\Analysis;

use View\View;
use Others\dependency\Dependency;
use Others\dependency\DepEnum;

class GestionAnalysis extends View
{


    public function __construct()
    {
        parent::__construct();
        self::$dependency = Dependency::loadDependency(array(DepEnum::DATATABLESJS), get_class());
    }


    public function contentBody()
    {
        ?>

        <div class="content-wrapper">

            <div class="content">
                <div class="content-fluid">
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <div class="card">
                                <div class="card-header row">
                                    <div class="col-md-6">
                                        <h1 class="text-left mt-2">Paramètrage mesures</h1>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table" id="DtAnalysisType"></table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <?php
    }
}
?>