//line
var ctxL = document.getElementById("lineChart1").getContext('2d');
var myLineChart = new Chart(ctxL, {
  type: 'line',
  data: {
    labels: dataHari,
    datasets: [
      {
        label: "Jumlah Pengunjung",
        lineTension: 0.3,
        backgroundColor: "rgba(78, 115, 223, 0.05)",
        borderColor: "rgba(78, 115, 223, 1)",
        pointRadius: 3,
        pointBackgroundColor: "rgba(78, 115, 223, 1)",
        pointBorderColor: "rgba(78, 115, 223, 1)",
        pointHoverRadius: 3,
        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
        pointHitRadius: 10,
        pointBorderWidth: 2,
        data: dataVisitor,
      },
      {
        label: "Jumlah Kunjungan",
        lineTension: 0.3,
        backgroundColor: "rgba(223, 115, 78, 0.05)",
        borderColor: "rgba(223, 115, 78, 1)",
        pointRadius: 3,
        pointBackgroundColor: "rgba(223, 115, 78, 1)",
        pointBorderColor: "rgba(223, 115, 78, 1)",
        pointHoverRadius: 3,
        pointHoverBackgroundColor: "rgba(223, 115, 78, 1)",
        pointHoverBorderColor: "rgba(223, 115, 78, 1)",
        pointHitRadius: 10,
        pointBorderWidth: 2,
        data: dataVisit,
      }
    ],
  },
  options: {
    responsive: true
  }
});

//line
var ctxL = document.getElementById("lineChart2").getContext('2d');
var myLineChart = new Chart(ctxL, {
  type: 'line',
  data: {
    labels: dataHariFaq,
    datasets: [
      {
        label: "Jumlah Pengunjung",
        lineTension: 0.3,
        backgroundColor: "rgba(78, 115, 223, 0.05)",
        borderColor: "rgba(78, 115, 223, 1)",
        pointRadius: 3,
        pointBackgroundColor: "rgba(78, 115, 223, 1)",
        pointBorderColor: "rgba(78, 115, 223, 1)",
        pointHoverRadius: 3,
        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
        pointHitRadius: 10,
        pointBorderWidth: 2,
        data: dataFaqVisitor,
      },
      {
        label: "Jumlah Kunjungan",
        lineTension: 0.3,
        backgroundColor: "rgba(223, 115, 78, 0.05)",
        borderColor: "rgba(223, 115, 78, 1)",
        pointRadius: 3,
        pointBackgroundColor: "rgba(223, 115, 78, 1)",
        pointBorderColor: "rgba(223, 115, 78, 1)",
        pointHoverRadius: 3,
        pointHoverBackgroundColor: "rgba(223, 115, 78, 1)",
        pointHoverBorderColor: "rgba(223, 115, 78, 1)",
        pointHitRadius: 10,
        pointBorderWidth: 2,
        data: dataFaqVisit,
      }
    ],
  },
  options: {
    responsive: true
  }
});
