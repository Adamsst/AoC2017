<?php 

//Read each line of input into an array of strings and trim trailing whitespace
//Set up an associative array using each letter of the alphabet
//Calculate each letter's value using binary to ensure unique values for all letter combinations
//sum the character value for every string in each array and create a new array of arrays formed of these values
//using the array_unique result, compare the result to this new array of numerical values
//if they are they same, do nothing, else increase the number of invalid sums

$input = array();
$lines = file('input.txt');
$sum = 0;

foreach($lines as $singleLine){
	array_push($input,array_map('trim',explode(" ",$singleLine)));
}

$params = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'); 
$value = 1;
$values = array();
$intValues = array();

for($i=0;$i<count($params);$i++){
	$values[$params[$i]] = $value;
	$value = $value * 2;
} 

for($i=0;$i<count($input);$i++){
	for($j=0;$j<count($input[$i]);$j++){
		$total = 0;
			for($k=0;$k<strlen($input[$i][$j]);$k++){
				$total += $values[$input[$i][$j][$k]];
			}
		$intValues[$i][$j] = $total;
	}
}

for($i=0;$i<count($intValues);$i++){
	$sum += findUnique($intValues[$i]);
}

echo (count($input) - $sum);
 
function findUnique($a){
	$result = array_unique($a);
	if($result == $a){	
		return 0;
	}
	else{
		return 1;
	}
} 
?>