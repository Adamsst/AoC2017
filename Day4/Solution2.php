<?php 

//Read each line of input into an array of strings and trim trailing whitespace
//For each string in each line of input, sort the string alphabetically
//Use part answer (finding array with unique values) on the newly sorted input

$input = array();
$lines = file('input.txt');
$sum = 0;

foreach($lines as $singleLine){
	array_push($input,array_map('trim',explode(" ",$singleLine)));
}

for($i=0;$i<count($input);$i++){
	for($j=0;$j<count($input[$i]);$j++){
		$input[$i][$j] = stringSort($input[$i][$j]);
	}
}

for($i=0;$i<count($input);$i++){
	$sum += findUnique($input[$i]);
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

function stringSort($s){
	$string = $s;
	$stringSplit = str_split($string);
	sort($stringSplit);
	return implode('',$stringSplit);
}

?>