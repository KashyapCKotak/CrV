function loadNewsPage(requestBy){
var xhttp = new XMLHttpRequest();
var newsContent = '<ul class="timeline">';
var analysisNewsContent = '<ul class="timeline AnalysisTimeline">';
const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
      "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
var analysisString = ["analysis", "price", "market ", "trading roundup"];
console.log("Enter");
xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
            var analysisHeaderSet=false;
            var analysisBookmarkSet=false;
            var allNewsObj = JSON.parse(this.responseText);
            console.log(allNewsObj);
            for (var promotedNews in []/*allNewsObj.Promoted*/) {
                  var newsDate = new Date(allNewsObj.Promoted[promotedNews].published_on * 1000);
                  var analysisNews = false;
                  for (var i = 0; i < analysisString.length; i++) {
                        if (allNewsObj.Promoted[promotedNews].title.toLowerCase().indexOf(analysisString[i]) != -1)
                              analysisNews = true;
                  }
                  var currSentiment="";
                  var sentClass="";
                  var sentArray=allNewsObj.Promoted[promotedNews].sentiment.split("&");
                  if(parseFloat(sentArray[0])>parseFloat(sentArray[1])){
                        sentClass='label-success';
                        currSentiment='Positive';
                        currSentiment='Positive          '+'positive %='+sentArray[0]+'negative %='+sentArray[1];
                  }
                  else if(parseFloat(sentArray[0])<parseFloat(sentArray[1])){
                        sentClass='label-danger';
                        currSentiment='Negative';
                        currSentiment='Negative          '+'positive %='+sentArray[0]+'negative %='+sentArray[1];
                  }
                  else if(parseInt(sentArray[0])==-1&&parseInt(sentArray[1])==-1){
                        sentClass='label-info';
                        currSentiment='Thinking';
                        currSentiment='Thinking... This may take some time';
                  }
                  else{
                        sentClass='label-warning';
                        currSentiment='Neutral';
                        currSentiment='Neutral          '+'positive %='+sentArray[0]+'negative %='+sentArray[1];
                  }
                  if (analysisNews) {
                        if(!analysisHeaderSet){
                              analysisNewsContent = analysisNewsContent + '<li class="time-label">' +
                                    '<span class="bg-orange" id="analysisNewsBegin">' +
                                    'Analytical' +
                                    '</span>' +
                                    '<span class="bg-green mobileOnly"  style="float: right !important">' +
                                    '<a href="#newsBegin" style="color:#FFF">Go to Latest News</a>' +
                                    '</span>' +
                                    '</li>';
                              analysisHeaderSet=true;
                        }
                        analysisNewsContent = analysisNewsContent + '<li>' +
                              '<div class="timeline-item">' +
                              '<img src="' + allNewsObj.Promoted[promotedNews].imageurl + '">' +
                              '<div class="title-and-time-holder">' +
                              '<span class="time"><i class="fa fa-clock-o"></i>' + newsDate.getDate() + '-' + monthNames[newsDate.getMonth()] + '</span>' +
                              '<h3 class="timeline-header"><a href="' + allNewsObj.Promoted[promotedNews].url + '">' + allNewsObj.Promoted[promotedNews].title + '<small>&nbsp;-' + allNewsObj.Promoted[promotedNews].source + '</small></a></h3></div>' +
                              '<div class="timeline-body"><div style="height: 100%; white-space: pre-line; overflow: hidden; text-overflow: ellipsis;">' + allNewsObj.Promoted[promotedNews].body +
                              '</div></div>' +
                              '</div>' +
                              '</li>'+
                              '<li><div class="timeline-item-sentiment '+sentClass+'">'+
                              currSentiment+'          '+'positive %='+sentArray[0]+'negative %='+sentArray[1]+
                              '</div></li>';
                  }
                  newsContent = newsContent + '<li class="time-label">' +
                        '<span class="bg-red">' +
                        'Top News' +
                        '</span>' +
                        '<span class="bg-orange mobileOnly" style="float: right !important">' +
                        '<a href="#analysisAnchor" style="color:#FFF">Go to Analysis</a>' +
                        '</span>' +
                        '</li>';
                  analysisBookmarkSet=true;
                  newsContent = newsContent + '<li>' +
                        '<div class="timeline-item">' +
                        '<img src="' + allNewsObj.Promoted[promotedNews].imageurl + '">' +
                        '<div class="title-and-time-holder">' +
                        '<span class="time"><i class="fa fa-clock-o"></i>' + newsDate.getDate() + '-' + monthNames[newsDate.getMonth()] + '</span>' +
                        '<h3 class="timeline-header"><a href="' + allNewsObj.Promoted[promotedNews].url + '">' + allNewsObj.Promoted[promotedNews].title + '<small>&nbsp;-' + allNewsObj.Promoted[promotedNews].source + '</small></a></h3></div>' +
                        '<div class="timeline-body"><div style="height: 100%; white-space: pre-line; overflow: hidden; text-overflow: ellipsis;">' + allNewsObj.Promoted[promotedNews].body +
                        '</div></div>' +
                        '</div>' +
                        '</li>'+
                        '<li><div class="timeline-item-sentiment '+sentClass+'">'+
                        currSentiment+'          '+'positive %='+sentArray[0]+'negative %='+sentArray[1]+
                        '</div></li>';
            }
            if(analysisBookmarkSet){
                  newsContent = newsContent + '<li class="time-label">' +
                        '<span class="bg-green" id="newsBegin">' +
                        'Latest News' +
                        '</span>' +
                        '</li>';
            }
            else{
                  newsContent = newsContent + '<li class="time-label">' +
                        '<span class="bg-green" id="newsBegin">' +
                        'Latest News' +
                        '</span>' +
                        '<span class="bg-orange mobileOnly" style="float: right !important">' +
                        '<a href="#analysisAnchor" style="color:#FFF">Go to Analysis</a>' +
                        '</span>' +
                        '</li>';
            }
            latestNewsId=0;
            for (var dataNews in allNewsObj.Data) {
                  if(allNewsObj.Data[dataNews].body.indexOf("submitted sponsored story")!=-1 || allNewsObj.Data[dataNews].body.indexOf("paid-for submitted")!=-1)
                        continue;
                  if(latestNewsId<parseInt(allNewsObj.Data[dataNews].id)){
                        latestNewsId=parseInt(allNewsObj.Data[dataNews].id);
                  }
                  var newsDate = new Date(allNewsObj.Data[dataNews].published_on * 1000);
                  var analysisNews = false;
                  for (var i = 0; i < analysisString.length; i++) {
                        if (allNewsObj.Data[dataNews].title.toLowerCase().indexOf(analysisString[i]) != -1)
                              analysisNews = true;
                  }
                  var currSentiment="";
                  var sentClass="";
                  var sentArray=allNewsObj.Data[dataNews].sentiment.split("&");
                  if(parseFloat(sentArray[0])>parseFloat(sentArray[1])){
                        sentClass='label-success';
                        currSentiment='Positive';
                        currSentiment='Positive&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+'positive=&nbsp;'+parseFloat(sentArray[0]).toFixed(2)+'%&nbsp;&nbsp;&nbsp;negative=&nbsp;'+parseFloat(sentArray[1]).toFixed(2)+'%'
                  }
                  else if(parseFloat(sentArray[0])<parseFloat(sentArray[1])){
                        sentClass='label-danger';
                        currSentiment='Negative';
                        currSentiment='Negative&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+'positive=&nbsp;'+parseFloat(sentArray[0]).toFixed(2)+'%&nbsp;&nbsp;&nbsp;negative=&nbsp;'+parseFloat(sentArray[1]).toFixed(2)+'%'
                  }
                  else if(parseInt(sentArray[0])==-1&&parseInt(sentArray[1])==-1){
                        sentClass='label-info';
                        currSentiment='Thinking';
                        currSentiment='Thinking... This may take some time';
                  }
                  else{
                        sentClass='label-warning';
                        currSentiment='Neutral';
                        currSentiment='Neutral&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+'positive=&nbsp;'+parseFloat(sentArray[0]).toFixed(2)+'%&nbsp;&nbsp;&nbsp;negative=&nbsp;'+parseFloat(sentArray[1]).toFixed(2)+'%'
                  }
                  if (analysisNews) {
                        if(requestBy==2)
                              analysisHeaderSet=true;
                        if(!analysisHeaderSet){
                              analysisNewsContent = analysisNewsContent + '<li class="time-label">' +
                                    '<span class="bg-orange" id="analysisNewsBegin">' +
                                    'Analytical News' +
                                    '</span>' +
                                    '<span class="bg-green mobileOnly"  style="float: right !important">' +
                                    '<a href="#newsBegin" style="color:#FFF">Go to Latest News</a>' +
                                    '</span>' +
                                    '</li>';
                              analysisHeaderSet=true;
                        }
                        analysisNewsContent = analysisNewsContent + '<li style="margin-bottom: 15px;">' +
                              '<div class="timeline-item">' +
                              '<img src="' + allNewsObj.Data[dataNews].imageurl + '">' +
                              '<div class="title-and-time-holder">' +
                              '<span class="time"><i class="fa fa-clock-o"></i>' + newsDate.getDate() + '-' + monthNames[newsDate.getMonth()] + '</span>' +
                              '<h3 class="timeline-header"><a href="' + allNewsObj.Data[dataNews].url + '">' + allNewsObj.Data[dataNews].title + '<small>&nbsp;-' + allNewsObj.Data[dataNews].source + '</small></a></h3></div>' +
                              '<div class="timeline-body"><div style="height: 100%; white-space: pre-line; overflow: hidden; text-overflow: ellipsis;">' + allNewsObj.Data[dataNews].body +
                              '</div></div>' +
                              '</div>' +
                              '</li>';/*+
                              '<li><div class="timeline-item-sentiment '+sentClass+'">'+
                              currSentiment+
                              '</div></li>';*/
                  }
                  newsContent = newsContent + '<li>' +
                        '<div class="timeline-item">' +
                        '<img src="' + allNewsObj.Data[dataNews].imageurl + '">' +
                        '<div class="title-and-time-holder">' +
                        '<span class="time"><i class="fa fa-clock-o"></i> ' + newsDate.getDate() + '-' + monthNames[newsDate.getMonth()] + " " + newsDate.getHours() + ":" + newsDate.getMinutes() + '</span>' +
                        '<h3 class="timeline-header"><a href="' + allNewsObj.Data[dataNews].url + '">' + allNewsObj.Data[dataNews].title + '<small>&nbsp;-' + allNewsObj.Data[dataNews].source + '</small></a></h3></div>' +
                        '<div class="timeline-body"><div style="height: 100%; white-space: pre-line; overflow: hidden; text-overflow: ellipsis;">' + allNewsObj.Data[dataNews].body +
                        '</div></div>' +
                        '</div>' +
                        '</li>'+
                        '<li><div class="timeline-item-sentiment '+sentClass+'">'+
                        currSentiment+
                        '</div></li>';
            }
            newsContent=newsContent+'</ul>';
            analysisNewsContent=analysisNewsContent+'</ul>';
            document.getElementById("newsLoaderHolder").style.display="none";
            document.getElementById("timelineNews").innerHTML = newsContent;
            document.getElementById("latestNewsId").innerHTML = latestNewsId;
            document.getElementById("analysisNews").innerHTML = analysisNewsContent;
            updateIfNewNes();
      }
};
//xhttp.open("GET", "https://min-api.cryptocompare.com/data/v2/news/?lang=EN", true);
xhttp.open("GET", "currentNews.json", true);
xhttp.send();
}
