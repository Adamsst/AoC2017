<?php 

//For each calculation cycle:
//Find the max value of the array and its first location.
//Redistribute the maximum value amongst the array,
//starting at the location where the max first occurred.
//Check to see if the new input is in our array of 
//past states. If it is, redistributions contains the 
//number of calculation cycles

$input = array(2,8,8,5,4,2,3,1,5,5,1,2,15,13,5,14);
$states = array();
array_push($states,$input);
$do = true;
$redistributions = 0;

while($do){
	$max = max($input);
	
	for($i=0;$i<count($input);$i++){
		if($input[$i] === $max){
			$input[$i] = 0;
			break;
		}
	}

	for($j=$max;$j>0;$j--){
		$i++;
		if($i === count($input)){
			$i=0;
		}
		$input[$i]++;
	}
	
	$redistributions++;
	
	for($j=0;$j<count($states);$j++){
		if($input === $states[$j]){
			$do=false;
			break;
		}
	}
	
	array_push($states,$input);
	
}

echo $redistributions;

?>