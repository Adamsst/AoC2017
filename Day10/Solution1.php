<?php 

$nums = array();
$lengths = array(34,88,2,222,254,93,150,0,199,255,39,32,137,136,1,167);
$iterations = 0;
$pos = 0;
$skip = 0;

for($i=0;$i<256;$i++){
	array_push($nums,$i);
}

while($iterations < count($lengths)){	
	$curLength = $lengths[$iterations];
	$arrToRev = array();
	$i = $pos;
	$affected = array();

	while(count($arrToRev) < $curLength){//This clause produces the array to be reversed and an array of original indeces affected
		array_push($arrToRev, $nums[$i]);	
		array_push($affected,$i);

		if($i === count($nums) - 1){
			$i=0;
		}
		else{
			$i++;
		}	
	}
	$arrToRev = array_reverse($arrToRev);
	for($j=0;$j<count($arrToRev);$j++){//This merges the new reversed array into the original array at the proper indeces
		$nums[$affected[$j]] = $arrToRev[$j];
	}
	
	$j=$pos;
	$k=0;
	while($k < count($arrToRev)){//This moves the position based on the length of the previous reversed array
		if($j === count($nums) - 1){
			$j=0;
		}
		else{
			$j++;
		}
		$k++;
	}
	$k=0;
	while($k < $skip){//This moves the position based on the current skip size
		if($j === count($nums) - 1){
			$j=0;
		}
		else{
			$j++;
		}
		$k++;
	}
	$pos=$j;
	
	$skip++;
	
	$iterations++;
}

var_dump($nums) . "\n";
echo "Current Position: $pos \n";
echo "Current Skip: $skip \n";


?>