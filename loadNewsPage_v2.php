
<?php
error_log("############################################");
$newsContent = '<ul class="timeline">';
$analysisNewsContent = '<ul class="timeline AnalysisTimeline">';
$monthNames = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
$analysisString = array("analysis", "price", "market ", "trading roundup");
//$allNewsObj=file_get_contents("https://min-api.cryptocompare.com/data/v2/news/?lang=EN");
$allNewsObj=file_get_contents("currentNews.json");
// $newsFile = fopen("currentNews.json", "r") or die("Unable to open file!");
// $allNewsObj=fread($newsFile,filesize("currentNews.json"));
// fclose($newsFile);
error_log($allNewsObj);
$latestNewsId=0;
$analysisHeaderSet = false;
$analysisBookmarkSet = false;
$allNewsObj = json_decode($allNewsObj,true);
////var_dump($allNewsObj);
if(array_key_exists("Promoted",$allNewsObj)){
      //var_dump($allNewsObj["Promoted"]);
      foreach($allNewsObj["Promoted"] as $promotedNews){
            if($promotedNews["id"] > $latestNewsId)
                  $latestNewsId=$promotedNews["id"];
            $analysisNews=false;
            foreach($analysisString as $analysisKey){
                  if(strpos(strtolower($promotedNews["title"]), $analysisKey) !== false){
                        $analysisNews=true;
                  }
            }
            if($analysisNews){
                  if(!$analysisHeaderSet){
                        $analysisNewsContent=$analysisNewsContent.'<li class="time-label">'.
                              '<span class="bg-orange" id="analysisNewsBegin">'.
                              'Analytical'.
                              '</span>'.
                              '<span class="bg-green mobileOnly"  style="float: right !important">'.
                              '<a href="#newsBegin" style="color:#FFF">Go to Latest News</a>'.
                              '</span>'.
                              '</li>';
                        $analysisHeaderSet=true;
                  }
                  $analysisNewsContent = $analysisNewsContent.'<li>'.
                        '<div class="timeline-item">'.
                        '<img src="'.$dataNews["imageurl"].'">'.
                        '<div class="title-and-time-holder">'.
                        '<span class="time"><i class="fa fa-clock-o"></i>'.date(" d-M H:i", $dataNews["published_on"]).'</span>'.
                        '<h3 class="timeline-header"><a href="'.$dataNews["url"].'">'.$dataNews["title"].'<small>&nbsp;-'.$dataNews["source"].'</small></a></h3></div>'.
                        '<div class="timeline-body"><div style="height: 100%; white-space: pre-line; overflow: hidden; text-overflow: ellipsis;">'.$dataNews["body"].
                        '</div></div>'.
                        '</div>'.
                        '</li>';   
            }
            $newsContent = $newsContent.'<li class="time-label">'.
                  '<span class="bg-red">'.
                  'Top News'.
                  '</span>'.
                  '<span class="bg-orange mobileOnly" style="float: right !important">'.
                  '<a href="#analysisAnchor" style="color:#FFF">Go to Analysis</a>'.
                  '</span>'.
                  '</li>';
            $analysisBookmarkSet=true;
            $newsContent = $newsContent + '<li>' +
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
}
if($analysisBookmarkSet){
      $newsContent = $newsContent.'<li class="time-label">'.
            '<span class="bg-green" id="newsBegin">'.
            'Latest News'.
            '</span>'.
            '</li>';
}
else{
      $newsContent = $newsContent.'<li class="time-label">'.
            '<span class="bg-green" id="newsBegin">'.
            'Latest News'.
            '</span>'.
            '<span class="bg-orange mobileOnly" style="float: right !important">'.
            '<a href="#analysisAnchor" style="color:#FFF">Go to Analysis</a>'.
            '</span>'.
            '</li>';
}
if(array_key_exists("Data",$allNewsObj)){
      //var_dump($allNewsObj["Data"]);
      foreach($allNewsObj["Data"] as $dataNews){
            if($dataNews["id"] > $latestNewsId)
                  $latestNewsId=$dataNews["id"];
            $analysisNews=false;
            foreach($analysisString as $analysisKey){
                  if(strpos(strtolower($dataNews["title"]), $analysisKey) !== false){
                        $analysisNews=true;
                        // //var_dump("Analysis News!!!!!");
                        // //var_dump(strtolower($dataNews["title"]));
                  }
            }
            if($analysisNews){
                  if(!$analysisHeaderSet){
                        $analysisNewsContent=$analysisNewsContent.'<li class="time-label">'.
                              '<span class="bg-orange" id="analysisNewsBegin">'.
                              'Analytical'.
                              '</span>'.
                              '<span class="bg-green mobileOnly"  style="float: right !important">'.
                              '<a href="#newsBegin" style="color:#FFF">Go to Latest News</a>'.
                              '</span>'.
                              '</li>';
                        $analysisHeaderSet=true;
                  }
                  $analysisNewsContent = $analysisNewsContent.'<li>'.
                        '<div class="timeline-item">'.
                        '<img src="'.$dataNews["imageurl"].'">'.
                        '<div class="title-and-time-holder">'.
                        '<span class="time"><i class="fa fa-clock-o"></i>'.date(" d-M", $dataNews["published_on"]).'<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.date("H:i", $dataNews["published_on"]).'</span>'.
                        '<h3 class="timeline-header"><a href="'.$dataNews["url"].'">'.$dataNews["title"].'<small>&nbsp;-'.$dataNews["source"].'</small></a></h3></div>'.
                        '<div class="timeline-body"><div style="height: 100%; white-space: pre-line; overflow: hidden; text-overflow: ellipsis;">'.$dataNews["body"].
                        '</div></div>'.
                        '</div>'.
                        '</li>';   
            }
            $newsContent = $newsContent.'<li>'.
                        '<div class="timeline-item">'.
                        '<img src="'.$dataNews["imageurl"].'">'.
                        '<div class="title-and-time-holder">'.
                        '<span class="time"><i class="fa fa-clock-o"></i>'.date(" d-M H:i", $dataNews["published_on"]).'</span>'.
                        '<h3 class="timeline-header"><a href="'.$dataNews["url"].'">'.$dataNews["title"].'<small>&nbsp;-'.$dataNews["source"].'</small></a></h3></div>'.
                        '<div class="timeline-body"><div style="height: 100%; white-space: pre-line; overflow: hidden; text-overflow: ellipsis;">'.$dataNews["body"].
                        '</div></div>'.
                        '</div>'.
                        '</li>';
            }
            $newsContent=$newsContent.'</ul>';
            $analysisNewsContent=$analysisNewsContent.'</ul>';
            //var_dump($analysisNewsContent);
            //var_dump($newsContent);
      }
      $newsContent=$newsContent.'<div id="latestNewsId" style="display:hidden">'.$latestNewsId.'</div>';


?>