var xhttp = new XMLHttpRequest();
console.log("updateidnewnews.js");
var latestNewsId=document.getElementById("latestNewsId").textContent;
var oldLatestNewsId=latestNewsId;
xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        var allNewsObj = JSON.parse(this.responseText);
        for (var promotedNews in allNewsObj.Promoted) {
            if(latestNewsId<parseInt(allNewsObj.Promoted[promotedNews].id)){
                latestNewsId=parseInt(allNewsObj.Promoted[promotedNews].id);
                allNewsObj.Promoted[promotedNews].sentiment="-1&-1";
            }
        }
        for (var dataNews in allNewsObj.Data) {
            if(latestNewsId<parseInt(allNewsObj.Data[dataNews].id)){
                latestNewsId=parseInt(allNewsObj.Data[dataNews].id);
                allNewsObj.Data[dataNews].sentiment="-1&-1";
            }
        }
        if(oldLatestNewsId<latestNewsId){
            console.log("found new news");
            var newNewsXmlHttp = new XMLHttpRequest();
            console.log("http://localhost/adminlte-2.4.2/newNews.php?newNewsId="+latestNewsId);
            newNewsXmlHttp.open("GET", "http://localhost/adminlte-2.4.2/newNews.php?newNewsId="+latestNewsId, true); 
            newNewsXmlHttp.send(null);  
            //alert("It seems that there are latest news articles which were not cached since you loaded the page. Please reload the page once to view latest news.");
            
        }
        else{
            //enjoy
            console.log("no new news");
        }
    }
};
xhttp.open("GET", "https://min-api.cryptocompare.com/data/v2/news/?lang=EN", true);
xhttp.send();
