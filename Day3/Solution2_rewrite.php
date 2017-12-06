<?php 

//I struggled a bit the first time around with this problem and switched
//to C# in order to use Visual Studio's debugging tools. That code worked,
//but I am aiming to complete this challenge in PHP and I wanted a much
//neater solution which is achieved here

$input = array();
array_push($input,array(10,1,1));
array_unshift($input,array(5,4,2));
$i=0;
$track = 0;
$operation = "SouthRow";

while($i < 11){
	$track = 0;
	switch($operation){
		case "SouthRow":
			while($track < count($input)){
				$sum = 0;
				if($track == 0){
					$sum += $input[(count($input)-1)][$track];//Directly above in grid
					$sum += $input[count($input)-1][$track + 1];//Up and to the right in grid
					array_push($input,array($sum));
				}
				else if($track > 0){
					$sum += $input[count($input)-2][$track];//Directly above in grid
					$sum += $input[count($input)-2][$track - 1];//Up and to the left in grid
					$sum += $input[count($input)-1][$track - 1];//To the left in grid
					if($track != (count($input) - 1)){
						$sum += $input[count($input)-2][$track + 1];//Up and to the right in grid
					}
					array_push($input[(count($input)-1)],$sum);
				}
				$track++;
				echo $sum . "\n";
			}
			$i++;
			$operation = "EastCol";
			break;
		case "EastCol":
			$track = count($input) - 1;
			while($track >= 0){
				$sum = 0;
				$sum += $input[$track][count($input[$track])-1];//Directly to the left in grid			
				if($track == count($input) - 1){
					$sum += $input[$track-1][count($input[$track])-1];//Up and to the left in grid
				}
				else if($track >=0 && $track != (count($input) - 1)){
					$sum += $input[$track+1][count($input[$track])-1];//Down and to the left in grid
					$sum += $input[$track+1][count($input[$track])];//Down in the grid
					if($track > 0){
						$sum += $input[$track-1][count($input[$track])-1];//Up and to the left in grid
					}
				}
				array_push($input[$track],$sum);
				$track--;
				echo $sum . "\n";
			}
			$operation = "NorthRow";
			$i++;
			break;
		case "NorthRow":
			while($track < count($input[1])){
				$sum = 0;
				if($track == 0){
					$sum += $input[0][count($input[0])-1];//Directly below in grid
					$sum += $input[0][count($input[0])-2];//Down and to the left in grid
					array_unshift($input,array(0));
					$input[0][0] = $sum;
				}
				else if($track > 0){
					$sum += $input[1][count($input[1])- $track - 1];//Directly below in grid
					$sum += $input[1][count($input[1])- $track];//Down and to the right in grid
					$sum += $input[0][0];//Directly to the right in grid
					if($track < (count($input[1])-1))
					{
						$sum += $input[1][count($input[1])- $track - 2];//Down and to the left in grid
					}
					array_unshift($input[0],$sum);
			    }
				$track++;
				echo $sum . "\n";
			}
			$operation = "WestCol";
			$i++;
			break;	
		case "WestCol":
			while($track < (count($input[0]) - 1)){
				$sum = 0;
				$sum += $input[$track][0];//Directly to the right in grid
				if($track == 0){
					$sum += $input[$track + 1][0];//Down and to the right in grid
					array_unshift($input[$track],$sum);
				}
				else if($track > 0){
					$sum += $input[$track - 1][1];//Up and to the right in grid
					$sum += $input[$track - 1][0];//Directly up in grid
					if($track != (count($input[0]) - 2)){
						$sum += $input[$track + 1][0];//Down and to the right in grid
					}
					array_unshift($input[$track],$sum);
				}
				$track++;
				echo $sum . "\n";
			}
		    $operation = "SouthRow";
			$i++;
			break;
		default:
			break;
	}
}


?>