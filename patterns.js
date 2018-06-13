async function calcPatterns(){
    var sigArray={
      	MacdMfi:"none",
				MacdTrix:"none",
				MacdAo:"none"
    };
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
        for(var i=currPatData.length-1;i>=currPatData.length-26;i--){
            if(parseFloat(currPatData[i].histogram)<0 && parseFloat(currPatData[i-1].histogram)>0){
                let when=-1;
                (i==currPatData.length-1) ? when=0 : (i>=currPatData.length-12) ? when=12 : (i>=currPatData.length-24) ? when=24 : when=-1;
                if(when==-1)
                    return "-1:-1:0:MACDNoCrs";
                return when+":"+i+":"+"1:"+"MACDCrsUp";
            }
            else if(parseFloat(currPatData[i].histogram)>0 && parseFloat(currPatData[i-1].histogram)<0){
                let when=-1;
                (i==currPatData.length-1) ? when=0 : (i>=currPatData.length-12) ? when=12 : (i>=currPatData.length-24) ? when=24 : when=-1;
                if(when==-1)
                    return "-1:-1:0:MACDNoCrs";
                return when+":"+i+":"+"-1:"+"MACDcrsDown";
            }
        }
    }

    function whichMfiSig(){
        for(var i=currPatData.length-1;i>=currPatData.length-26;i--){
            if(parseFloat(currPatData[i].mfi)>80){
                let when=-1;
                (i==currPatData.length-1) ? when=0 : (i>=currPatData.length-12) ? when=12 : (i>=currPatData.length-24) ? when=24 : when=-1;
                if(when==-1)
                    return "-1:-1:0:MFINotOut";
                return when+":"+i+"1:"+"MFIOut";
            }
            else if(parseFloat(currPatData[i].mfi)<20){
                let when=-1;
                (i==currPatData.length-1) ? when=0 : (i>=currPatData.length-12) ? when=12 : (i>=currPatData.length-24) ? when=24 : when=-1;
                if(when==-1)
                    return "-1:-1:0:MFINotOut";
                return when+":"+i+"-1:"+"MFIOut";
            }
        }
    }
	
		function whichTrixSig(){
        for(var i=currPatData.length-1;i>=currPatData.length-26;i--){
            if(parseFloat(currPatData[i].trix)>0){
                let when=-1;
                (i==currPatData.length-1) ? when=0 : (i>=currPatData.length-12) ? when=12 : (i>=currPatData.length-24) ? when=24 : when=-1;
                if(when==-1)
                    return "-1:-1:0:TrixZero";
                return when+":"+i+"1:"+"TrixAbove";
            }
            else if(parseFloat(currPatData[i].trix)<0){
                let when=-1;
                (i==currPatData.length-1) ? when=0 : (i>=currPatData.length-12) ? when=12 : (i>=currPatData.length-24) ? when=24 : when=-1;
                if(when==-1)
                    return "-1:-1:0:TrixZero";
                return when+":"+i+"-1:"+"TrixBelow";
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
                return when+":"+i+"1:"+"AoAbove";
            }
            else if(parseFloat(currPatData[i].ao)<0){
                let when=-1;
                (i==currPatData.length-1) ? when=0 : (i>=currPatData.length-12) ? when=12 : (i>=currPatData.length-24) ? when=24 : when=-1;
                if(when==-1)
                    return "-1:-1:0:AoZero";
                return when+":"+i+"-1:"+"AoBelow";
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
        else if(currPatData[currPatData.length-1].adx<20){
            return ("range:"+trendSign);
        }
    }
	
		function finaDec(){
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
			decision = (buyCount>sellCount) ? decision="buy" : (sellCount<buyCount) ? "sell" : "hold" ;
			return strength+":"+decision;
		}

    displayNewIndi("macd",true);
    let MACDCrsOv=isMACDCrsOv().split(":");

    displayNewIndi("adx",true);
    let adxTrend=whichAdxTrend();

    displayNewIndi("mfi",true);
    let MFIOut=whichMfiSig().split(":");
	
		displayNewIndi("trix",true);
		let TrixPol=whichTrixSig().split(":");
	
		displayNewIndi("ao",true);
		let aoPol=whichAoSig().split(":");

    console.log(MACDCrsOv,adxTrend, MFIOut);
		
    if(parseInt(MACDCrsOv[0])!=-1 && parseInt(MFIOut[0])!=-1 && parseInt(MACDCrsOv[1])>=parseInt(MFIOut[1]) && parseInt(MACDCrsOv[2])==parseInt(MFIOut[2]))
      sigArray.MacdMfi=(parseInt(MACDCrsOv[2])>0) ? "buy" : "sell";
		
		if(parseInt(MACDCrsOv[0])!=-1 && parseInt(TrixPol[0])!=-1 && parseInt(MACDCrsOv[1])<=parseInt(TrixPol[1]) && parseInt(MACDCrsOv[2])==parseInt(TrixPol[2]))
			sigArray.MacdTrix=(parseInt(MACDCrsOv[2])>0) ? "buy" : "sell";
	
		if(parseInt(MACDCrsOv[0])!=-1 && parseInt(aoPol[0])!=-1 && parseInt(MACDCrsOv[1])<=parseInt(aoPol[1]) && parseInt(MACDCrsOv[2])==parseInt(aoPol[2]))
			sigArray.MacdAo=(parseInt(aoPol[2])>0) ? "buy" : "sell";
	
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