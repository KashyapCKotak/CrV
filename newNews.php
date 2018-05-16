<?php
error_log("in newNews.php");
    if(isset($_GET["newNewsId"])){
        error_log("new news php");
        $currLatestId=file_get_contents("newsIds.json");
        $currLatestId=intval($currLatestId);
        $newLatestId=intval($_GET["newNewsId"]);
        if($newLatestId>$currLatestId){
            error_log("updating current news");
            $newNewsObj=file_get_contents("https://min-api.cryptocompare.com/data/v2/news/?lang=EN");
            $newNewsObj=(string)$newNewsObj;
            $newsJsonFile = fopen("currentNews.json", "w") or die("Unable to open file!");
            error_log($newNewsObj);
            fwrite($newsJsonFile, $newNewsObj);
            fclose($newsJsonFile);
            $latestIdsFile = fopen("newsIds.json", "w") or die("Unable to open file!");
            $newLatestId=(string)$newLatestId;
            error_log($newLatestId);
            fwrite($latestIdsFile, $newLatestId);
            fclose($latestIdsFile);
            //TODO: call python sentiment analyzer
        }
    }
?>