<?php
/*
$options = array ( 
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_HEADER => false,
	CURLOPT_ENCODING => "",
	CURLOPT_AUTOREFERER => true,
	CURLOPT_CONNECTTIMEOUT => 30,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_SSL_VERIFYPEER => false,
	CURLOPT_POST=>1,
	CURLOPT_POSTFIELDS=>"ogrno=135035008&pass=07111994"
);
$ch = curl_init( "https://asp2.selcuk.edu.tr/asp/ogr/duyuru.asp" );
curl_setopt_array( $ch, $options );
$post=curl_exec( $ch );
$err=curl_error($ch);
curl_close( $ch );
*/
 /*$notlar = curl_init();
    curl_setopt($notlar, CURLOPT_URL,'https://asp2.selcuk.edu.tr/asp/ogr/not.asp');
    curl_setopt($notlar, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($notlar);
    curl_close($notlar);
  echo $output;
  */
$options = array ( 
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_HEADER => false,
	CURLOPT_ENCODING => "",
	CURLOPT_AUTOREFERER => true,
	CURLOPT_CONNECTTIMEOUT => 30,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_SSL_VERIFYPEER => false,
	CURLOPT_SSL_VERIFYHOST =>false,
	CURLOPT_COOKIE => "ogrno=135035008;pass=07111994"
);

        $ch = curl_init("http://asp2.selcuk.edu.tr/asp/ogr/not.asp");
        curl_setopt_array( $ch, $options );
        $content = curl_exec( $ch );
        $err = curl_errno( $ch );
        $errmsg = curl_error( $ch );
        $header = curl_getinfo( $ch );

        curl_close( $ch );

        $header[ 'errno' ] = $err;
        $header[ 'errmsg' ] = $errmsg;
        $header[ 'content' ] = $content;
		echo $errmsg;
        echo str_replace( array ( "\n", "\r", "\t" ), NULL, $header[ 'content' ] );
?>