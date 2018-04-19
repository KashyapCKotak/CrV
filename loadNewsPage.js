var xhttp = new XMLHttpRequest();
var newsContent="";
const monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];
xhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		var allNewsObj = JSON.parse(this.responseText);
		console.log(allNewsObj);
		for(promotedNews in allNewsObj.Promoted){
			var newsDate= new Date(allNewsObj.Promoted[promotedNews].published_on*1000);
			newsContent=newsContent+'<li class="time-label">'+
                  '<span class="bg-red">'+
                  'Top News'+
                  '</span>'+
                  '</li>';
			newsContent=newsContent+'<li>'+
                  '<div class="timeline-item">'+
                  '<img src="'+ allNewsObj.Promoted[promotedNews].imageurl +'">'+
                  '<div class="title-and-time-holder">'+
                  '<span class="time"><i class="fa fa-clock-o"></i>'+ newsDate.getDate() + '-' + monthNames[newsDate.getMonth()] +'</span>'+
                  '<h3 class="timeline-header"><a href="'+ allNewsObj.Promoted[promotedNews].url +'">'+ allNewsObj.Promoted[promotedNews].title +'<small>&nbsp;-'+ allNewsObj.Promoted[promotedNews].source +'</small></a></h3></div>'+
                  '<div class="timeline-body"><div style="height: 100%; white-space: pre-line; overflow: hidden; text-overflow: ellipsis;">'+ allNewsObj.Promoted[promotedNews].body +
                  '<a href="crypto.com">&nbsp;CryptoGlobe.com</a>'+
                  '</div></div>'+
                  '</div>'+
                  '</li>';
		}
		newsContent=newsContent+'<li class="time-label">'+
                  '<span class="bg-green">'+
                  'Latest News'+
                  '</span>'+
                  '</li>';
		for(promotedNews in allNewsObj.Data){
        	var newsDate= new Date(allNewsObj.Data[promotedNews].published_on*1000);
			newsContent=newsContent+'<li>'+
                  '<div class="timeline-item">'+
                  '<img src="'+ allNewsObj.Data[promotedNews].imageurl +'">'+
                  '<div class="title-and-time-holder">'+
                  '<span class="time"><i class="fa fa-clock-o"></i>'+ newsDate.getDate() + '-' + monthNames[newsDate.getMonth()] +'</span>'+
                  '<h3 class="timeline-header"><a href="'+ allNewsObj.Data[promotedNews].url +'">'+ allNewsObj.Data[promotedNews].title +'<small>&nbsp;-'+ allNewsObj.Data[promotedNews].source +'</small></a></h3></div>'+
                  '<div class="timeline-body"><div style="height: 100%; white-space: pre-line; overflow: hidden; text-overflow: ellipsis;">'+ allNewsObj.Data[promotedNews].body +
                  '</div></div>'+
                  '</div>'+
                  '</li>';
		}
		document.getElementsByClassName("timeline")[0].innerHTML=newsContent;
	}
};
xhttp.open("GET", "https://min-api.cryptocompare.com/data/v2/news/?lang=EN", true);
xhttp.send();