<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>	
<body>
<div class="background">
<h1>Headlines</h1>	
<?php
$file = 'http://www.gallenauniversity.com/_resources/rss/news.xml';
$xml = simplexml_load_file($file) or die("Feed does not exist on this URL");;

if (empty($file)){
echo "Feed is empty";
}else{
	echo"";
}

if ($xml > "5"){
	echo "Feed is taking longer than 5 seconds to load";
}else{
	echo "";
}

foreach($xml->channel->item as $itm){
	$title = $itm->title;
	$link = $itm->link;
	$pubDate = $itm->pubDate;
	$description = $itm->description;
	$media = $itm->children('media',true)->content; 
	$thumbnail = $media->thumbnail->attributes(); 
	$url = (string) $thumbnail['url']; 
	echo '<a target="_blank" href="'.$link.'"><h4 class="header">'.$title.'</h4></a> <img class="floatleft" src="'.$url.'"/> <p class="date">'.$pubDate.'</p> <p class="desc"> '.$description.'</p><br/>  '; 
}
?>
<img class="morenews" src="morenews.jpg"/>
</div>
</body>
</html>
