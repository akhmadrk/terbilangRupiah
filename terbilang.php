<?php
function digittotext($digit)
{
	$text = ['NOL','SATU','DUA','TIGA','EMPAT','LIMA','ENAM','TUJUH','DELAPAN','SEMBILAN'];
	return $text[$digit];
}

function getTextFromDigit($digit)
{
	$result = "";
	for ($i=1; $i <= strlen($digit) ; $i++) { 
		$digitNow = substr($digit, strlen($digit)-$i,1);
		if($digitNow == 0){
			continue;
		} 
		if($i == 1){
			$result = digittotext($digitNow);
		}
		if($i == 2){
			if($digitNow == 1){
				$digitBefore = substr($digit, strlen($digit)-1,1);
				if($digitBefore == 0){
					$result = "SEPULUH";
				}else if($digitBefore == 1){
					$result = "SEBELAS";
				}else{
					$result = $result." BELAS";
				}
			}else{
				$result = digittotext($digitNow)." PULUH ".$result;
			}			
		}
		if($i == 3){
			if($digitNow == 1){
				$digitBefore = substr($digit, strlen($digit)-2,2);
				if($digitBefore == 0){
					$result = "SERATUS";
				}else{
					$result = "SERATUS ".$result;
				}
			}else{
				$result = digittotext($digitNow)." RATUS ".$result;
			}			
		}		
	}
	return $result;
}

function terbilang($digit){
	$result = "";
	$digit = str_pad($digit, 12, '0', STR_PAD_LEFT);
	//ratusan 
	if(substr($digit, -3) != 0){
		$result = getTextFromDigit(substr($digit, -3));
	}
	if(substr($digit, -6,3) != 0){
		if(substr($digit, -6,3) == 1){
			$result = "SERIBU ".$result;
		}else{			
			$result = getTextFromDigit(substr($digit, -6,3))." RIBU ".$result;
		}
	}
	if(substr($digit, -9,3) != 0){
		if(substr($digit, -9,3) == 1){
			$result = "SEJUTA ".$result;
		}else{			
			$result = getTextFromDigit(substr($digit, -9,3))." JUTA ".$result;
		}
	}
	if(substr($digit, -12,3) != 0){
		if(substr($digit, -12,3) == 1){
			$result = "SEMILYAR ".$result;
		}else{			
			$result = getTextFromDigit(substr($digit, -12,3))." MILYAR ".$result;
		}
	}
	echo $result;
}
?>
