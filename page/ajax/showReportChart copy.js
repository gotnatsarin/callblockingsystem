var xVal = []
var yVal = []


async function showChart() {
    await $.ajax({
        type: 'GET',
        url: 'query/setPhoneNumberBlockToChart.php',
        data: {

        },
        success: function(data) {
            new_data = JSON.parse(data).countBlockNumber
            console.log(new_data.c)
            new_data.forEach(element => {
                xVal.push(element.phoneNumber)
                yVal.push(element.c)
            });

            console.log(xVal)
            console.log(yVal)
        }
    })

    var canvasElement = document.getElementById("reportChart");
    console.log(xVal);
    var configure = {
        type: "bar",
        data: {
            labels: xVal,
            datasets: [{
                label: 'Phone number',
                backgroundColor: "#b91d47",
                data: yVal
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };

    var reportChart = new Chart(canvasElement, configure);
}
showChart();