<?php
error_log("in newNews_v2.php");
    if(isset($_GET["newNewsId"])){
        error_log("new news php v2");
        $currLatestId=file_get_contents("newsIds.json");
        $currLatestId=intval($currLatestId);
        $newLatestId=intval($_GET["newNewsId"]);
        error_log($newLatestId);
        if($newLatestId>$currLatestId){
            error_log("updating current news");
            $newNewsObj=file_get_contents("https://min-api.cryptocompare.com/data/v2/news/?lang=EN");
            // $oldNewsObj= fopen("currentNews.json", "r") or die("Unable to open file!");
            // $oldNewsObj=fread($oldNewsObj,filesize("webdictionary.txt"));
            $oldNewsObj= file_get_contents("currentNews.json");
            if ($newNewsObj === false || $oldNewsObj === false) {
                error_log($newNewsObj);
                error_log($oldNewsObj);
                die("unable to open file");
            }
            error_log("not false");
            $newNewsObj=(string)$newNewsObj;
            $newNewsObj=json_decode($newNewsObj,true);
            $oldNewsObj=(string)$oldNewsObj;
            $oldNewsObj=json_decode($oldNewsObj,true);
            var_dump("new!!!!!");
            var_dump($oldNewsObj);
            $counter=0;
            if(array_key_exists("Data",$newNewsObj)){
                error_log("in if");
                foreach($newNewsObj["Data"] as $newDataNews){
                    $newDataNews["sentiment"]="-1&-1";
                    if($newDataNews["id"] > $currLatestId){
                        // array_unshift($newDataNews["Data"],$newDataNews);
                        array_splice($oldNewsObj["Data"],$counter,0,array($newDataNews));
                        array_pop($oldNewsObj["Data"]);
                        error_log("added");
                    }
                    else if($newDataNews["id"] <= $currLatestId){
                        error_log("break");
                        break;
                    }
                    $counter++;
                }
            }
            var_dump($oldNewsObj);
            $oldNewsObj=json_encode($oldNewsObj);
            $oldNewsObj=(string)$oldNewsObj;
            $newsJsonFile = fopen("currentNews.json", "w") or die("Unable to open file!");
            fwrite($newsJsonFile, (string)$oldNewsObj);
            fclose($newsJsonFile);

            $latestIdsFile = fopen("newsIds.json", "w") or die("Unable to open file!");
            $newLatestId=(string)$newNewsObj["Data"][0]["id"];
            error_log($newLatestId);
            fwrite($latestIdsFile, $newLatestId);   //145826
            fclose($latestIdsFile);
        }
    }
?>