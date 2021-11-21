var xVal = []
var yVal = []
var maxCount = 0


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
                yVal.push(parseInt(element.c))
                if (element.c <= maxCount) {

                } else {
                    maxCount = parseInt(element.c)
                }
            });
            maxCount = maxCount + (10 - (maxCount % 10))
            console.log(xVal)
            console.log(yVal)
            console.log(maxCount)
        }
    })

    var canvasElement = document.getElementById("reportChart");
    console.log(xVal);
    var configure = {
        type: "bar",
        data: {
            labels: xVal,
            datasets: [{
                label: 'เบอร์โทรศัพท์',
                backgroundColor: "#b91d47",
                data: yVal
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: "จำนวนระงับการใช้งาน / เดือน"
                    },
                    display: true,
                    ticks: {
                        beginAtZero: true,
                        max: maxCount,
                        stepSize: 1
                    }
                }]
            }
        },
    };

    var reportChart = new Chart(canvasElement, configure);
}
showChart();