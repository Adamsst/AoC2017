<?php 

$input = array();
$lines = file('input.txt');
$n=0;
$s=0;
$e=0;
$w=0;
$max = 0;

foreach($lines as $singleLine){
	$input = array_map('trim',explode(",",$singleLine));
}

for($i=0;$i<count($input);$i++){
	
	switch($input[$i]){
		case "n":
			$n += 1;
			$max = getMax($n,$s,$e,$w,$max);
			break;
		case "ne":
			$n += 0.5;
			$e += 0.5;
			$max = getMax($n,$s,$e,$w,$max);
			break;
		case "nw":
			$n += 0.5;
			$w += 0.5;
			$max = getMax($n,$s,$e,$w,$max);
			break;
		case "s":
			$s += 1;
			$max = getMax($n,$s,$e,$w,$max);
			break;
		case "se":
			$s += 0.5;
			$e += 0.5;
			$max = getMax($n,$s,$e,$w,$max);
			break;
		case "sw":
			$s += 0.5;
			$w += 0.5;
			$max = getMax($n,$s,$e,$w,$max);
			break;
		default:
			break;
	}
}

echo $max;

function getMax($n,$s,$e,$w,$max){
	if((abs($e - $w) > abs($n - $s)) && ((abs($e - $w)*2) > $max)){
		return (abs($e - $w)*2);
	}
	else if((abs($n - $s) + abs($e - $w)) > $max){
		return (abs($n - $s) + abs($e - $w));
	}
	else{
		return $max;
	}
}

?>