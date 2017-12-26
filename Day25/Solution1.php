<?php 

$steps=0;
$state = 'A';
$tape = array();//Arbitrary start at 100
for($i=0;$i<101;$i++){
	array_push($tape,0);
}
$c=50;//start our cursor in the middle
while($steps < 12861455){
	switch($state){
		case 'A':
			if($tape[$c] === 0){
				$tape[$c] = 1;
				$c++;
				$state = 'B';
			}
			else if($tape[$c] === 1){
				$tape[$c] = 0;
				$c--;
				$state = 'B';
			}
			break;
		case 'B':
			if($tape[$c] === 0){
				$tape[$c] = 1;
				$c--;
				$state = 'C';
			}
			else if($tape[$c] === 1){
				$tape[$c] = 0;
				$c++;
				$state = 'E';
			}
			break;
		case 'C':
			if($tape[$c] === 0){
				$tape[$c] = 1;
				$c++;
				$state = 'E';
			}
			else if($tape[$c] === 1){
				$tape[$c] = 0;
				$c--;
				$state = 'D';
			}
			break;
		case 'D':
			if($tape[$c] === 0){
				$tape[$c] = 1;
				$c--;
				$state = 'A';
			}
			else if($tape[$c] === 1){
				$tape[$c] = 1;
				$c--;
				$state = 'A';
			}
			break;
		case 'E':
			if($tape[$c] === 0){
				$tape[$c] = 0;
				$c++;
				$state = 'A';
			}
			else if($tape[$c] === 1){
				$tape[$c] = 0;
				$c++;
				$state = 'F';
			}
			break;
		case 'F':
			if($tape[$c] === 0){
				$tape[$c] = 1;
				$c++;
				$state = 'E';
			}
			else if($tape[$c] === 1){
				$tape[$c] = 1;
				$c++;
				$state = 'A';
			}
			break;
		default:
			break;		
	}
	if($c === count($tape) -1){
		array_push($tape,0);
	}
	else if ($c === 0){
		array_unshift($tape,0);
		$c++;
	}
	$steps++;
}

$sum = 0;
for($i=0;$i<count($tape);$i++){
	$sum += $tape[$i];
}
echo $sum . "\n";

?>