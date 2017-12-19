<?php 

$input = array();
$lines = file('input.txt');
$x = 0;
$y = 0;
$prevDir = 'S';
$run = true;

foreach($lines as $singleLine){
	array_push($input,$singleLine);
}

for($i=0;$i<strlen($input[0]);$i++){
	if($input[0][$i] == '|'){
		$x = $i;
	}
}

while($run){
	if($prevDir == 'S'){
		$y++;
		if($input[$y][$x] == '+'){
			if($input[$y][$x+1] == '-'){
				$prevDir = 'E';
				$x++;
			}
			else if($input[$y][$x-1] == '-'){
				$prevDir = 'W';
				$x--;
			}
		}
		else if(ctype_alpha($input[$y][$x])){
			echo $input[$y][$x] . "<br>";
			$y++;
		}
		else if($input[$y][$x] != '|' && $input[$y][$x] != '-'){
			echo "???" . $input[$y][$x] . "<br>";
			$run = false;
		}
	}
	else if($prevDir == 'E'){
		$x++;
		if($input[$y][$x] == '+'){
			if($input[$y-1][$x] == '|'){
				$prevDir = 'N';
				$y--;
			}
			else if($input[$y+1][$x] == '|'){
				$prevDir = 'S';
				$y++;
			}
		}
		else if(ctype_alpha($input[$y][$x])){
			echo $input[$y][$x] . "<br>";
			$x++;
		}
		else if($input[$y][$x] != '-' && $input[$y][$x] != '|'){
			echo "???" . $input[$y][$x] . "<br>";
			$run = false;
		}
	}
	else if($prevDir == 'N'){
		$y--;
		if($input[$y][$x] == '+'){
			if($input[$y][$x+1] == '-'){
				$prevDir = 'E';
				$x++;
			}
			else if($input[$y][$x-1] == '-'){
				$prevDir = 'W';
				$x--;
			}
		}
		else if(ctype_alpha($input[$y][$x])){
			echo $input[$y][$x] . "<br>";
			$y--;
		}
		else if($input[$y][$x] != '|' && $input[$y][$x] != '-'){
			echo "???" . $input[$y][$x] . "<br>";
            $run = false;
		}
	}
	else if($prevDir == 'W'){
		$x--;
		if($input[$y][$x] == '+'){
			if($input[$y-1][$x] == '|'){
				$prevDir = 'N';
				$y--;
			}
			else if($input[$y+1][$x] == '|'){
				$prevDir = 'S';
				$y++;
			}
		}
		else if(ctype_alpha($input[$y][$x])){
			echo $input[$y][$x] . "<br>";
			$x--;
		}
		else if($input[$y][$x] != '-' && $input[$y][$x] != '|'){
			echo "???" . $input[$y][$x] . "<br>";
			$run = false;
		}
	}
	
}

echo $x . ", " . $y;

?>