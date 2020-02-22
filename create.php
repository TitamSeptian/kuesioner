<?php
include "connection.php";
$sql  ="
	INSERT INTO data SET 
	id =NULL, 
	name ='".$mysqli->real_escape_string($_POST['name'])."',
	bb ='".$mysqli->real_escape_string($_POST['bb'])."',
	tb ='".$mysqli->real_escape_string($_POST['tb'])."',
	jk ='".$mysqli->real_escape_string($_POST['jk'])."',
	class ='".$mysqli->real_escape_string($_POST['class'])."',
	created_at='".date('Y-m-d H:i:s')."';";
	if($mysqli->query($sql)){
		// alert('Laporan Berahsil Ditambahkan!');
		echo "
			<script>
				window.reload();
			</script>
			";
	}else{
		echo "
			<script>
				window.reload()';
			</script>
		";
	}
?>