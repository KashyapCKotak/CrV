async function calcPatterns(){
    var uptrend=false;
    var downtrend=false;
    const period=204;
    var patCurrData=consChartDataHour.Data;
    //patCurrData=patCurrData.slice(0,patCurrData.length-1);
    const total=patCurrData.length;
    var currLength=patCurrData.length;
    var patCloses = [];
    var patCandles={
        open:[],
        close:[],
        high:[],
        low:[]
    }
    var high12=0;
    var low12=Number.MAX_VALUE;
    var counter=0;
    var finalPredict=null;

    function isDoji(open,close){
        var doji=undefined;
        if((Math.abs(parseFloat(open)-parseFloat(close))*100/Math.abs(high12-low12))<=1.0)
            doji=true;
        else
            doji=false;
        // var whichDoji = doji ?     ***TODO***
        //                     (open)
        //                 : "afternoon";
    }
    function isBlckCrws(obj){
        var len=obj.open.length;
        var blckCrws=(obj.open[len-3]>obj.close[len-3]) ? 
                    ((obj.open[len-2]>obj.close[len-2]) && (obj.high[len-3]>obj.high[len-2]) && (obj.close[len-3]>obj.close[len-2])) ? 
                        ((obj.open[len-1]>obj.close[len-1]) && (obj.high[len-2]>obj.high[len-1]) && (obj.close[len-2]>obj.close[len-1])) ?
                        "strong" : "none" 
                    : "none" 
                : (obj.open[len-2]>obj.close[len-2]) ? 
                    ((obj.open[len-1]>obj.close[len-1]) && (obj.high[len-2]>obj.high[len-1]) && (obj.close[len-2]>obj.close[len-1])) ? 
                    "weak" : "none"
                  : "none";
        return blckCrws;
    }
    function isWhteSlds(obj){
        var len=obj.length;
        var whteSlds=(obj.open[len-3]<obj.close[len-3]) ? 
                    ((obj.open[len-2]<obj.close[len-2]) && (obj.low[len-3]<obj.low[len-2]) && (obj.close[len-3]<obj.close[len-2])) ? 
                        ((obj.open[len-1]<obj.close[len-1]) && (obj.low[len-2]<obj.low[len-1]) && (obj.close[len-2]<obj.close[len-1])) ?
                        "strong" : "none" 
                    : "none" 
                : (obj.open[len-2]>obj.close[len-2]) ? 
                    ((obj.open[len-1]>obj.close[len-1]) && (obj.high[len-2]>obj.high[len-1]) && (obj.close[len-2]>obj.close[len-1])) ? 
                    "weak" : "none"
                  : "none";
        return whteSlds;
    }

    patCurrData.forEach(function (d) {
        counter++;
        if(counter>total-period){
            patCloses.push(d.close);
            patCandles.open.push(d.open);
            patCandles.close.push(d.close);
            patCandles.high.push(d.high);
            patCandles.low.push(d.low);
            if(parseFloat(d.low)<low12)
                low12=parseFloat(d.low);
            if(parseFloat(d.high)>high12)
                high12=parseFloat(d.high);
        }
    });

    function isMACDCrsOv(){
        if(parseFloat(currPatData[currPatData.length-1].histogram)<0 && parseFloat(currPatData[currPatData.length-2].histogram)>0){
            return "crossed:0:";
        }
        else if(parseFloat(currPatData[currPatData.length-1].histogram)>0 && parseFloat(currPatData[currPatData.length-2].histogram)<0){
            return "crossed:0";
        }
        else if(parseFloat(currPatData[currPatData.length-1].histogram)<0 && parseFloat(currPatData[currPatData.length-13].histogram)>0){
            return "crossed:12";
        }
        else if(parseFloat(currPatData[currPatData.length-1].histogram)>0 && parseFloat(currPatData[currPatData.length-13].histogram)<0){
            return "crossed:12";
        }
        else if(parseFloat(currPatData[currPatData.length-1].histogram)<0 && parseFloat(currPatData[currPatData.length-25].histogram)>0){
            return "crossed:24";
        }
        else if(parseFloat(currPatData[currPatData.length-1].histogram)>0 && parseFloat(currPatData[currPatData.length-25].histogram)<0){
            return "crossed:24";
        }
    }

    function whichAdxTrend(){
        let trendSign="none";
        trendSign=(currPatData[currPatData.length-1].pdi-currPatData[currPatData.length-1].mdi>0) ? trendSign="up" : trendSign="down";
        trendSign=(currPatData[currPatData.length-1].pdi-currPatData[currPatData.length-1].mdi==0) ?  
                    (currPatData[currPatData.length-2].pdi-currPatData[currPatData.length-2].mdi>0) ? 
                        trendSign="up"
                    : trendSign="down"
                : trendSign=trendSign;
        if(currPatData[currPatData.length-1].adx>25){
            return ("trend:"+trendSign);
        }
        else if(currPatData[currPatData.length-1].adx<20){
            return ("range:"+trendSign);
        }
    }

    displayNewIndi("macd",true);
    let MACDCrsOv=isMACDCrsOv();

    displayNewIndi("adx",true);
    let adxTrend=whichAdxTrend();

    displayNewIndi("mfi",true);

    console.log("LOOOOOOOOOOOOOOOOOOOOOOOOOK");
    console.log(MACDCrsOv,adxTrend);
    /////////////////////////////////////// Get Trend //////////////////////////////////////////
    
    displayNewIndi("sma20",true);
    console.log(currPatData);
    currPatData=currPatData.slice(currPatData.length-168);
    console.log(currPatData);
    var sma168High=0,smaDayHigh=0,smaFHHigh=0,smaSHHigh=0;
    var sma168Low=Number.MAX_VALUE,smaDayLow=Number.MAX_VALUE,smaFHLow=Number.MAX_VALUE,smaSHLow=Number.MAX_VALUE;
    var dayCntr=0;
    var firstHalfCntr=0;
    var SecondHalfCntr=0
    currPatData.forEach(function (d){
        dayCntr++;
        if (dayCntr>(168-24)){
            if(d.sma>smaDayHigh)
                smaDayHigh=d.sma;
            if(d.sma<smaDayLow)
                smaDayLow=d.sma;
            firstHalfCntr++;
            SecondHalfCntr++;
            if(firstHalfCntr<13){
                if(d.sma>smaFHHigh)
                    smaFHHigh=d.sma;
                if(d.sma<smaFHLow)
                    smaFHLow=d.sma;
            }
            if(SecondHalfCntr>12){
                if(d.sma>smaSHHigh)
                    smaSHHigh=d.sma;
                if(d.sma<smaSHLow)
                    smaSHLow=d.sma;
            }
        }
        if(parseFloat(d.sma)>sma168High)
            sma168High=parseFloat(d.sma);
        if(parseFloat(d.sma)<sma168Low)
            sma168Low=parseFloat(d.sma);
    });
    var dayPat=currPatData.slice(168-24);
    var twelveHPat1=dayPat.slice(0,24);
    var twelveHPat2=dayPat.slice(24);
    /////// Identify Trend ////////
    
    /////// End Identify Trend ////////


    console.log(sma168High,smaDayHigh,smaFHHigh,smaSHHigh);
    console.log(sma168Low,smaDayLow,smaFHLow,smaSHLow);

    /////////////////////////////////////////////////////////////////////////////////
    console.log(patCandles);
    console.log(patCandles.open[period-1],patCandles.close[period-1]);
    console.log(patCandles.open[period],patCandles.close[period]);
    var tu = await isTrendingUp({ values : patCloses });
    var td = await isTrendingDown({ values : patCloses });
    console.log("Uptrend"+tu);
    console.log("Downtrend"+td);
    var doji=isDoji(patCandles.open[period-1],patCandles.close[period-1]);
    console.log("DOJI: "+doji);
    if(doji){
        if((patCandles.open[period-1]-patCandles.close[period-1])<0)
            finalPredict=-5;
        else if((patCandles.open[period-1]-patCandles.close[period-1])>0)
            finalPredict=5;
        else
            finalPredict=0;
    }
    //console.log(threeblackcrows(patCandles));
    var soldiersCrows=undefined
    var blckCrws=isBlckCrws(patCandles);
    var whteSlds=isBlckCrws(patCandles);
    if(blckCrws != "none"){
        soldiersCrows=blckCrws;
        finalPredict
    }
    else if(whteSlds != "none"){
        soldiersCrows=whteSlds;
    }
    console.log("bearish "+bearish(patCandles));
    console.log("bullish "+bullish(patCandles));
}