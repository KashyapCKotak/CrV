<?php
//get the q parameter from URL
$q=$_GET["q"];

//find out which feed was selected
if($q=="Google") {
  $xml=("https://news.google.com/news/rss/headlines/section/topic/TECHNOLOGY.en_in/Technology?ned=in&hl=en-IN&gl=IN");
} elseif($q=="Cointelegraph") {
  $xml=("https://cointelegraph.com/rss");
}

$xmlDoc = new DOMDocument();
$xmlDoc->load($xml);
// $xmlDoc

//get elements from "<channel>"
$channel=$xmlDoc->getElementsByTagName('channel')->item(0);
$channel_title = $channel->getElementsByTagName('title')
->item(0)->childNodes->item(0)->nodeValue;
// var_dump($channel->getElementsByTagName('link')->item(0));
// echo "++++++";
// var_dump($channel->getElementsByTagName('item')->item(0)->getElementsByTagName('description')->item(0)->childNodes->item(0));
// echo "++++++";
$channel_link = $channel->getElementsByTagName('link')->item(1)->childNodes->item(0)->nodeValue;
$channel_desc = $channel->getElementsByTagName('description')
->item(0)->childNodes->item(0)->nodeValue;

// //output elements from "<channel>"
// echo("<p><a href='" . $channel_link
//  . "'>" . $channel_title . "</a>");
// echo("<br>");
// echo($channel_desc . "</p>");

//get and output "<item>" elements
$x=$xmlDoc->getElementsByTagName('item');
if($x->length >= 10 )
  $count = 10;
else
  $count = $x->length;

$return_string = "<div class='NewsWidgetMainHeading'>
                    Cointelegraph.com News
                  </div>";

for ( $i = 0; $i < $count; $i++ ) {
  $item_title=$x->item($i)->getElementsByTagName('title')
  ->item(0)->childNodes->item(0)->nodeValue;
  $item_link=$x->item($i)->getElementsByTagName('link')
  ->item(0)->childNodes->item(0)->nodeValue;
  $item_desc_mixed=$x->item($i)->getElementsByTagName('description')
  ->item(0)->childNodes->item(0)->wholeText;
  $desc_end_index = strpos($item_desc_mixed, "</p>");
  $img_start_index = strpos($item_desc_mixed, "<img");
  $img_end_index = strpos($item_desc_mixed, ">");
  $item_img = substr($item_desc_mixed, $img_start_index, $img_end_index+1-$img_start_index);
  $item_desc=substr($item_desc_mixed, $img_end_index+4, $desc_end_index - $img_end_index - 4);



  // echo ("<p><a href='" . $item_link
  // . "'>" . $item_title . "</a>");
  // echo ("<br>");
  // echo ($item_desc_mixed . "</p>");

  $return_string = $return_string . "<div class='NewsWidgetItemHolder'>" . $item_img . "<div class='NewsWidgetItemRightHeading'> <div> <a href='" . $item_link . "'>" . $item_title . "</a></div></div>" . "<div class='NewsWidgetItemRightSmallContent'> <div>" . $item_desc . "</div></div></div>";
}

echo $return_string;
?>