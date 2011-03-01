<?php

if(isset($_GET['search'])){
	$keywords = $_GET['search'];
}
else{
	$keywords = '';
}
if(isset($_GET['location'])){
	$region = $_GET['location'];
}
else{
	$region = 0;
}
if(isset($_GET['page'])){
	$page = $_GET['page'];
}
else{
	$page = 1;
}

//xml-stylesheet type="text/xsl" href="workey.xsl"
// create a new cURL resource
header("Content-Type:	text/xml");
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, "http://api.workey.se/v1/?function=search&region=".$region."&keywords=".$keywords."&page=".$page);
curl_setopt($ch, CURLOPT_HEADER, false);

// grab URL and pass it to the browser
$curl = curl_exec($ch);
// close cURL resource, and free up system resources
curl_close($ch);


?>