<?php
    if(isset($_GET["newNewsId"])){
        $currLatestId=file_get_contents("newsIds.json");
        $currLatestId=intval($currLatestId);
        $newLatestId=intval($_GET["newNewsId"]);
        if($newLatestId>$currLatestId){
            $newNewsObj=file_get_contents("https://min-api.cryptocompare.com/data/v2/news/?lang=EN");
            $newNewsObj=(string)$newNewsObj;
            $newsJsonFile = fopen("currentNews.json", "w") or die("Unable to open file!");
            fwrite($myfile, $newNewsObj);
            fclose($newsJsonFile);
            $latestIdsFile = fopen("newsIds.json", "w") or die("Unable to open file!");
            $currLatestId=(string)$currLatestId;
            fwrite($latestIdsFile, $currLatestId);
            fclose($latestIdsFile);
            //TODO: call python sentiment analyzer
        }
    }
?>