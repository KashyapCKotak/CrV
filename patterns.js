async function calcPatterns(){
    var uptrend=false;
    var downtrend=false;
    var patCurrData=consChartDataHour.Data;
    var currLength=patCurrData.length;
    var patCloses = [];
    patCurrData.forEach(function (d) {
        patCloses.push(d.close);
    });
    var tu = await isTrendingUp({ values : patCloses });
    var td = await isTrendingDown({ values : patCloses });
    console.log("Uptrend"+tu);
    console.log("Downtrend"+td);
}