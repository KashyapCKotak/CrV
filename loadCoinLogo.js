function loadCoinLogo(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		var coinlist = JSON.parse(this.responseText);
		//document.getElementById("cryptoCurr-name-logo").innerHTML='<img id="titleLogo" src="https://www.cryptocompare.com/'+coinlist.Data[globalCryptoValue].ImageUrl+'" class="logo-img">   '+coinlist.Data[globalCryptoValue].FullName;
		document.getElementById("titleLogo").src="https://www.cryptocompare.com/"+coinlist.Data[globalCryptoValue].ImageUrl;
		var currSelection=document.getElementById("cryptoSelectBox");
		document.getElementById("titleCurr").innerHTML=currSelection.options[currSelection.selectedIndex].text;
		//document.getElementById("titleLogo").style.display="inline";
		//console.log("#######################################");
		//console.log('"https://www.cryptocompare.com/'+coinlist.Data[globalCryptoValue].ImageUrl+'"');
	}
	};
	xhttp.open("GET", "https://min-api.cryptocompare.com/data/all/coinlist", true);
	xhttp.send();
}