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

        <div class="content">

            <div class="shadow card">
                <div class="card-body" style="display: flex;justify-content: space-around;flex:1 1 auto;">
                    <div class="chart-container" style="position: relative; height:40vh; width:80vw">
                            <canvas id="chart-test"></canvas>
                        </div>
                    <div class="chart-container" style="position: relative; height:40vh; width:80vw">
                            <canvas id="lineChart"></canvas>
                    </div>
                </div>
            </div>


        </div>

<?php
    }
}
