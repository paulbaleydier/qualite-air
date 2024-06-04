<?php

namespace View\Dashboard;

use View\View;
use Others\dependency\Dependency;
use Others\dependency\DepEnum;

class Dashboard extends View
{


    public function __construct()
    {
        parent::__construct();
        self::$dependency = Dependency::loadDependency(array(DepEnum::CHARTJS, DepEnum::DATERANGEPICKER, DepEnum::JQUERY_KNOB), get_class());
    }

    public function contentBody()
    {
?>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="custom-select" name="selectHourly" id="selectHourly">
                                    <option value="1" checked>Il y a 1 heure</option>
                                    <option value="3">Il y a 3 heures</option>
                                    <option value="12">Il y a 12 heures</option>
                                    <option value="24">Il y a 24 heures</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <!-- <label for="">Date de mise à jours</label> -->
                                <input type="text" class="form-control" id="updateTime" value="<?php echo date("d/m/Y H:i:s") ?>" readonly>
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <input type="date" class="form-control form-control-sm datepicker" placeholder="Sélectionnez une date">
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">

                        <div class="col-md-12 mt-3">
                            <div class="card">
                                <div class="card-header">
                                    Pourcentage du seuil maximal sur 24 heures
                                </div>
                                <div class="card-body body-stats">

                                </div>
                                <!-- <div class="card-footer">
                                    Ces compteurs affichent le taux en pourcentage des différents capteurs en fonction des taux maximums.
                                </div> -->
                            </div>
                        </div>

                        <div class="col-md-12 mt-3">
                            <div class="card">
                                <div class="card-header">
                                    <ul class="nav nav-pills ml-auto p-2">
                                        <li class="nav-item switchChart"><a class="nav-link active" href="#tab_all_usualgas" data-toggle="tab">TOUT</a></li>
                                        <li class="nav-item switchChart"><a class="nav-link " href="#tab_no2" data-toggle="tab">Dioxide d'azote</a></li>
                                        <li class="nav-item switchChart"><a class="nav-link" href="#tab_co" data-toggle="tab">Monoxyde de carbone</a></li>
                                        <li class="nav-item switchChart"><a class="nav-link" href="#tab_h2" data-toggle="tab">Hydrogène</a></li>
                                        <li class="nav-item switchChart"><a class="nav-link" href="#tab_temp" data-toggle="tab">Température</a></li>
                                        <li class="nav-item switchChart"><a class="nav-link" href="#tab_hum" data-toggle="tab">Humidité</a></li>
                                        <li class="nav-item switchChart"><a class="nav-link" href="#tab_co2" data-toggle="tab">Dioxyde de carbone</a></li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_all_usualgas">
                                            <div class="chart-container">
                                                <canvas id="chart-usualgas-all" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                            </div>
                                        </div>
                                        <div class="tab-pane " id="tab_no2">
                                            <div class="chart-container">
                                                <canvas id="chart-usualgas-no2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab_co">
                                            <div class="chart-container">
                                                <canvas id="chart-usualgas-co" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab_h2">
                                            <div class="chart-container">
                                                <canvas id="chart-usualgas-h2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab_temp">
                                            <div class="chart-container">
                                                <canvas id="chart-usualgas-temp" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab_hum">
                                            <div class="chart-container">
                                                <canvas id="chart-usualgas-hum" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab_co2">
                                            <div class="chart-container">
                                                <canvas id="chart-usualgas-co2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <ul class="nav nav-pills ml-auto p-2">
                                        <li class="nav-item switchChart"><a class="nav-link active" href="#tab_all_blendorganic" data-toggle="tab">TOUT</a></li>
                                        <li class="nav-item switchChart"><a class="nav-link " href="#tab_C2H5OH" data-toggle="tab">Ethanol</a></li>
                                        <li class="nav-item switchChart"><a class="nav-link" href="#tab_CH4" data-toggle="tab">Methane</a></li>
                                        <li class="nav-item switchChart"><a class="nav-link" href="#tab_NH3" data-toggle="tab">Amoniaque</a></li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_all_blendorganic">
                                            <div class="chart-container">
                                                <canvas id="chart-blendorganic-all" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                            </div>
                                        </div>
                                        <div class="tab-pane " id="tab_C2H5OH">
                                            <div class="chart-container">
                                                <canvas id="chart-blendorganic-C2H5OH" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="tab_CH4">
                                            <div class="chart-container">
                                                <canvas id="chart-blendorganic-CH4" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="tab_NH3">
                                            <div class="chart-container">
                                                <canvas id="chart-blendorganic-NH3" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <ul class="nav nav-pills ml-auto p-2">
                                        <li class="nav-item switchChart"><a class="nav-link active" href="#tab_all_fineparticles" data-toggle="tab">TOUT</a></li>
                                        <li class="nav-item switchChart"><a class="nav-link " href="#tab_PM_2_5" data-toggle="tab">PM 2.5</a></li>
                                        <li class="nav-item switchChart"><a class="nav-link" href="#tab_PM_10_0" data-toggle="tab">PM 10.0</a></li>
                                    </ul>
                                </div>
                                <duv class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_all_fineparticles">
                                            <div class="chart-container">
                                                <canvas id="chart-fineparticles-all" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                            </div>
                                        </div>
                                        <div class="tab-pane " id="tab_PM_2_5">
                                            <div class="chart-container">
                                                <canvas id="chart-fineparticles-PM_2_5" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="tab_PM_10_0">
                                            <div class="chart-container">
                                                <canvas id="chart-fineparticles-PM_10_0" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                            </div>
                                        </div>


                                    </div>

                                </duv>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


        </div>
<?php
    }
}
