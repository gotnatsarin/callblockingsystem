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
            new_data = JSON.parse(data).countBlockNumber;
            new_data.forEach((element, index) => {
                $('#tablebody').append(`
                <tr class="text-center">
                    <th scope="row" class="text-end">${++index}</th>
                    <td>${element.source}</td>
                    <td>${element.c}</td>
                    <td>${element.timestamp}</td>
                  </tr>
                `);
                xVal.push(element.source)
                yVal.push(parseInt(element.c))

                if (element.c <= maxCount) {

                } else {
                    maxCount = parseInt(element.c)
                }
            });
            maxCount = maxCount + (10 - (maxCount % 10))
                // console.log(xVal)
                // console.log(yVal)
                // console.log(maxCount)
        }
    })

    var canvasElement = document.getElementById("reportChart");
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