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
var colors=["(60,180,75","(255,225,25","(0,130,200","(245,130,48","(145,30,180","(70,240,240","(230,25,75","(240,50,230","(210,245,60","(250,190,190","(0,128,128","(230,190,255","(170,110,40","(255,250,200","(128,0,0","(170,255,195","(128,128,0","(255,215,180","(0,0,128","(128,128,128","(255,255,255","(0,0,0"];
var loadedOnce=[];
// var pieChartObjPrsn=null;
// var pieChartObjPrtc=null;

function drawPie(myPortfolioInvstChart, whichInit) {
  //console.log("whichInit"+whichInit);
  var canvasHolder = document.getElementsByClassName("chart-responsive"+whichInit)[0];
  // console.log(canvasHolder);
  var canvas = document.getElementById(String(whichInit+"pieChart"));
  //console.log(canvas);
  canvasHolder.removeChild(canvas);
  canvasHolder.innerHTML = "<canvas id='"+whichInit+"pieChart' height='150'></canvas>";
  // console.log(canvasHolder);
  var bulletString='<ul class="chart-legend clearfix">';
  var pieChartCanvas = $(String('#'+whichInit+'pieChart')).get(0).getContext('2d');
  //console.log(pieChartCanvas);
  var bulletDiv="piePortfolio"+whichInit;
  //console.log("Pie Drawn !!!!!!!!!!!!!!!!!!!!!!!");
  var pieChart = new Chart(pieChartCanvas);
  var PieData = [];
  var counter=0;
  for(var crypto in myPortfolioInvstChart){
    var tempObj={};
    tempObj.value=0;
    // console.log(whichInit);
    //console.log(crypto);
    tempObj.value=tempObj.value+parseFloat(myPortfolioInvstChart[crypto]).toFixed(2);
    //var color=dynamicColors();
    console.log(counter%22);
    console.log(colors[counter%22]);
    var color=colors[counter%22];
    tempObj.color="rgb"+color+")";
    tempObj.highlight="rgba"+color+",0.7)";
    //console.log(tempObj.color);
    //console.log(tempObj.highlight);
    tempObj.label=crypto;
    bulletString=bulletString+'<li><i class="fa fa-circle" style="color:'+tempObj.color+'"></i> '+ crypto +'</li>';
    PieData.push(tempObj);
    counter++;
  }
  bulletString=bulletString+'</ul>';
  document.getElementById(bulletDiv).innerHTML=bulletString;
  // console.log(PieData);
  // console.log("loadedOnce?");
  // console.log(loadedOnce);
  if(loadedOnce.indexOf(String(whichInit))==-1)
    animateRotate=true;
  else
    animateRotate=false;
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
    animateRotate        : animateRotate,
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
  //console.log($(String('#'+whichInit+'pieChart')).is(':visible'));
  pieChart.Pie(PieData, pieOptions);
  // if(whichInit==1)
  //   pieChartObjPrsn=pieChart;
  // else
  //   pieChartObjPrtc=pieChart;

  // if(loadedOnce.indexOf(String(whichInit))==-1){
  //   if(($(String('#'+whichInit+'pieChart')).is(':visible'))){
  //     console.log("not visible");
  //     // if(whichInit==1){
  //     //   loadedOnce.push(String(whichInit));
  //     // }
  //   } 
  //   // else if(whichInit==1){
  //   //   loadedOnce.push(String(whichInit));
  //   // }
  //   else{
  //     loadedOnce.push(whichInit);
  //   }
  //   animateRotate=true;
  // }
  // else
  //   animateRotate=false;
  if(loadedOnce.indexOf(String(whichInit))==-1){
    if(($(String('#'+whichInit+'pieChart')).is(':visible'))){
      console.log(whichInit+"visible");
      loadedOnce.push(String(whichInit));
      console.log(loadedOnce);
    }
  }
  // -----------------
  // - END PIE CHART -
  // -----------------
}