<?php
/*
//                              NXTE array
*/


/// some counters
$start_time = microtime(true);
register_shutdown_function('my_shutdown');
function my_shutdown() {
	global $start_time;
	echo "execution took: ".
			(microtime(true) - $start_time).
			" seconds.";
}
echo 'MYP PHP version: ' . phpversion(). '<br/>';
echo "Initial: ".memory_get_usage()." bytes \n".'<br/>';
////



///////////// Random generator
function generator ($len) {
        $characters = '0123456789 !@#$%^&*()_+=-`~[{,./<>?}];:\|\'" abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $strorint = mt_rand(1, 2);//numbers or characters
        if ($strorint == 1){
        	$randint = mt_rand(1, 100000000);//max number
        	$result = $randint;
        }
        else{
        	$result = '';
        	for ($i = 0; $i < $len; $i++) {
            $result .= $characters[mt_rand(0, strlen($characters)-1)];
            $result = str_shuffle($result);
       		}
        }
    return $result;
}

///////////    Create array of values
function create_arrv ($numkeys){
		$arrv = array();
		$numv = mt_rand(1, $numkeys);
		for ($i =0; $i < $numv; $i++){
			$len = mt_rand(1, 30);//length of values
			$arrv[$i] = generator($len);
		    //echo  $i.' ' .generator($len).'<br/>';
		}
//echo '<pre>'; print_r($arrv); echo "</pre>"; 
	return $arrv;
}

////// Create subarray
function create_arr2($numkeys, $arrkeys){
		$arrv = create_arrv($numkeys);
		for ($i = count($arrv); $i < count($arrkeys); $i++){
			$arrv[$i] = '~~';
		}
		shuffle($arrkeys);
		$arr2 = array_combine($arrkeys, $arrv);
		//echo '<pre>'; print_r($arr2); echo "</pre>"; 

		//      Delete others '~~'
		$deleteValue = '~~';
		foreach($arr2 as $key => $value) {
	   		 if ($deleteValue == $value) {
	        unset($arr2[$key]);
	   		}
		}
	return $arr2;
}


////       Create array of keys
$arrkeys = array();
$numkeys = mt_rand(1, 10);// number of keys
for ($i =0; $i < $numkeys; $i++){
	$len = mt_rand(1, 20);//length of keys
	$arrkeys[$i] = generator($len);
}
echo '<pre>'; print_r($arrkeys); echo "</pre>"; 

///         Create Array of arrays
$arra = array();
$lenarra = mt_rand(1, 100000);//number of subarrays
for ($i=0; $i<$lenarra; $i++){
$arr3 = create_arr2($numkeys, $arrkeys);
$arra[$i] = $arr3;
}

//echo '<pre>'; print_r($arra); echo "</pre>"; 

//var_export($arr1);

////////////////     our training array
$abc = array(
		array(
     		  'House' => 'Baratheon',
     		  'Sigil' => 'A crowned stag',
     	  	  'Motto' => 'Ours is the Fury'
        ),
		array(
			  'Leader' => 'Eddard Stark',
			  'House' => 'Stark',
    		  'Motto' => 'Winter is Coming',
     		  'Sigil' => 'A grey direwolf'
        ),
		array(
     		  'House' => 'Lannister',
    		  'Leader' => 'Tywin Lannister',
     		  'Sigil' => 'A golden lion'
        ),
		array(
			  //'House' => '',
    		  //'Leader' => '',
    		  //'Motto' => '',
	  		  'Q' => 'Z',
	  		  //'Sigil' => ''
	  		  'house'=>'sdldsdfh'
	    )
);
//echo '<pre>'; print_r($abc); echo "</pre>"; 
//die();
//var_export($abc);

$abc = $arra;// we do not need training array. We have the array of arrays

$arrk = array();//array of keys of $abc array
$i = 0;
foreach($abc as $base_key => $base_value) {
 	foreach ($base_value as $key => $value) {
 			$arrk[$i] = $key;
 			$i++;
 	}
}
sort($arrk);
//var_export($arrk);


//              array of headers 
$count = count($arrk);
for ($i = 1; $i < $count; $i++){
	if ($arrk[$i] == $arrk[$i-1]){
		unset ($arrk[$i-1]);
	}
} 
$arrh=array_values($arrk);
natcasesort($arrh);// as alphabeta
$arrh=array_values($arrh);
//var_export($arrh);
echo '</br>';
echo '</br>';

/////////////////////   Print the Table

///        Print the headers
echo '<b>..........Table with our Array of arrays........</b>';
echo '</br>';
echo '</br>';
echo '<table rules="all" border="1">';
	foreach($arrh as $key => $value){
			echo '<th align="right">', $value, '</th>';
	} 
	///   Print the data
	
	foreach($abc as $base_key => $base_value) {
		echo '<tr>';
			$i=0;
			// we need sort keys of $base_value same as keys in $arrh 
			$base_value = array_flip($base_value);
			natcasesort($base_value);
			$base_value = array_flip($base_value);
			//var_export($base_value);

		 	foreach ($base_value as $key => $value) {
		 			while($key != $arrh[$i]){
					echo '<td align="right">', '', '</td>';
		 			$i++;
		 			}
		 			echo '<td align="right">', $value, '</td>';
		 			$i++;
			}
			for ($i = $i; $i < count($arrh); $i++){
		   		 echo '<td align="right">', '', '</td>';
			}
		echo '</tr>';
	}
echo '</table>';

/////                      The End
echo '</br>';
echo '</br>';
echo "Final: ".memory_get_usage()." bytes \n".'<br/>';
echo "Peak: ".memory_get_peak_usage()." bytes \n".'<br/>';
?> 
