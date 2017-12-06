<?php 

//I struggled a bit the first time around with this problem and switched
//to C# in order to use Visual Studio's debugging tools. That code worked,
//but I am aiming to complete this challenge in PHP and I wanted a much
//neater solution which is achieved here

$input = array();
array_push($input,array(6,1,2));
array_unshift($input,array(5,4,3));
$n = 277678;
$i=7;
$operation = "SouthRow";

while($i < ($n+1)){
	switch($operation){
		case "SouthRow":
			array_push($input,array($i));
			checkI($i,0,$operation);
			$i++;
			for($j=1;$j<count($input[count($input)-2]);$j++){
				array_push($input[count($input)-1],$i);
				checkI($i,$j,$operation);
				$i++;
			}
			$operation = "EastCol";
			break;
		case "EastCol":
			for($j=count($input) - 1; $j >= 0; $j--){
				array_push($input[$j],$i);
				checkI($i,$j,$operation);
				$i++;
			}
			$operation = "NorthRow";
			break;
		case "NorthRow":
			array_unshift($input,array($i));
			checkI($i,count($input[0]),$operation);
			$i++;
			while(count($input[0]) < count($input[1])){
				array_unshift($input[0],$i);
				checkI($i,count($input[0]),$operation);
				$i++;
			}
			$operation = "WestCol";
			break;	
		case "WestCol":
			for($j=0; $j <= count($input) - 1; $j++){
				array_unshift($input[$j],$i);
				checkI($i,$j,$operation);
				$i++;
			}
			$operation = "SouthRow";
			break;
		default:
			break;
	}
}

function checkI($i,$j,$s){
	global $input;
	global $n;
	if($i==$n){
		switch($s){
			case "SouthRow":
				echo "Manhattan Distance: " . (((count($input)-1)/2) + abs($j - ((count($input[0])-1)/2))) . "\n";
				break;
			case "EastCol":
				echo "Manhattan Distance: " . ((count($input[count($input)-1])/2) + abs(((count($input) -1)/2) - $j)) . "\n";
				break;
			case "NorthRow":
				echo "Manhattan Distance: " . (abs(((count($input[1])/2)+1)- $j) + (count($input)/2)) . "\n";
				break;	
			case "WestCol":
				echo "Manhattan Distance: " . (((count($input[0])-1)/2) + abs((count($input)/2) - $j)) . "\n";
				break;
			default:
				break;
		}
	}
}

?>