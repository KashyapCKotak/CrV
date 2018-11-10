function updateIfNewNes(){
    var xhttp = new XMLHttpRequest();
    //console.log("updateidnewnews.js");
    var latestNewsId=parseFloat(document.getElementById("latestNewsId").textContent);
    var oldLatestNewsId=latestNewsId;
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var allNewsObj = JSON.parse(this.responseText);
            // for (var promotedNews in allNewsObj.Promoted) {
            //     if(latestNewsId<parseInt(allNewsObj.Promoted[promotedNews].id)){
            //         latestNewsId=parseInt(allNewsObj.Promoted[promotedNews].id);
            //         allNewsObj.Promoted[promotedNews].sentiment="-1&-1";
            //     }
            // }
            for (var dataNews in allNewsObj.Data) {
                if(latestNewsId<parseInt(allNewsObj.Data[dataNews].id)){
                    latestNewsId=parseInt(allNewsObj.Data[dataNews].id);
                }
            }
            if(oldLatestNewsId<latestNewsId){
                console.log("found new news");
                document.getElementById("new_news").innerHTML=("found new news");
                var newNewsXmlHttp = new XMLHttpRequest();
                console.log("http://localhost/adminlte-2.4.2/newNews_v2.php?newNewsId="+latestNewsId);
                newNewsXmlHttp.open("GET", "http://localhost/adminlte-2.4.2/newNews_v2.php?newNewsId="+latestNewsId, true); 
                newNewsXmlHttp.send(null);  
                // $.ajax({
                //     type: "POST",
                //     url: 'http://localhost/adminlte-2.4.2/updateSentiment.php',
                //     data: {"newsObj":JSON.stringify(tempObj)}
                // });
                //alert("It seems that there are latest news articles which were not cached since you loaded the page. Please reload the page once to view latest news.");
                
            }
            else{
                //enjoy
                console.log("no new news");
                document.getElementById("new_news").innerHTML=("no new news");
            }
        }
    };
    xhttp.open("GET", "https://min-api.cryptocompare.com/data/v2/news/?lang=EN", true);
    xhttp.send();
}