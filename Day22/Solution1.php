<?php 

$input = array();
$lines = file('input.txt');

foreach ($lines as $singleLine){
	array_push($input,trim($singleLine));
}

$ind=0;
$x=12;
$y=12;
$dir = 'N';
$infection=0;

while($ind<10000){
	switch($dir){
		case 'N':
			if($input[$y][$x] == "."){//current node clean
				$input[$y][$x] = "#";
				$dir = 'W';
				$infection++;
			}
			else{
				$input[$y][$x] = ".";
				$dir = 'E';
			}
			break;
		case 'E':
			if($input[$y][$x] == "."){//current node clean
				$input[$y][$x] = "#";
				$dir = 'N';
				$infection++;
			}
			else{
				$input[$y][$x] = ".";
				$dir = 'S';
			}
			break;
		case 'S':
			if($input[$y][$x] == "."){//current node clean
				$input[$y][$x] = "#";
				$dir = 'E';
				$infection++;
			}
			else{
				$input[$y][$x] = ".";
				$dir = 'W';
			}
			break;
		case 'W':
			if($input[$y][$x] == "."){//current node clean
				$input[$y][$x] = "#";
				$dir = 'S';
				$infection++;
			}
			else{
				$input[$y][$x] = ".";
				$dir = 'N';
			}
			break;
		default:
			break;
	}
	
	switch($dir){
		case 'N':
			$y--;
			break;
		case 'E':
			$x++;
			break;
		case 'S':
			$y++;
			break;
		case 'W':
			$x--;
			break;
		default:
			break;
	}
	
	if($y==0){
		$s=null;
		for($i=0;$i<strlen($input[0]);$i++){
			$s.=".";
		}
		array_unshift($input,$s);
		$y++;
	}
	else if($y===count($input)-1){
		$s=null;
		for($i=0;$i<strlen($input[0]);$i++){
			$s.=".";
		}
		array_push($input,$s);
	}
	if($x==0){
		for($i=0;$i<count($input);$i++){
			$input[$i] = "." . $input[$i];
		}
		$x++;
	}
	else if($x==strlen($input[0])-1){
		for($i=0;$i<count($input);$i++){
			$input[$i] .= ".";
		}
	}
	$ind++;
}

echo $infection;

?>