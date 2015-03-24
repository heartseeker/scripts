<?php 
set_time_limit(0);
header('Content-Type: text/html; charset=utf-8');
mysql_connect("localhost", "root", "");




mysql_select_db("chanel_hk");

$fp = fopen('3665.csv' ,'r');

$table_name = "copy_3665fw";

if($fp){
		
	while($data = fgetcsv($fp,102400,',')){

		echo '<pre>' . print_r($data, true) . '</pre>';
		foreach ($data as $key => $value) {
			$data[$key] =  mysql_real_escape_string($value) ;
		}
		
		/*
		$date = date('Y-m-d', strtotime($data[1]));
		
		$data[1] = $date;
		*/


		
	//	$q = "SELECT * FROM $table_name";
		//$r = mysql_query($q) or die(mysql_error());
		
		//if($rs = mysql_fetch_array($r)) {
			$data = '\'' . implode("','", $data) . '\'';
			$query = "INSERT INTO $table_name VALUES ($data)";	
			mysql_query($query) or die(mysql_error());
		//} 
		
		


	 
		
		
		
		
	}

}

fclose($fp);


$query = "SELECT * FROM $table_name";
$result = mysql_query($query);
while($rs = mysql_fetch_array($result)){
echo '<pre>',	print_r($rs) ,'</pre>';
}
 
 
?>
