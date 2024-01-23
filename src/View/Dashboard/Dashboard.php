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
                <div class="card-body" style="display: inline-flex;justify-content: space-around;">
                    <div style="width: 40vw;">
                        <canvas id="chart-test"></canvas>
                    </div>
                    <div style="width: 40vw;">
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
            </div>


        </div>

<?php
    }
}
