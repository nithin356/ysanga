<?php
include "../../access/adminaccesscontrol.php";
$data = 0;
$id = $_SESSION['ec_ad_id']; 

	$sql = "SELECT * FROM ec_adminsignup where ec_ad_id=$id" ;
	$result = mysqli_query($connection, $sql);
	$row = mysqli_fetch_assoc($result);
	$name=$row['ec_ad_name'];
	$phone=$row['ec_ad_phone'];
	$email=$row['ec_ad_email'];
	$password=$row['ec_ad_password'];
	$count = mysqli_num_rows($result);
	if($count == 0)
	{
		$data= array('status' => 'error', 'message' => 'No Records Found');
	}
	else
	{
		$jdata=array('name'=> $name,'phone'=>$phone,'email'=>$email);
		$res= array('status' => 'success', 'message' => 'Success','data'=>$jdata);
	}
echo json_encode($res);
?>