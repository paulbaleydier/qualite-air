const url_data = "index.php?controller=Dashboard&action=getDataChartN";
const url_knob = "index.php?controller=Dashboard&action=getStatsToday";

var allChart = {};
var hourlySelected = 1;

const options = {
    maintainAspectRatio: false,
    responsive: true,
    animation: false,
    scales: {
        x: {
            type: 'time', // Utilisez l'échelle temporelle pour l'axe X
            time: {
                unit: 'minute', // Unité de temps (ajustez selon vos besoins)
                displayFormats: {
                    minute: 'DD/MM/YYYY HH:mm'
                }
            },
            position: 'bottom'
        },
        y: {
            type: 'linear',
            position: 'left'
        }
    }
};

function initializeChart(chartID, data) {
    console.log(data.datasets)
    var chartInstance = new Chart($("#" + chartID),
        {
            type: 'line',
            data: {
                labels: data.labels,
                datasets: data.datasets,
            },
            options: options
        }
    );

    allChart[chartID] = chartInstance;
}

function updateChart(chartID, data) {
    // console.log(data)

    if (allChart[chartID]) {
        console.log("UPDATE")
        allChart[chartID].data.labels = data.labels;

        allChart[chartID].data.datasets = data.datasets;


        allChart[chartID].update();
    } else {
        console.log("INIT")

        initializeChart(chartID, data);
    }

    // initializeChart(chartID, data);
}

function drawChart(chartID, args) {
    $.ajax({
        type: 'GET',
        url: url_data,
        data: { "args": args, "hourlySelected": hourlySelected },
        dataType: 'JSON',
        success: function (reponse) {
            if (reponse.status == 0) {
                var data = reponse.data;
                updateChart(chartID, data);
            }
        }
    });
}


function loadKnobStats() {

    $.ajax({
        type: 'POST',
        url: url_knob,
        dataType: 'JSON',
        success: function (reponse) {
            if (reponse.status == 0) {
                var data = reponse.data
                var html = "";
                $(".body-stats").html("");

                $.each(data, function (key, value) {
                    html += `
                    <div class="knob-container">
                        <input data-format="%" data-readOnly=true class="knob" value="${value.moyenne_pourc > 100 ? 100 : value.moyenne_pourc}" data-width="80%" data-height="80%" data-fgColor="${value.color}">
                        <div class="knob-label">${value.name} (%)</div>
                    </div>
                    `;
                })
                $(".body-stats").append(html);
                $('.knob').knob()

            }

        }
    });


}

$(document).ready(function () {
    drawChart("chart-usualgas-all", "1,2,3");
    drawChart("chart-blendorganic-all", "4,5,6");
    drawChart("chart-fineparticles-all", "7,8");
    loadKnobStats();



    $(document).on('click', '.switchChart a[href="#tab_no2"]', function () {
        drawChart("chart-usualgas-no2", "1");

    });

    $(document).on('click', '.switchChart a[href="#tab_co"]', function () {
        drawChart("chart-usualgas-co", "2");

    });

    $(document).on('click', '.switchChart a[href="#tab_h2"]', function () {
        drawChart("chart-usualgas-h2", "3");

    });

    $(document).on('click', '.switchChart a[href="#tab_all_usualgas"]', function () {
        drawChart("chart-usualgas-all", "1,2,3");

    });

    // Composé organiques
    $(document).on('click', '.switchChart a[href="#tab_C2H5OH"]', function () {
        drawChart("chart-blendorganic-C2H5OH", "4");

    });

    $(document).on('click', '.switchChart a[href="#tab_CH4"]', function () {
        drawChart("chart-blendorganic-CH4", "5");

    });

    $(document).on('click', '.switchChart a[href="#tab_NH3"]', function () {
        drawChart("chart-blendorganic-NH3", "6");

    });

    $(document).on('click', '.switchChart a[href="#tab_all_blendorganic"]', function () {
        drawChart("chart-blendorganic-all", "4,5,6");
    });

    // Particules fines

    $(document).on('click', '.switchChart a[href="#tab_PM_2_5"]', function () {
        drawChart("chart-fineparticles-PM_2_5", "7");
    });

    $(document).on('click', '.switchChart a[href="#tab_PM_10_0"]', function () {
        drawChart("chart-fineparticles-PM_10_0", "8");

    });

    $(document).on('click', '.switchChart a[href="#tab_all_fineparticles"]', function () {
        drawChart("chart-fineparticles-all", "7,8");
    });


    $(document).on('change', '#selectHourly', function () {
        var value = $(this).val();

        hourlySelected = value;


        $(".switchChart a.active").each(function () {
            var switchSelect = $(this).attr("href");
            console.log(switchSelect)
            reloadChartByHref(switchSelect);
        })
    });

    // setInterval(() => {
    //     $(".switchChart a.active").each(function () {
    //         var switchSelect = $(this).attr("href");
    //         reloadChartByHref(switchSelect);
    //         $("#updateTime").val(moment().format("D/MM/YYYY H:mm:ss"))
    //     })
    // }, (1000 * 60) * 5);
    setInterval(() => {
        $(".switchChart a.active").each(function () {
            var switchSelect = $(this).attr("href");
            reloadChartByHref(switchSelect);
            loadKnobStats();

            $("#updateTime").val(moment().format("D/MM/YYYY H:mm:ss"))
        })
    }, (1000 * 60));
});

function reloadChartByHref(hrefType) {
    switch (hrefType) {

        case "#tab_all_usualgas":
            drawChart("chart-usualgas-all", "1,2,3");
            break;
        case "#tab_no2":
            drawChart("chart-usualgas-no2", "1");
            break;
        case "#tab_co":
            drawChart("chart-usualgas-co", "2");
            break;
        case "#tab_h2":
            drawChart("chart-usualgas-h2", "3");
            break;
        case "#tab_all_blendorganic":
            drawChart("chart-blendorganic-all", "4,5,6");
            break;
        case "#tab_C2H5OH":
            drawChart("chart-blendorganic-C2H5OH", "4");
        case "#tab_CH4":
            drawChart("chart-blendorganic-CH4", "5");
            break;
        case "#tab_NH3":
            drawChart("chart-blendorganic-NH3", "6");
            break;
        case "#tab_all_fineparticles":
            drawChart("chart-fineparticles-all", "7,8");
            break;
        case "#tab_PM_2_5":
            drawChart("chart-fineparticles-PM_2_5", "7");
            break;
        case "#tab_PM_10_0":
            drawChart("chart-fineparticles-PM_10_0", "8");
            break;
        default: break;
    }
}

