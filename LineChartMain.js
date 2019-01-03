//<style>
 // #chartdiv {
 //   width: 100%;
 //   height: 100%;
 // }
//</style>

//<!-- Resources -->
//<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
//<script src="https://www.amcharts.com/lib/3/serial.js"></script>
//<script src="amstock.js"></script>
//<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
//<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
//<script src="light.js"></script>

//<!-- Chart code -->
//<script>
predicted=false;
charts={none:null,chartMin:null,chartHour:null,chartDay:null};
chrtDat={none:null,consChartDataHour:null,consChartDataMin:null,consChartDataDay:null};
chartNames=["none","Min","Hour","Day"];
// chartHour=null;
// chartMin=null;
// chartDay=null;
// chrtDat.consChartDataHour=null;
// chrtDat.consChartDataMin=null;
// chrtDat.consChartDataDay=null;
firstTimeZoom=true;
firstTimeIndi=true;
indiDisplayed=false;
currChartType="smoothedLine";
// chartArr=[undefined,chartMin,chartHour,chartDay];

var displayedChart=0; //0=None;1=Min;2=Hour;3=Day

function drawMainChart(){
  // console.log("Chart Drawing Started");
  var urlHour = "https://min-api.cryptocompare.com/data/histohour?fsym="+globalCryptoValue+"&tsym="+globalFiatValue+"&limit=744&e=CCCAGG";
  var urlMinute = "https://min-api.cryptocompare.com/data/histominute?fsym="+globalCryptoValue+"&tsym="+globalFiatValue+"&limit=1440&e=CCCAGG";
  var urlDay = "https://min-api.cryptocompare.com/data/histoday?fsym="+globalCryptoValue+"&tsym="+globalFiatValue+"&allData=true&e=CCCAGG";

  firstTimeZoom=true;

  function handleRender(event){
    console.log("rendered");
    var adjustChartdivHeight=(document.getElementsByClassName("amcharts-stock-div")[0].offsetHeight)-(document.getElementById("chartdiv").offsetHeight);
    adjustChartdivHeight=adjustChartdivHeight+10;
    document.getElementById("chartdiv").style.marginBottom=adjustChartdivHeight+"px";
    // console.log("adjuts:" + adjustChartdivHeight);
    event.chart.periodSelector.addListener("changed", handleZoom);
    document.getElementById("chartLoadOverlay").style.display = "none";
    if(!predicted){
			predicted=true;
      let file= document.createElement("script")
      file.src = "patterns.js";
      document.body.appendChild(file);
      file.onload = () => {
        
        calcPatterns();
        // setTimeout(calcPatterns(), 3000);
      };
    }
  }

  renderListener = [{"event":"rendered","method":handleRender}];
  var periodSelectorListener = [{"event":"changed","method":handleZoom}];
  chartObjectOneWeek = {
    "type": "stock",
    "pathToImages": "https://www.amcharts.com/lib/3/images/",
    // "listeners": [{
    //    "event": "changed",
    //    "method": function() {
    //        console.log("changed in Listener");
    //        handleZoom();
    //      }
    //     }],
        "theme": "light",
        "categoryAxesSettings": {
          "minPeriod": "mm",
          "maxSeries": 250,
          "groupToPeriods": [ "mm", "10mm", "30mm", "hh", "3hh", "DD", "3DD", "WW", "MM", "YYYY"]
          //default: "groupToPeriods": ["ss", "10ss", "30ss", "mm", "10mm", "30mm", "hh", "DD", "WW", "MM", "YYYY"]
        },
        "dataSets": [ {
          "color": "#00e673",
          "fieldMappings": [ {
            "fromField": "close",
            "toField": "close"
          }, {
            "fromField": "open",
            "toField": "open"
          }, {
            "fromField": "high",
            "toField": "high"
          }, {
            "fromField": "low",
            "toField": "low"
          }, {
            "fromField": "volumeto",
            "toField": "volume"
          }, {
            "fromField": "close",
            "toField": "value"
          }/*, {
            "fromField": "MACD",
            "toField": "MACD"
          }, {
            "fromField": "signal",
            "toField": "signal"
          }, {
            "fromField": "histogram",
            "toField": "histogram"
          } */],
          //"dataProvider": chrtDat.consChartDataHour.Data,
          "categoryField": "time"
        }],
        "balloon": {},
        "panels": [ {
          "showCategoryAxis": true,
          "categoryBalloonEnabled": false,
          "recalculateToPercents": "never",
          "title": "Price",
          "percentHeight": 60,
          
          "stockGraphs": [ {
            "id": "g1",
            "title": globalCryptoValue,
            "precision": 2,
            "openField": "open",
            "closeField": "close",
            "highField": "high",
            "lowField": "low",
            "valueField": "close",
            "lineColor": "#7f8da9",
            "fillColors": "#7f8da9",
            "negativeLineColor": "#db4c3c",
            "negativeFillColors": "#db4c3c",
            "type": "smoothedLine",
            "compareable": true,
            "lineThickness": 2,
            "balloonText": "open: [[open]]\nclose: [[close]]\nhigh: [[high]]\nlow: [[low]]",
            "fillAlphas": 0.6
          }/*,{
            "id": "g5",
            "title": globalCryptoValue,
            "precision": 2,
            "openField": "high",
            "closeField": "low",
            "highField": "high",
            "lowField": "low",
            "valueField": "close",
            "lineColor": "#7f8da9",
            "fillColors": "#7f8da9",
            "negativeLineColor": "#db4c3c",
            "negativeFillColors": "#db4c3c",
            "type": "smoothedLine",
            "compareable": true,
            "lineThickness": 2,
            "balloonText": "open: [[open]]\nclose: [[close]]\nhigh: [[high]]\nclose: [[close]]",
            "fillAlphas": 0.6
          } */],
          
          
          "stockLegend": {
            "valueTextRegular": ": [[value]]"
            //"periodValueTextRegular": //+"[[value.close]]", //TODO: include or not Bitcoin Latest
            //"valueText":"[[value.close]]",
            //"labelText":"Kashyap"
            //"markerType": "none"
          }
        }, {
          "title": "Volume",
          "percentHeight": 30,
          "stockGraphs": [ {
            "precision": 2,
            "valueField": "volume",
            "type": "column",
            "cornerRadiusTop": 2,
            "fillAlphas": 1
          } ],
          
          "stockLegend": {
            "valueTextRegular": "Volume: [[value]]"
            //"markerType": "none"
          }
        } ],
        
        "chartScrollbarSettings": {
          "graph": "g1",
          "graphType": "line",
          "usePeriod": "10mm",
          "position": "bottom",
          "height" : 20
        },
        
        "chartCursorSettings": {
          "valueBalloonsEnabled": true,
          "fullWidth": true,
          "cursorColor": "#ff0000",
          "cursorAlpha": 0.1,
          "valueLineBalloonEnabled": true,
          "valueLineEnabled": true,
          "valueLineAlpha": 0.5
        },
        
        "periodSelector": {
          "position": "top",
          "dateFormat": "YYYY-MM-DD JJ:NN",
          //"periodContainer":{},
          "hideOutOfScopePeriods":false,
          "inputFieldsEnabled": true,
          "inputFieldWidth": 100,
          "periods": [ {
            "period": "mm", //histomin limit 60
            "count": 60,
            "minPeriod": "mm",
            "label": "1H"
          }, {
            "period": "mm",//histomin limit 1440 //autogroup
            "minPeriod": "mm",
            "count": 1440,
            "label": "1D"
          },{
            "period": "DD",//histohour limit 168
            "count": 7,
            //"selected": true, // !IMP: set from code
            "label": "1W"
          }, {
            "period": "MM",//histohour limit 744 
            "count": 1,
            "label": "1M"
          }, {
            "period": "MM",//histoday limit 93
            "count": 3,
            "label": "3M"
          },{
            "period": "YYYY",//histoday limit 365
            "count": 1,
            "label": "1Y"
          }, {
            "period": "MAX",//histoday all
            "label": "MAX"
          } ]//,
          //"listeners":[{"event":"changed","method":handleZoom(event)}]
        },
        
        "panelsSettings": {
          "usePrefixes": false,
          "creditsPosition":"bottom-left",
          "panEventsEnabled": false
        },
        
        //"export": {  
        //   "enabled": true,
         //  "position": "bottom-right"
        //  }
        };
        
        var chartLoaded=false;
        
        var xhttpHour = typeof XMLHttpRequest != 'undefined' ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        xhttpHour.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            console.log("Chart Drawing Start in");
            chrtDat.consChartDataHour = JSON.parse(this.responseText);
            for(var i=0;i<chrtDat.consChartDataHour.Data.length;i++) {
              chrtDat.consChartDataHour.Data[i].time=chrtDat.consChartDataHour.Data[i].time*1000;
              // chrtDat.consChartDataHour.Data[i].time=new Date(chrtDat.consChartDataHour.Data[i].timest);
            }
            var newChart = JSON.parse(JSON.stringify(chartObjectOneWeek));
            newChart.dataSets[0].dataProvider=chrtDat.consChartDataHour.Data;
            newChart.periodSelector.periods[2].selected=true;
            newChart.listeners=renderListener;
            whichZoomButton="DD";
            whatZoomCount=7;
            firstTimeZoom=true;
            //newChart.periodSelector.listeners=periodSelectorListener;
            charts.chartHour = AmCharts.makeChart("chartdiv", newChart);
            //charts.chartHour.periodSelector.periodContainer.innerHTML="Zoom: <input type='button' value='1H' class='amChartsButton amcharts-period-input' style='background: transparent; border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 5px; box-sizing: border-box; color: rgb(0, 0, 0); margin: 1px; opacity: 0.7; outline: none;'><input type='button' value='1D' class='amChartsButton amcharts-period-input' style='background: transparent; border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 5px; box-sizing: border-box; color: rgb(0, 0, 0); margin: 1px; opacity: 0.7; outline: none;'><input type='button' value='1W' class='amChartsButtonSelected amcharts-period-input-selected' style='background: rgb(0, 230, 115); border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 5px; box-sizing: border-box; color: rgb(0, 0, 0); margin: 1px; opacity: 1; outline: none;'><input type='button' value='1M' class='amChartsButton amcharts-period-input' style='background: transparent; border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 5px; box-sizing: border-box; color: rgb(0, 0, 0); margin: 1px; opacity: 0.7; outline: none;'><input type='button' value='3M' class='amChartsButton amcharts-period-input' style='background: transparent; border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 5px; box-sizing: border-box; color: rgb(0, 0, 0); margin: 1px; opacity: 0.7; outline: none;'><input type='button' value='1Y' class='amChartsButton amcharts-period-input' style='background: transparent; border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 5px; box-sizing: border-box; color: rgb(0, 0, 0); margin: 1px; opacity: 0.7; outline: none;'><input type='button' value='MAX' class='amChartsButton amcharts-period-input' style='background: transparent; border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 5px; box-sizing: border-box; color: rgb(0, 0, 0); margin: 1px; opacity: 0.7; outline: none;'>";
            //charts.chartHour.periodSelector.periodContainer.outerHTML="<div style='float: right; display: inline;'>Zoom: <input type='button' value='1H' class='amChartsButton amcharts-period-input' style='background: transparent; border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 5px; box-sizing: border-box; color: rgb(0, 0, 0); margin: 1px; opacity: 0.7; outline: none;'><input type='button' value='1D' class='amChartsButton amcharts-period-input' style='background: transparent; border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 5px; box-sizing: border-box; color: rgb(0, 0, 0); margin: 1px; opacity: 0.7; outline: none;'><input type='button' value='1W' class='amChartsButtonSelected amcharts-period-input-selected' style='background: rgb(0, 230, 115); border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 5px; box-sizing: border-box; color: rgb(0, 0, 0); margin: 1px; opacity: 1; outline: none;'><input type='button' value='1M' class='amChartsButton amcharts-period-input' style='background: transparent; border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 5px; box-sizing: border-box; color: rgb(0, 0, 0); margin: 1px; opacity: 0.7; outline: none;'><input type='button' value='3M' class='amChartsButton amcharts-period-input' style='background: transparent; border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 5px; box-sizing: border-box; color: rgb(0, 0, 0); margin: 1px; opacity: 0.7; outline: none;'><input type='button' value='1Y' class='amChartsButton amcharts-period-input' style='background: transparent; border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 5px; box-sizing: border-box; color: rgb(0, 0, 0); margin: 1px; opacity: 0.7; outline: none;'><input type='button' value='MAX' class='amChartsButton amcharts-period-input' style='background: transparent; border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 5px; box-sizing: border-box; color: rgb(0, 0, 0); margin: 1px; opacity: 0.7; outline: none;'></div>";
            //charts.chartHour.write("chartdiv");
            //charts.chartHour.validateNow(false,false);
            displayedChart = 2;
            // console.log(charts.chartHour);
            //setTimeout(function(){charts.chartHour.periodSelector.addListener("changed", handleZoom);console.log("charts.chartHour Listener Added");},2000);
            // charts.chartHour.periodSelector.addListener("changed", handleZoom);
            
            //var adjustChartdivHeight=24;//(document.getElementsByClassName("amcharts-stock-div")[0].offsetHeight)-(document.getElementById("chartdiv").offsetHeight)
            //document.getElementById("chartdiv").style.marginBottom=adjustChartdivHeight+"px";
            // console.log("Chart Drawing Ended");
          }
        };
        xhttpHour.open("GET", urlHour, true);
        xhttpHour.send();
        // console.log("0");
        
        function handleZoom(event) {
          if(firstTimeZoom){
            firstTimeZoom=false;
            return;
          }
          document.getElementById("chartLoadOverlay").style.display = "block";
          console.log("1");
          var minsDiff = (event.endDate.getTime() - event.startDate.getTime()) / 60000;
          minsDiff=Math.floor(minsDiff);
          console.log("minsDiff: "+minsDiff); 
          whichZoomButton = event.predefinedPeriod;
          whatZoomCount = event.count;
          console.log(whichZoomButton + whatZoomCount);
          //1H=mm60 min;1D=mm1440 min;1W=DD7 hour;1M=MM1 hour;3M=MM3 day;1Y=YYYY1 day;MAX=MAXundefined day
          
          ///////////////////////////////////////// MIN ////////////////////////////// 
          if (whichZoomButton == "mm"){ //min 4320 | 180
            console.log("min zoom label:"+whichZoomButton);
            if(charts.chartMin == null || chrtDat.consChartDataMin == null){
              console.log("chrtDat.consChartDataMin=null in if - "+chrtDat.consChartDataMin);
              var xhttpNewMin = new XMLHttpRequest(); // TODO: Support for old IE browsers
              xhttpNewMin.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  chrtDat.consChartDataMin = JSON.parse(this.responseText);
                  for(var i=0;i<chrtDat.consChartDataMin.Data.length;i++) {
                    chrtDat.consChartDataMin.Data[i].time=chrtDat.consChartDataMin.Data[i].time*1000;
                    // chrtDat.consChartDataMin.Data[i].time=new Date(chrtDat.consChartDataMin.Data[i].timest);
                  }
                  console.log("set new");
                  var newChart = JSON.parse(JSON.stringify(chartObjectOneWeek));
                  newChart.dataSets[0].dataProvider=chrtDat.consChartDataMin.Data;
                  newChart.panels[0].stockGraphs[0].type=currChartType;
                  if(whatZoomCount == 60){
                    newChart.periodSelector.periods[0].selected=true;
                    newChart.periodSelector.periods[1].selected=false;
                  }
                  else{
                    newChart.periodSelector.periods[1].selected=true;
                    newChart.periodSelector.periods[0].selected=false;
                  }
                  newChart.listeners=renderListener;
                  console.log("Making new chart");
                  firstTimeZoom=true;
                  //charts.chartMin = AmCharts.makeChart("chartdiv", newChart);
                  displayedChart = 1;
                  //charts.chartMin.periodSelector.addListener("changed", handleZoom);
                  console.log("listener added charts.chartMin");
                  if(indiDisplayed){
                    charts.chartMin = AmCharts.makeChart("chartdiv", newChart);
                    firstTimeZoom=true;
                    displayNewIndi(currIndiDisplayed,lastIndiSelNum,false);
                  }
                  else
                    charts.chartMin = AmCharts.makeChart("chartdiv", newChart);
                  document.getElementById("chartLoadOverlay").style.display = "none";
                }
              };
              xhttpNewMin.open("GET", urlMinute, true);
              xhttpNewMin.send();
            }
            else{
              // change the chart object to display
              console.log("else charts.chartMin");
              if(displayedChart!=1){
                displayedChart = 1;
                console.log("write charts.chartMin");
                charts.chartMin.periodSelector.removeListener(charts.chartMin.periodSelector,"changed",handleZoom);
                if(whatZoomCount == 60){
                  charts.chartMin.periodSelector.periods[0].selected=true;
                  charts.chartMin.periodSelector.periods[1].selected=false;
                }
                else{
                  charts.chartMin.periodSelector.periods[1].selected=true;
                  charts.chartMin.periodSelector.periods[0].selected=false;
                }
                if(indiDisplayed){
                  firstTimeZoom=true;
                  displayNewIndi(currIndiDisplayed,lastIndiSelNum,false);
                }
                else{
                  charts.chartMin.write("chartdiv");
                  charts.chartMin.periodSelector.addListener("changed",handleZoom);
                  changeChartType(currChartType);
                }
              }
              else{
                if(indiDisplayed){
                  firstTimeZoom=true;
                  displayNewIndi(currIndiDisplayed,lastIndiSelNum,false);
                }
              }
              document.getElementById("chartLoadOverlay").style.display = "none";
            }
          }
          ///////////////////////////////////////// HOUR ////////////////////////////// 
          else if ( whichZoomButton == "DD" || (whichZoomButton == "MM" && whatZoomCount == 1)){ //hour 46 days (for one month) 14 weeks (for one week)
            console.log("hour zoom label:"+whichZoomButton);
            if(charts.chartHour == null || chrtDat.consChartDataHour == null){
              console.log("chrtDat.consChartDataHour=null in if - "+chrtDat.consChartDataHour);
              var xhttpNewHour = new XMLHttpRequest(); // TODO: Support for old IE browsers
              xhttpNewHour.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  chrtDat.consChartDataHour = JSON.parse(this.responseText);
                  for(var i=0;i<chrtDat.consChartDataHour.Data.length;i++) {
                    chrtDat.consChartDataHour.Data[i].time=chrtDat.consChartDataHour.Data[i].time*1000;
                    // chrtDat.consChartDataHour.Data[i].time=new Date(chrtDat.consChartDataHour.Data[i].timest);
                  }
                  console.log("set new");
                  var newChart = JSON.parse(JSON.stringify(chartObjectOneWeek));
                  newChart.dataSets[0].dataProvider=chrtDat.consChartDataHour.Data;
                  newChart.panels[0].stockGraphs[0].type=currChartType;
                  if(whichZoomButton == "DD"){
                    newChart.periodSelector.periods[2].selected=true;
                    newChart.periodSelector.periods[3].selected=false;
                  }
                  else if(whichZoomButton == "MM"){
                    newChart.periodSelector.periods[3].selected=true;
                    newChart.periodSelector.periods[2].selected=false;
                  }
                  newChart.listeners=renderListener;
                  firstTimeZoom=true;
                  //charts.chartHour = AmCharts.makeChart("chartdiv", newChart);
                  displayedChart = 2;
                  //charts.chartHour.periodSelector.addListener("changed", handleZoom);
                  console.log("listener added charts.chartHour");
                  if(indiDisplayed){
                    charts.chartHour = AmCharts.makeChart("chartdiv", newChart);
                    firstTimeZoom=true;
                    displayNewIndi(currIndiDisplayed,lastIndiSelNum,false);
                  }
                  else
                    charts.chartHour = AmCharts.makeChart("chartdiv", newChart);
                  document.getElementById("chartLoadOverlay").style.display = "none";
                }
              };
              xhttpNewHour.open("GET", urlHour, true);
              xhttpNewHour.send();
            }
            else{ 
              // change the chart object to display
              console.log("else charts.chartHour");
              if(displayedChart!=2){
                displayedChart = 2;
                console.log("write charts.chartHour");
                charts.chartHour.periodSelector.removeListener(charts.chartHour.periodSelector,"changed",handleZoom);
                if(whichZoomButton == "DD"){
                  charts.chartHour.periodSelector.periods[2].selected=true;
                  charts.chartHour.periodSelector.periods[3].selected=false;
                }
                else if(whichZoomButton == "MM"){
                  charts.chartHour.periodSelector.periods[3].selected=true;
                  charts.chartHour.periodSelector.periods[2].selected=false;
                }
                if(indiDisplayed){
                  console.log("Indi displaying");
                  firstTimeZoom=true;
                  displayNewIndi(currIndiDisplayed,lastIndiSelNum,false);
                }
                else{
                  // charts.chartHour.panels[0].stockGraphs[0].type=currChartType;
                  charts.chartHour.write("chartdiv");
                  charts.chartHour.periodSelector.addListener("changed",handleZoom);
                  changeChartType(currChartType);
                }
              }
              else{
                if(indiDisplayed){
                  firstTimeZoom=true;
                  displayNewIndi(currIndiDisplayed,lastIndiSelNum,false);
                }
              }
              document.getElementById("chartLoadOverlay").style.display = "none";
            }
          }
          /////////////////////////////////////// DAY ////////////////////////////
          else if ((whichZoomButton == "MM" && (whatZoomCount == 3 || whatZoomCount == 12)) || whichZoomButton == "YYYY" || whichZoomButton == "MAX"){ //hour 46 days (for one month) 14 weeks (for one week)
            console.log("Day zoom label:"+whichZoomButton);
            if(charts.chartDay == null || chrtDat.consChartDataDay == null){
              console.log("chrtDat.consChartDataDay=null in if - "+chrtDat.consChartDataDay);
              var xhttpNewDay = new XMLHttpRequest(); // TODO: Support for old IE browsers
              xhttpNewDay.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  chrtDat.consChartDataDay = JSON.parse(this.responseText);
                  for(var i=0;i<chrtDat.consChartDataDay.Data.length;i++) {
                    chrtDat.consChartDataDay.Data[i].time=chrtDat.consChartDataDay.Data[i].time*1000;
                    // chrtDat.consChartDataDay.Data[i].time=new Date(chrtDat.consChartDataDay.Data[i].timest);
                  }
                  console.log("set new");
                  var newChart = JSON.parse(JSON.stringify(chartObjectOneWeek));
                  newChart.dataSets[0].dataProvider=chrtDat.consChartDataDay.Data;
                  newChart.panels[0].stockGraphs[0].type=currChartType;
                  if(whichZoomButton == "MM" && whatZoomCount == 3){
                    newChart.periodSelector.periods[4].selected=true;
                    newChart.periodSelector.periods[5].selected=false;
                    newChart.periodSelector.periods[6].selected=false;
                  }
                  else if((whichZoomButton == "MM" && whatZoomCount == 12) || whichZoomButton == "YYYY"){
                    newChart.periodSelector.periods[5].selected=true;
                    newChart.periodSelector.periods[4].selected=false;
                    newChart.periodSelector.periods[6].selected=false;
                  }
                  else if(whichZoomButton == "MAX"){
                    newChart.periodSelector.periods[6].selected=true;
                    newChart.periodSelector.periods[4].selected=false;
                    newChart.periodSelector.periods[5].selected=false;
                  }
                  newChart.listeners=renderListener;
                  firstTimeZoom=true;
                  // charts.chartDay = AmCharts.makeChart("chartdiv", newChart);
                  displayedChart = 3;
                  //charts.chartDay.periodSelector.addListener("changed", handleZoom);
                  console.log("listener added charts.chartDay");
                  if(indiDisplayed){
                    charts.chartDay = AmCharts.makeChart("chartdiv", newChart);
                    firstTimeZoom=true;
                    displayNewIndi(currIndiDisplayed,lastIndiSelNum,false);
                  }
                  else
                    charts.chartDay = AmCharts.makeChart("chartdiv", newChart);
                  document.getElementById("chartLoadOverlay").style.display = "none";
                }
              };
              xhttpNewDay.open("GET", urlDay, true);
              xhttpNewDay.send();
            }
            else{ 
              // change the chart object to display
              console.log("else charts.chartDay");
              if(displayedChart!=3){
                displayedChart = 3;
                console.log("write charts.chartDay");
                charts.chartDay.periodSelector.removeListener(charts.chartDay.periodSelector,"changed",handleZoom);
                if(whichZoomButton == "MM" && whatZoomCount == 3){
                  charts.chartDay.periodSelector.periods[4].selected=true;
                  charts.chartDay.periodSelector.periods[5].selected=false;
                  charts.chartDay.periodSelector.periods[6].selected=false;
                }
                else if((whichZoomButton == "MM" && whatZoomCount == 12) || whichZoomButton == "YYYY"){
                  charts.chartDay.periodSelector.periods[5].selected=true;
                  charts.chartDay.periodSelector.periods[4].selected=false;
                  charts.chartDay.periodSelector.periods[6].selected=false;
                }
                else if(whichZoomButton == "MAX"){
                  charts.chartDay.periodSelector.periods[6].selected=true;
                  charts.chartDay.periodSelector.periods[4].selected=false;
                  charts.chartDay.periodSelector.periods[5].selected=false;
                }
                if(indiDisplayed){
                  firstTimeZoom=true;
                  displayNewIndi(currIndiDisplayed,lastIndiSelNum,false);
                }
                else{
                  // charts.chartDay.panels[0].stockGraphs[0].type=currChartType;
                  charts.chartDay.write("chartdiv");
                  charts.chartDay.periodSelector.addListener("changed",handleZoom);
                  changeChartType(currChartType);
                }
              }
              else{
                if(indiDisplayed){
                  firstTimeZoom=true;
                  displayNewIndi(currIndiDisplayed,lastIndiSelNum,false);
                }
              }
              document.getElementById("chartLoadOverlay").style.display = "none";
            }
          }
          ////////////////////////////////////End Of All Zoom Levels//////////////////////////////
          //document.getElementById("chartLoadOverlay").style.display = "none";
          console.log("exit handleZoom");
        }
        console.log("IN THE END");
      }
      function changeChartType(newChartType){
        console.log(currChartType);
        console.log(newChartType);
        document.getElementById("chartLoadOverlay").style.display = "block";
        if((currChartType=="smoothedLine" || currChartType=="candlestick" || currChartType=="ohlc" || currChartType=="renko")&&(newChartType=="renko" || newChartType=="heikinashi")){
          console.log("setting");
          if(newChartType=="heikinashi"){
            console.log("calculating"+newChartType);
            displayNewIndi(newChartType,1,true);
            let currChart="chart"+chartNames[displayedChart];
            charts[currChart].dataSets[0].fieldMappings[0].fromField="HA close";
            charts[currChart].dataSets[0].fieldMappings[1].fromField="HA open";
            charts[currChart].dataSets[0].fieldMappings[2].fromField="HA high";
            charts[currChart].dataSets[0].fieldMappings[3].fromField="HA low";
            charts[currChart].panels[0].stockGraphs[0].type = "candlestick";
            charts[currChart].validateNow(true,true);
          }
          else if(newChartType=="renko"){
            displayNewIndi(newChartType,1,true);
            // var newChart = JSON.parse(JSON.stringify(chartObjectOneWeek));
            let currChart="chart"+chartNames[displayedChart];
            charts[currChart].dataSets[0].dataProvider=chrtDat["consChartData"+chartNames[displayedChart]].Data;
            charts[currChart].panels[0].stockGraphs[0].type = "candlestick";
            charts[currChart].periodSelector.periods[oldZoom].selected=true; // set from indi code
            charts[currChart].listeners=renderListener;
            charts[currChart].dataSets[0].fieldMappings[0].fromField="Renko close";
            charts[currChart].dataSets[0].fieldMappings[1].fromField="Renko open";
            charts[currChart].dataSets[0].fieldMappings[2].fromField="Renko high";
            charts[currChart].dataSets[0].fieldMappings[3].fromField="Renko low";
            charts[currChart].dataSets[0].fieldMappings[4].fromField="Renko volume";
            charts[currChart].dataSets[0].categoryField="rtime";
            charts[currChart].validateNow(true,true); 
            // charts["chart"+chartNames[displayedChart]] = AmCharts.makeChart("chartdiv", newChart);
            // charts["chart"+chartNames[displayedChart]].panels[0].stockGraphs[0].type = "candlestick";
            // charts["chart"+chartNames[displayedChart]].validateNow(true,true);
          }
        }
        // else if((currChartType=="renko" || currChartType=="heikinashi")&&(newChartType=="smoothedLine" || newChartType=="candlestick" || newChartType=="ohlc")){
        //   charts["chart"+chartNames[displayedChart]].dataSets[0].fieldMappings[0].fromField="close";
        //   charts["chart"+chartNames[displayedChart]].dataSets[0].fieldMappings[1].fromField="open";
        //   charts["chart"+chartNames[displayedChart]].dataSets[0].fieldMappings[2].fromField="high";
        //   charts["chart"+chartNames[displayedChart]].dataSets[0].fieldMappings[3].fromField="low";
        //   charts["chart"+chartNames[displayedChart]].panels[0].stockGraphs[0].type = "line";
        //   charts["chart"+chartNames[displayedChart]].validateNow(true,true);
        // }
        else{
          charts["chart"+chartNames[displayedChart]].dataSets[0].fieldMappings[0].fromField="close";
          charts["chart"+chartNames[displayedChart]].dataSets[0].fieldMappings[1].fromField="open";
          charts["chart"+chartNames[displayedChart]].dataSets[0].fieldMappings[2].fromField="high";
          charts["chart"+chartNames[displayedChart]].dataSets[0].fieldMappings[3].fromField="low";
          charts["chart"+chartNames[displayedChart]].panels[0].stockGraphs[0].type = newChartType;
          charts["chart"+chartNames[displayedChart]].validateNow(true,true);
        }
        console.log("chart type changed");
        currChartType=newChartType;
        document.getElementById("chartIndiSelect1").selectedIndex = 0; 
        document.getElementById("chartIndiSelect2").selectedIndex = 0;
        // charts["chart"+chartNames[displayedChart]].panels[0].stockGraphs[0].type = newChartType;
        // charts["chart"+chartNames[displayedChart]].validateNow();
        // if(displayedChart == 1){
        //   charts.chartMin.panels[0].stockGraphs[0].type = newChartType;
        //   charts.chartMin.validateNow(true,true);
        // }
        // else if(displayedChart == 2){
        //   charts.chartHour.panels[0].stockGraphs[0].type = newChartType;
        //   charts.chartHour.validateNow(true,true);
        // }
        // else if(displayedChart == 3){
        //   charts.chartDay.panels[0].stockGraphs[0].type = newChartType;
        //   charts.chartDay.validateNow(true,true);
        // }
      }
//////////////////////////////INDICATOR CODE START////////////////////////////////////////
