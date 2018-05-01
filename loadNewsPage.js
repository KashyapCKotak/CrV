var xhttp = new XMLHttpRequest();
var newsContent = '<ul class="timeline">';
var analysisNewsContent = '<ul class="timeline AnalysisTimeline">';;
const monthNames = ["January", "February", "March", "April", "May", "June",
      "July", "August", "September", "October", "November", "December"
];
var analysisString = ["analysis", "price", "market ", "trading roundup"];
console.log("Enter");
xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
            var analysisHeaderSet=false;
            var allNewsObj = JSON.parse(this.responseText);
            console.log(allNewsObj);
            for (var promotedNews in allNewsObj.Promoted) {
                  var newsDate = new Date(allNewsObj.Promoted[promotedNews].published_on * 1000);
                  var analysisNews = false;
                  for (var i = 0; i < analysisString.length; i++) {
                        if (allNewsObj.Promoted[promotedNews].title.toLowerCase().indexOf(analysisString[i]) != -1)
                              analysisNews = true;
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
                              '</li>';
                  }
                  newsContent = newsContent + '<li class="time-label">' +
                        '<span class="bg-red">' +
                        'Top News' +
                        '</span>' +
                        '<span class="bg-orange mobileOnly" style="float: right !important">' +
                        '<a href="#analysisAnchor" style="color:#FFF">Go to Analysis</a>' +
                        '</span>' +
                        '</li>';
                  newsContent = newsContent + '<li>' +
                        '<div class="timeline-item">' +
                        '<img src="' + allNewsObj.Promoted[promotedNews].imageurl + '">' +
                        '<div class="title-and-time-holder">' +
                        '<span class="time"><i class="fa fa-clock-o"></i>' + newsDate.getDate() + '-' + monthNames[newsDate.getMonth()] + '</span>' +
                        '<h3 class="timeline-header"><a href="' + allNewsObj.Promoted[promotedNews].url + '">' + allNewsObj.Promoted[promotedNews].title + '<small>&nbsp;-' + allNewsObj.Promoted[promotedNews].source + '</small></a></h3></div>' +
                        '<div class="timeline-body"><div style="height: 100%; white-space: pre-line; overflow: hidden; text-overflow: ellipsis;">' + allNewsObj.Promoted[promotedNews].body +
                        '</div></div>' +
                        '</div>' +
                        '</li>';
            }
            newsContent = newsContent + '<li class="time-label">' +
                  '<span class="bg-green" id="newsBegin">' +
                  'Latest News' +
                  '</span>' +
                  '</li>';
            for (var dataNews in allNewsObj.Data) {
                  var newsDate = new Date(allNewsObj.Data[dataNews].published_on * 1000);
                  var analysisNews = false;
                  for (var i = 0; i < analysisString.length; i++) {
                        if (allNewsObj.Data[dataNews].title.toLowerCase().indexOf(analysisString[i]) != -1)
                              analysisNews = true;
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
                              '<img src="' + allNewsObj.Data[dataNews].imageurl + '">' +
                              '<div class="title-and-time-holder">' +
                              '<span class="time"><i class="fa fa-clock-o"></i>' + newsDate.getDate() + '-' + monthNames[newsDate.getMonth()] + '</span>' +
                              '<h3 class="timeline-header"><a href="' + allNewsObj.Data[dataNews].url + '">' + allNewsObj.Data[dataNews].title + '<small>&nbsp;-' + allNewsObj.Data[dataNews].source + '</small></a></h3></div>' +
                              '<div class="timeline-body"><div style="height: 100%; white-space: pre-line; overflow: hidden; text-overflow: ellipsis;">' + allNewsObj.Data[dataNews].body +
                              '</div></div>' +
                              '</div>' +
                              '</li>';
                  }
                  newsContent = newsContent + '<li>' +
                        '<div class="timeline-item">' +
                        '<img src="' + allNewsObj.Data[dataNews].imageurl + '">' +
                        '<div class="title-and-time-holder">' +
                        '<span class="time"><i class="fa fa-clock-o"></i>' + newsDate.getDate() + '-' + monthNames[newsDate.getMonth()] + '</span>' +
                        '<h3 class="timeline-header"><a href="' + allNewsObj.Data[dataNews].url + '">' + allNewsObj.Data[dataNews].title + '<small>&nbsp;-' + allNewsObj.Data[dataNews].source + '</small></a></h3></div>' +
                        '<div class="timeline-body"><div style="height: 100%; white-space: pre-line; overflow: hidden; text-overflow: ellipsis;">' + allNewsObj.Data[dataNews].body +
                        '</div></div>' +
                        '</div>' +
                        '</li>';
            }
            newsContent=newsContent+'</ul>';
            analysisNewsContent=analysisNewsContent+'</ul>';
            document.getElementById("newsLoaderHolder").style.display="none";
            document.getElementById("timelineNews").innerHTML = newsContent;
            document.getElementById("analysisNews").innerHTML = analysisNewsContent;
      }
};
xhttp.open("GET", "https://min-api.cryptocompare.com/data/v2/news/?lang=EN", true);
xhttp.send();