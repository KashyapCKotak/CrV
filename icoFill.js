var liveIcoStr="";
var upcomingIcoStr="";
var finishedIcoStr="";

var xhttpIco = new XMLHttpRequest();
xhttpIco.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var icoList = JSON.parse(this.responseText).ico;
        var currentDate=moment();
        currentDate.local();
        //console.log("########################");
        //console.log(currentDate);
        //console.log(icoList);
        var icoLiveList = icoList.live;
        for(liveIco in icoLiveList){
            // var endDateTime=icoLiveList[liveIco].end_time.split(" ");//split date and time
            // var endDate=endDateTime[0].split("-");
            // var endTime=endDateTime[1].split(":");
            // var endDateTime=icoLiveList[liveIco].end_time.split(" ");//split date and time
            // var endDate=endDateTime[0].split("-");
            // var endTime=endDateTime[1].split(":");
            if(icoLiveList[liveIco].timezone.indexOf("-") !== -1){
                var offset="";
                if(icoLiveList[liveIco].timezone.indexOf("--") !== -1)
                    var offset=icoLiveList[liveIco].timezone.split("--")[1];
                else
                    var offset=icoLiveList[liveIco].timezone.split("-")[1];
                if(offset<10)
                    zeroString="0";
                // var endDate=moment.utc(icoLiveList[liveIco].end_time+offset,"YYYY-MM-DD HH:mm:ss+-HH");
                var endDate=moment.utc(icoLiveList[liveIco].end_time+" -"+zeroString+offset,"YYYY-MM-DD HH:mm:ss Z");
                var startDate=moment.utc(icoLiveList[liveIco].start_time+" -"+zeroString+offset,"YYYY-MM-DD HH:mm:ss Z");
                //console.log(endDate);
                // //console.log(endDate.hour());
                endDate.local();
                //console.log(endDate.hour());
                //console.log(endDate.toDate());
                var currTimeDiff=endDate.diff(currentDate, 'minutes');
                var totTimeDiff=endDate.diff(startDate, 'minutes');
                //console.log(currTimeDiff.hours());
            }
            else if(icoLiveList[liveIco].timezone.indexOf("+") !== -1){
                var offset="";
                var zeroString="";
                if(icoLiveList[liveIco].timezone.indexOf("+") !== -1)
                    var offset=icoLiveList[liveIco].timezone.split("+")[1];
                if(offset<10)
                    zeroString="0";
                // var endDate=moment.utc(icoLiveList[liveIco].end_time+offset,"YYYY-MM-DD HH:mm:ss+-HH");
                var endDate=moment.utc(icoLiveList[liveIco].end_time+" +"+zeroString+offset,"YYYY-MM-DD HH:mm:ss Z");
                var startDate=moment.utc(icoLiveList[liveIco].start_time+" +"+zeroString+offset,"YYYY-MM-DD HH:mm:ss Z");
                //console.log(endDate);
                // //console.log(endDate.hour());
                endDate.local();
                //console.log(endDate.hour());
                //console.log(endDate.toDate());
                var currTimeDiff=endDate.diff(currentDate, 'minutes');
                var totTimeDiff=endDate.diff(startDate, 'minutes');
                //console.log(currTimeDiff.hours());
            }
            liveIcoStr = liveIcoStr+'<tr>'+
            '<td>'+
            '<div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 col-xl-2 imageIcoHolder">'+
            '<img class="imageIco" src="'+icoLiveList[liveIco].image+'">'+
            '</div>'+
            '<div class="hidden-sm hidden-xs col-xs-8 col-sm-3 col-md-3 col-lg-3 col-xl-2">'+
            icoLiveList[liveIco].description+
            '</div>'+
            '<div class="col-xs-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 timeIco show-in-small">'+
            '<div class="ico-date-holder-small">'+
            '<p style="font-size:14px;margin:0px;padding-left:3px"><b>Ends IN:</b></p>'+
            '<div class="time-unit-div">'+
            '<p class="project-time">'+ Math.floor((currTimeDiff)/1440) +'</p>'+
            '<p class="small-time">Days</p>'+
            '</div>'+
            '<div class="time-unit-div">'+
            '<p class="project-time">'+ Math.floor(((currTimeDiff)/60)%24) +'</p>'+
            '<p class="small-time">Hours</p>'+
            '</div>'+
            '<div class="time-unit-div seconds">'+
            '<p class="project-time">'+ (currTimeDiff % 60) +'</p>'+
            '<p class="small-time">Minutes</p>'+
            '</div>'+
            '</div>'+
            '</div>'+
            '<div class="hidden-xs col-xs-4 col-sm-4 col-md-2 col-lg-3 col-xl-2">'+
            '<div class="progress progress-xs progress-striped active progressIco">'+
            '<div class="progress-bar progress-bar-primary" style="width: '+ parseFloat(((totTimeDiff-currTimeDiff)/totTimeDiff) * 100).toFixed(2) +'%"></div>'+
            '</div>'+
            '<p class="progress-percent">'+ parseFloat(((totTimeDiff-currTimeDiff)/totTimeDiff) * 100).toFixed(2) +'%</p>'+
            '</div>'+
            '<div class="detailsIco col-xs-4 col-sm-2 col-md-2 col-lg-2 col-xl-2">'+
            '<a href="'+ icoLiveList[liveIco].website_link +'" class="btn btn-block btn-primary btn-sm">ICO Details</a>'+
            '</div>'+                
            '</td>'+                
            '</tr>';
            console.log("####################");
            console.log(currTimeDiff);
            console.log(icoLiveList[liveIco].name);
            // console.log(endDate.diff(currentDate, 'minutes')%60);
            // console.log(Math.floor(((currTimeDiff)/60)%24));
            // console.log("hours: "+Math.floor((currTimeDiff)/1440));
            // console.log("totalDiff"+parseFloat(totTimeDiff.minutes()).toFixed(2));
            console.log(totTimeDiff);
            console.log(totTimeDiff-currTimeDiff);
            console.log(((totTimeDiff-currTimeDiff)/totTimeDiff)*100);
            // console.log("currentDiff"+parseFloat(currTimeDiff.minutes()).toFixed(2));
            // console.log(parseFloat(((totTimeDiff.minutes()-currTimeDiff.minutes())/totTimeDiff.minutes())*100).toFixed(2));
            // console.log(((parseFloat(totTimeDiff.minutes()).toFixed(2)-parseFloat(currTimeDiff.minutes()).toFixed(2))/parseFloat(totTimeDiff.minutes()).toFixed(2))*100);
            console.log("####################");
        }
        var icoUpcomingList = icoList.upcoming;
        for(upcomingIco in icoUpcomingList){
            if(icoUpcomingList[upcomingIco].timezone.indexOf("-") !== -1){
                var offset="";
                if(icoUpcomingList[upcomingIco].timezone.indexOf("--") !== -1)
                    var offset=icoUpcomingList[upcomingIco].timezone.split("--")[1];
                else
                    var offset=icoUpcomingList[upcomingIco].timezone.split("-")[1];
                if(offset<10)
                    zeroString="0";
                // var endDate=moment.utc(icoLiveList[liveIco].end_time+offset,"YYYY-MM-DD HH:mm:ss+-HH");
                var endDate=moment.utc(icoUpcomingList[upcomingIco].end_time+" -"+zeroString+offset,"YYYY-MM-DD HH:mm:ss Z");
                var startDate=moment.utc(icoUpcomingList[upcomingIco].start_time+" -"+zeroString+offset,"YYYY-MM-DD HH:mm:ss Z");
                //console.log(endDate);
                // //console.log(endDate.hour());
                endDate.local();
                //console.log(endDate.hour());
                //console.log(endDate.toDate());
                var currTimeDiff=moment.duration(endDate.diff(currentDate));
                //console.log(currTimeDiff.hours());
            }
            else if(icoUpcomingList[upcomingIco].timezone.indexOf("+") !== -1){
                var offset="";
                var zeroString="";
                if(icoUpcomingList[upcomingIco].timezone.indexOf("+") !== -1)
                    var offset=icoUpcomingList[upcomingIco].timezone.split("+")[1];
                if(offset<10)
                    zeroString="0";
                // var endDate=moment.utc(icoLiveList[liveIco].end_time+offset,"YYYY-MM-DD HH:mm:ss+-HH");
                var endDate=moment.utc(icoUpcomingList[upcomingIco].end_time+" +"+zeroString+offset,"YYYY-MM-DD HH:mm:ss Z");
                var startDate=moment.utc(icoUpcomingList[upcomingIco].start_time+" +"+zeroString+offset,"YYYY-MM-DD HH:mm:ss Z");
                //console.log(endDate);
                // //console.log(endDate.hour());
                endDate.local();
                //console.log(endDate.hour());
                //console.log(endDate.toDate());
                var currTimeDiff=moment.duration(endDate.diff(currentDate));
                //console.log(currTimeDiff.hours());
            }
            upcomingIcoStr = upcomingIcoStr+'<tr>'+
            '<td>'+
            '<div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 col-xl-2 imageIcoHolder">'+
            '<img class="imageIco" src="'+ icoUpcomingList[upcomingIco].image +'">'+
            '</div>'+
            '<div class="hidden-sm hidden-xs col-xs-8 col-sm-3 col-md-3 col-lg-3 col-xl-2">'+
            icoUpcomingList[upcomingIco].description+
            '</div>'+
            '<div class="hidden-xs col-xs-4 col-sm-3 col-md-2 col-lg-2 col-xl-2">'+
            'From:<br><b>'+ startDate.format("Do MMM YYYY, H:mm")+'</b><br>To:<br><b>'+ endDate.format("Do MMM YYYY, H:mm")+'</b>'+
            '</div>'+
            '<div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 col-xl-2 show-in-small">'+
            '<div class="ico-date-holder-small">'+
            '<p style="font-size:14px;margin:0px;padding-left:3px">STARTS IN:</p>'+
            '<div class="time-unit-div">'+
            '<p class="project-time">'+ currTimeDiff.days() +'</p>'+
            '<p class="small-time">Days</p>'+
            '</div>'+
            '<div class="time-unit-div">'+
            '<p class="project-time">'+ currTimeDiff.hours() +'</p>'+
            '<p class="small-time">Hours</p>'+
            '</div>'+
            '<div class="time-unit-div seconds">'+
            '<p class="project-time">'+ currTimeDiff.minutes() +'</p>'+
            '<p class="small-time">Minutes</p>'+
            '</div>'+
            '</div>'+
            '</div>'+
            '<div class="detailsIco col-xs-4 col-sm-2 col-md-2 col-lg-2 col-xl-2">'+
            '<a href="'+ icoUpcomingList[upcomingIco].website_link +'" class="btn btn-block btn-primary btn-sm">ICO Details</a>'+
            '</div>'+
            '</td>'+
            '</tr>';
        }
        var icoFinishedList = icoList.finished;
        for(finishedIco in icoFinishedList){
            if(icoFinishedList[finishedIco].timezone.indexOf("-") !== -1){
                var offset="";
                if(icoFinishedList[finishedIco].timezone.indexOf("--") !== -1)
                    var offset=icoFinishedList[finishedIco].timezone.split("--")[1];
                else
                    var offset=icoFinishedList[finishedIco].timezone.split("-")[1];
                if(offset<10)
                    zeroString="0";
                // var endDate=moment.utc(icoLiveList[liveIco].end_time+offset,"YYYY-MM-DD HH:mm:ss+-HH");
                var endDate=moment.utc(icoFinishedList[finishedIco].end_time+" -"+zeroString+offset,"YYYY-MM-DD HH:mm:ss Z");
                var startDate=moment.utc(icoFinishedList[finishedIco].start_time+" -"+zeroString+offset,"YYYY-MM-DD HH:mm:ss Z");
                //console.log(endDate);
                // //console.log(endDate.hour());
                endDate.local();
                //console.log(endDate.hour());
                //console.log(endDate.toDate());
                var currTimeDiff=moment.duration(endDate.diff(currentDate));
                //console.log(currTimeDiff.hours());
            }
            else if(icoFinishedList[finishedIco].timezone.indexOf("+") !== -1){
                var offset="";
                var zeroString="";
                if(icoFinishedList[finishedIco].timezone.indexOf("+") !== -1)
                    var offset=icoFinishedList[finishedIco].timezone.split("+")[1];
                if(offset<10)
                    zeroString="0";
                // var endDate=moment.utc(icoLiveList[liveIco].end_time+offset,"YYYY-MM-DD HH:mm:ss+-HH");
                var endDate=moment.utc(icoFinishedList[finishedIco].end_time+" +"+zeroString+offset,"YYYY-MM-DD HH:mm:ss Z");
                var startDate=moment.utc(icoFinishedList[finishedIco].start_time+" +"+zeroString+offset,"YYYY-MM-DD HH:mm:ss Z");
                //console.log(endDate);
                // //console.log(endDate.hour());
                endDate.local();
                //console.log(endDate.hour());
                //console.log(endDate.toDate());
                var currTimeDiff=moment.duration(endDate.diff(currentDate));
                //console.log(currTimeDiff.hours());
            }
            finishedIcoStr = finishedIcoStr+'<tr>'+
            '<td>'+
            '<div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 col-xl-2 imageIcoHolder">'+
            '<img class="imageIco" src="'+ icoFinishedList[finishedIco].image +'">'+
            '</div>'+
            '<div class="hidden-sm hidden-xs col-xs-8 col-sm-3 col-md-3 col-lg-3 col-xl-2">'+
            icoFinishedList[finishedIco].description+
            '</div>'+
            '<div class="hidden-xs col-xs-4 col-sm-3 col-md-2 col-lg-2 col-xl-2">'+
            'From:<br><b>'+ startDate.format("Do MMM YYYY, H:mm")+'</b><br>To:<br><b>'+ endDate.format("Do MMM YYYY, H:mm")+'</b>'+
            '</div>'+
            '<div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 col-xl-2">'+
            'All Time ROI: <b>'+ icoFinishedList[finishedIco].all_time_roi +'</b><br>'+
            'Ticker: <b>'+ icoFinishedList[finishedIco].coin_symbol +'</b><br>'+
            'USD Price: <b>'+ icoFinishedList[finishedIco].price_usd +'</b>'+
            '</div>'+
            '<div class="detailsIco col-xs-4 col-sm-2 col-md-2 col-lg-2 col-xl-2">'+
            '<a href="'+ icoFinishedList[finishedIco].website_link +'" class="btn btn-block btn-primary btn-sm">ICO Details</a>'+
            '</div>'+
            '</td>'+
            '</tr>';
        }
        document.getElementById("newsLoaderHolder").style.display="none";
        document.getElementById("icoHolder").style.display="";
        document.getElementById("icoLiveTable").innerHTML=liveIcoStr;
        document.getElementById("icoFinishedTable").innerHTML=finishedIcoStr;
        document.getElementById("icoUpcomingTable").innerHTML=upcomingIcoStr;
    }
};
xhttpIco.open("GET", "https://api.icowatchlist.com/public/v1/", true);
xhttpIco.send();