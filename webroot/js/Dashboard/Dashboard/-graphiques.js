const options = {
    maintainAspectRatio: false,
    responsive: true
};

const url_data = "index.php?controller=Dashboard&action=getChartData"
var hourlySelected = 1;


$(function () {

    drawAllUsualGasChart();
    drawAllBlendOrganicChart();
    drawAllFineParticlesChart();
    // switch 
    $(document).on('click', '.switchChart a[href="#tab_no2"]', function () {
        drawNO2();
    });

    $(document).on('click', '.switchChart a[href="#tab_co"]', function () {
        drawCO();
    });

    $(document).on('click', '.switchChart a[href="#tab_h2"]', function () {
        drawH2();
    });

    $(document).on('click', '.switchChart a[href="#tab_all_usualgas"]', function () {
        drawAllUsualGasChart();
    });

    // Composé organiques
    $(document).on('click', '.switchChart a[href="#tab_C2H5OH"]', function () {
        drawC2H5OH();
    });

    $(document).on('click', '.switchChart a[href="#tab_CH4"]', function () {
        drawCH4();
    });

    $(document).on('click', '.switchChart a[href="#tab_NH3"]', function () {
        drawNH3();
    });

    $(document).on('click', '.switchChart a[href="#tab_all_blendorganic"]', function () {
        drawAllBlendOrganicChart();
    });

    // Particules fines

    $(document).on('click', '.switchChart a[href="#tab_PM_2_5"]', function () {
        drawPM_2_5();
    });

    $(document).on('click', '.switchChart a[href="#tab_PM_10_0"]', function () {
        drawPM_10_0();
    });

    $(document).on('click', '.switchChart a[href="#tab_all_fineparticles"]', function () {
        drawAllFineParticlesChart();
    });


    // Autres events
    $(document).on('change', '#selectHourly', function () {
        var value = $(this).val();

        hourlySelected = value;


        $(".switchChart a.active").each(function () {
            var switchSelect = $(this).attr("href");
            console.log(switchSelect)
            reloadChartByHref(switchSelect);
        })
    }); 
});

function reloadChartByHref(hrefType) {
    switch (hrefType) {
     
        case "#tab_all_usualgas":
            drawAllUsualGasChart();
            break;
        case "#tab_no2":
            drawNO2();
            break;
        case "#tab_co":
            drawCO();
            break;
        case "#tab_h2":
            drawH2();
            break;
        case "#tab_all_blendorganic":
            drawAllBlendOrganicChart();
            break;
        case "#tab_C2H5OH":
            drawC2H5OH();
        case "#tab_CH4":
            drawCH4();
            break;
        case "#tab_NH3":
            drawNH3();
            break;
        case "#tab_all_fineparticles":
            drawAllFineParticlesChart();
            break;
        case "#tab_PM_2_5":
            drawPM_2_5();
            break;
        case "#tab_PM_10_0":
            drawPM_10_0();
            break;
        default: break;
    }
}


function drawNO2() {
    $.ajax({
        type: 'GET',
        url: url_data,
        data: { "args": "1", "hourlySelected": hourlySelected},
        dataType: 'JSON',
        success: function (reponse) {
            if (reponse.status == 0) {
                var data = reponse.data;

                new Chart($("#chart-usualgas-no2"),
                    {
                        type: 'line',
                        data: {
                            labels: data.map(entry => entry.ts),
                            datasets: [
                                {
                                    label: 'Dioxyde d\'azote (ppm)',
                                    data: data.map(entry => entry.value),
                                    borderColor: 'rgba(245, 159, 39, 0.8)',
                                    fill: false
                                }
                            ],
                        },
                        options: options
                    }
                );


            }
        }
    })
}

function drawCO() {
    $.ajax({
        type: 'GET',
        url: url_data,
        data: { "args": "2", "hourlySelected": hourlySelected},
        dataType: 'JSON',
        success: function (reponse) {
            if (reponse.status == 0) {
                var data = reponse.data;

                new Chart($("#chart-usualgas-co"),
                    {
                        type: 'line',
                        data: {
                            labels: data.map(entry => entry.ts),
                            datasets: [
                                {
                                    label: 'Monoxyde de carbone (ppm)',
                                    data: data.map(entry => entry.value),
                                    borderColor: 'rgba(179, 177, 173, 0.8)',
                                    fill: false
                                }
                            ],
                        },
                        options: options
                    }
                );


            }
        }
    })
}

function drawH2() {
    $.ajax({
        type: 'GET',
        url: url_data,
        data: { "args": "3", "hourlySelected": hourlySelected},
        dataType: 'JSON',
        success: function (reponse) {
            if (reponse.status == 0) {
                var data = reponse.data;

                new Chart($("#chart-usualgas-h2"),
                    {
                        type: 'line',
                        data: {
                            labels: data.map(entry => entry.ts),
                            datasets: [
                                {
                                    label: 'Hydrogène (ppm)',
                                    data: data.map(entry => entry.value),
                                    borderColor: 'rgba(154, 236, 232, 0.8)',
                                    fill: false
                                }
                            ],
                        },
                        options: options
                    }
                );


            }
        }
    });
}

function drawAllUsualGasChart() {

    $.ajax({
        type: 'GET',
        url: url_data,
        data: { "args": "1,2,3", "hourlySelected": hourlySelected},
        dataType: 'JSON',
        success: function (reponse) {
            if (reponse.status == 0) {
                var data = reponse.data;

                var no2Data = data.filter(row => row.shortName === 'NO2').map(row => ({ ts: row.ts, value: row.value }));
                var coData = data.filter(row => row.shortName === 'CO').map(row => ({ ts: row.ts, value: row.value }));
                var h2Data = data.filter(row => row.shortName === 'H2').map(row => ({ ts: row.ts, value: row.value }));


                new Chart(
                    $("#chart-usualgas-all"),
                    {
                        type: 'line',
                        data: {
                            labels: no2Data.map(entry => entry.ts),
                            datasets: [
                                {
                                    label: 'Dioxyde d\'azote (ppm)',
                                    data: no2Data.map(entry => entry.value),
                                    borderColor: 'rgba(245, 159, 39, 0.8)',
                                    fill: false
                                },
                                {
                                    label: 'Monoxyde de carbone (ppm)',
                                    data: coData.map(entry => entry.value),
                                    borderColor: 'rgba(179, 177, 173, 0.8)',
                                    fill: false
                                },
                                {
                                    label: 'Hydrogène (ppm)',
                                    data: h2Data.map(entry => entry.value),
                                    borderColor: 'rgba(154, 236, 232, 0.8)',
                                    fill: false
                                }
                            ],
                        },
                        options: options
                    }
                );


            }
        }
    })

}

function drawC2H5OH() {
    $.ajax({
        type: 'GET',
        url: url_data,
        data: { "args": "4", "hourlySelected": hourlySelected},
        dataType: 'JSON',
        success: function (reponse) {
            if (reponse.status == 0) {
                var data = reponse.data;

                new Chart($("#chart-blendorganic-C2H5OH"),
                    {
                        type: 'line',
                        data: {
                            labels: data.map(entry => entry.ts),
                            datasets: [
                                {
                                    label: 'Éthanol (ppm)',
                                    data: data.map(entry => entry.value),
                                    borderColor: 'rgba(181, 242, 191, 0.8)',
                                    fill: false
                                }
                            ],
                        },
                        options: options
                    }
                );


            }
        }
    });
}

function drawCH4() {
    $.ajax({
        type: 'GET',
        url: url_data,
        data: { "args": "5", "hourlySelected": hourlySelected},
        dataType: 'JSON',
        success: function (reponse) {
            if (reponse.status == 0) {
                var data = reponse.data;

                new Chart($("#chart-blendorganic-CH4"),
                    {
                        type: 'line',
                        data: {
                            labels: data.map(entry => entry.ts),
                            datasets: [
                                {
                                    label: 'Méthane (ppm)',
                                    data: data.map(entry => entry.value),
                                    borderColor: 'rgba(130, 181, 192, 0.8)',
                                    fill: false
                                }
                            ],
                        },
                        options: options
                    }
                );


            }
        }
    });
}

function drawNH3() {
    $.ajax({
        type: 'GET',
        url: url_data,
        data: { "args": "6", "hourlySelected": hourlySelected},
        dataType: 'JSON',
        success: function (reponse) {
            if (reponse.status == 0) {
                var data = reponse.data;

                new Chart($("#chart-blendorganic-NH3"),
                    {
                        type: 'line',
                        data: {
                            labels: data.map(entry => entry.ts),
                            datasets: [
                                {
                                    label: 'Ammoniaque (ppm)',
                                    data: data.map(entry => entry.value),
                                    borderColor: 'rgba(218, 248, 141, 0.8)',
                                    fill: false
                                }
                            ],
                        },
                        options: options
                    }
                );


            }
        }
    });
}

function drawAllBlendOrganicChart() {

    $.ajax({
        type: 'GET',
        url: url_data,
        data: { "args": "4,5,6", "hourlySelected": hourlySelected},
        dataType: 'JSON',
        success: function (reponse) {
            if (reponse.status == 0) {
                var data = reponse.data;

                var C2H5OHData = data.filter(row => row.shortName === 'C2H5OH').map(row => ({ ts: row.ts, value: row.value }));
                var CH4Data = data.filter(row => row.shortName === 'CH4').map(row => ({ ts: row.ts, value: row.value }));
                var NH3Data = data.filter(row => row.shortName === 'NH3').map(row => ({ ts: row.ts, value: row.value }));


                new Chart(
                    $("#chart-blendorganic-all"),
                    {
                        type: 'line',
                        data: {
                            labels: C2H5OHData.map(entry => entry.ts),
                            datasets: [
                                {
                                    label: 'Éthanol (ppm)',
                                    data: C2H5OHData.map(entry => entry.value),
                                    borderColor: 'rgba(181, 242, 191, 0.8)',
                                    fill: false

                                },
                                {
                                    label: 'Méthane (ppm)',
                                    data: CH4Data.map(entry => entry.value),
                                    borderColor: 'rgba(130, 181, 192, 0.8)',
                                    fill: false
                                },
                                {
                                    label: 'Ammoniaque (ppm)',
                                    data: NH3Data.map(entry => entry.value),
                                    borderColor: 'rgba(218, 248, 141, 0.8)',
                                    fill: false
                                }
                            ],
                        },
                        options: options
                    }
                );


            }
        }
    })

}

function drawPM_2_5() {
    $.ajax({
        type: 'GET',
        url: url_data,
        data: { "args": "7", "hourlySelected": hourlySelected},
        dataType: 'JSON',
        success: function (reponse) {
            if (reponse.status == 0) {
                var data = reponse.data;

                new Chart($("#chart-fineparticles-PM_2_5"),
                    {
                        type: 'line',
                        data: {
                            labels: data.map(entry => entry.ts),
                            datasets: [
                                {
                                    label: 'PM_2_5 (ppm)',
                                    data: data.map(entry => entry.value),
                                    borderColor: 'rgba(231, 245, 204, 0.8)',
                                    fill: false
                                }
                            ],
                        },
                        options: options
                    }
                );


            }
        }
    });
}

function drawPM_10_0() {
    $.ajax({
        type: 'GET',
        url: url_data,
        data: { "args": "8", "hourlySelected": hourlySelected},
        dataType: 'JSON',
        success: function (reponse) {
            if (reponse.status == 0) {
                var data = reponse.data;

                new Chart($("#chart-fineparticles-PM_10_0"),
                    {
                        type: 'line',
                        data: {
                            labels: data.map(entry => entry.ts),
                            datasets: [
                                {
                                    label: 'PM_10_0 (ppm)',
                                    data: data.map(entry => entry.value),
                                    borderColor: 'rgba(185, 195, 164, 0.8)',
                                    fill: false
                                }
                            ],
                        },
                        options: options
                    }
                );


            }
        }
    });
}

function drawAllFineParticlesChart() {

    $.ajax({
        type: 'GET',
        url: url_data,
        data: { "args": "7,8", "hourlySelected": hourlySelected},
        dataType: 'JSON',
        success: function (reponse) {
            if (reponse.status == 0) {
                var data = reponse.data;

                var PM_2_5Data = data.filter(row => row.shortName === 'PM_2_5').map(row => ({ ts: row.ts, value: row.value }));
                var PM_10_0Data = data.filter(row => row.shortName === 'PM_10_0').map(row => ({ ts: row.ts, value: row.value }));


                new Chart(
                    $("#chart-fineparticles-all"),
                    {
                        type: 'line',
                        data: {
                            labels: PM_2_5Data.map(entry => entry.ts),
                            datasets: [
                                {
                                    label: 'PM_2_5 (µg/m³)',
                                    data: PM_2_5Data.map(entry => entry.value),
                                    borderColor: 'rgba(231, 245, 204, 0.8)',
                                    fill: false

                                },
                                {
                                    label: 'PM_10_0 (µg/m³)',
                                    data: PM_10_0Data.map(entry => entry.value),
                                    borderColor: 'rgba(185, 195, 164, 0.8)',
                                    fill: false

                                }
                            ],
                        },
                        options: options
                    }
                );


            }
        }
    })

}

