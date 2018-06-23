<?php
error_log("######################");
error_log("in updateSentiment.php");
if(isset($_POST["newsObj"])){
    error_log("in updateSentiment.php");
    $postObj=$_POST["newsObj"];
    // error_log($postObj);
    $newsObj=json_decode($postObj,true);
    error_log(json_encode($newsObj));
    $latestNewsId=$newsObj["latestNewsId"];
    $marketSent=$newsObj["finalMarketSent"];
    $newsObj=$newsObj["newsObj"];
    error_log("!!!");
    error_log($marketSent);
    // error_log(json_encode($newsObj));
    // error_log($latestNewsId);
    if($newsObj!="" && $newsObj!="{}" && $newsObj!="[]" && $latestNewsId!=0){
        $newsObj=json_encode($newsObj);
        $newsJsonFile = fopen("currentNews.json", "w") or die("Unable to open file current News!");
        fwrite($newsJsonFile, (string)$newsObj);
        fclose($newsJsonFile);

        $latestIdsFile = fopen("newsIds.json", "w") or die("Unable to open file news ids!");
        fwrite($latestIdsFile, $latestNewsId);   //145826
        fclose($latestIdsFile);

        error_log((string)$marketSent);
        $latestMktSntFile = fopen("finalMarketSentiment.txt", "w") or die("Unable to open file market sentiment!");
        fwrite($latestMktSntFile, (string)$marketSent);   //145826
        fclose($latestMktSntFile);
    }
}
?>