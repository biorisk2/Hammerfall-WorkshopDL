<?php
$text = file_get_contents("http://steamcommunity.com/sharedfiles/filedetails/?id=".$_GET["id"]);
preg_match_all('~<a(.*?)href="http://steamcommunity.com/sharedfiles/filedetails([^"]+)"(.*?)>~', $text, $matches);
//var_dump($matches[2]);
//array_push($matches[2], $matches[2], "')" );
if($_GET["id"] == ""){
	echo "Invalid URL!";
	echo "<br/>";
	echo "http://melonservers.com/MelonLibrary/wsdl.php?id=COLLECTIONID";
	echo "<br/>";
	echo "Example";
	echo "<br/>";
	echo "http://melonservers.com/MelonLibrary/wsdl.php?id=123456789";
}else{
	if(file_exists($_GET["id"].".txt")){
		unlink($_GET["id"].".txt");
	};
	foreach($matches[2] as $v1) {
		$COLLID = str_replace("/?id=", "", $v1);
		if($_GET["id"] == $COLLID){
		}elseif(strpos($v1,'comments') !== false){
			
	   }elseif(strpos($v1,'discuss') !== false){
		   
	   }else{
			$Replacement = str_replace("/?id=", "resource.AddWorkshop('", $v1);
			$Final = $Replacement . "')\n";
			file_put_contents($_GET["id"].".txt", $Final, FILE_APPEND | LOCK_EX);
	   };
	}
	$lines = file($_GET["id"].".txt");
	$lines = array_unique($lines);
	file_put_contents($_GET["id"].".txt", implode($lines));
	foreach($lines as $line)
	{
		echo $line;
		echo "<br/>";
	}
	if(file_exists($_GET["id"].".txt")){
		unlink($_GET["id"].".txt");
	};	
}
?>