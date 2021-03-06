function displayNewIndi(newIndiType,pat){
    currChart=null;
    currPatData=null;
    currIndiDisplayed=newIndiType;
    indiDisplayed=true;
    var indiProps={"macd":["bottom",["#00e673","#3a5ef2","#ef490e"],["histogram","MACD","signal"],["column","line","line"],[1,0,0]],
                  "sma":["top",["#3a5ef2"],["sma"],["line"],[0]],
                  "rsi":["bottom",["#66f0ab","#fff","#3a5ef2"],["top","bottom","rsi"],["line","line","line"],[0.5,1,0]],
                  "ao":["bottom",["#3a5ef2"],["ao"],["column"],[0.7]],
                  "so":["bottom",["#66f0ab","#fff","#3a5ef2","#ef490e"],["top","bottom","k","d"],["line","line","line","line"],[0.5,1,0,0]],
                  "adx":["bottom",["#f9c554","#3a5ef2","#ef490e","#00e673"],["reference line (25%)","adx","mdi","pdi"],["line","line","line","line"],[0.5,0,0,0]],
                  "mfi":["bottom",["#66f0ab","#fff","#00e673"],["top","bottom","mfi"],["line","line","line"],[0.5,1,0]],
                  "trix":["bottom",["#66f0ab","#3a5ef2"],["zero line","trix"],["line","line"],[0,0]],
                  "bollinger":["top",["#3a5ef2","#3a5ef2","#3a5ef2"],["lower","middle","upper"],["line","line","line"],[0,0,0]]};//third is third
    // console.log(displayedChart);
    currDispChart=JSON.parse(JSON.stringify(chartObjectOneWeek));
    currDispChart.panels[0].stockGraphs[0].type = currChartType;
    currDispChart.listeners=newListener;
    if(pat){
      currPatData=JSON.parse(JSON.stringify(consChartDataHour.Data));
      currData=currPatData;
    }
    else if(displayedChart==1){
      currData=consChartDataMin.Data;
    }
    else if(displayedChart==2){
      currData=consChartDataHour.Data;
    }
    else if(displayedChart==3){
      currData=consChartDataDay.Data;
    }
    // console.log(currData);

    if(whichZoomButton=="mm" && whatZoomCount == 60)
        var oldZoom=0;
    else if(whichZoomButton=="mm")
        var oldZoom=1;
    else if(whichZoomButton == "DD")
        var oldZoom=2;
    else if((whichZoomButton == "MM" && whatZoomCount == 1))
        var oldZoom=3;
    else if(whichZoomButton == "MM" && whatZoomCount == 3)
        var oldZoom=4;
    else if((whichZoomButton == "MM" && whatZoomCount == 12) || whichZoomButton == "YYYY")
        var oldZoom=5;
    else if(whichZoomButton == "MAX")
        var oldZoom=6;
  
    if(newIndiType=="none"){
      if(displayedChart==1){
        chartMin.periodSelector.periods[oldZoom].selected=true;
        chartMin.validateNow();
      }
      else if(displayedChart==2){
        chartHour.periodSelector.periods[oldZoom].selected=true;
        chartHour.validateNow();
      }
      else if(displayedChart==3){
        chartDay.periodSelector.periods[oldZoom].selected=true;
        chartDay.validateNow();
      }
      indiDisplayed=false;
      return;
    }
  
    function displayIndiChart(indiType, indiPos){
      if(pat)
        return;
      let variation="";
      (indiType!=newIndiType) ? variation=newIndiType.replace(/\D/g,'') : "";
      var feilds=indiProps[indiType][2];
      currDispChart.dataSets[0].dataProvider=currData;
      currDispChart.periodSelector.periods[oldZoom].selected=true;
      for(var i=0;i<feilds.length;i++){
        currDispChart.dataSets[0].fieldMappings.push({
          "fromField": feilds[i]+variation,
          "toField": feilds[i]+variation
        });
      }
  
      if(indiPos=="bottom"){
        var indiStockGraphs=[];
        for(var i=0;i<feilds.length;i++){
          indiStockGraphs.push({
            "title": feilds[i]+variation,
            "useDataSetColors":false,
            "precision": 4,
            "valueField": feilds[i]+variation,
            "type": indiProps[indiType][3][i],
            "cornerRadiusTop": 2,
            "fillAlphas": indiProps[indiType][4][i],
            "lineColor": indiProps[indiType][1][i]
          });
        }
        // currDispChart.panels[2]=currDispChart.panels[1];
        currDispChart.panels[1]={
          "title": indiType,
          "percentHeight": 30,
          "stockGraphs": indiStockGraphs,
          "stockLegend": {
          }
        };
      }
      else if(indiPos=="top"){
        var indiStockGraphs=[];
        for(var i=0;i<feilds.length;i++){
          currDispChart.panels[0].stockGraphs.push({
            "title": feilds[i]+variation,
            "useDataSetColors":false,
            "precision": 4,
            "valueField": feilds[i]+variation,
            "type": indiProps[indiType][3][i],
            "cornerRadiusTop": 2,
            "fillAlphas": indiProps[indiType][3][i] == "column" ? 1 : 0,
            "lineColor": indiProps[indiType][1][i]
          });
        }
        // currDispChart.panels[2]=currDispChart.panels[1];
        // currDispChart.panels[1]={
        //   "title": indiType,
        //   "percentHeight": 30,
        //   "stockGraphs": indiStockGraphs,
        //   "stockLegend": {
        //   }
        // };
      }
      currDispChart.listeners=newListener;
      chartWithIndi = AmCharts.makeChart("chartdiv", currDispChart);
    }
  
    function mergeData(indiType){
      var diff = currData.length - indiData.length;
      //console.log("DIFF:"+diff);
      var counter = 0;
      let variation="";
      (indiType!=newIndiType) ? variation=newIndiType.replace(/\D/g,'') : "";
      var feilds=indiProps[indiType][2];
      currData.forEach(function (d) {
        if (counter < diff) {
          for(var i=0;i<feilds.length;i++){
            d[feilds[i]+variation]=undefined;
          }
        }
        else {
          if(feilds.length==1){
            d[feilds[0]+variation]=indiData[counter-diff];
          }
          else
            for(var i=0;i<feilds.length;i++){
              d[feilds[i]+variation]=indiData[counter-diff][feilds[i]];
            }
        }
        counter++;
      });
      //console.log(currData);
    }
  
    function calcTopIndi(indiType, indiPos, indiNum){
      if(indiType=="sma"){
        indiData = SMA.calculate({period : indiNum, values : all.closes});
        mergeData(indiType);
        displayIndiChart(indiType, indiPos);
      }
      else if(indiType=="bollinger"){
        indiData = BollingerBands.calculate({period : 14, values : all.closes, stdDev : 2});
        mergeData(indiType);
        displayIndiChart(indiType, indiPos);
      }
    }
  
    function calcBottomIndi(indiType, indiPos, indiNum){
      if(indiType=="macd"){
          let macdInput = {
            values: all.closes,
            fastPeriod:12,
            slowPeriod:26,
            signalPeriod:9,
            SimpleMAOscillator: false,
            SimpleMASignal: false
          }
          indiData = MACD.calculate(macdInput);
          mergeData(indiType);
          displayIndiChart(indiType, indiPos);
        
      }
      else if(indiType=="rsi"){
        indiData=[];
        var tempindiData = RSI.calculate({period : 14, values : all.closes});
        let diff = currData.length - indiData.length;
        let tempBlanks=[];
        for(let i=0;i<diff;i++){
          tempBlanks.push(undefined);
        }
        tempindiData=tempBlanks.concat(tempindiData);
        tempindiData.forEach(function (d){
          indiData.push({
            top:70,
            rsi:d,
            bottom:30
          });
        });
        mergeData(indiType);
        displayIndiChart(indiType, indiPos);
      }
      else if(indiType=="ao"){
        let input = {
          high : all.highs,
          low  : all.lows,
          fastPeriod : 5,
          slowPeriod : 34,
          format : (a)=>parseFloat(a.toFixed(2))
        }
        indiData=AwesomeOscillator.calculate(input);
        mergeData(indiType);
        displayIndiChart(indiType, indiPos);
      }
      else if(indiType=="so"){
        indiData=[];
        var tempindiData = Stochastic.calculate({
          high: all.highs,
          low: all.lows,
          close: all.closes,
          period: 14,
          signalPeriod: 3
        });
        let diff = currData.length - indiData.length;
        let tempBlanks=[];
        for(let i=0;i<diff;i++){
          tempBlanks.push({d:undefined,k:undefined});
        }
        tempindiData=tempBlanks.concat(tempindiData);
        tempindiData.forEach(function (d){
          indiData.push({
            top:80,
            d:d.d,
            k:d.k,
            bottom:20
          });
        });
        mergeData(indiType);
        displayIndiChart(indiType, indiPos);
      }
      else if(indiType=="adx"){
        indiData=[];
        var tempindiData = ADX.calculate({
          high: all.highs,
          low: all.lows,
          close: all.closes,
          period: 14
        });
        let diff = currData.length - indiData.length;
        let tempBlanks=[];
        for(let i=0;i<diff;i++){
          tempBlanks.push({adx:undefined,mdi:undefined,pdi:undefined});
        }
        tempindiData=tempBlanks.concat(tempindiData);
        tempindiData.forEach(function (d){
          indiData.push({
            "reference line (25%)":25,
            adx:d.adx,
            mdi:d.mdi,
            pdi:d.pdi
          });
        });
        mergeData(indiType);
        displayIndiChart(indiType, indiPos);
      }
      else if(indiType=="mfi"){
        indiData=[];
        var tempindiData = MFI.calculate({
          high : all.highs,
          low : all.lows,
          close : all.closes,
          volume : all.volumes,
          period : 14
        });
        let diff = currData.length - indiData.length;
        let tempBlanks=[];
        for(let i=0;i<diff;i++){
          tempBlanks.push(undefined);
        }
        tempindiData=tempBlanks.concat(tempindiData);
        tempindiData.forEach(function (d){
          indiData.push({
            top:80,
            mfi:d,
            bottom:20
          });
        });
        mergeData(indiType);
        displayIndiChart(indiType, indiPos);
      }
      else if(indiType=="trix"){
        indiData=[];
        var tempindiData = TRIX.calculate({period : 18, values : all.closes});
        let diff = currData.length - indiData.length;
        let tempBlanks=[];
        for(let i=0;i<diff;i++){
          tempBlanks.push(undefined);
        }
        tempindiData=tempBlanks.concat(tempindiData);
        tempindiData.forEach(function (d){
          indiData.push({
            "zero line":0,
            trix:d,
          });
        });
        mergeData(indiType);
        displayIndiChart(indiType, indiPos);
      }
    }
  
    function calcThreeChartIndi(indiType, indiPos, indiNum){
      var IndiColors={};//none yet
    }
  
    function calcIndi(indiType){
      all={
        opens:[],
        closes:[],
        highs:[],
        lows:[],
        volumes:[]
      };
      let len=currData.length;
      if(pat)
        var limit = 204;
      else
        var limit = (oldZoom==0) ? 96 : (oldZoom==1) ? 1440 : (oldZoom==2) ? 204 : (oldZoom==3) ? 744 : (oldZoom==4) ? 129 : (oldZoom==5) ? 402 : (len-1);
      //console.log(oldZoom);
      //console.log(limit);
      let counter=0;
      currData.forEach(function (d) {
        counter++;
        if(counter>len-limit){
          all.opens.push(parseFloat(d.open));
          all.closes.push(parseFloat(d.close));
          all.highs.push(parseFloat(d.high));
          all.lows.push(parseFloat(d.low));
          all.volumes.push(parseFloat(d.volumeto));
        }
      });
      //console.log(all);
      var pureIndiType=indiType.replace(/[0-9]/g, '');
      var indiNum = indiType.replace( /^\D+/g, '');
      var indiPosition=indiProps[pureIndiType][0];
      if(indiPosition == "top"){
        calcTopIndi(pureIndiType,"top",indiNum);
      }
      else if(indiPosition == "bottom"){
        calcBottomIndi(pureIndiType,"bottom",indiNum);
      }
      else if(indiPosition === "third"){
        calcThreeChartIndi(pureIndiType,"third",indiNum);
      }
    }
    console.log("new Indicator Displaying !!!");
    calcIndi(newIndiType);
  }
  
  function changeIndiType(newIndiType){
    if(firstTimeIndi){//TODO Load only when called for page performance
      // var indiFiles1 = document.createElement("script");
      // indiFiles1.src = "https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/6.23.0/polyfill.min.js";
      // document.body.appendChild(indiFiles1);
      // var indiFiles2 = document.createElement("script");
      // indiFiles2.src = "https://unpkg.com/technicalindicators@1.1.11/dist/browser.js";
      // document.body.appendChild(indiFiles2);
      firstTimeIndi=false;
      displayNewIndi(newIndiType);
    }
    else{
      displayNewIndi(newIndiType);
    }
  }