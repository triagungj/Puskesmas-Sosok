// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("statusBayarChart");
var statisticName = document.getElementById("statusBayarStatisticName").querySelectorAll("li");
var statistic = document.getElementById("statusBayarStatistic").querySelectorAll("li");
var listName = []; 
var listValue = []; 

for(var i = 0; i < statisticName.length; i++){
  listName[i] = statisticName[i].innerHTML; 
  listValue[i] = statistic[i].innerHTML; 
}

var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: listName,
    datasets: [{
      data: listValue,
      backgroundColor: ['#4e73df', '#1cc88a'],
      hoverBackgroundColor: ['#2e59d9', '#17a673'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
