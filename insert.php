<?php 
session_start();

// Include config file
    require_once "DB.php";
	
	$id = $_SESSION["id"] ;

    $sql = "INSERT INTO ticket (attraction_name, date, type)
    VALUES ('".$_POST["att_name"]."','".$_POST["att_date"]."','".$_POST["att_detail"]."')";

    //$result = mysqli_query($link,$sql);
	
	if ($link->query($sql) === TRUE) {
    $last_id = $link->insert_id;
	}
	
	$sql = "INSERT INTO orders (u_id, t_id)
    VALUES ('".$id."','".$last_id."')";
	
	$result = mysqli_query($link,$sql);

?>