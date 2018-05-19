  // -------------
  // - PIE CHART -
  // -------------
  // Get context with jQuery - using jQuery's .get() method.
  var dynamicColors = function() {
            var r = Math.ceil(Math.random() * 255);
            var g = Math.ceil(Math.random() * 255+25);
            var b = Math.ceil(Math.random() * 255);
            return "(" + r + "," + g + "," + b;
         };

function drawPie(myPortfolioInvstChart, whichInit) {
  console.log("whichInit"+whichInit);
  var canvasHolder = document.getElementsByClassName("chart-responsive"+whichInit)[0];
  console.log(canvasHolder);
  var canvas = document.getElementById(String(whichInit+"pieChart"));
  console.log(canvas);
  canvasHolder.removeChild(canvas);
  canvasHolder.innerHTML = "<canvas id='"+whichInit+"pieChart' height='150'></canvas>";
  console.log(canvasHolder);
  var bulletString='<ul class="chart-legend clearfix">';
  var pieChartCanvas = $(String('#'+whichInit+'pieChart')).get(0).getContext('2d');
  console.log(pieChartCanvas);
  var bulletDiv="piePortfolio"+whichInit;
  //console.log("Pie Drawn !!!!!!!!!!!!!!!!!!!!!!!");
  var pieChart = new Chart(pieChartCanvas);
  var PieData = [];

  for(var crypto in myPortfolioInvstChart){
    var tempObj={};
    tempObj.value=0;
    //console.log(myPortfolioInvstChart);
    //console.log(crypto);
    tempObj.value=tempObj.value+parseFloat(myPortfolioInvstChart[crypto]);
    var color=dynamicColors();
    tempObj.color="rgb"+color+")";
    tempObj.highlight="rgba"+color+",0.7)";
    //console.log(tempObj.color);
    //console.log(tempObj.highlight);
    tempObj.label=crypto;
    bulletString=bulletString+'<li><i class="fa fa-circle" style="color:'+tempObj.color+'"></i> '+ crypto +'</li>';
    PieData.push(tempObj);
  }
  bulletString=bulletString+'</ul>';
  document.getElementById(bulletDiv).innerHTML=bulletString;
  console.log(PieData);

  // var PieData        = [
  //   {
  //     value    : 700,
  //     color    : dynamicColors(),
  //     highlight: dynamicColors(),
  //     label    : 'Chrome'
  //   },
  //   {
  //     value    : 500,
  //     color    : '#00a65a',
  //     highlight: '#00a65a',
  //     label    : 'IE'
  //   },
  //   {
  //     value    : 400,
  //     color    : '#f39c12',
  //     highlight: '#f39c12',
  //     label    : 'FireFox'
  //   },
  //   {
  //     value    : 600,
  //     color    : '#00c0ef',
  //     highlight: '#00c0ef',
  //     label    : 'Safari'
  //   },
  //   {
  //     value    : 300,
  //     color    : '#3c8dbc',
  //     highlight: '#3c8dbc',
  //     label    : 'Opera'
  //   },
  //   {
  //     value    : 100,
  //     color    : '#d2d6de',
  //     highlight: '#d2d6de',
  //     label    : 'Navigator'
  //   }
  // ];
  var pieOptions     = {
    // Boolean - Whether we should show a stroke on each segment
    segmentShowStroke    : true,
    // String - The colour of each segment stroke
    segmentStrokeColor   : '#fff',
    // Number - The width of each segment stroke
    segmentStrokeWidth   : -1,
    // Number - The percentage of the chart that we cut out of the middle
    percentageInnerCutout: 35, // This is 0 for Pie charts
    // Number - Amount of animation steps
    animationSteps       : 100,
    // String - Animation easing effect
    animationEasing      : 'easeOutQuart',
    // Boolean - Whether we animate the rotation of the Doughnut
    animateRotate        : true,
    // Boolean - Whether we animate scaling the Doughnut from the centre
    animateScale         : false,
    // Boolean - whether to make the chart responsive to window resizing
    responsive           : false,
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio  : false,
    // String - A legend template
    legendTemplate       : '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<segments.length; i++){%><li><span style=\'background-color:<%=segments[i].fillColor%>\'></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
    // String - A tooltip template
    tooltipTemplate      : '<%=value %> in <%=label%>'
  };
  // Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  pieChart.Doughnut(PieData, pieOptions);
  // -----------------
  // - END PIE CHART -
  // -----------------
}