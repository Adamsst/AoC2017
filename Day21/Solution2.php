<?php 

$lines = file('input.txt');
$ind = 0;
$rule2 = array();
$rule2result = array();
$rule3 = array();
$rule3result = array();
$grid = array();
array_push($grid,".#.");
array_push($grid,"..#");
array_push($grid,"###");

foreach($lines as $singleLine){
	$temp = trim($singleLine);
	if($ind < 6){
		$t1 = array($temp[0] . $temp[1], $temp[3] . $temp[4]);
		array_push($rule2,$t1);
		array_push($rule2result,array($temp[9] . $temp[10] . $temp[11] , $temp[13] . $temp[14] . $temp[15] , $temp[17] . $temp[18] . $temp[19]));
		$t1 = twoRot($t1);
		array_push($rule2,$t1);
		array_push($rule2result,array($temp[9] . $temp[10] . $temp[11] , $temp[13] . $temp[14] . $temp[15] , $temp[17] . $temp[18] . $temp[19]));
		$t1 = twoRot($t1);
		array_push($rule2,$t1);
		array_push($rule2result,array($temp[9] . $temp[10] . $temp[11] , $temp[13] . $temp[14] . $temp[15] , $temp[17] . $temp[18] . $temp[19]));
		$t1 = twoRot($t1);
		array_push($rule2,$t1);
		array_push($rule2result,array($temp[9] . $temp[10] . $temp[11] , $temp[13] . $temp[14] . $temp[15] , $temp[17] . $temp[18] . $temp[19]));
		$t1 = twoRot($t1);
		$t1= twoFlip($t1);
		array_push($rule2,$t1);
		array_push($rule2result,array($temp[9] . $temp[10] . $temp[11] , $temp[13] . $temp[14] . $temp[15] , $temp[17] . $temp[18] . $temp[19]));
		$t1 = twoRot($t1);
		array_push($rule2,$t1);
		array_push($rule2result,array($temp[9] . $temp[10] . $temp[11] , $temp[13] . $temp[14] . $temp[15] , $temp[17] . $temp[18] . $temp[19]));
		$t1 = twoRot($t1);
		array_push($rule2,$t1);
		array_push($rule2result,array($temp[9] . $temp[10] . $temp[11] , $temp[13] . $temp[14] . $temp[15] , $temp[17] . $temp[18] . $temp[19]));
		$t1 = twoRot($t1);
		array_push($rule2,$t1);
		array_push($rule2result,array($temp[9] . $temp[10] . $temp[11] , $temp[13] . $temp[14] . $temp[15] , $temp[17] . $temp[18] . $temp[19]));
	}
	else{
		$t1 = array($temp[0] . $temp[1] . $temp[2], $temp[4] . $temp[5] . $temp[6], $temp[8] . $temp[9] . $temp[10]);
		array_push($rule3,$t1);
		array_push($rule3result,array($temp[15] . $temp[16] . $temp[17] . $temp[18], $temp[20] . $temp[21] . $temp[22] . $temp[23], $temp[25] . $temp[26] . $temp[27] . $temp[28], $temp[30] . $temp[31] . $temp[32] . $temp[33]));
		$t1 = threeRot($t1);
		array_push($rule3,$t1);
		array_push($rule3result,array($temp[15] . $temp[16] . $temp[17] . $temp[18], $temp[20] . $temp[21] . $temp[22] . $temp[23], $temp[25] . $temp[26] . $temp[27] . $temp[28], $temp[30] . $temp[31] . $temp[32] . $temp[33]));
		$t1 = threeRot($t1);
		array_push($rule3,$t1);
		array_push($rule3result,array($temp[15] . $temp[16] . $temp[17] . $temp[18], $temp[20] . $temp[21] . $temp[22] . $temp[23], $temp[25] . $temp[26] . $temp[27] . $temp[28], $temp[30] . $temp[31] . $temp[32] . $temp[33]));
		$t1 = threeRot($t1);
		array_push($rule3,$t1);
		array_push($rule3result,array($temp[15] . $temp[16] . $temp[17] . $temp[18], $temp[20] . $temp[21] . $temp[22] . $temp[23], $temp[25] . $temp[26] . $temp[27] . $temp[28], $temp[30] . $temp[31] . $temp[32] . $temp[33]));
		$t1 = threeRot($t1);
		$t1=threeFlip($t1);
		array_push($rule3,$t1);
		array_push($rule3result,array($temp[15] . $temp[16] . $temp[17] . $temp[18], $temp[20] . $temp[21] . $temp[22] . $temp[23], $temp[25] . $temp[26] . $temp[27] . $temp[28], $temp[30] . $temp[31] . $temp[32] . $temp[33]));
		$t1 = threeRot($t1);
		array_push($rule3,$t1);
		array_push($rule3result,array($temp[15] . $temp[16] . $temp[17] . $temp[18], $temp[20] . $temp[21] . $temp[22] . $temp[23], $temp[25] . $temp[26] . $temp[27] . $temp[28], $temp[30] . $temp[31] . $temp[32] . $temp[33]));
		$t1 = threeRot($t1);
		array_push($rule3,$t1);
		array_push($rule3result,array($temp[15] . $temp[16] . $temp[17] . $temp[18], $temp[20] . $temp[21] . $temp[22] . $temp[23], $temp[25] . $temp[26] . $temp[27] . $temp[28], $temp[30] . $temp[31] . $temp[32] . $temp[33]));
		$t1 = threeRot($t1);
		array_push($rule3,$t1);
		array_push($rule3result,array($temp[15] . $temp[16] . $temp[17] . $temp[18], $temp[20] . $temp[21] . $temp[22] . $temp[23], $temp[25] . $temp[26] . $temp[27] . $temp[28], $temp[30] . $temp[31] . $temp[32] . $temp[33]));
	}
	$ind++;
}

$ind=0;

while($ind < 18){
	$grid2=array();
	$x=0;	
	$tick = 0;
	if(count($grid) % 2 == 0){
		for($i=0;$i<count($grid);$i+=2){
			for($j=0;$j<strlen($grid[0]);$j+=2){
				for($y=0;$y<count($rule2);$y++){
					if(substr($grid[$i],$j,2) === $rule2[$y][0] && substr($grid[$i+1],$j,2)  === $rule2[$y][1]){					
						if($x % (strlen($grid[0])/2) == 0){
							array_push($grid2, $rule2result[$y][0]);
							array_push($grid2, $rule2result[$y][1]);
							array_push($grid2, $rule2result[$y][2]);
						}
						else{
							$grid2[$tick] .= $rule2result[$y][0];
							$grid2[$tick+1] .= $rule2result[$y][1];
							$grid2[$tick+2] .= $rule2result[$y][2];
						}
						$x++;
						if($x % (strlen($grid[0])/2) == 0){
							$tick+=3;
						}
						$y=count($rule2);
					}
				}
			}
		}
	}
	else{
		for($i=0;$i<count($grid);$i+=3){
			for($j=0;$j<strlen($grid[0]);$j+=3){
				for($y=0;$y<count($rule3);$y++){
					if(substr($grid[$i],$j,3) === $rule3[$y][0] && substr($grid[$i+1],$j,3)  === $rule3[$y][1] && substr($grid[$i+2],$j,3)  === $rule3[$y][2]){
						if($x % (strlen($grid[0])/3) == 0){
							array_push($grid2, $rule3result[$y][0]);
							array_push($grid2, $rule3result[$y][1]);
							array_push($grid2, $rule3result[$y][2]);
							array_push($grid2, $rule3result[$y][3]);
						}
						else{
							$grid2[$tick] .= $rule3result[$y][0];
							$grid2[$tick+1] .= $rule3result[$y][1];
							$grid2[$tick+2] .= $rule3result[$y][2];
							$grid2[$tick+3] .= $rule3result[$y][3];
						}
						$x++;
						if($x % (strlen($grid[0])/3) == 0){
							$tick+=4;
						}
						$y=count($rule3);
					}
				}
			}
		}	
	}
	$grid = $grid2;	
	$ind++;
}

$cnt=0;
for($i=0;$i<count($grid);$i++){
	for($j=0;$j<strlen($grid[$i]);$j++){
		if($grid[$i][$j] == "#"){
			$cnt++;
		}
	}
}
echo $cnt;

function threeRot($arr){
	return array($arr[2][0] . $arr[1][0] . $arr[0][0], $arr[2][1] . $arr[1][1] . $arr[0][1], $arr[2][2] . $arr[1][2] . $arr[0][2]);		
}
function threeFlip($arr){
	return array($arr[0][2] . $arr[0][1] . $arr[0][0], $arr[1][2] . $arr[1][1] . $arr[1][0], $arr[2][2] . $arr[2][1] . $arr[2][0]);	
}
function twoRot($arr){
	return array($arr[1][0] . $arr[0][0], $arr[1][1] . $arr[0][1]);		
}
function twoFlip($arr){
	return array($arr[0][1] . $arr[0][0], $arr[1][1] . $arr[1][0]);		
}

?>