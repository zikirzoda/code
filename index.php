<?php

function openFile($file_name,$action){
			$array = array();
			$file = file($file_name);
			$pos_file = '';
			$neg_file = '';
			for($i=0; $i<count($file); $i++){
				$value = array();
				$value = explode(" ",$file[$i]);
				$result = $value[0].$action.$value[1];
				switch($action){
					case "*":
                    $result = (double) $value[0] * (double) $value[1];
					break;
					case "/":
                    $result = (double) $value[0] / (double) $value[1];
					break;
					case "+":
                    $result = (double) $value[0] + (double) $value[1];
					break;
					case "-":
                    $result = (double) $value[0] - (double) $value[1];
					break;  					
				}
				if($result > 0){
					$pos_file .= $result."\r\n";
					file_put_contents("pos.txt",$pos_file);
				}
				else {
				    $neg_file .= $result."\r\n";
                    file_put_contents("neg.txt",$neg_file); 					
				}
			}
			
			
		}
		echo openFile('Test.txt',"+");
?>		