async function calcPatterns(){
    var uptrend=false;
    var downtrend=false;
    const period=12;
    var patCurrData=consChartDataHour.Data;
    patCurrData=patCurrData.slice(0,patCurrData.length-1);
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
        if((Math.abs(parseFloat(open)-parseFloat(close))*100/Math.abs(high12-low12))<=1.0){
            return true;
        }
        else
            return false;
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
    console.log(threeblackcrows(patCandles));

}