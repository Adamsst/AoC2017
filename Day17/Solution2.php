<?php 

$step = 359;
$c=0;//max element to be added to our lock array
$pos=0;
$cl=1;
$temp=0;
while($c<50000000){
	//We don't have to keep track of the array, we just have to keep track of position 1
	//and where we are in the array. Position 0 is always 0. A brute force attempt at 
	//this would have taken many hours to run.
	$pos = $pos + $step;
	if($pos >= $cl){
		$pos = $pos % $cl;
	}
	if($pos==0){
		$temp = $c+1;
	}
	$cl++;
	$pos++;
	$c++;
}

echo $temp;

?>