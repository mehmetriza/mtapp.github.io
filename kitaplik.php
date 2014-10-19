<?php 
require('phpQuery/phpQuery.php');
function curl($url, $post=false)
{
    $user_agent = 'Mozilla/5.0 (Windows; U; Windows NT 5.1; tr; rv:1.9.0.6) Gecko/2009011913 Firefox/3.0.6';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, $post ? true : false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post ? $post : false);
    curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
    $icerik = curl_exec($ch);
    curl_close($ch);
    return $icerik;
}
function ara($bas, $son, $yazi)
{
    @preg_match_all('/' . preg_quote($bas, '/') .
    '(.*?)'. preg_quote($son, '/').'/i', $yazi, $m);
    return @$m[1];
}
$icerik=curl("https://www.goodreads.com/search.xml?key=jWA4PG0LIZfFT1m3Xe2Gg&q=Ender%27s+Game",false);
//print_r($icerik);

$ch = curl_init("https://www.goodreads.com/search.xml?key=jWA4PG0LIZfFT1m3Xe2Gg&q=".urlencode("babıali")."");
curl_setopt_array( $ch,array(
CURLOPT_RETURNTRANSFER => true,
CURLOPT_AUTOREFERER => true,
CURLOPT_MAXREDIRS => 10,
CURLOPT_SSL_VERIFYPEER => false,
CURLOPT_SSL_VERIFYHOST =>false,
CURLOPT_FOLLOWLOCATION => 1,
CURLOPT_COOKIEFILE=>"/",
CURLOPT_COOKIEJAR>"/"
));
$content = curl_exec( $ch );
curl_close( $ch );
$xml = new SimpleXMLElement($content);

/*$p = xml_parser_create();
xml_parse_into_struct($p, $content, $arr, $index);
arr=simplexml_load_file('<?xml version="1.0" encoding="UTF-8?>"'.$content);
$arr=json_encode($arr);
$arr=json_decode($arr,true);*/
//header("Content-Type:application/xml; charset=utf-8");
//print_r($arr);
foreach($xml->search->results->work as $hey)
{
	echo "<a href='https://www.goodreads.com/book/show/".$hey->best_book->id."' >
			<img src='".$hey->best_book->image_url."' />".$hey->best_book->title."
		  </a><br>";
}
?>
