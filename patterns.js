async function calcPatterns(){
    var sigArray={
      	MacdMfi:"none",
        MacdTrix:"none",
        MacdAo:"none",
        DojiTrend:"none",
        RsiMacd:"none",
        OnlyMacd:"none",
        AdxTrend:"unknown",
        Engulfing:"none",
        Stars:"none",
        OnlyRsi:"none",
        RsiEngulfing:"none",
        RsiMacd:"none"
    };
    /**
     * Check for abdndbaby2 function to consider even if adx trend is ranging
     */
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

    function isDoji(open1,close1,open2,close2){
		for(var i=currPatData.length-1;i>=currPatData.length-26;i--){
            // console.log(currPatData[i].open, currPatData[i].close);
            if((Math.abs(parseFloat(currPatData[i].open)-parseFloat(currPatData[i].close))*100/Math.abs(high12-low12))<=0.5){
                let when=-1;
                (i==currPatData.length-1) ? when=0 : (i>=currPatData.length-12) ? when=12 : (i>=currPatData.length-24) ? when=24 : when=-1;
                if(when==-1)
                    return "-1:-1:0:isDoji";
                return when+":"+i+":1:"+"isDoji";
            }
        }
		return "-1:-1:0:isDoji";
    }
	
    /**
     * **Important**: Call only if doji exists !!
     * @param {Number} loc : location of doji
     */
    function isAbdndBby2(loc){
        console.log(currPatData[loc+1].open);
        if((parseFloat(currPatData[loc+1].open)-parseFloat(currPatData[loc+1].close))<0&&(parseFloat(currPatData[loc-1].open)-parseFloat(currPatData[loc-1].close))>0)
            return "bullish";
        else if((parseFloat(currPatData[loc+1].open)-parseFloat(currPatData[loc+1].close))>0&&(parseFloat(currPatData[loc-1].open)-parseFloat(currPatData[loc-1].close))<0)
            return "bearish";
        return "none";
    }
    
    function isEngulfing(){
        for(var i=currPatData.length-1;i>=currPatData.length-26;i--){
            let when=-1;
            let engulfing=undefined;
            if((parseFloat(currPatData[i].open)<parseFloat(currPatData[i-1].close)) && (parseFloat(currPatData[i].close)>parseFloat(currPatData[i-1].open))){
                (i==currPatData.length-1) ? when=0 : (i>=currPatData.length-12) ? when=12 : (i>=currPatData.length-24) ? when=24 : when=-1;
                engulfing=when+":"+i+":1:"+"bullish";
            }
            else if((parseFloat(currPatData[i].open)>parseFloat(currPatData[i-1].close)) && (parseFloat(currPatData[i].close)<parseFloat(currPatData[i-1].open))){
                (i==currPatData.length-1) ? when=0 : (i>=currPatData.length-12) ? when=12 : (i>=currPatData.length-24) ? when=24 : when=-1;
                engulfing=when+":"+i+":-1:"+"bearish";
            }
            else engulfing="-1:-1:0:NoEngulfing";
            if(engulfing!="NoEngulfing")
                return engulfing;
        }
    }

    function isStar(){
        let morning=false;
        let morningDoji=false;
        let evening=false;
        let eveningDoji=false;
        let abdndBby1=false;
        for(var i=currPatData.length-1;i>=currPatData.length-26;i--){
            let when=-1;
            (i==currPatData.length-1) ? when=0 : (i>=currPatData.length-12) ? when=12 : (i>=currPatData.length-24) ? when=24 : when=-1;
            let input={
                open:[currPatData[i].open,currPatData[i-1].open,currPatData[i-2].open],
                close:[currPatData[i].close,currPatData[i-1].close,currPatData[i-2].close],
                high:[currPatData[i].high,currPatData[i-1].high,currPatData[i-2].high],
                low:[currPatData[i].low,currPatData[i-1].low,currPatData[i-2].low],
            };
            if(morning == false){
                morning=morningstar(input);
                if(morning != false)
                    morning=when+":"+i+":1:isMrngStar";
            }
            if(morningDoji == false){
                morningDoji=morningdojistar(input);
                if(morningDoji != false)
                    morningDoji=when+":"+i+":1:isMrngDojiStar";
            }
            if(evening == false){
                evening=eveningstar(input);
                if(evening != false)
                    evening=when+":"+i+":1:isEvngStar";
            }
            if(eveningDoji == false){
                eveningDoji=eveningdojistar(input);
                if(eveningDoji != false)
                    eveningDoji=when+":"+i+":1:isEvngDojiStar";
            }
            if(abdndBby1 == false){
                abdndBby1=abandonedbaby(input);
                if(abdndBby1 != false)
                    abdndBby1=when+":"+i+":1:isAbdndBby1";
            }
        }
        if(morning==false)
            morning="-1:-1:0:notMrngStar";
        if(morningDoji==false)
            morningDoji="-1:-1:0:notMrngDojiStar";
        if(evening==false)
            evening="-1:-1:0:notEvngStar";
        if(eveningDoji==false)
            eveningDoji="-1:-1:0:notEvngDojiStar";
        if(abdndBby1==false)
            abdndBby1="-1:-1:0:notAbdndBby1";
        console.log(morning,morningDoji,evening,eveningDoji,abdndBby1);
        return morning+"&"+morningDoji+"&"+evening+"&"+eveningDoji+"&"+abdndBby1;
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

    function isMACDCrsOv(){
        for(var i=currPatData.length-1;i>=currPatData.length-26;i--){
            if(parseFloat(currPatData[i].histogram)>0 && parseFloat(currPatData[i-1].histogram)<0){
                let when=-1;
                (i==currPatData.length-1) ? when=0 : (i>=currPatData.length-12) ? when=12 : (i>=currPatData.length-24) ? when=24 : when=-1;
                if(when==-1)
                    return "-1:-1:0:MACDNoCrs";
                return when+":"+i+":"+"1:"+"MACDcrsUp";
            }
            else if(parseFloat(currPatData[i].histogram)<0 && parseFloat(currPatData[i-1].histogram)>0){
                let when=-1;
                (i==currPatData.length-1) ? when=0 : (i>=currPatData.length-12) ? when=12 : (i>=currPatData.length-24) ? when=24 : when=-1;
                if(when==-1)
                    return "-1:-1:0:MACDNoCrs";
                return when+":"+i+":"+"-1:"+"MACDCrsDown";
            }
        }
        return "-1:-1:0:MACDNoCrs";
    }

    function whichMfiSig(){
        for(var i=currPatData.length-1;i>=currPatData.length-26;i--){
            if(parseFloat(currPatData[i].mfi)>80){
                let when=-1;
                (i==currPatData.length-1) ? when=0 : (i>=currPatData.length-12) ? when=12 : (i>=currPatData.length-24) ? when=24 : when=-1;
                if(when==-1)
                    return "-1:-1:0:MFINotOut";
                return when+":"+i+":1:"+"MFIUpOut";
            }
            else if(parseFloat(currPatData[i].mfi)<20){
                let when=-1;
                (i==currPatData.length-1) ? when=0 : (i>=currPatData.length-12) ? when=12 : (i>=currPatData.length-24) ? when=24 : when=-1;
                if(when==-1)
                    return "-1:-1:0:MFINotOut";
                return when+":"+i+":-1:"+"MFIDownOut";
            }
        }
        return "-1:-1:0:MFINotOut";
    }
	
	function whichRsiSig(){
        for(var i=currPatData.length-1;i>=currPatData.length-26;i--){
            if(parseFloat(currPatData[i].rsi)>70){
                let when=-1;
                (i==currPatData.length-1) ? when=0 : (i>=currPatData.length-12) ? when=12 : (i>=currPatData.length-24) ? when=24 : when=-1;
                if(when==-1)
                    return "-1:-1:0:RSINotOut";
                return when+":"+i+":1:"+"RSIUpOut";
            }
            else if(parseFloat(currPatData[i].rsi)<30){
                let when=-1;
                (i==currPatData.length-1) ? when=0 : (i>=currPatData.length-12) ? when=12 : (i>=currPatData.length-24) ? when=24 : when=-1;
                if(when==-1)
                    return "-1:-1:0:RSINotOut";
                return when+":"+i+":-1:"+"RSIDownOut";
            }
        }
        return "-1:-1:0:RSINotOut";
    }
	
	function whichTrixSig(){
        for(var i=currPatData.length-1;i>=currPatData.length-26;i--){
            if(parseFloat(currPatData[i].trix)>0){
                let when=-1;
                (i==currPatData.length-1) ? when=0 : (i>=currPatData.length-12) ? when=12 : (i>=currPatData.length-24) ? when=24 : when=-1;
                if(when==-1)
                    return "-1:-1:0:TrixZero";
                return when+":"+i+":1:"+"TrixAbove";
            }
            else if(parseFloat(currPatData[i].trix)<0){
                let when=-1;
                (i==currPatData.length-1) ? when=0 : (i>=currPatData.length-12) ? when=12 : (i>=currPatData.length-24) ? when=24 : when=-1;
                if(when==-1)
                    return "-1:-1:0:TrixZero";
                return when+":"+i+":-1:"+"TrixBelow";
            }
        }
    }
	
	function whichAoSig(){
        for(var i=currPatData.length-1;i>=currPatData.length-26;i--){
            if(parseFloat(currPatData[i].ao)>0){
                let when=-1;
                (i==currPatData.length-1) ? when=0 : (i>=currPatData.length-12) ? when=12 : (i>=currPatData.length-24) ? when=24 : when=-1;
                if(when==-1)
                    return "-1:-1:0:AoZero";
                return when+":"+i+":1:"+"AoAbove";
            }
            else if(parseFloat(currPatData[i].ao)<0){
                let when=-1;
                (i==currPatData.length-1) ? when=0 : (i>=currPatData.length-12) ? when=12 : (i>=currPatData.length-24) ? when=24 : when=-1;
                if(when==-1)
                    return "-1:-1:0:AoZero";
                return when+":"+i+":-1:"+"AoBelow";
            }
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
        else if(currPatData[currPatData.length-1].adx<25){
            return ("range:"+trendSign);
        }
        else if(currPatData[currPatData.length-1].adx==25){
            return ("range:"+trendSign);
        }
        return ("unknown:up");
    }
	
    function finalDec(){
        let buyCount=0; let sellCount=0; let noneCount=0; let decision=0; let strength=0;
        for(let signal in sigArray){
            if(sigArray[signal]=="buy")
                buyCount++;
            else if(sigArray[signal]=="sell")
                sellCount++;
            else if(sigArray[signal]=="none")
                noneCount++;
        }
        strength = ((buyCount+sellCount)>noneCount) ? "strong" : "weak";
        decision = (buyCount>sellCount) ? decision="buy" : (sellCount>buyCount) ? "sell" : "hold" ;
        return strength+":"+decision;
    }

    displayNewIndi("macd",true);
    let MACDCrsOv=isMACDCrsOv().split(":");

    displayNewIndi("adx",true);
    let adxTrend=whichAdxTrend().split(":");

    displayNewIndi("mfi",true);
    let MFIOut=whichMfiSig().split(":");
	
    displayNewIndi("trix",true);
    let TrixPol=whichTrixSig().split(":");

    displayNewIndi("ao",true);
    let aoPol=whichAoSig().split(":");
	
    displayNewIndi("rsi",true);
    let rsiOut=whichRsiSig().split(":");
    let engulfing=isEngulfing().split();

    let stars=isStar().split("&");
    let doji=isDoji().split(":");
    if(parseInt(doji[0])!=-1){
        if(doji[0]<13 && adxTrend[0]=="trend" && adxTrend[1]=="up")
            sigArray.DojiTrend="sell";
        else if(doji[0]<13 && adxTrend[0]=="trend" && adxTrend[1]=="down")
            sigArray.DojiTrend="buy";
        if(parseInt(doji[0])==12){
            let abdndBby2=isAbdndBby2(parseInt(doji[1]));
            console.log(abdndBby2);
            if(abdndBby2=="bullish" || stars[1].split(":")[2]==1 || stars[4].split(":")[2]==1)
                sigArray.Stars="buy1";
            else if(abdndBby2=="bearish" || stars[3].split(":")[2]==1)
                sigArray.Stars="sell1";
        }
    }

    if(stars[0].split(":")[2]==1 && sigArray.Stars=="none")
        sigArray.Stars="buy";
    if(stars[2].split(":")[2]==1 && sigArray.Stars=="none")
        sigArray.Stars="sell";

    console.log(doji, MACDCrsOv,adxTrend, MFIOut, TrixPol, aoPol, engulfing, adxTrend, rsiOut);
	
    if(parseInt(MACDCrsOv[0])!=-1 && parseInt(MFIOut[0])!=-1 && parseInt(MACDCrsOv[1])>=parseInt(MFIOut[1]) && parseInt(MACDCrsOv[2])!=parseInt(MFIOut[2]))
        (parseInt(MACDCrsOv[2])>0) ? sigArray.MacdMfi="buy" : sigArray.MacdMfi="sell";
		
    if(parseInt(MACDCrsOv[0])!=-1 && parseInt(TrixPol[0])!=-1 && parseInt(MACDCrsOv[1])<=parseInt(TrixPol[1]) && parseInt(MACDCrsOv[2])==parseInt(TrixPol[2]))
        (parseInt(MACDCrsOv[2])>0) ? sigArray.MacdTrix="buy" : sigArray.MacdTrix="sell";

    if(parseInt(MACDCrsOv[0])!=-1 && parseInt(aoPol[0])!=-1 && parseInt(MACDCrsOv[1])<=parseInt(aoPol[1]) && parseInt(MACDCrsOv[2])==parseInt(aoPol[2]))
        (parseInt(aoPol[2])>0) ? sigArray.MacdAo="buy" : sigArray.MacdAo="sell";
	
    if(parseInt(MACDCrsOv[0])!=-1 && parseInt(rsiOut[0])!=-1 && parseInt(MACDCrsOv[1])>=parseInt(rsiOut[1]) && parseInt(MACDCrsOv[2])!=parseInt(rsiOut[2]))
        (parseInt(MACDCrsOv[2])>0) ? sigArray.RsiMacd="buy" : sigArray.RsiMacd="sell";

    if(parseInt(rsiOut[0])!=-1 && parseInt(engulfing[0])!=-1 && parseInt(rsiOut[0])==parseInt(engulfing[0]) && parseInt(rsiOut[0])!=24 && parseInt(rsiOut[2])!=parseInt(engulfing[2]))
        (parseInt(rsiOut[2])<0) ? sigArray.RsiEngulfing="buy" : sigArray.RsiEngulfing="sell";

    if(parseInt(rsiOut[0])!=-1 && parseInt(MACDCrsOv[0])!=-1 && parseInt(rsiOut[0])==parseInt(MACDCrsOv[0]) && parseInt(rsiOut[0])!=24 && parseInt(rsiOut[2])!=parseInt(MACDCrsOv[2]))
        (parseInt(MACDCrsOv[2])>0) ? sigArray.RsiMacd="buy" : sigArray.RsiMacd="sell";

    (parseInt(MACDCrsOv[2])>0) ? sigArray.OnlyMacd="buy" : (parseInt(MACDCrsOv[2])<0) ? sigArray.OnlyMacd="sell" : sigArray.OnlyMacd="none";
    (parseInt(engulfing[2])>0) ? sigArray.OnlyMacd="buy" : (parseInt(engulfing[2])<0) ? sigArray.OnlyMacd="sell" : sigArray.OnlyMacd="none";
    (adxTrend[0]=="trend") ? sigArray.AdxTrend="trend" : (adxTrend[0]=="range") ? sigArray.AdxTrend="range" : sigArray.AdxTrend="unknown";
    (parseInt(engulfing[2])==1) ? sigArray.Engulfing="buy" : (parseInt(engulfing[2])==-1) ? sigArray.Engulfing="sell" : sigArray.Engulfing="none";
    (parseInt(rsiOut[2])==-1) ? sigArray.OnlyRsi="buy" : (parseInt(rsiOut[2])==1) ? sigArray.OnlyRsi="sell" : sigArray.OnlyRsi="none" ;
				
    console.log(sigArray);
    console.log(finalDec());
    
    /////////////////////////////////////// Get Trend //////////////////////////////////////////
    
    displayNewIndi("sma20",true);
    // console.log(currPatData);
    currPatData=currPatData.slice(currPatData.length-168);
    // console.log(currPatData);
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
    // console.log(patCandles);
    // console.log(patCandles.open[period-1],patCandles.close[period-1]);
    // console.log(patCandles.open[period],patCandles.close[period]);
    console.log(patCloses);
    var tu = await isTrendingUp({ values : patCloses });
    var td = await isTrendingDown({ values : patCloses });
    console.log("Uptrend"+tu);
    console.log("Downtrend"+td);
//     var doji=isDoji(patCandles.open[period-1],patCandles.close[period-1]);
//     console.log("DOJI: "+doji);
//     if(doji){
//         if((patCandles.open[period-1]-patCandles.close[period-1])<0)
//             finalPredict=-5;
//         else if((patCandles.open[period-1]-patCandles.close[period-1])>0)
//             finalPredict=5;
//         else
//             finalPredict=0;
//     }
    //console.log(threeblackcrows(patCandles));
    var soldiersCrows=undefined
    var blckCrws=isBlckCrws(patCandles);
    var whteSlds=isBlckCrws(patCandles);
    if(blckCrws != "none"){
        soldiersCrows=blckCrws;
    }
    else if(whteSlds != "none"){
        soldiersCrows=whteSlds;
    }
    console.log("bearish "+bearish(patCandles));
    console.log("bullish "+bullish(patCandles));
}