
  var urlHour = "https://min-api.cryptocompare.com/data/histohour?fsym=BTC&tsym=INR&limit=744&e=CCCAGG";
  var urlMinute = "https://min-api.cryptocompare.com/data/histominute?fsym=BTC&tsym=INR&limit=1440&e=CCCAGG";
  var urlDay = "https://min-api.cryptocompare.com/data/histoday?fsym=BTC&tsym=INR&allData=true&e=CCCAGG";
  
  var chrtDat.consChartDataHour;
  var chrtDat.consChartDataMin;
  var chrtDat.consChartDataDay;
  
  var chartHour;
  var chartMin;
  var chartDay;
  
  var displayedChart=0; //0=None;1=Min;2=Hour;3=Day
  
  var chartObjectOneWeek = {
    "type": "stock",
    //"listeners": [{
      //  "event": "rendered",
      //  "method": function() {
        //    console.log("rendered");
        //  }
        //}],
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
            "toField": "value"
          }, {
            "fromField": "volumeto",
            "toField": "volume"
          } ],
          //"dataProvider": chrtDat.consChartDataHour.Data,
          "categoryField": "time"
        }],
        "balloon": {},
        "panels": [ {
          "showCategoryAxis": true,
          "categoryBalloonEnabled": false,
          "recalculateToPercents": "never",
          "title": "Value",
          "percentHeight": 70,
          
          "stockGraphs": [ {
            "id": "g1",
            //"title": "Bitcoin",
            "precision": 2,
            "valueField": "value",
            "type": "smoothedLine",
            "compareable": true,
            "lineThickness": 2,
            "balloonText": "close: [[value]]",
            "fillAlphas": 0.6
          } ],
          
          
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
          "usePeriod": "10mm",
          "position": "bottom"
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
          "inputFieldWidth": 150,
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
            //"selected": true, //TODO: set from code
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
          } ]
        },
        
        "panelsSettings": {
          "usePrefixes": false,
          "creditsPosition":"bottom-left"
        },
        
        // "export": {  
        //    "enabled": true,
        //    "position": "bottom-right"
        //   }
        };
        
        var chartLoaded=false;
        
        var xhttpHour = typeof XMLHttpRequest != 'undefined' ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        xhttpHour.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            
            chrtDat.consChartDataHour = JSON.parse(this.responseText);
            for(var i=0;i<chrtDat.consChartDataHour.Data.length;i++) {
              chrtDat.consChartDataHour.Data[i].time=chrtDat.consChartDataHour.Data[i].time*1000;
              chrtDat.consChartDataHour.Data[i].time=new Date(chrtDat.consChartDataHour.Data[i].time);
            }
            var newChart = JSON.parse(JSON.stringify(chartObjectOneWeek));
            newChart.dataSets[0].dataProvider=chrtDat.consChartDataHour.Data;
            newChart.periodSelector.periods[2].selected=true;
            //delete newChart.periodSelector;
            console.log(newChart);
            chartHour = AmCharts.makeChart("chartdiv", newChart);
            //chartHour.periodSelector.periodContainer.innerHTML="Zoom: <input type='button' value='1H' class='amChartsButton amcharts-period-input' style='background: transparent; border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 5px; box-sizing: border-box; color: rgb(0, 0, 0); margin: 1px; opacity: 0.7; outline: none;'><input type='button' value='1D' class='amChartsButton amcharts-period-input' style='background: transparent; border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 5px; box-sizing: border-box; color: rgb(0, 0, 0); margin: 1px; opacity: 0.7; outline: none;'><input type='button' value='1W' class='amChartsButtonSelected amcharts-period-input-selected' style='background: rgb(0, 230, 115); border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 5px; box-sizing: border-box; color: rgb(0, 0, 0); margin: 1px; opacity: 1; outline: none;'><input type='button' value='1M' class='amChartsButton amcharts-period-input' style='background: transparent; border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 5px; box-sizing: border-box; color: rgb(0, 0, 0); margin: 1px; opacity: 0.7; outline: none;'><input type='button' value='3M' class='amChartsButton amcharts-period-input' style='background: transparent; border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 5px; box-sizing: border-box; color: rgb(0, 0, 0); margin: 1px; opacity: 0.7; outline: none;'><input type='button' value='1Y' class='amChartsButton amcharts-period-input' style='background: transparent; border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 5px; box-sizing: border-box; color: rgb(0, 0, 0); margin: 1px; opacity: 0.7; outline: none;'><input type='button' value='MAX' class='amChartsButton amcharts-period-input' style='background: transparent; border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 5px; box-sizing: border-box; color: rgb(0, 0, 0); margin: 1px; opacity: 0.7; outline: none;'>";
            //chartHour.periodSelector.periodContainer.outerHTML="<div style='float: right; display: inline;'>Zoom: <input type='button' value='1H' class='amChartsButton amcharts-period-input' style='background: transparent; border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 5px; box-sizing: border-box; color: rgb(0, 0, 0); margin: 1px; opacity: 0.7; outline: none;'><input type='button' value='1D' class='amChartsButton amcharts-period-input' style='background: transparent; border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 5px; box-sizing: border-box; color: rgb(0, 0, 0); margin: 1px; opacity: 0.7; outline: none;'><input type='button' value='1W' class='amChartsButtonSelected amcharts-period-input-selected' style='background: rgb(0, 230, 115); border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 5px; box-sizing: border-box; color: rgb(0, 0, 0); margin: 1px; opacity: 1; outline: none;'><input type='button' value='1M' class='amChartsButton amcharts-period-input' style='background: transparent; border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 5px; box-sizing: border-box; color: rgb(0, 0, 0); margin: 1px; opacity: 0.7; outline: none;'><input type='button' value='3M' class='amChartsButton amcharts-period-input' style='background: transparent; border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 5px; box-sizing: border-box; color: rgb(0, 0, 0); margin: 1px; opacity: 0.7; outline: none;'><input type='button' value='1Y' class='amChartsButton amcharts-period-input' style='background: transparent; border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 5px; box-sizing: border-box; color: rgb(0, 0, 0); margin: 1px; opacity: 0.7; outline: none;'><input type='button' value='MAX' class='amChartsButton amcharts-period-input' style='background: transparent; border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 5px; box-sizing: border-box; color: rgb(0, 0, 0); margin: 1px; opacity: 0.7; outline: none;'></div>";
            //chartHour.write("chartdiv");
            console.log(chartHour);
            //chartHour.validateNow(false,false);
            displayedChart = 2;
            chartHour.periodSelector.addListener("changed", handleZoom);
            console.log("chartHour Listener Added");
          }
        };
        xhttpHour.open("GET", urlHour, true);
        xhttpHour.send();
        console.log("0");
        
        function handleZoom(event) {
          console.log("1");
          // check the first date and diff in mins
          var now = new Date().getTime();
          var minsDiff = (event.endDate.getTime() - event.startDate.getTime()) / 60000;
          minsDiff=Math.floor(minsDiff);
          console.log("minsDiff: "+minsDiff); 
          var whichZoomButton = event.predefinedPeriod;
          var whatZoomCount = event.count;
          console.log(whichZoomButton + whatZoomCount);
          //1H=mm60 min;1D=mm1440 min;1W=DD7 hour;1M=MM1 hour;3M=MM3 day;1Y=YYYY1 day;MAX=MAXundefined day
          
          ///////////////////////////////////////// MIN ////////////////////////////// 
          if (whichZoomButton == "mm"){ //min 4320 | 180
            console.log("min zoom label:"+whichZoomButton);
            if(chartMin == null || chrtDat.consChartDataMin == null){
              console.log("chrtDat.consChartDataMin=null in if - "+chrtDat.consChartDataMin);
              var xhttpNewMin = new XMLHttpRequest(); // TODO: Support for old IE browsers
              xhttpNewMin.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  chrtDat.consChartDataMin = JSON.parse(this.responseText);
                  for(var i=0;i<chrtDat.consChartDataMin.Data.length;i++) {
                    chrtDat.consChartDataMin.Data[i].time=chrtDat.consChartDataMin.Data[i].time*1000;
                    chrtDat.consChartDataMin.Data[i].time=new Date(chrtDat.consChartDataMin.Data[i].time);
                  }
                  console.log("set new");
                  var newChart = JSON.parse(JSON.stringify(chartObjectOneWeek));
                  newChart.dataSets[0].dataProvider=chrtDat.consChartDataMin.Data;
                  if(whatZoomCount == 60){
                    newChart.periodSelector.periods[0].selected=true;
                    newChart.periodSelector.periods[1].selected=false;
                  }
                  else{
                    newChart.periodSelector.periods[1].selected=true;
                    newChart.periodSelector.periods[0].selected=false;
                  }
                  chartMin = AmCharts.makeChart("chartdiv", newChart);
                  displayedChart = 1;
                  chartMin.periodSelector.addListener("changed", handleZoom);
                  console.log("listener added chartMin");
                }
              };
              xhttpNewMin.open("GET", urlMinute, true);
              xhttpNewMin.send();
            }
            else{ 
              // change the chart object to display
              console.log("else chartMin");
              if(displayedChart!=1){
                displayedChart = 1;
                console.log("write chartMin");
                chartMin.periodSelector.removeListener(chartMin.periodSelector,"changed",handleZoom);
                if(whatZoomCount == 60){
                  chartMin.periodSelector.periods[0].selected=true;
                  chartMin.periodSelector.periods[1].selected=false;
                }
                else{
                  chartMin.periodSelector.periods[1].selected=true;
                  chartMin.periodSelector.periods[0].selected=false;
                }
                chartMin.write("chartdiv");
                chartMin.periodSelector.addListener("changed",handleZoom);
              }
            }
          }
          ///////////////////////////////////////// HOUR ////////////////////////////// 
          else if ( whichZoomButton == "DD" || (whichZoomButton == "MM" && whatZoomCount == 1)){ //hour 46 days (for one month) 14 weeks (for one week)
            console.log("hour zoom label:"+whichZoomButton);
            if(chartHour == null || chrtDat.consChartDataHour == null){
              console.log("chrtDat.consChartDataHour=null in if - "+chrtDat.consChartDataHour);
              var xhttpNewHour = new XMLHttpRequest(); // TODO: Support for old IE browsers
              xhttpNewHour.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  chrtDat.consChartDataHour = JSON.parse(this.responseText);
                  for(var i=0;i<chrtDat.consChartDataHour.Data.length;i++) {
                    chrtDat.consChartDataHour.Data[i].time=chrtDat.consChartDataHour.Data[i].time*1000;
                    chrtDat.consChartDataHour.Data[i].time=new Date(chrtDat.consChartDataHour.Data[i].time);
                  }
                  console.log("set new");
                  var newChart = JSON.parse(JSON.stringify(chartObjectOneWeek));
                  newChart.dataSets[0].dataProvider=chrtDat.consChartDataHour.Data;
                  if(whichZoomButton == "DD"){
                    newChart.periodSelector.periods[2].selected=true;
                    newChart.periodSelector.periods[3].selected=false;
                  }
                  else if(whichZoomButton == "MM"){
                    newChart.periodSelector.periods[3].selected=true;
                    newChart.periodSelector.periods[2].selected=false;
                  }
                  chartHour = AmCharts.makeChart("chartdiv", newChart);
                  displayedChart = 2;
                  chartHour.periodSelector.addListener("changed", handleZoom);
                  console.log("listener added chartHour");
                }
              };
              xhttpNewHour.open("GET", urlHour, true);
              xhttpNewHour.send();
            }
            else{ 
              // change the chart object to display
              console.log("else chartHour");
              if(displayedChart!=2){
                displayedChart = 2;
                console.log("write chartHour");
                chartHour.periodSelector.removeListener(chartHour.periodSelector,"changed",handleZoom);
                if(whichZoomButton == "DD"){
                  chartHour.periodSelector.periods[2].selected=true;
                  chartHour.periodSelector.periods[3].selected=false;
                }
                else if(whichZoomButton == "MM"){
                  chartHour.periodSelector.periods[3].selected=true;
                  chartHour.periodSelector.periods[2].selected=false;
                }
                chartHour.write("chartdiv");
                chartHour.periodSelector.addListener("changed",handleZoom);
              }
            }
          }
          /////////////////////////////////////// DAY ////////////////////////////
          else if ((whichZoomButton == "MM" && (whatZoomCount == 3 || whatZoomCount == 12)) || whichZoomButton == "YYYY" || whichZoomButton == "MAX"){ //hour 46 days (for one month) 14 weeks (for one week)
            console.log("Day zoom label:"+whichZoomButton);
            if(chartDay == null || chrtDat.consChartDataDay == null){
              console.log("chrtDat.consChartDataDay=null in if - "+chrtDat.consChartDataDay);
              var xhttpNewDay = new XMLHttpRequest(); // TODO: Support for old IE browsers
              xhttpNewDay.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  chrtDat.consChartDataDay = JSON.parse(this.responseText);
                  for(var i=0;i<chrtDat.consChartDataDay.Data.length;i++) {
                    chrtDat.consChartDataDay.Data[i].time=chrtDat.consChartDataDay.Data[i].time*1000;
                    chrtDat.consChartDataDay.Data[i].time=new Date(chrtDat.consChartDataDay.Data[i].time);
                  }
                  console.log("set new");
                  var newChart = JSON.parse(JSON.stringify(chartObjectOneWeek));
                  newChart.dataSets[0].dataProvider=chrtDat.consChartDataDay.Data;
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
                  chartDay = AmCharts.makeChart("chartdiv", newChart);
                  displayedChart = 3;
                  chartDay.periodSelector.addListener("changed", handleZoom);
                  console.log("listener added chartDay");
                }
              };
              xhttpNewDay.open("GET", urlDay, true);
              xhttpNewDay.send();
            }
            else{ 
              // change the chart object to display
              console.log("else chartDay");
              if(displayedChart!=3){
                displayedChart = 3;
                console.log("write chartDay");
                chartDay.periodSelector.removeListener(chartDay.periodSelector,"changed",handleZoom);
                if(whichZoomButton == "MM" && whatZoomCount == 3){
                  chartDay.periodSelector.periods[4].selected=true;
                  chartDay.periodSelector.periods[5].selected=false;
                  chartDay.periodSelector.periods[6].selected=false;
                }
                else if((whichZoomButton == "MM" && whatZoomCount == 12) || whichZoomButton == "YYYY"){
                  chartDay.periodSelector.periods[5].selected=true;
                  chartDay.periodSelector.periods[4].selected=false;
                  chartDay.periodSelector.periods[6].selected=false;
                }
                else if(whichZoomButton == "MAX"){
                  chartDay.periodSelector.periods[6].selected=true;
                  chartDay.periodSelector.periods[4].selected=false;
                  chartDay.periodSelector.periods[5].selected=false;
                }
                chartDay.write("chartdiv");
                chartDay.periodSelector.addListener("changed",handleZoom);
                console.log("listener added chartDAY");
              }
            }
          }
          ////////////////////////////////////End Of All Zoom Levels//////////////////////////////
          console.log("exit handleZoom");
        }
      