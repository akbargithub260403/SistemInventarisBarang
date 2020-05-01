<?php 

session_start();
session_unset();
session_destroy();


echo "<script>
		alert('See You Again');
	 document.location.href = 'index.php';
</script>";

 ?>