  // var globalFiatValue="USD";
  // var globalCryptoValue = "BTC";
  //console.log(globalCryptoValue);
  //console.log("Top Data Loading Started");
  if (typeof globalFiatValue!==undefined)
    globalFiatValue="USD";
  if (typeof globalCryptoValue!==undefined)
    globalCryptoValue="BTC";
  var currTopPriceUrl = "https://min-api.cryptocompare.com/data/pricemultifull?fsyms=BTC,ETH,XRP,BCH,LTC,TRX,DASH,BTG,ZEC,XMR,ETC,IOTA,NXT,EOS,NEO&tsyms="+globalFiatValue;
  var mainPriceUrlIfNotInTop = "https://min-api.cryptocompare.com/data/pricemultifull?fsyms="+globalCryptoValue+"&tsyms="+globalFiatValue;
  var directionImgBaseUrl = "dist/img/";
  var count=0;
  var firstLoad = true;
  var cryptoInTop = false;
  //console.log(currTopPriceUrl);
  var currTopPriceObj;
  currTopPriceAmount=0;
  var xhttpTopPrice = new XMLHttpRequest();
    xhttpTopPrice.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        currTopPriceObj = JSON.parse(xhttpTopPrice.responseText);
        //console.log(currTopPriceObj);
        updateTopData();
        // while(true){
        setInterval(loadTopData, 10000);
        //}
      }
    };
    xhttpTopPrice.open("GET", currTopPriceUrl, true);
    xhttpTopPrice.send();
  
  function changeAllTop(){
    currTopPriceUrl = "https://min-api.cryptocompare.com/data/pricemultifull?fsyms=BTC,ETH,XRP,BCH,LTC,TRX,DASH,BTG,ZEC,XMR,ETC,IOTA,NXT,EOS,NEO&tsyms="+globalFiatValue;
    mainPriceUrlIfNotInTop = "https://min-api.cryptocompare.com/data/pricemultifull?fsyms="+globalCryptoValue+"&tsyms="+globalFiatValue;
    count=0;
    firstLoad = true;
    cryptoInTop = false;
    currTopPriceObj=null;
    currTopPriceAmount=0;
    loadTopData();
  }

  function loadTopData(){
    var xhttpTopPrice = new XMLHttpRequest();
    xhttpTopPrice.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        currTopPriceObj = JSON.parse(xhttpTopPrice.responseText);
        //console.log(currTopPriceObj);
        discardAllPulseStyle();
        cryptoInTop=false;
        updateTopData();
        //}
      }
    };
    xhttpTopPrice.open("GET", currTopPriceUrl, true);
    xhttpTopPrice.send();
  }

  function discardAllPulseStyle(){
    var topPriceDOMs=document.getElementsByClassName("top-price");
    for(var i=0; i < topPriceDOMs.length; i++){
      // topPriceDOMs[topPriceDOM].style.animationDuration="2s";//dummy animation, not in css
      topPriceDOMs[i].style.animationName="noPulse";
    }
    // setTimeout(function(){updateTopData();},2000); 
  }

  function updateTopData(){
    
    console.log(count++);
    var pct_color="#aaaaaa";//red:FF5B5B//green:00C605//yellow:fff200
    var pct_text;
    var counter=-1;
    var direction_img="unavailable.png";
    var pulseColorStyle="";
    var DOMtop_priceClass=document.getElementsByClassName("top-price");
    var DOMtop_imageClass=document.getElementsByClassName("top-image");
    for(cryptoCurr in currTopPriceObj.DISPLAY){
      //console.log("updating top price data");
      //console.log(currTopPriceObj.DISPLAY[cryptoCurr]);
      counter++;
      var currCryptoCurrObj = currTopPriceObj.DISPLAY[cryptoCurr];
      if("CHANGEPCT24HOUR" in currCryptoCurrObj[globalFiatValue]){
        //console.log("in if");
        pct_text=currCryptoCurrObj[globalFiatValue].CHANGEPCT24HOUR;
        //console.log(pct_text);
        if(pct_text<0){
          pct_color="#FF5B5B";
          mainpctcolor="#FF5B5B";
          direction_img="down.png";
          pulseColorStyle="pulseColorRedTop";
        }
        else if(pct_text>0){
          pct_color="#00C605";
          mainpctcolor="#228b22";
          direction_img="up.png";
          pulseColorStyle="pulseColorGreenTop";
        }
        else if(pct_text==0){
          pct_color="#f2e500";
          mainpctcolor="#f2e500";
          direction_img="equal.png";
          pulseColorStyle="pulseColorYellowTop";
        }
      }
      
      if(!firstLoad)
        if(parseFloat((DOMtop_priceClass[counter].childNodes[0].nodeValue).replace(/[^0-9.]/g, ""))<parseFloat((currCryptoCurrObj[globalFiatValue].PRICE).replace(/[^0-9.]/g, ""))){
          pulseColorStyle="pulseColorGreenTop";
        }
        else if(parseFloat((DOMtop_priceClass[counter].childNodes[0].nodeValue).replace(/[^0-9.]/g, ""))>parseFloat((currCryptoCurrObj[globalFiatValue].PRICE).replace(/[^0-9.]/g, ""))){
          pulseColorStyle="pulseColorRedTop";
        }
        else{
          pulseColorStyle="noPulse";
        }

      DOMtop_priceClass[counter].innerHTML=currCryptoCurrObj[globalFiatValue].PRICE+"&nbsp;"+"<span class='top-pct' style='color:"+pct_color+"'>"+pct_text+"%</span>";
      DOMtop_priceClass[counter].style.animationDuration="2s";
      DOMtop_priceClass[counter].style.animationName=pulseColorStyle;
      
      // document.getElementById("mainPriceCurrSymbol")=
      // if(globalCryptoValue == cryptoCurr){
      //   cryptoInTop = true;
      //   var exists=document.getElementById("mainPrice");
      //   if(exists != null){
      //     document.getElementById("mainPrice").innerHTML=currCryptoCurrObj[globalFiatValue].PRICE;
      //     currTopPriceAmount=currTopPriceObj.RAW[cryptoCurr][globalFiatValue].PRICE;
      //     //currTopPriceAmount=currTopPriceAmount[globalFiatValue].PRICE;
      //     document.getElementsByClassName("mainFactsValue")[0].innerHTML=currCryptoCurrObj[globalFiatValue].CHANGE24HOUR;
      //     document.getElementsByClassName("mainFactsValue")[0].style.color=mainpctcolor;
      //     document.getElementsByClassName("mainFactsValue")[1].innerHTML=currCryptoCurrObj[globalFiatValue].CHANGEPCT24HOUR+"%";
      //     document.getElementsByClassName("mainFactsValue")[1].style.color=mainpctcolor;
          
      //     document.getElementsByClassName("mainFactsValue")[2].innerHTML=currCryptoCurrObj[globalFiatValue].VOLUME24HOUR;
      //     document.getElementsByClassName("mainFactsValue")[3].innerHTML=currCryptoCurrObj[globalFiatValue].VOLUME24HOURTO;
          
      //     document.getElementsByClassName("mainFactsTitle")[2].innerHTML="24H Volume "+currCryptoCurrObj[globalFiatValue].FROMSYMBOL;
      //     document.getElementsByClassName("mainFactsTitle")[3].innerHTML="24H Volume "+currCryptoCurrObj[globalFiatValue].TOSYMBOL;
          
      //     document.getElementsByClassName("mainFactsValue")[4].innerHTML=currCryptoCurrObj[globalFiatValue].OPEN24HOUR;
      //     document.getElementsByClassName("mainFactsValue")[5].innerHTML=currCryptoCurrObj[globalFiatValue].HIGH24HOUR;
      //     document.getElementsByClassName("mainFactsValue")[6].innerHTML=currCryptoCurrObj[globalFiatValue].LOW24HOUR;
      //   }
      // }
      // DOMtop_imageClass[counter].innerHTML=null;
      DOMtop_imageClass[counter].src=directionImgBaseUrl+direction_img;
    }
    // if(!cryptoInTop){
    //   var xhttpOtherThanTop = new XMLHttpRequest();
    //   xhttpOtherThanTop.onreadystatechange = function() {
    //     if (this.readyState == 4 && this.status == 200) {
    //       var currTopPriceObj2 = JSON.parse(xhttpOtherThanTop.responseText);
    //       var exists=document.getElementById("mainPrice");
    //       if(exists != null){
    //         document.getElementById("mainPrice").innerHTML=currTopPriceObj2.DISPLAY[cryptoCurr][globalFiatValue].PRICE;
    //         currTopPriceAmount=currTopPriceObj.RAW[cryptoCurr][globalFiatValue].PRICE;
    //         //currTopPriceAmount=currTopPriceAmount[globalFiatValue].PRICE;
    //         document.getElementsByClassName("mainFactsValue")[0].innerHTML=currTopPriceObj2.DISPLAY[cryptoCurr][globalFiatValue].CHANGE24HOUR;
    //         document.getElementsByClassName("mainFactsValue")[0].style.color=pct_color;
    //         document.getElementsByClassName("mainFactsValue")[1].innerHTML=currTopPriceObj2.DISPLAY[cryptoCurr][globalFiatValue].CHANGEPCT24HOUR+"%";
    //         document.getElementsByClassName("mainFactsValue")[1].style.color=pct_color;
            
    //         document.getElementsByClassName("mainFactsValue")[2].innerHTML=currTopPriceObj2.DISPLAY[cryptoCurr][globalFiatValue].VOLUME24HOUR;
    //         document.getElementsByClassName("mainFactsValue")[3].innerHTML=currTopPriceObj2.DISPLAY[cryptoCurr][globalFiatValue].VOLUME24HOURTO;
            
    //         document.getElementsByClassName("mainFactsTitle")[2].innerHTML="24H Volume "+currTopPriceObj2.DISPLAY[cryptoCurr][globalFiatValue].FROMSYMBOL;
    //         document.getElementsByClassName("mainFactsTitle")[3].innerHTML="24H Volume "+currTopPriceObj2.DISPLAY[cryptoCurr][globalFiatValue].TOSYMBOL;
            
    //         document.getElementsByClassName("mainFactsValue")[4].innerHTML=currTopPriceObj2.DISPLAY[cryptoCurr][globalFiatValue].OPEN24HOUR;
    //         document.getElementsByClassName("mainFactsValue")[5].innerHTML=currTopPriceObj2.DISPLAY[cryptoCurr][globalFiatValue].HIGH24HOUR;
    //         document.getElementsByClassName("mainFactsValue")[6].innerHTML=currTopPriceObj2.DISPLAY[cryptoCurr][globalFiatValue].LOW24HOUR;
    //       }
    //     }
    //   };
    //   xhttpOtherThanTop.open("GET", mainPriceUrlIfNotInTop, true);
    //   xhttpOtherThanTop.send();
    // }
    firstLoad=false;
    setTimeout(function(){discardAllPulseStyle();},3000);
    //console.log("Top Data Loading Ended");
  }