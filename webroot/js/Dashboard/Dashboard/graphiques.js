$(function () {


$.ajax({
    type: 'GET',
    url: 'index.php?controller=Dashboard&action=test',
    dataType: 'JSON',
    success: function (reponse) {
        if (reponse.status == 0) {
            updateStats(reponse.data)
        }
    }
})




});


function updateStats(data) {
    new Chart(
        $("#chart-test"),
        {
            type: 'bar',
            data: {
                labels: data.map(row => row.timestamp),
                datasets: [
                    {
                        label: 'OC',
                        data: data.map(row => row.value)
                    },
                    {
                        label: 'Previ OC',
                        data: data.map(row => (row.value - 1))
                    }
                ],
            
            },
            
        }
    ); 
    new Chart(
        $("#lineChart"),
        {
            type: 'line',
            data: {
                labels: data.map(row => row.timestamp),
                datasets: [
                    {
                        label: 'OC',
                        data: data.map(row => row.value)
                    },
                    {
                        label: 'Previ OC',
                        data: data.map(row => (row.value - 1))
                    }
                ],
            
            }
        }
    ); 
}