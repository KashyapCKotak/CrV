var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
	var coinlist = JSON.parse(this.responseText);
	document.getElementById("cryptoCurr-name-logo").innerHTML='<img src="https://www.cryptocompare.com/'+coinlist.Data[globalCryptoValue].ImageUrl+'" class="logo-img">   '+coinlist.Data[globalCryptoValue].FullName;
}
};
xhttp.open("GET", "https://min-api.cryptocompare.com/data/all/coinlist", true);
xhttp.send();