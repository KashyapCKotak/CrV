var cryptoCurrencyforOthDet="BTC";
var id={"BTC":"1182","ETH":"7605"};
var currID=id[cryptoCurrencyforOthDet];
var coinListUrl="https://min-api.cryptocompare.com/data/all/coinlist";
var coinsGeneralInfo="https://min-api.cryptocompare.com/data/coin/generalinfo?fsyms="+globalCryptoValue+"&tsym="+globalFiatValue;

var othDetDom=document.getElementById("OtherDetailsTable").getElementsByTagName("tr");
var cells1=othDetDom[1].getElementsByTagName("td");
var cells2=othDetDom[3].getElementsByTagName("td");

var xhttpOthDet2 = new XMLHttpRequest();
xhttpOthDet2.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    //console.log("Other Details Start 1");
    var othDetails = JSON.parse(xhttpOthDet2.responseText).Data[0];
    cells1[1].innerHTML=othDetails.CoinInfo.Algorithm;
    cells1[2].innerHTML=othDetails.CoinInfo.ProofType;
    cells1[3].innerHTML=othDetails.CoinInfo.BlockTime;
    cells2[0].innerHTML=othDetails.ConversionInfo.Supply;
    cells2[1].innerHTML=othDetails.CoinInfo.BlockNumber;
    cells2[2].innerHTML=othDetails.CoinInfo.NetHashesPerSecond;
    cells2[3].innerHTML=othDetails.CoinInfo.BlockReward;
    //console.log("Other Details End 1");
  }
};
xhttpOthDet2.open("GET", coinsGeneralInfo, true);
xhttpOthDet2.send();

//console.log(typeof coinlist);

if (typeof coinlist == 'undefined') {
  //console.log("undeifned");
  var xhttpOthDet1 = new XMLHttpRequest();
  xhttpOthDet1.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //console.log("Other Details Start 2");
      var currSupply = JSON.parse(xhttpOthDet1.responseText);
      //console.log(currSupply);
      cells1[0].innerHTML=currSupply.Data[globalCryptoValue].TotalCoinSupply;
      //console.log("Other Details End 2");
    }
  };
  xhttpOthDet1.open("GET", coinListUrl, true);
  xhttpOthDet1.send();
}
