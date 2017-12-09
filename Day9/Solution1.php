<?php 

$input = file_get_contents('input.txt');
$level = 0;
$score = 0;
$garbage = false;

for($i=0;$i<strlen($input);$i++){
	
	switch($input[$i]){
		case '{':
			if(!$garbage){
				$level++;
			}
			break;
		case '}':
			if(!$garbage){
				$score+=$level;
				$level--;	
			}
			break;
		case ',':
			break;
		case '<':
			$garbage = true;
			break;
		case '>':
			$garbage = false;
			break;
		case '!':
			$i++;
			break;
		default:
			break;	
	}
}

echo $score;

?>