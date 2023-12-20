<!-- dbCon.php -->
<?php 
function connect($flag=TRUE){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbName = "booking_res";

	
	if($flag){
		$conn = new mysqli($servername, $username, $password, $dbName);
	}else{
		$conn = new mysqli($servername, $username, $password);
	}
	
	if ($conn->connect_error) {
		die("Koneksi gagal: $conn->connect_error");
	} 

	
	return $conn;
}

?>