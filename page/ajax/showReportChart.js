var xVal = []
var yVal = []
var maxCount = 0
date = $('#date').val();

function showModal(phoneNumber){
  $.ajax({
    type:'GET',
    url:'query/detailReport.php',
    data: {
      phoneNumber: phoneNumber
    },
    success: function(data) {
      $('#modalBody').children().remove();
      jsonData = JSON.parse(data).PhoneObj
      jsonData.forEach((element,index) => {
        $('#modalBody').append(`
          <tr class="text-center">
            <th scope="row" class="text-end">${++index}</th>
            <td>${element.source}</td>
            <td>${element.timestamp}</td>
          </tr>
        `)
      });
      $('#Modal_Desc').modal('show');
    }
  });
}

async function showChart(date) {
    await $.ajax({
        type: 'GET',
        url: 'query/setPhoneNumberBlockToChart.php',
        data: {
            selectedDate: date,
        },
        success: function(data) {
            new_data = JSON.parse(data).countBlockNumber;
            data_arr = data
            try {
                new_data.forEach((element, index) => {
                    $('#tablebody').append(`
                      <tr class="text-center" onclick="javascript:showModal('${element.source}');">
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
            } catch {
                $("#chart canvas").remove()
            }

            maxCount = maxCount + (10 - (maxCount % 10))
        }
    })
    
    var canvasElement = document.getElementById("reportChart");
    var configure = {
        type: "bar",
        data: {
            labels: xVal,
            datasets: [{
                label: 'เบอร์โทรศัพท์',
                backgroundColor: "#8899BB",
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

$(document).ready(function() {
    showChart(date);

    $('#date').change(function() {
        date = $('#date').val()
        window.location.href = `form_report_page.php?date=${date}`;
    });
});