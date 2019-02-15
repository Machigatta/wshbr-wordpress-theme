<?php
	if(isset($_GET["clear"]) && $_GET["clear"] == "0hp9i4t2z3gwhß934gzwqh043gz"){
		$files = glob(__DIR__.'/cache/*'); // get all file names
		$i = 0;
		if(isset($files)){
			foreach($files as $file){ // iterate files
			  if(is_file($file))
			    $ret = unlink($file); // delete file
				echo $file . ": " . (($ret) ? "TRUE" : "FALSE") . "<br>";
				$i++;
				if($i == 5000){
					echo "fertig";
					exit();
				}
			}

		}else{
			echo "nothing found";
			exit();
		}
		
	}else{
		echo "CLEAR setzen";
	}
?>