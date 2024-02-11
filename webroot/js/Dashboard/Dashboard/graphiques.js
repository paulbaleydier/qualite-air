$(function () {


    drawUsualGasChart();
    drawBlendOrganicChart();
    drawFineParticlesChart();

});



function drawUsualGasChart() {

    $.ajax({
        type: 'GET',
        url: 'index.php?controller=Dashboard&action=getUsualGas',
        dataType: 'JSON',
        success: function (reponse) {
            if (reponse.status == 0) {
                var data = reponse.data;

                var no2Data = data.filter(row => row.shortName === 'NO2').map(row => ({ ts: row.ts, value: row.value }));
                var coData = data.filter(row => row.shortName === 'CO').map(row => ({ ts: row.ts, value: row.value }));
                var h2Data = data.filter(row => row.shortName === 'H2').map(row => ({ ts: row.ts, value: row.value }));

                
                new Chart(
                    $("#chart-usualgas"),
                    {
                        type: 'bar',
                        data: {
                            labels: no2Data.map(entry => entry.ts),
                            datasets: [
                                {
                                    label: 'Dioxyde d\'azote (ppm)',
                                    data: no2Data.map(entry => entry.value),
                                    backgroundColor: 'rgba(255, 0, 0, 0.5)'
                                },
                                {
                                    label: 'Monoxyde de carbone (ppm)',
                                    data: coData.map(entry => entry.value),
                                    backgroundColor: 'rgba(0, 255, 0, 0.5)'
                                },
                                {
                                    label: 'Hydrogène (ppm)',
                                    data: h2Data.map(entry => entry.value),
                                    backgroundColor: 'rgba(0, 0, 255, 0.5)'
                                }
                            ],
                        },
                        options: {
                            maintainAspectRatio: false,
                            responsive: true
                        }
                    }
                );


            }
        }
    })

}

function drawBlendOrganicChart() {

    $.ajax({
        type: 'GET',
        url: 'index.php?controller=Dashboard&action=getBlendOrganic',
        dataType: 'JSON',
        success: function (reponse) {
            if (reponse.status == 0) {
                var data = reponse.data;

                var C2H5OHData = data.filter(row => row.shortName === 'C2H5OH').map(row => ({ ts: row.ts, value: row.value }));
                var CH4Data = data.filter(row => row.shortName === 'CH4').map(row => ({ ts: row.ts, value: row.value }));
                var NH3Data = data.filter(row => row.shortName === 'NH3').map(row => ({ ts: row.ts, value: row.value }));

                
                new Chart(
                    $("#chart-blendorganic"),
                    {
                        type: 'bar',
                        data: {
                            labels: C2H5OHData.map(entry => entry.ts),
                            datasets: [
                                {
                                    label: 'Éthanol (ppm)',
                                    data: C2H5OHData.map(entry => entry.value),
                                    backgroundColor: 'rgba(255, 0, 0, 0.5)' 
                                },
                                {
                                    label: 'Méthane (ppm)',
                                    data: CH4Data.map(entry => entry.value),
                                    backgroundColor: 'rgba(0, 255, 0, 0.5)' 
                                },
                                {
                                    label: 'Ammoniaque (ppm)',
                                    data: NH3Data.map(entry => entry.value),
                                    backgroundColor: 'rgba(0, 0, 255, 0.5)' 
                                }
                            ],
                        },
                        options: {
                            maintainAspectRatio: false,
                            responsive: true
                        }
                    }
                );


            }
        }
    })

}

function drawFineParticlesChart() {

    $.ajax({
        type: 'GET',
        url: 'index.php?controller=Dashboard&action=getFineParticles',
        dataType: 'JSON',
        success: function (reponse) {
            if (reponse.status == 0) {
                var data = reponse.data;

                var PM_2_5Data = data.filter(row => row.shortName === 'PM_2_5').map(row => ({ ts: row.ts, value: row.value }));
                var PM_10_0Data = data.filter(row => row.shortName === 'PM_10_0').map(row => ({ ts: row.ts, value: row.value }));

                
                new Chart(
                    $("#chart-fineparticles"),
                    {
                        type: 'bar',
                        data: {
                            labels: PM_2_5Data.map(entry => entry.ts),
                            datasets: [
                                {
                                    label: 'PM_2_5 (µg/m³)',
                                    data: PM_2_5Data.map(entry => entry.value),
                                    backgroundColor: 'rgba(255, 0, 0, 0.5)' 
                                },
                                {
                                    label: 'PM_10_0 (µg/m³)',
                                    data: PM_10_0Data.map(entry => entry.value),
                                    backgroundColor: 'rgba(0, 255, 0, 0.5)' 
                                }
                            ],
                        },
                        options: {
                            maintainAspectRatio: false,
                            responsive: true
                        }
                    }
                );


            }
        }
    })

}

