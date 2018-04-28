var liveIcoStr="";
var upcomingIcoStr="";
var finishedIcoStr="";

{/* <tr>
<td>
<div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 col-xl-2 imageIcoHolder">
<img class="imageIco" src="https:\/\/icowatchlist.com\/logos\/smrt.png">
</div>
<div class="hidden-sm hidden-xs col-xs-8 col-sm-3 col-md-3 col-lg-3 col-xl-2">
                                    The Smart Startup Token project is Making Blockchain Accessible to Startups and Small Businesses
                                </div>
                                <div class="col-xs-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 timeIco show-in-small">
                                    <div class="ico-date-holder-small">
                                    <p style="font-size:14px;margin:0px;padding-left:3px">Ends IN:</p>			
                                        <div class="time-unit-div">
                                            <p class="project-time">27</p>
                                            <!-- 2018-04-28 06:35:04am||2018-05-25 13:00:00||2018-05-25 14:00:00||27||6 -->
                                            <p class="small-time">Days</p>
                                        </div>
                                        <div class="time-unit-div">
                                            <p class="project-time">06</p>
                                            <p class="small-time">Hours</p>
                                        </div>
                                        <div class="time-unit-div seconds">
                                            <p class="project-time">24</p>
                                            <p class="small-time">Minutes</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="hidden-xs col-xs-4 col-sm-4 col-md-2 col-lg-3 col-xl-2">
                                    <div class="progress progress-xs progress-striped active progressIco">
                                        <div class="progress-bar progress-bar-primary" style="width: 90%"></div>
                                        <!-- <div style="width: 90%;text-align:center">90%<div> -->
                                    </div>
                                </div>
                                <div class="detailsIco col-xs-4 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                    <button type="button" class="btn btn-block btn-primary btn-sm">ICO Details</button>
                                </div>
                            
                            </td>
                            
                    </tr> */}

var xhttpIco = new XMLHttpRequest();
xhttpIco.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var icoList = JSON.parse(this.responseText).ico;
        console.log(icoList);
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
                console.log(endDate);
                console.log(endDate.hour());
                endDate.local();
                console.log(endDate.hour());
                console.log(endDate.toDate());
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
                console.log(endDate);
                console.log(endDate.hour());
                endDate.local();
                console.log(endDate.hour());
                console.log(endDate.toDate());
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
            '<p style="font-size:14px;margin:0px;padding-left:3px">Ends IN:</p>'+
            '<div class="time-unit-div">'+
            '<p class="project-time">'+ /*TODO*/ +'</p>'+
            '<p class="small-time">Days</p>'+
            '</div>'+
            '<div class="time-unit-div">'+
            '<p class="project-time">'+ /*TODO*/ +'</p>'+
            '<p class="small-time">Hours</p>'+
            '</div>'+
            '<div class="time-unit-div seconds">'+
            '<p class="project-time">'+ /*TODO*/ +'</p>'+
            '<p class="small-time">Minutes</p>'+
            '</div>'+
            '</div>'+
            '</div>'+
            '<div class="hidden-xs col-xs-4 col-sm-4 col-md-2 col-lg-3 col-xl-2">'+
            '<div class="progress progress-xs progress-striped active progressIco">'+
            '<div class="progress-bar progress-bar-primary" style="width: 90%"></div>'+
            '</div>'+
            '<p class="progress-percent">'+ /*TODO*/ +'</p>'+
            '</div>'+
            '<div class="detailsIco col-xs-4 col-sm-2 col-md-2 col-lg-2 col-xl-2">'+
            '<a href="'+  +'" class="btn btn-block btn-primary btn-sm">ICO Details</a>'+
            '</div>'+                
            '</td>'+                
            '</tr>';
        }
        var icoLiveList = icoList.live;
        for(liveIco in icoLiveList){
            var endDateTime=icoLiveList[liveIco].end_time.split(" ");//split date and time
            var endDate=endDateTime[0].split("-");
            var endTime=endDateTime[1].split(":");
            var endDateTime=icoLiveList[liveIco].end_time.split(" ");//split date and time
            var endDate=endDateTime[0].split("-");
            var endTime=endDateTime[1].split(":");
            upcomingIcoStr = upcomingIcoStr+'<tr>'+
            '<td>'+
            '<div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 col-xl-2 imageIcoHolder">'+
            '<img class="imageIco" src="'+ /*TODO*/ +'">'+
            '</div>'+
            '<div class="hidden-sm hidden-xs col-xs-8 col-sm-3 col-md-3 col-lg-3 col-xl-2">'+
            /*TODO*/+
            '</div>'+
            '<div class="hidden-xs col-xs-4 col-sm-3 col-md-2 col-lg-2 col-xl-2">'+
            'From:<br><b>'+/*TODO*/+''+/*24-5-2018&nbsp;&nbsp;&nbsp;12:00*/+'</b><br>To:<br><b>'+/*TODO*/+''+/*24-5-2018&nbsp;&nbsp;&nbsp;12:00*/+'</b>'+
            '</div>'+
            '<div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 col-xl-2 show-in-small">'+
            '<div class="ico-date-holder-small">'+
            '<p style="font-size:14px;margin:0px;padding-left:3px">STARTS IN:</p>'+
            '<div class="time-unit-div">'+
            '<p class="project-time">'+ /*TODO*/ +'</p>'+
            '<p class="small-time">Days</p>'+
            '</div>'+
            '<div class="time-unit-div">'+
            '<p class="project-time">'+ /*TODO*/ +'</p>'+
            '<p class="small-time">Hours</p>'+
            '</div>'+
            '<div class="time-unit-div seconds">'+
            '<p class="project-time">'+ /*TODO*/ +'</p>'+
            '<p class="small-time">Minutes</p>'+
            '</div>'+
            '</div>'+
            '</div>'+
            '<div class="detailsIco col-xs-4 col-sm-2 col-md-2 col-lg-2 col-xl-2">'+
            '<a href="'+ /*TODO*/ +'" class="btn btn-block btn-primary btn-sm">ICO Details</a>'+
            '</div>'+
            '</td>'+
            '</tr>';
        }
    }
};
xhttpIco.open("GET", "https://api.icowatchlist.com/public/v1/", true);
xhttpIco.send();