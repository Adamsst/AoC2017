<?php
ini_set('memory_limit','2G');

$remA = 289;
$remB = 629;
$strA = null;
$strB = null;
$i = 0;
$matches = 0;
$goodA = array();
$goodB = array();
	
while(count($goodA) < 5000000 || count($goodB) < 5000000){
    if(count($goodA) < 5000000)
    {
		$remA = (($remA * 16807) % 2147483647);			
		if($remA % 4 === 0){
			array_push($goodA,$remA);
		}
    }
    if(count($goodB) < 5000000)
    {
		$remB = (($remB * 48271) % 2147483647);		
		if($remB % 8 === 0){
			array_push($goodB,$remB);
		}
    }
}

while($i < 5000000){		
	$strA = decbin($goodA[$i]);
	$strB = decbin($goodB[$i]);
	
	while(strlen($strA) < 16){
		$strA = "0" . $strA;
	}
	while(strlen($strB) < 16){
		$strB = "0" . $strB;
	}
	
	$strA = substr($strA,-16);
	$strB = substr($strB,-16);
	
	if($strA === $strB){
		$matches++;
	}
	
	$i++;
}

echo $matches;

?>