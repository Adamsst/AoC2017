<?php 

//Read each line of input into an array of strings and trim trailing whitespace
//using the array_unique result, compare the result to the original array
//if they are they same, do nothing, else increase the number of invalid sums

$input = array();
$lines = file('input.txt');
$sum = 0;

foreach($lines as $singleLine){
	array_push($input,array_map('trim',explode(" ",$singleLine)));
}

for($i=0;$i<count($input);$i++){
	$sum += findUnique($input[$i]);
}
 
echo (count($input) - $sum);
 
function findUnique($a){
	$result = array_unique($a);
	if($result === $a){	
		return 0;
	}
	else{
		return 1;
	}
} 

?>