var xhttp = new XMLHttpRequest();
var latestNewsId=document.getElementById("latestNewsId").textContent;
var oldLatestNewsId=latestNewsId;
xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        var allNewsObj = JSON.parse(this.responseText);
        for (var promotedNews in allNewsObj.Promoted) {
            if(latestNewsId<parseInt(allNewsObj.Promoted[promotedNews].id)){
                latestNewsId=parseInt(allNewsObj.Promoted[promotedNews].id);
            }
        }
        for (var dataNews in allNewsObj.Data) {
            if(latestNewsId<parseInt(allNewsObj.Data[dataNews].id)){
                latestNewsId=parseInt(allNewsObj.Data[dataNews].id);
            }
        }
        if(oldLatestNewsId<latestNewsId){
            var newNewsXmlHttp = new XMLHttpRequest();
            newNewsXmlHttp.open("GET", "http://localhost/adminlte-2.4.2/newNews.php?newNewsId="+latestNewsId, true); 
            newNewsXmlHttp.send(null);  
        }
        else{
            //enjoy
        }
    }
};
xhttp.open("GET", "https://min-api.cryptocompare.com/data/v2/news/?lang=EN", true);
xhttp.send();
