sigArray={};
async function calcPatterns(){
    var quotes={stars:[" the stars indicates that you must (Sign) immediately if you'll (OppSign) in an hour or two!"," if you believe the stars, you may want to (Sign) now and (OppSign) in a couple of hours!"," what your Horoscope says today? My Parrot says that you may want to (Sign) now and (OppSign) immediately for quick profit!"," you may (Sign) now for quick profit! But don't be greedy and take whatever you get."," your short term future looks bright if you (Sign). Be careful... I said 'short term'"],
                mainStrong:["Contact your local zoo. It seems some (BullBear)s have escaped and entered into the market!","(Sign) if you want to prosper!","(Sign)ing now may gift you a vacation to the Moon!","(Sign) now and keep a Pop song ready to dance when you (OppSign)","Whoa! There is so much charge flowing from my electrical brain as I see strong signs for (Sign)ing","(Sign) now and book a luxurious holiday in India!","Some (BullBear)s have broke the jails. Spot for them and inform me. Oh, btw, are you one of those (BullBear)s? If yes go ahead and (Sign), I won't catch you..."],
                mainWeak:["Your pet (BullBear)s seems to be really weak. Feed him well and (Sign) cautiously.","(BullBear)s are waking up from sleep. Watch this space for a chance of sighting! Weak (Sign) signs visible","Hmmm... Can't say much... My electrical brain is confused watching the market! But I can see weak signs which point towards (Sign)ing.","Hmmm... my Artificial Intelligence is pretty confused! Consult a Human instead! But I can tell you that weak signs of (Sign)ing are visible.","I think its time to (Sign), but current market can't be predicted with 0s & 1s. Go find a human expert & please don't ask me for a contact :)"],
                weakHold:["Hmmm... Can't quite decide. According to me, you may hold.","Hmmm... My artificial brain is unable to decide. Consult a human! But my gut feeling is 'Hold'","Now I know that Future Prediction is so difficult! May be you can Hold... Not sure.","There were sparks in my system after seeing such a complex market! I would say Hold... but not sure.","I am dizzing by seeing this market... By the time I consult my programmer doctor, I can tell you to Hold. But remember, I am not sure."],
                strongHold:["Spectacular fight going on between Bulls & Bears. Hold and enjoy the show! You can buy lows & sell highs","RagingBulls & FierceBears - support your team and hold for now! You can buy lows & sell highs.","JUST HODL!!","My Artificial Intelligence sees a ranging market. Go long at lows and short at highs.","I can see a lot of ups and downs in the market... You must have developed pain in your neck. Don't worry, just Hold!","I would just say: Sit back, relax and hold! But I you are too active trader for this, Buy the lows and sell the highs","Just go Long when you see a low, go Short when you see high. Remember- Don't be too greedy!"],
                marketSent:["My robotic brain sees a pretty (PosNeg) market sentiment.","The news predict a (BullBear)ish market ahead.","My robotic wind sensors are confirming the smell of a lots of (BullBear)s around. Be careful... They may be around you."],
                outage:["There were some short circuits in my brain while predicting future! I am in a self healing mode right now..."]};
    sigArray={
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
        RsiMacd:"none",
        SldsCrws:"none"
    };
    /**
     * Check for abdndbaby2 function to consider even if adx trend is ranging
     */
    var uptrend=false;
    var downtrend=false;
    const period=204;
    var patCurrData=consChartDataHour.Data;
    currPatDataLen=744;
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
		for(var i=currPatDataLen-1;i>=currPatDataLen-26;i--){
            // console.log(currPatData[i].open, currPatData[i].close);
            if((Math.abs(parseFloat(currPatData[i].open)-parseFloat(currPatData[i].close))*100/Math.abs(high12-low12))<=0.5){
                let when=-1;
                (i==currPatDataLen-1) ? when=0 : (i>=currPatDataLen-12) ? when=12 : (i>=currPatDataLen-24) ? when=24 : when=-1;
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
        for(var i=currPatDataLen-1;i>=currPatDataLen-26;i--){
            let when=-1;
            let engulfing=undefined;
            if((parseFloat(currPatData[i].open)<parseFloat(currPatData[i-1].close)) && (parseFloat(currPatData[i].close)>parseFloat(currPatData[i-1].open))){
                (i==currPatDataLen-1) ? when=0 : (i>=currPatDataLen-12) ? when=12 : (i>=currPatDataLen-24) ? when=24 : when=-1;
                engulfing=when+":"+i+":1:"+"bullish";
            }
            else if((parseFloat(currPatData[i].open)>parseFloat(currPatData[i-1].close)) && (parseFloat(currPatData[i].close)<parseFloat(currPatData[i-1].open))){
                (i==currPatDataLen-1) ? when=0 : (i>=currPatDataLen-12) ? when=12 : (i>=currPatDataLen-24) ? when=24 : when=-1;
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
        for(var i=currPatDataLen-1;i>=currPatDataLen-26;i--){
            let when=-1;
            (i==currPatDataLen-1) ? when=0 : (i>=currPatDataLen-12) ? when=12 : (i>=currPatDataLen-24) ? when=24 : when=-1;
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

    function isBlckCrws(){
        let blckCrws=null;
        // let currPatData = [{open:7707.82,high:7709.61,close:7684.76,low:7682.37},{open:7684.76,high:7695.64,close:7675.04,low:7672.36},{open:7675.76,high:7677.15,close:7651.54,low:7647.49}];
        // let currPatDataLen=3;
        for(var i=currPatDataLen-1;i>=currPatDataLen-26;i--){
            let when=-1;
            (i==currPatDataLen-1) ? when=0 : (i>=currPatDataLen-12) ? when=12 : (i>=currPatDataLen-24) ? when=24 : when=-1;
            (currPatData[i-2].open>currPatData[i-2].close) ? 
                        ((currPatData[i-1].open>currPatData[i-1].close) && (currPatData[i-2].high>currPatData[i-1].high) && (currPatData[i-2].close>currPatData[i-1].close)) ? 
                            ((currPatData[i].open>currPatData[i].close) && (currPatData[i-1].high>currPatData[i].high) && (currPatData[i-1].close>currPatData[i].close)) ?
                            blckCrws=when+":"+i+":2:strngCrws" : blckCrws="-1:-1:0:strngCrws" 
                        : blckCrws="-1:-1:0:strngCrws"
                    : (currPatData[i-1].open>currPatData[i-1].close) ? 
                        ((currPatData[i].open>currPatData[i].close) && (currPatData[i-1].high>currPatData[i].high) && (currPatData[i-1].close>currPatData[i].close)) ? 
                        blckCrws=when+":"+i+":1:weakCrws" : blckCrws="-1:-1:0:strngCrws"
                    : blckCrws="-1:-1:0:strngCrws";
        }
        return blckCrws;
    }
    
    // function isBlckCrws(obj){
    //     var len=obj.open.length;
    //     var blckCrws=(obj.open[len-3]>obj.close[len-3]) ? 
    //                 ((obj.open[len-2]>obj.close[len-2]) && (obj.high[len-3]>obj.high[len-2]) && (obj.close[len-3]>obj.close[len-2])) ? 
    //                     ((obj.open[len-1]>obj.close[len-1]) && (obj.high[len-2]>obj.high[len-1]) && (obj.close[len-2]>obj.close[len-1])) ?
    //                     "strong" : "none" 
    //                 : "none" 
    //             : (obj.open[len-2]>obj.close[len-2]) ? 
    //                 ((obj.open[len-1]>obj.close[len-1]) && (obj.high[len-2]>obj.high[len-1]) && (obj.close[len-2]>obj.close[len-1])) ? 
    //                 "weak" : "none"
    //               : "none";
    //     return blckCrws;
    // }

    function isWhteSlds(){
        let whteSlds=null;
        for(var i=currPatDataLen-1;i>=currPatDataLen-26;i--){
            let when=-1;
            (i==currPatDataLen-1) ? when=0 : (i>=currPatDataLen-12) ? when=12 : (i>=currPatDataLen-24) ? when=24 : when=-1;
            (currPatData[i-2].open<currPatData[i-2].close) ? 
                    ((currPatData[i-1].open<currPatData[i-1].close) && (currPatData[i-2].low<currPatData[i-1].low) && (currPatData[i-2].close<currPatData[i-1].close)) ? 
                        ((currPatData[i].open<currPatData[i].close) && (currPatData[i-1].low<currPatData[i].low) && (currPatData[i-1].close<currPatData[i].close)) ?
                        whteSlds=when+":"+i+":2:strngSlds" : whteSlds="-1:-1:0:strngSlds" 
                    : whteSlds="-1:-1:0:strngSlds"  
                : (currPatData[i-1].open>currPatData[i-1].close) ? 
                    ((currPatData[i].open>currPatData[i].close) && (currPatData[i-1].high>currPatData[i].high) && (currPatData[i-1].close>currPatData[i].close)) ? 
                    whteSlds=when+":"+i+":1:weakSlds" : whteSlds="-1:-1:0:strngSlds" 
                  : whteSlds="-1:-1:0:strngSlds" ;
        }
        return whteSlds;
    }

    // function isWhteSlds(obj){
    //     var len=obj.length;
    //     var whteSlds=(obj.open[len-3]<obj.close[len-3]) ? 
    //                 ((obj.open[len-2]<obj.close[len-2]) && (obj.low[len-3]<obj.low[len-2]) && (obj.close[len-3]<obj.close[len-2])) ? 
    //                     ((obj.open[len-1]<obj.close[len-1]) && (obj.low[len-2]<obj.low[len-1]) && (obj.close[len-2]<obj.close[len-1])) ?
    //                     "strong" : "none" 
    //                 : "none" 
    //             : (obj.open[len-2]>obj.close[len-2]) ? 
    //                 ((obj.open[len-1]>obj.close[len-1]) && (obj.high[len-2]>obj.high[len-1]) && (obj.close[len-2]>obj.close[len-1])) ? 
    //                 "weak" : "none"
    //               : "none";
    //     return whteSlds;
    // }

    function isMACDCrsOv(){
        for(var i=currPatDataLen-1;i>=currPatDataLen-26;i--){
            if(parseFloat(currPatData[i].histogram)>0 && parseFloat(currPatData[i-1].histogram)<0){
                let when=-1;
                (i==currPatDataLen-1) ? when=0 : (i>=currPatDataLen-12) ? when=12 : (i>=currPatDataLen-24) ? when=24 : when=-1;
                if(when==-1)
                    return "-1:-1:0:MACDNoCrs";
                return when+":"+i+":"+"1:"+"MACDcrsUp";
            }
            else if(parseFloat(currPatData[i].histogram)<0 && parseFloat(currPatData[i-1].histogram)>0){
                let when=-1;
                (i==currPatDataLen-1) ? when=0 : (i>=currPatDataLen-12) ? when=12 : (i>=currPatDataLen-24) ? when=24 : when=-1;
                if(when==-1)
                    return "-1:-1:0:MACDNoCrs";
                return when+":"+i+":"+"-1:"+"MACDCrsDown";
            }
        }
        return "-1:-1:0:MACDNoCrs";
    }

    function whichMfiSig(){
        for(var i=currPatDataLen-1;i>=currPatDataLen-26;i--){
            if(parseFloat(currPatData[i].mfi)>80){
                let when=-1;
                (i==currPatDataLen-1) ? when=0 : (i>=currPatDataLen-12) ? when=12 : (i>=currPatDataLen-24) ? when=24 : when=-1;
                if(when==-1)
                    return "-1:-1:0:MFINotOut";
                return when+":"+i+":1:"+"MFIUpOut";
            }
            else if(parseFloat(currPatData[i].mfi)<20){
                let when=-1;
                (i==currPatDataLen-1) ? when=0 : (i>=currPatDataLen-12) ? when=12 : (i>=currPatDataLen-24) ? when=24 : when=-1;
                if(when==-1)
                    return "-1:-1:0:MFINotOut";
                return when+":"+i+":-1:"+"MFIDownOut";
            }
        }
        return "-1:-1:0:MFINotOut";
    }
	
	function whichRsiSig(){
        for(var i=currPatDataLen-1;i>=currPatDataLen-26;i--){
            if(parseFloat(currPatData[i].rsi)>70){
                let when=-1;
                (i==currPatDataLen-1) ? when=0 : (i>=currPatDataLen-12) ? when=12 : (i>=currPatDataLen-24) ? when=24 : when=-1;
                if(when==-1)
                    return "-1:-1:0:RSINotOut";
                return when+":"+i+":1:"+"RSIUpOut";
            }
            else if(parseFloat(currPatData[i].rsi)<30){
                let when=-1;
                (i==currPatDataLen-1) ? when=0 : (i>=currPatDataLen-12) ? when=12 : (i>=currPatDataLen-24) ? when=24 : when=-1;
                if(when==-1)
                    return "-1:-1:0:RSINotOut";
                return when+":"+i+":-1:"+"RSIDownOut";
            }
        }
        return "-1:-1:0:RSINotOut";
    }
	
	function whichTrixSig(){
        for(var i=currPatDataLen-1;i>=currPatDataLen-26;i--){
            if(parseFloat(currPatData[i].trix)>0){
                let when=-1;
                (i==currPatDataLen-1) ? when=0 : (i>=currPatDataLen-12) ? when=12 : (i>=currPatDataLen-24) ? when=24 : when=-1;
                if(when==-1)
                    return "-1:-1:0:TrixZero";
                return when+":"+i+":1:"+"TrixAbove";
            }
            else if(parseFloat(currPatData[i].trix)<0){
                let when=-1;
                (i==currPatDataLen-1) ? when=0 : (i>=currPatDataLen-12) ? when=12 : (i>=currPatDataLen-24) ? when=24 : when=-1;
                if(when==-1)
                    return "-1:-1:0:TrixZero";
                return when+":"+i+":-1:"+"TrixBelow";
            }
        }
        return "-1:-1:0:TrixZero";
    }
	
	function whichAoSig(){
        for(var i=currPatDataLen-1;i>=currPatDataLen-26;i--){
            if(parseFloat(currPatData[i].ao)>0){
                let when=-1;
                (i==currPatDataLen-1) ? when=0 : (i>=currPatDataLen-12) ? when=12 : (i>=currPatDataLen-24) ? when=24 : when=-1;
                if(when==-1)
                    return "-1:-1:0:AoZero";
                return when+":"+i+":1:"+"AoAbove";
            }
            else if(parseFloat(currPatData[i].ao)<0){
                let when=-1;
                (i==currPatDataLen-1) ? when=0 : (i>=currPatDataLen-12) ? when=12 : (i>=currPatDataLen-24) ? when=24 : when=-1;
                if(when==-1)
                    return "-1:-1:0:AoZero";
                return when+":"+i+":-1:"+"AoBelow";
            }
        }
        return "-1:-1:0:AoZero";
    }

    function whichAdxTrend(){
        let trendSign="none";
        trendSign=(currPatData[currPatDataLen-1].pdi-currPatData[currPatDataLen-1].mdi>0) ? trendSign="up" : trendSign="down";
        trendSign=(currPatData[currPatDataLen-1].pdi-currPatData[currPatDataLen-1].mdi==0) ?  
                    (currPatData[currPatDataLen-2].pdi-currPatData[currPatDataLen-2].mdi>0) ? 
                        trendSign="up"
                    : trendSign="down"
                : trendSign=trendSign;
        console.log(currPatData);
        console.log(currPatDataLen);
        console.log(currPatData[currPatDataLen-1].adx);
        if(currPatData[currPatDataLen-1].adx>25){
            return ("trend:"+trendSign);
        }
        else if(currPatData[currPatDataLen-1].adx<25){
            return ("range:"+trendSign);
        }
        else if(currPatData[currPatDataLen-1].adx==25){
            return ("range:"+trendSign);
        }
        return ("unknown:up");
    }
	
    function finalDec(){
         buyCount=0;  sellCount=0;  noneCount=0;  decision=0;
         strength="hold";  effStrngthCnt=0;  sign="?";  oppSign="?";  bullBear="?";  posNeg="?";
         mainString="";  starString="";  marketString="";
        for(let signal in sigArray){
            if(sigArray[signal]=="buy")
                buyCount++;
            else if(sigArray[signal]=="sell")
                sellCount++;
            else if(sigArray[signal]=="none")
                noneCount++;
        }
        // Stars:"none",
        ////////////////////////////////////////////////////////////////////
        // AdxTrend:"unknown",
        ////////////////////////////////////////////////////////////////////
        // MacdMfi:"none",
        // MacdTrix:"none",
        // MacdAo:"none",
        // DojiTrend:"none",
        // RsiMacd:"none",
        // OnlyMacd:"none",
        // Engulfing:"none",
        // OnlyRsi:"none",
        // RsiEngulfing:"none",
        // RsiMacd:"none",
        // SldsCrws:"none"
        effStrngthCnt=Math.abs(buyCount-sellCount);
        (effStrngthCnt>=3) ? strength="strong" : (effStrngthCnt==2) ? strength="weak" : (effStrngthCnt<2) ? strength="hold" : strength="hold";
        if(strength=="strong"){
            let noOfQuotes=quotes.mainStrong.length;
            (buyCount>sellCount) ? (sign="Buy", oppSign="Sell", bullBear="Bull", posNeg="Positive") : (sign="Sell", oppSign="Buy", bullBear="Bear", posNeg="Negative");
            let randomQuote = Math.floor(Math.random() * (noOfQuotes-1 - 0 + 1)) + 0;
            mainString=quotes.mainStrong[randomQuote];
            mainString=mainString.replace(/\(Sign\)/g,sign); mainString=mainString.replace(/\(OppSign\)/g,oppSign); mainString=mainString.replace(/\(BullBear\)/g,bullBear); mainString=mainString.replace(/\(PosNeg\)/g,posNeg);
        }
        else if(strength=="weak"){   
            console.log("here weak sign");
            let noOfQuotes=quotes.mainWeak.length;
            (buyCount>sellCount) ? (sign="Buy", oppSign="Sell", bullBear="Bull", posNeg="Positive") : (sign="Sell", oppSign="Buy", bullBear="Bear", posNeg="Negative");
            let randomQuote = Math.floor(Math.random() * (noOfQuotes-1 - 0 + 1)) + 0;
            mainString=quotes.mainWeak[randomQuote];
            mainString=mainString.replace(/\(Sign\)/g,sign); mainString=mainString.replace(/\(OppSign\)/g,oppSign); mainString=mainString.replace(/\(BullBear\)/g,bullBear); mainString=mainString.replace(/\(PosNeg\)/g,posNeg);
        }
        else if(strength=="hold" && adxTrend[0]=="range"){            
            let noOfQuotes=quotes.strongHold.length;
            (buyCount>sellCount) ? (sign="Buy", oppSign="Sell", bullBear="Bull", posNeg="Positive") : (sign="Sell", oppSign="Buy", bullBear="Bear", posNeg="Negative");
            let randomQuote = Math.floor(Math.random() * (noOfQuotes-1 - 0 + 1)) + 0;
            mainString=quotes.strongHold[randomQuote];
            mainString=mainString.replace(/\(Sign\)/g,sign); mainString=mainString.replace(/\(OppSign\)/g,oppSign); mainString=mainString.replace(/\(BullBear\)/g,bullBear); mainString=mainString.replace(/\(PosNeg\)/g,posNeg);
        }
        else if(strength=="hold" && adxTrend[0]=="trend"){            
            let noOfQuotes=quotes.weakHold.length;
            (buyCount>sellCount) ? (sign="Buy", oppSign="Sell", bullBear="Bull", posNeg="Positive") : (sign="Sell", oppSign="Buy", bullBear="Bear", posNeg="Negative");
            let randomQuote = Math.floor(Math.random() * (noOfQuotes-1 - 0 + 1)) + 0;
            mainString=quotes.weakHold[randomQuote];
            mainString=mainString.replace(/\(Sign\)/g,sign); mainString=mainString.replace(/\(OppSign\)/g,oppSign); mainString=mainString.replace(/\(BullBear\)/g,bullBear); mainString=mainString.replace(/\(PosNeg\)/g,posNeg);
        }

        if(sigArray.Stars=="buy"){
            let noOfQuotes=quotes.stars.length;
            sign="Buy", oppSign="Sell", bullBear="Bull", posNeg="Positive";
            let randomQuote = Math.floor(Math.random() * (noOfQuotes-1 - 0 + 1)) + 0;
            starString=quotes.stars[randomQuote];
            starString=starString.replace(/\(Sign\)/g,sign); starString=starString.replace(/\(OppSign\)/g,oppSign); starString=starString.replace(/\(BullBear\)/g,bullBear); starString=starString.replace(/\(PosNeg\)/g,posNeg);
            starString="However,"+starString;
        }
        else if(sigArray.Stars=="sell"){
            let noOfQuotes=quotes.stars.length;
            sign="Sell", oppSign="Buy", bullBear="Bear", posNeg="Negative";
            let randomQuote = Math.floor(Math.random() * (noOfQuotes-1 - 0 + 1)) + 0;
            starString=quotes.stars[randomQuote];
            starString=starString.replace(/\(Sign\)/g,sign); starString=starString.replace(/\(OppSign\)/g,oppSign); starString=starString.replace(/\(BullBear\)/g,bullBear); starString=starString.replace(/\(PosNeg\)/g,posNeg);
            starString="However,"+starString;
        }

        if(document.getElementById("marketSentiment").textContent=="Positive"){
            let noOfQuotes=quotes.marketSent.length;
            sign="Buy", oppSign="Sell", bullBear="Bull", posNeg="Positive";
            let randomQuote = Math.floor(Math.random() * (noOfQuotes-1 - 0 + 1)) + 0;
            marketString=quotes.marketSent[randomQuote];
            marketString=marketString.replace(/\(Sign\)/g,sign); marketString=marketString.replace(/\(OppSign\)/g,oppSign); marketString=marketString.replace(/\(BullBear\)/g,bullBear); marketString=marketString.replace(/\(PosNeg\)/g,posNeg);
            marketString=" "+marketString;
        }
        else if(document.getElementById("marketSentiment").textContent=="Negative"){
            let noOfQuotes=quotes.marketSent.length;
            sign="Sell", oppSign="Buy", bullBear="Bear", posNeg="Negative";
            let randomQuote = Math.floor(Math.random() * (noOfQuotes-1 - 0 + 1)) + 0;
            marketString=quotes.marketSent[randomQuote];
            marketString=marketString.replace(/\(Sign\)/g,sign); marketString=marketString.replace(/\(OppSign\)/g,oppSign); marketString=marketString.replace(/\(BullBear\)/g,bullBear); marketString=marketString.replace(/\(PosNeg\)/g,posNeg);
            marketString=" "+marketString;
        }
        // marketString=" I am still learning to identify Market Sentiment."
        var finalString=mainString+starString+marketString;  
        // document.getElementById("AIPredictionSpan").innerHTML=finalString;
        var i = 0;
        var speed = 40; /* The speed/duration of the effect in milliseconds */
        function typeWriter() {
            if (i < finalString.length) {
                document.getElementById("AIPredictionSpan").innerHTML += finalString.charAt(i);
                i++;
                typewriterTimer=setTimeout(typeWriter, speed);
            }
        }
        document.getElementById("AIPredictionSpan").innerHTML="";
        typeWriter();
        return finalString;
        // strength = ((buyCount+sellCount)>noneCount) ? "strong" : "weak";
        // decision = (buyCount>sellCount) ? decision="buy" : (sellCount>buyCount) ? "sell" : "hold" ;
        // return strength+":"+decision;
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

    displayNewIndi("bollinger",true);
	
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
                sigArray.Stars="buy";
            else if(abdndBby2=="bearish" || stars[3].split(":")[2]==1)
                sigArray.Stars="sell";
        }
    }

    let blckCrws=isBlckCrws().split(":");
    let whteSlds=isWhteSlds().split(":");

    if(stars[0].split(":")[2]==1 && sigArray.Stars=="none"){
        sigArray.Stars="buy";
    }
    if(stars[2].split(":")[2]==1 && sigArray.Stars=="none"){
        sigArray.Stars="sell";
    }

    console.log(doji,MACDCrsOv,adxTrend,MFIOut,TrixPol, aoPol, engulfing, rsiOut,stars,blckCrws,whteSlds);
	
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

    if(parseInt(blckCrws[0])!=-1 || parseInt(whteSlds[0])!=-1){
        if(parseInt(whteSlds[1])>parseInt(blckCrws[1]))
            sigArray.SldsCrws="buy";
        else if(parseInt(blckCrws[1])>parseInt(whteSlds[1]))
            sigArray.SldsCrws="sell";
    }

    (parseInt(MACDCrsOv[2])>0) ? sigArray.OnlyMacd="buy" : (parseInt(MACDCrsOv[2])<0) ? sigArray.OnlyMacd="sell" : sigArray.OnlyMacd="none";
    (parseInt(engulfing[2])>0) ? sigArray.OnlyMacd="buy" : (parseInt(engulfing[2])<0) ? sigArray.OnlyMacd="sell" : sigArray.OnlyMacd="none";
    (adxTrend[0]=="trend") ? sigArray.AdxTrend="trend" : (adxTrend[0]=="range") ? sigArray.AdxTrend="range" : sigArray.AdxTrend="unknown";
    (parseInt(engulfing[2])==1) ? sigArray.Engulfing="buy" : (parseInt(engulfing[2])==-1) ? sigArray.Engulfing="sell" : sigArray.Engulfing="none";
    (parseInt(rsiOut[2])==-1) ? sigArray.OnlyRsi="buy" : (parseInt(rsiOut[2])==1) ? sigArray.OnlyRsi="sell" : sigArray.OnlyRsi="none" ;
    
    
	indiDisplayed=false;		
    console.log(sigArray);
    console.log(finalDec());
    
    /////////////////////////////////////// Get Trend //////////////////////////////////////////
    
//     displayNewIndi("sma20",true);
//     // console.log(currPatData);
//     currPatData=currPatData.slice(currPatDataLen-168);
//     // console.log(currPatData);
//     var sma168High=0,smaDayHigh=0,smaFHHigh=0,smaSHHigh=0;
//     var sma168Low=Number.MAX_VALUE,smaDayLow=Number.MAX_VALUE,smaFHLow=Number.MAX_VALUE,smaSHLow=Number.MAX_VALUE;
//     var dayCntr=0;
//     var firstHalfCntr=0;
//     var SecondHalfCntr=0
//     currPatData.forEach(function (d){
//         dayCntr++;
//         if (dayCntr>(168-24)){
//             if(d.sma>smaDayHigh)
//                 smaDayHigh=d.sma;
//             if(d.sma<smaDayLow)
//                 smaDayLow=d.sma;
//             firstHalfCntr++;
//             SecondHalfCntr++;
//             if(firstHalfCntr<13){
//                 if(d.sma>smaFHHigh)
//                     smaFHHigh=d.sma;
//                 if(d.sma<smaFHLow)
//                     smaFHLow=d.sma;
//             }
//             if(SecondHalfCntr>12){
//                 if(d.sma>smaSHHigh)
//                     smaSHHigh=d.sma;
//                 if(d.sma<smaSHLow)
//                     smaSHLow=d.sma;
//             }
//         }
//         if(parseFloat(d.sma)>sma168High)
//             sma168High=parseFloat(d.sma);
//         if(parseFloat(d.sma)<sma168Low)
//             sma168Low=parseFloat(d.sma);
//     });
//     var dayPat=currPatData.slice(168-24);
//     var twelveHPat1=dayPat.slice(0,24);
//     var twelveHPat2=dayPat.slice(24);
//     /////// Identify Trend ////////
    
//     /////// End Identify Trend ////////


//     console.log(sma168High,smaDayHigh,smaFHHigh,smaSHHigh);
//     console.log(sma168Low,smaDayLow,smaFHLow,smaSHLow);

//     /////////////////////////////////////////////////////////////////////////////////
//     // console.log(patCandles);
//     // console.log(patCandles.open[period-1],patCandles.close[period-1]);
//     // console.log(patCandles.open[period],patCandles.close[period]);
//     console.log(patCloses);
//     var tu = await isTrendingUp({ values : patCloses });
//     var td = await isTrendingDown({ values : patCloses });
//     console.log("Uptrend"+tu);
//     console.log("Downtrend"+td);
// //     var doji=isDoji(patCandles.open[period-1],patCandles.close[period-1]);
// //     console.log("DOJI: "+doji);
// //     if(doji){
// //         if((patCandles.open[period-1]-patCandles.close[period-1])<0)
// //             finalPredict=-5;
// //         else if((patCandles.open[period-1]-patCandles.close[period-1])>0)
// //             finalPredict=5;
// //         else
// //             finalPredict=0;
// //     }
//     //console.log(threeblackcrows(patCandles));
//     var soldiersCrows=undefined
//     var blckCrws=isBlckCrws(patCandles);
//     var whteSlds=isBlckCrws(patCandles);
//     if(blckCrws != "none"){
//         soldiersCrows=blckCrws;
//     }
//     else if(whteSlds != "none"){
//         soldiersCrows=whteSlds;
//     }
//     console.log("bearish "+bearish(patCandles));
//     console.log("bullish "+bullish(patCandles));
}