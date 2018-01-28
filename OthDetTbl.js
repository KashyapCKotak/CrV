var cryptoCurrencyforOthDet="BTC";
var id={"BTC":"1182","ETH":"7605"};
var currID=id[cryptoCurrencyforOthDet];
var coinSnapshotURL="https://cryptocompare.com/api/data/coinsnapshotfullbyid/?id="+currID+"&callback=?";
console.log(coinSnapshotURL);

var xhttpOthDet = new XMLHttpRequest();
if("withCredentials" in xhttpOthDet)
  console.log("withcred");
//var xhttpOthDet = ("withCredentials" in XMLHttpRequest) ? new XMLHttpRequest() : new XDomainRequest();
xhttpOthDet.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
      console.log("Other details table in");
    coinSnapShot = JSON.parse(xhttpOthDet.responseText);
    var OthDetTableRowOneDom=document.getElementById("OtherDetailsTable").getElementsByTagName("tr")[1].getElementsByTagName("td");
    var OthDetTableRowTwoDom=document.getElementById("OtherDetailsTable").getElementsByTagName("tr")[3].getElementsByTagName("td");
    OthDetTableRowOneDom[0].innerHTML="kashyap";
    OthDetTableRowTwoDom[3].innerHTML="kashyap";
  }
};
xhttpOthDet.open("GET", coinSnapshotURL, true);
xhttpOthDet.send();