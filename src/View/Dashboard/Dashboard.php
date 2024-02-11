<?php

namespace View\Dashboard;

use View\View;
use Others\dependency\Dependency;
use Others\dependency\DepEnum;

class Dashboard extends View
{


    public function __construct()
    {
        self::$dependency = Dependency::loadDependency(array(DepEnum::CHARTJS), get_class());
    }

    public function contentBody()
    {
?>

        <div class="content-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-6 d-flex justify-content-center">
                        <div class="chart-container" style="position: relative; height:30vh; width:30vw">
                            <canvas id="chart-usualgas"></canvas>
                        </div>
                    </div>
                    <div class="col-6 d-flex justify-content-center">
                        <div class="chart-container" style="position: relative; height:30vh; width:30vw">
                            <canvas id="chart-blendorganic"></canvas>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-6 d-flex justify-content-center">
                        <canvas id="chart-fineparticles"></canvas>
                    </div>
                  
                </div>
            </div>

        </div>
<?php
    }
}
