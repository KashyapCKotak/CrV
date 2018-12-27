function displayNewIndi(indicatorType,selectNum,pat){
  console.log("selectNum: "+selectNum);
  let bottomRefCol="#ffffff";
  let topAlpha=0.5;
  let bottomAlpha=1;
  if(typeof window.currTheme !== 'undefined')
    if(window.currTheme=="lightsOff"){
    bottomRefCol="#66f0ab";
    topAlpha=0;
    bottomAlpha=0;
  }
  // console.log("bottomAlpha:"+bottomAlpha);
  // console.log("bottom Color:"+bottomRefCol);
  currChart=null;
  currPatData=null;
  var indiProps={"macd":["bottom",["#00e673","#3a5ef2","#ef490e"],["histogram","MACD","signal"],["column","line","line"],[1,0,0]],
                "sma":["top",["#3a5ef2"],["SMA"],["line"],[0]],
                "ema":["top",["#2c9ef4"],["EMA"],["line"],[0]],
                "wma":["top",["#8f2af4"],["WMA"],["line"],[0]],
                "rsi":["bottom",["#66f0ab",bottomRefCol,"#3a5ef2"],["rsi top","rsi bottom","rsi"],["line","line","line"],["rsi bottom",0,0]],
                "ao":["bottom",["#3a5ef2"],["ao"],["column"],[0.7]],
                "so":["bottom",["#66f0ab",bottomRefCol,"#3a5ef2","#ef490e"],["so top","so bottom","k","d"],["line","line","line","line"],["so bottom",0,0,0]],
                "adx":["bottom",["#f9c554","#3a5ef2","#ef490e","#00e673"],["reference line (25%)","adx","mdi","pdi"],["line","line","line","line"],[0.5,0,0,0]],
                "mfi":["bottom",["#66f0ab",bottomRefCol,"#00e673"],["mfi top","mfi bottom","mfi"],["line","line","line"],["mfi bottom",0,0]],
                "wr":["bottom",["#66f0ab",bottomRefCol,"#3a5ef2"],["wr top","wr bottom","w%r"],["line","line","line"],["wr bottom",0,0]],//if want to use topAlpha & bottomAlpha , switch the position of top & bottom alpha in last element of array
                "trix":["bottom",["#66f0ab","#3a5ef2"],["zero line","trix"],["line","line"],[0,0]],
                "bollinger":["top",["#3a5ef2","#3a5ef2","#3a5ef2"],["upper","middle","lower"],["line","line","line"],["lower",0,0]],
                "ichi":["top",["#3a5ef2","#ef490e","#00cc66","#ef490e","#00cc00"],["Conversion","Base","SpanA","SpanB","Lagging Span"],["line","line","line","line","line"],[0,0,"SpanB","SpanA",0]],
                "adl":["top",["#3a5ef2"],["adl"],["line"],[0]],
                "atr":["bottom",["#f2a93c"],["ATR"],["line"],[0]],
                "cci":["bottom",["#66f0ab","#66f0ab","#f2a93c"],["cci top","cci bottom","CCI"],["line","line","line"],["cci bottom",0,0]],
                "FI":["bottom",["#66f0ab","#f78c40"],["zero line","FI"],["line","line"],[0,0]],
                "kst":["bottom",["#3a5ef2","#ef490e"],["KST","KST Signal"],["line","line"],[0,0]],
                "obv":["bottom",["#3a5ef2"],["OBV"],["line"],[0]],
                "psar":["top",["#3a5ef2"],["PSAR"],["xy"],[0]],
                "TP":["top",["#3a5ef2"],["TP"],["line"],[0]],
                "VWAP":["top",["#3a5ef2"],["VWAP"],["line"],[0]],
                "roc":["bottom",["#3a5ef2"],["ROC"],["line"],[0]],
                "heikinashi":["top",["#NA","#NA","#NA","#NA"],["HA open","HA high","HA low","HA close"],["NA","NA","NA"],[0,0,0]],
                "renko":["top",["#NA","#NA","#NA","#NA","#NA","#NA"],["Renko open","Renko high","Renko low","Renko close","Renko volume","Renko time"],["NA","NA","NA"],[0,0,0]]};//third is third
  // console.log(displayedChart);
  currDispChart=JSON.parse(JSON.stringify(chartObjectOneWeek));
  currDispChart.panels[0].stockGraphs[0].type = currChartType;
  currDispChart.listeners=renderListener;
  if(pat){
    /**
     * Wrote the below code for some reason...
     * currPatData=JSON.parse(JSON.stringify(consChartDataHour.Data));
     * currData=currPatData;
     */
    currData=consChartDataHour.Data;
    currPatData=currData;
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

  // if(indicatorType=="none"){
  //   if(displayedChart==1){
  //     charts.chartMin.periodSelector.periods[oldZoom].selected=true;
  //     charts.chartMin.validateNow();
  //   }
  //   else if(displayedChart==2){
  //     charts.chartHour.periodSelector.periods[oldZoom].selected=true;
  //     charts.chartHour.validateNow();
  //   }
  //   else if(displayedChart==3){
  //     charts.chartDay.periodSelector.periods[oldZoom].selected=true;
  //     charts.chartDay.validateNow();
  //   }
  //   indiDisplayed=false;
  //   return;
  // }

  let pureIndiType=indicatorType.replace(/[0-9]/g, '');
  let indiNum = indicatorType.replace( /^\D+/g, '');
  let feilds=[];
  if(pureIndiType!="none")
    feilds=indiProps[pureIndiType][2];

  function addIndiToChartDataSet(feilds, indiNum){
    for(let i=0;i<feilds.length;i++){
      currDispChart.dataSets[0].fieldMappings.push({
        "fromField": feilds[i]+indiNum,
        "toField": feilds[i]+indiNum
      });
    }
  }

  function setTopIndicatorChart(feilds, indiNum, indiType){
    let indiStockGraphs=[];
    for(let i=0;i<feilds.length;i++){
      let chartType=indiProps[indiType][3][i];
      let fillAlphas=indiProps[indiType][4][i];
      let fillToGraph="";
      (!isNaN(parseFloat(fillAlphas)) && isFinite(fillAlphas))?(fillToGraph=""):(fillToGraph=fillAlphas,fillAlphas=0.5);
      currDispChart.panels[0].stockGraphs.push({
        "id": (!isNaN(parseFloat(fillAlphas)) && isFinite(fillAlphas)) ? feilds[i] : feilds[i]+"-"+indiNum,
        "title": (!isNaN(parseFloat(fillAlphas)) && isFinite(fillAlphas)) ? feilds[i] : feilds[i]+"-"+indiNum,
        "useDataSetColors":false,
        "precision": 4,
        "valueField": feilds[i]+indiNum,
        "xFeild":"time",
        "yFeild":feilds[i]+indiNum,
        "bullet": chartType == "xy" ? "round" : "none",
        "bulletSize": 3,
        "lineAplha": chartType == "xy" ? 0 : 1,
        "type": chartType == "xy" ? "line" : chartType,
        "cornerRadiusTop": 2,
        "fillAlphas": chartType == "column" ? 1 : fillAlphas,
        "lineColor": indiProps[indiType][1][i],
        "fillToGraph": fillToGraph
      });

    }
  }

  function setVolumeChart(panelNum){
    let indiStockGraphs=[];
    currDispChart.panels[panelNum]={
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
      }
    };
  }

  function setBottomIndicatorChart(feilds, indiNum, indiType, percentHeight){
    let indiStockGraphs=[];
    for(let i=0;i<feilds.length;i++){
      let fillAlphas=indiProps[indiType][4][i];
      let fillToGraph="";
      (!isNaN(parseFloat(fillAlphas)) && isFinite(fillAlphas))?(fillToGraph=""):(fillToGraph=fillAlphas,fillAlphas=0.5);
      indiStockGraphs.push({
        "id": feilds[i],
        "title": feilds[i],
        "useDataSetColors":false,
        "precision": 4,
        "valueField": feilds[i]+indiNum,
        "type": indiProps[indiType][3][i],
        "cornerRadiusTop": 2,
        "fillAlphas": fillAlphas,
        "lineColor": indiProps[indiType][1][i],
        "fillToGraph":fillToGraph
      });
    }
    console.log(JSON.parse(JSON.stringify(indiStockGraphs)));
    currDispChart.panels[1]={
      "title": indiType+" "+indiNum,
      "percentHeight": percentHeight,
      "stockGraphs": indiStockGraphs,
      "stockLegend": {
      }
    };
  }

  function setMiddleIndicatorChart(feilds, indiNum, indiType, percentHeight){
    let indiStockGraphs=[];
      for(let i=0;i<feilds.length;i++){
        indiStockGraphs.push({
          "title": feilds[i],
          "useDataSetColors":false,
          "precision": 4,
          "valueField": feilds[i]+indiNum,
          "type": indiProps[indiType][3][i],
          "cornerRadiusTop": 2,
          "fillAlphas": indiProps[indiType][4][i],
          "lineColor": indiProps[indiType][1][i]
        });
      }
      // currDispChart.panels[2]=currDispChart.panels[1];
      currDispChart.panels[2]={
        "title": indiType+" "+indiNum,
        "percentHeight": percentHeight,
        "stockGraphs": indiStockGraphs,
        "stockLegend": {
        }
      };
  }

  function displayIndicatorChart(indiType, indiPos){
    if(pat)
      return; // IMP : Do not remove
    // let variation=""; // IMP : Using indiNum instead
    // (indiType!=indicatorType) ? variation=indicatorType.replace(/\D/g,'') : ""; // IMP : Using indiNum instead
    // var feilds=indiProps[indiType][2];
    currDispChart.dataSets[0].dataProvider=currData;
    currDispChart.periodSelector.periods[oldZoom].selected=true;

    // feilds.forEach(function(d,i){
    //   feilds[i]=d+indiNum;
    // });
    addIndiToChartDataSet(feilds, indiNum);
    let otherSelectNum=selectNum%2+1;
    let alreadyDispIndicator=document.getElementById("chartIndiSelect"+otherSelectNum).value;

    if(alreadyDispIndicator=="none"){
      if(indiType=="none"){
        if(displayedChart==1){
          charts.chartMin.periodSelector.periods[oldZoom].selected=true;
          charts.chartMin.validateNow();
        }
        else if(displayedChart==2){
          charts.chartHour.periodSelector.periods[oldZoom].selected=true;
          charts.chartHour.validateNow();
        }
        else if(displayedChart==3){
          charts.chartDay.periodSelector.periods[oldZoom].selected=true;
          charts.chartDay.validateNow();
        }
        indiDisplayed=false;
        return;
      }
      if(indiPos=="bottom")
        setBottomIndicatorChart(feilds, indiNum, indiType, 30);
      else if(indiPos=="top"){
        setVolumeChart(1);
        setTopIndicatorChart(feilds, indiNum, indiType, 30);
      }
    }
    else if(alreadyDispIndicator!="none"){
      let alrdyDispIndicatorTyp=alreadyDispIndicator.replace(/[0-9]/g, '');
      let alrdyDispIndicatorNum=alreadyDispIndicator.replace( /^\D+/g, '');
      let alrdyDispIndicatorPos=indiProps[alrdyDispIndicatorTyp][0];
      let alrdyDispIndiFeilds=indiProps[alrdyDispIndicatorTyp][2];
      addIndiToChartDataSet(alrdyDispIndiFeilds, alrdyDispIndicatorNum);
      if(indiType=="none"){
        if(alrdyDispIndicatorPos=="top")
          setTopIndicatorChart(alrdyDispIndiFeilds, alrdyDispIndicatorNum, alrdyDispIndicatorTyp);
        else if(alrdyDispIndicatorPos=="bottom")
          setBottomIndicatorChart(alrdyDispIndiFeilds, alrdyDispIndicatorNum, alrdyDispIndicatorTyp, 30);
      }
      if(alrdyDispIndicatorPos!=indiPos){
        if(indiPos=="bottom"){
          setBottomIndicatorChart(feilds, indiNum, indiType);
          setTopIndicatorChart(alrdyDispIndiFeilds, alrdyDispIndicatorNum, alrdyDispIndicatorTyp, 30);
        }
        else if(indiPos=="top"){
          setTopIndicatorChart(feilds, indiNum, indiType);
          setBottomIndicatorChart(alrdyDispIndiFeilds, alrdyDispIndicatorNum, alrdyDispIndicatorTyp, 30);
        }
      }
      else if(alrdyDispIndicatorPos==indiPos){
        if(indiPos=="bottom"){
          setBottomIndicatorChart(feilds, indiNum, indiType, 35);
          setMiddleIndicatorChart(alrdyDispIndiFeilds, alrdyDispIndicatorNum, alrdyDispIndicatorTyp, 35);
        }
        else if(indiPos=="top"){
          setTopIndicatorChart(feilds, indiNum, indiType);
          setTopIndicatorChart(alrdyDispIndiFeilds, alrdyDispIndicatorNum, alrdyDispIndicatorTyp);
        }
      }
    }
    currIndiDisplayed=document.getElementById("chartIndiSelect1").value;
    indiDisplayed=true;
    currDispChart.listeners=renderListener;
    firstTimeZoom=true; // IMP: To prevent it to zoom on rendering which is default for amCharts. Handling Zoon again will lead to calculation of indi again
    chartWithIndi = AmCharts.makeChart("chartdiv", currDispChart);
    console.log("displayed chart with indi");
  }

  function mergeData(indiType){
    console.log(indiType);
    var diff = currData.length - indiData.length;
    console.log("DIFF:"+diff);
    var counter = 0;
    // let variation=""; // IMP : using indiNum instead
    // (indiType!=indicatorType) ? variation=indicatorType.replace(/\D/g,'') : ""; // IMP : using indiNum instead
    // var feilds=indiProps[indiType][2];
    currData.forEach(function (d) {
      if (counter < diff) {
        for(var i=0;i<feilds.length;i++){
          d[feilds[i]+indiNum]=undefined;
        }
      }
      else {
        if(feilds.length==1){
          d[feilds[0]+indiNum]=indiData[counter-diff];
        }
        else
          for(var i=0;i<feilds.length;i++){
            d[feilds[i]+indiNum]=indiData[counter-diff][feilds[i]];
          }
      }
      counter++;
    });
    console.log("done merging");
  }

  function calcTopIndi(indiType, indiPos, indiNum){
    if(indiType=="sma"){
      indiData = SMA.calculate({period : indiNum, values : all.closes});
      mergeData(indiType);
      displayIndicatorChart(indiType, indiPos);
    }
    if(indiType=="ema"){
      indiData = EMA.calculate({period : indiNum, values : all.closes});
      mergeData(indiType);
      displayIndicatorChart(indiType, indiPos);
    }
    if(indiType=="wma"){
      indiData = WMA.calculate({period : indiNum, values : all.closes});
      mergeData(indiType);
      displayIndicatorChart(indiType, indiPos);
    }
    else if(indiType=="bollinger"){
      indiData = BollingerBands.calculate({period : 14, values : all.closes, stdDev : 2});
      mergeData(indiType);
      displayIndicatorChart(indiType, indiPos);
    }
    else if(indiType=="adl"){
      indiData = ADL.calculate({high : all.highs, low : all.lows, close : all.closes, volume: all.volumes});
      mergeData(indiType);
      displayIndicatorChart(indiType, indiPos);
    }
    else if(indiType=="psar"){
      indiData = PSAR.calculate({high: all.highs,low: all.lows,step: 0.02,max: 0.2,});
      mergeData(indiType);
      displayIndicatorChart(indiType, indiPos);
    }
    else if(indiType=="TP"){
      indiData = TypicalPrice.calculate({high: all.highs,low: all.lows,close: all.closes});
      mergeData(indiType);
      displayIndicatorChart(indiType, indiPos);
    }
    else if(indiType=="VWAP"){
      indiData = VWAP.calculate({high: all.highs,low: all.lows,close: all.closes, volume: all.volumes});
      mergeData(indiType);
      displayIndicatorChart(indiType, indiPos);
    }
    else if(indiType=="ichi"){
      indiData=[];
      var tempindiData = IchimokuCloud.calculate({high: all.highs,low: all.lows,conversionPeriod: 9,basePeriod: 26,spanPeriod: 52,displacement: 26});
      let diff = currData.length - tempindiData.length;
      let tempBlanks=[];
      for(let i=0;i<diff;i++){
        tempBlanks.push({"conversion":undefined,"base":undefined,"spanA":undefined,"spanB":undefined,"Lagging Span":undefined});
      }
      tempindiData=tempBlanks.concat(tempindiData);
      let i=0;
      tempindiData.forEach(function (d){
        indiData.push({
          "Conversion":d.conversion,
          "Base":d.base,
          "SpanA":d.spanA,
          "SpanB":d.spanB,
          "Lagging Span":(currData[i+26]!=undefined)?currData[i+26].close:undefined
        });
        i++;
      });
      mergeData(indiType);
      displayIndicatorChart(indiType, indiPos);
    }
    else if(indiType=="heikinashi"){
      indiData=[];
      var tempindiData = HeikinAshi.calculate({high: all.highs,low: all.lows,open: all.opens,close: all.closes});
      console.log(tempindiData);
      let i=0;
      for(i=0;i<tempindiData.open.length;i++){
        indiData.push({
          "HA open":tempindiData.open[i],
          "HA high":tempindiData.high[i],
          "HA low":tempindiData.low[i],
          "HA close":tempindiData.close[i]
        });
      }
      console.log(indiData);
      mergeData(indiType);
      displayIndicatorChart(indiType, indiPos);
    }
    else if(indiType=="renko"){
      indiData=[];
      let data={close:all.closes,high:all.highs,low:all.lows,open:all.opens,timestamp:all.timestamps,volume:all.volumes,ticker:globalFiatValue+":"+globalCryptoValue};
      var tempindiData = renko(Object.assign({}, data, {brickSize : 0.1, useATR : false }));
      console.log(tempindiData);
      let i=0;
      for(i=0;i<tempindiData.open.length;i++){
        indiData.push({
          "Renko open":tempindiData.open[i],
          "Renko high":tempindiData.high[i],
          "Renko low":tempindiData.low[i],
          "Renko close":tempindiData.close[i],
          "Renko volume":tempindiData.volume[i],
          "Renko time":new Date(tempindiData.timestamp[i])
        });
      }
      console.log(indiData);
      mergeData(indiType);
      displayIndicatorChart(indiType, indiPos);
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
      displayIndicatorChart(indiType, indiPos);
    }
    else if(indiType=="rsi"){
      indiData=[];
      var tempindiData = RSI.calculate({period : 14, values : all.closes});
      let diff = currData.length - tempindiData.length;
      let tempBlanks=[];
      for(let i=0;i<diff;i++){
        tempBlanks.push(undefined);
      }
      tempindiData=tempBlanks.concat(tempindiData);
      tempindiData.forEach(function (d){
        indiData.push({
          "rsi top":70,
          rsi:d,
          "rsi bottom":30
        });
      });
      mergeData(indiType);
      displayIndicatorChart(indiType, indiPos);
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
      displayIndicatorChart(indiType, indiPos);
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
      let diff = currData.length - tempindiData.length;
      let tempBlanks=[];
      for(let i=0;i<diff;i++){
        tempBlanks.push({d:undefined,k:undefined});
      }
      tempindiData=tempBlanks.concat(tempindiData);
      tempindiData.forEach(function (d){
        indiData.push({
          "so top":80,
          d:d.d,
          k:d.k,
          "so bottom":20
        });
      });
      mergeData(indiType);
      displayIndicatorChart(indiType, indiPos);
    }
    else if(indiType=="adx"){
      indiData=[];
      var tempindiData = ADX.calculate({
        high: all.highs,
        low: all.lows,
        close: all.closes,
        period: 14
      });
      let diff = currData.length - tempindiData.length;
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
      displayIndicatorChart(indiType, indiPos);
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
      let diff = currData.length - tempindiData.length;
      let tempBlanks=[];
      for(let i=0;i<diff;i++){
        tempBlanks.push(undefined);
      }
      tempindiData=tempBlanks.concat(tempindiData);
      tempindiData.forEach(function (d){
        indiData.push({
          "mfi top":80,
          mfi:d,
          "mfi bottom":20
        });
      });
      mergeData(indiType);
      displayIndicatorChart(indiType, indiPos);
    }
    else if(indiType=="wr"){
      indiData=[];
      var tempindiData = WilliamsR.calculate({
        high : all.highs,
        low : all.lows,
        close : all.closes,
        period : 14
      });
      let diff = currData.length - tempindiData.length;
      let tempBlanks=[];
      for(let i=0;i<diff;i++){
        tempBlanks.push(undefined);
      }
      tempindiData=tempBlanks.concat(tempindiData);
      tempindiData.forEach(function (d){
        indiData.push({
          "wr top":-20,
          "w%r":d,
          "wr bottom":-80
        });
      });
      mergeData(indiType);
      displayIndicatorChart(indiType, indiPos);
    }
    else if(indiType=="trix"){
      indiData=[];
      var tempindiData = TRIX.calculate({period : 18, values : all.closes});
      let diff = currData.length - tempindiData.length;
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
      displayIndicatorChart(indiType, indiPos);
    }
    else if(indiType=="atr"){
      indiData=ATR.calculate({high: all.highs, low: all.lows, close: all.closes, period: 14});
      mergeData(indiType);
      displayIndicatorChart(indiType, indiPos);
    }
    else if(indiType=="cci"){
      indiData=[];
      var tempindiData = CCI.calculate({open: all.opens, high: all.highs, low: all.lows, close: all.closes, period: 20});
      let diff = currData.length - tempindiData.length;
      let tempBlanks=[];
      for(let i=0;i<diff;i++){
        tempBlanks.push(undefined);
      }
      tempindiData=tempBlanks.concat(tempindiData);
      tempindiData.forEach(function (d){
        indiData.push({
          "cci top":100,
          CCI:d,
          "cci bottom":-100
        });
      });
      mergeData(indiType);
      displayIndicatorChart(indiType, indiPos);
    }
    else if(indiType=="FI"){
      indiData=[];
      var tempindiData = ForceIndex.calculate({open: all.opens, high: all.highs, low: all.lows, close: all.closes, volume: all.volumes, period : indiNum});
      let diff = currData.length - tempindiData.length;
      let tempBlanks=[];
      for(let i=0;i<diff;i++){
        tempBlanks.push(undefined);
      }
      tempindiData=tempBlanks.concat(tempindiData);
      tempindiData.forEach(function (d){
        indiData.push({
          "zero line":0,
          FI:d,
        });
      });
      mergeData(indiType);
      displayIndicatorChart(indiType, indiPos);
    }
    else if(indiType=="kst"){
      indiData=[];
      var tempindiData = KST.calculate({
        values      : all.closes,
        ROCPer1     : 10,
        ROCPer2     : 15,
        ROCPer3     : 20,
        ROCPer4     : 30,
        SMAROCPer1  : 10,
        SMAROCPer2  : 10,
        SMAROCPer3  : 10,
        SMAROCPer4  : 15,
        signalPeriod: 9
      });
      console.log(tempindiData);
      let diff = currData.length - tempindiData.length;
      let tempBlanks=[];
      for(let i=0;i<diff;i++){
        tempBlanks.push({"KST":undefined,"KST Signal":undefined});
      }
      tempindiData=tempBlanks.concat(tempindiData);
      tempindiData.forEach(function (d){
        indiData.push({
          "KST":d.kst,
          "KST Signal":d.signal,
        });
      });
      mergeData(indiType);
      displayIndicatorChart(indiType, indiPos);
    }
    else if(indiType=="obv"){
      indiData=[];
      var tempindiData = OBV.calculate({
          close : all.closes,
          volume : all.volumes,
        });
      let diff = currData.length - tempindiData.length;
      let tempBlanks=[];
      for(let i=0;i<diff;i++){
        tempBlanks.push(undefined);
      }
      indiData=tempBlanks.concat(tempindiData);
      mergeData(indiType);
      displayIndicatorChart(indiType, indiPos);
    }
    else if(indiType=="roc"){
      indiData=[];
      var tempindiData = ROC.calculate({
          values : all.closes,
          period: 12,
        });
      let diff = currData.length - tempindiData.length;
      let tempBlanks=[];
      for(let i=0;i<diff;i++){
        tempBlanks.push(undefined);
      }
      indiData=tempBlanks.concat(tempindiData);
      mergeData(indiType);
      displayIndicatorChart(indiType, indiPos);
    }
  }

  function calcThreeChartIndi(indiType, indiPos, indiNum){
    var IndiColors={};//none yet
  }

  function calcIndi(indiType){
    if(pureIndiType=="none"){
      displayIndicatorChart(pureIndiType,"somePosition");
      return;
    }

    console.log("calculating indi");
    all={
      opens:[],
      closes:[],
      highs:[],
      lows:[],
      volumes:[],
      timestamps:[]
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
        all.timestamps.push(parseFloat(d.timest));
      }
    });
    //console.log(all);
    
    var indiPosition=indiProps[pureIndiType][0];
    let indiAlreadyClcd=false;
    for(element in feilds) {
      if(feilds[element]+indiNum in currData[0])
        indiAlreadyClcd=true;//TODO: assign true
      else{
        indiAlreadyClcd=false;
        break;
      }
    }
    if(indiAlreadyClcd){
      console.log("Indi Already present");
      displayIndicatorChart(pureIndiType, indiPosition);
    }
    else if(indiPosition == "top"){
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
  calcIndi(indicatorType);
}

function changeIndiType(indicatorType,selectNum){
  if(firstTimeIndi){//TODO Load only when called for page performance
    // var indiFiles1 = document.createElement("script");
    // indiFiles1.src = "https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/6.23.0/polyfill.min.js";
    // document.body.appendChild(indiFiles1);
    // var indiFiles2 = document.createElement("script");
    // indiFiles2.src = "https://unpkg.com/technicalindicators@1.1.11/dist/browser.js";
    // document.body.appendChild(indiFiles2);
    firstTimeIndi=false;
    displayNewIndi(indicatorType,selectNum);
  }
  else{
    displayNewIndi(indicatorType,selectNum);
  }
}