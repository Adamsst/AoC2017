<?php

//Read each line of the input file as a single line
//Split each value in the line by the tab and cast it as an int
//For each line, start at the first integer as the key (or needle)
//Search the other ints in the line (haystack) for an evenly divisible int
//Add the quotient to the sum and proceed to the next line

$input = array();
$lines = file('input.txt');
$sum = 0;

foreach ($lines as $singleLine){
	array_push($input, array_map('intval',explode("\t", $singleLine)));
}

for($i=0;$i<count($input);$i++){
	for($j=0;$j<count($input[$i]);$j++){
		$key = $input[$j];
		for($k=0;$k<count($input[$i]);$k++){
			if($input[$i][$k] % $input[$i][$j] === 0 && $j != $k){
				$sum += ($input[$i][$k] / $input[$i][$j]);
				$j = count($input[$i]);
				break;
			}
		}
	}
}

echo $sum;

?>