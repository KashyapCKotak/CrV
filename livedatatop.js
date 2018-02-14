  var toCurr="INR";
  var cryptoCurrMain = "BTC";
  console.log(cryptoCurrMain);
  var currTopPriceUrl = "https://min-api.cryptocompare.com/data/pricemultifull?fsyms=BTC,ETH,XRP,BCH,LTC,TRX,DASH,BTG,ZEC,XMR,ETC,IOTA,NXT,EOS,NEO&tsyms="+toCurr;
  var directionImgBaseUrl = "dist/img/";
  var count=0;
  //console.log(currTopPriceUrl);
  var currTopPriceObj;
  var currTopPriceAmount;
  var xhttpTopPrice = new XMLHttpRequest();
    xhttpTopPrice.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        currTopPriceObj = JSON.parse(xhttpTopPrice.responseText);
        //console.log(currTopPriceObj);
        updateTopData();
        // while(true){
        setInterval(loadTopData, 5000);
        //}
      }
    };
    xhttpTopPrice.open("GET", currTopPriceUrl, true);
    xhttpTopPrice.send();
  
  function loadTopData(){
    var xhttpTopPrice = new XMLHttpRequest();
    xhttpTopPrice.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        currTopPriceObj = JSON.parse(xhttpTopPrice.responseText);
        //console.log(currTopPriceObj);
        updateTopData();
        //}
      }
    };
    xhttpTopPrice.open("GET", currTopPriceUrl, true);
    xhttpTopPrice.send();
  }

  function updateTopData(){
    
    console.log(count++);
    var pct_color="#aaaaaa";//red:FF5B5B//green:00C605//yellow:fff200
    var pct_text;
    var counter=-1;
    var direction_img="unavailable.png";
    var DOMtop_priceClass=document.getElementsByClassName("top-price");
    var DOMtop_imageClass=document.getElementsByClassName("top-image");
    for(cryptoCurr in currTopPriceObj.DISPLAY){
      //console.log("updating top price data");
      //console.log(currTopPriceObj.DISPLAY[cryptoCurr]);
      counter++;
      var currCryptoCurrObj = currTopPriceObj.DISPLAY[cryptoCurr];
      if("CHANGEPCT24HOUR" in currCryptoCurrObj[toCurr]){
        //console.log("in if");
        pct_text=currCryptoCurrObj[toCurr].CHANGEPCT24HOUR;
        //console.log(pct_text);
        if(pct_text<0){
          pct_color="#FF5B5B";
          var direction_img="down.png";
        }
        else if(pct_text>0){
          pct_color="#00C605";
          var direction_img="up.png";
        }
        else if(pct_text==0){
          pct_color="#f2e500";
          var direction_img="equal.png";
        }
      }
      DOMtop_priceClass[counter].innerHTML=currCryptoCurrObj[toCurr].PRICE+"&nbsp;"+"<span class='top-pct' style='color:"+pct_color+"'>"+pct_text+"%</span>";
      // document.getElementById("mainPriceCurrSymbol")=
      if(cryptoCurrMain == cryptoCurr){
        var exists=document.getElementById("mainPrice");
        if(exists != null){
          document.getElementById("mainPrice").innerHTML=currCryptoCurrObj[toCurr].PRICE;
          currTopPriceAmount=currTopPriceObj.RAW[cryptoCurr][toCurr].PRICE
          //currTopPriceAmount=currTopPriceAmount[toCurr].PRICE;
          document.getElementsByClassName("mainFactsValue")[0].innerHTML=currCryptoCurrObj[toCurr].CHANGE24HOUR;
          document.getElementsByClassName("mainFactsValue")[0].style.color=pct_color;
          document.getElementsByClassName("mainFactsValue")[1].innerHTML=currCryptoCurrObj[toCurr].CHANGEPCT24HOUR+"%";
          document.getElementsByClassName("mainFactsValue")[1].style.color=pct_color;
          
          document.getElementsByClassName("mainFactsValue")[2].innerHTML=currCryptoCurrObj[toCurr].VOLUME24HOUR;
          document.getElementsByClassName("mainFactsValue")[3].innerHTML=currCryptoCurrObj[toCurr].VOLUME24HOURTO;
          
          document.getElementsByClassName("mainFactsTitle")[2].innerHTML="24H Volume "+currCryptoCurrObj[toCurr].FROMSYMBOL;
          document.getElementsByClassName("mainFactsTitle")[3].innerHTML="24H Volume "+currCryptoCurrObj[toCurr].TOSYMBOL;
          
          document.getElementsByClassName("mainFactsValue")[4].innerHTML=currCryptoCurrObj[toCurr].OPEN24HOUR;
          document.getElementsByClassName("mainFactsValue")[5].innerHTML=currCryptoCurrObj[toCurr].HIGH24HOUR;
          document.getElementsByClassName("mainFactsValue")[6].innerHTML=currCryptoCurrObj[toCurr].LOW24HOUR;
        }
      }
      
      DOMtop_imageClass[counter].src=directionImgBaseUrl+direction_img;
    }
  }