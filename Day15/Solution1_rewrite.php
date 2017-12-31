<?php

$remA = 289;
$remB = 629;
$strA = null;
$strB = null;
$i = 0;
$matches = 0;

while($i < 40000000){
	$remA = (($remA * 16807) % 2147483647);
	$remB = (($remB * 48271) % 2147483647);
	
	$strA = decbin($remA);
	$strB = decbin($remB);
	
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