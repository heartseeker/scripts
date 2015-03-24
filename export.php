<?php
	set_time_limit(0);
	date_default_timezone_set("Asia/Manila");

	$filename = "data.xls";
	header("Content-Disposition: attachment; filename=\"$filename\"");
	header("Content-Type: application/vnd.ms-excel");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<head>
	<body>
	
	<table>
		<tr>
	
	<?php 

	

	$db = "chanel_hk2";
	$table_name = "3665fw_data1";
	
		mysql_connect("localhost", "root", "");
		mysql_select_db($db) or die(mysql_error());
		

		$query = "SELECT * FROM $table_name";
		//$query .= " WHERE post_date BETWEEN '2013-11-01 00:00:00' AND '2014-01-31'";
		$query1 = $query . " LIMIT 0, 1";
		$result = mysql_query($query1) or die(mysql_error());
		if($rs = mysql_fetch_array($result)){
			
			foreach($rs as $key => $value){
				if(!is_numeric($key)){
					$field = explode("_", $key);
					foreach($field as $f => $v){
						$field[$f] = ucfirst($v);
					}
					$field = implode(" ", $field)
	?>
					<td><?php echo $field?></id>
	<?php 
				}
			}
		}
	?>
		</tr>

	<?php

		$result2 = mysql_query($query);
		while($rs = mysql_fetch_array($result2)){
	?>
		<tr>
			<?php 
			
						foreach($rs as $key => $value){
							if(!is_numeric($key)){
			?>
								<td><?php echo $value?></id>
			<?php 
							}
						}
			?>
		</tr>
	<?php
		}
	
	?>
	</table>

	</body>
</html>

