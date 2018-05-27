var totSuppl=null;
function loadCoinLogo(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		console.log("Coin Logo Started");
		coinlist = JSON.parse(this.responseText);
		//document.getElementById("cryptoCurr-name-logo").innerHTML='<img id="titleLogo" src="https://www.cryptocompare.com/'+coinlist.Data[globalCryptoValue].ImageUrl+'" class="logo-img">   '+coinlist.Data[globalCryptoValue].FullName;
		document.getElementById("titleLogo").src="https://www.cryptocompare.com/"+coinlist.Data[globalCryptoValue].ImageUrl;
		var currSelection=document.getElementById("cryptoSelectBox");
		document.getElementById("titleCurr").innerHTML=currSelection.options[currSelection.selectedIndex].text;
		console.log(coinlist.Data[globalCryptoValue].TotalCoinSupply);
		var othDetDom=document.getElementById("OtherDetailsTable").getElementsByTagName("tr")[1].getElementsByTagName("td")[0].innerHTML=coinlist.Data[globalCryptoValue].TotalCoinSupply;
		//document.getElementById("titleLogo").style.display="inline";
		//console.log("#######################################");
		//console.log('"https://www.cryptocompare.com/'+coinlist.Data[globalCryptoValue].ImageUrl+'"');
		console.log("Coin Logo Ended");
	}
	};
	xhttp.open("GET", "https://min-api.cryptocompare.com/data/all/coinlist", true);
	xhttp.send();
}