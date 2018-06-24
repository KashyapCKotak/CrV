<?php
error_log("in newNews_v2.php");
$posDict=["profit","raise","earn","free","buy","strong","positive","bullish","boost","simpl","gain","rais","fund","big","gold rush","resistance","retain","provide","weed out","rule out","launch","looking forward","payout","opening","credit","transform","innovat","up","mine","mining","increase","grow","open","live","long","continue","blockchain","revolution","save","viable","hype","fantastic","high","solve","optimist","sorted","bring in","establish","promote","inflate","great","protect","partner","excit","enter","worth","good","enjoy","enhance","entrance","alive","ai","artificial intelligence","push","broad","opportunit","invest","joy"];
$negDict=["loss","skeptic","loose","criminal","deep web","drug","negative","sell","weak","bearish","ban","regulation","fake","scam","los","bankrupt","small","rush","panic","funeral","fud","fell","broke","support","corruption","shut","hack","debit","breach","stolen","steal","break","suffer","close","decrease","shrink","freeze","short","dispute","block","stop","controversy","disast","expense","misconcept","drain","low","issue","inflation","pesimist","take out","demolish","demote","deflate","notorius","misinformat","bor","exit","tumult","bad","wipe","illicit","obscure","dead","bashed","outed","critic","confuse","fall","war","pull","narrow","no more","divest","fear","anxiety"];

$posPre=["continue","start","support","plenty","willing","wishing"];
$negPre=["'t","instead","oppos","halt","stop","against","end"];

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
                if($newDataNews["id"] > $currLatestId){
                    $newDataNews["sentiment"]="-1&-1";
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