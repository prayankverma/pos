<?php
include_once './dbcon.php';
include_once './function.php';

//Add New Agent Operation
// =====================================================================================================//
if (isset($_POST['AddEmployee'])) {
	$addedby= get_safe_value($con, $_POST['userid']);
    $employeename = get_safe_value($con, $_POST['employeename']);
    $email = get_safe_value($con, $_POST['email']);
    $mobile = get_safe_value($con, $_POST['mobile']);
    $address = get_safe_value($con, $_POST['address']);
    $district = get_safe_value($con, $_POST['district']);
    $state = get_safe_value($con, $_POST['state']);
    $pincode = get_safe_value($con, $_POST['pincode']);
    $usertype="employee";
    
    //number
    $pannumber = get_safe_value($con, $_POST['pannumber']);
	$adharnumber = get_safe_value($con, $_POST['adharnumber']);

	//images
    $pancardimg = addslashes(file_get_contents($_FILES['pancardimg']['tmp_name']));
    $adharfrontimg = addslashes(file_get_contents($_FILES['adharfrontimg']['tmp_name']));
    $adharbackimg = addslashes(file_get_contents($_FILES['adharbackimg']['tmp_name']));

	
	$status="active";
	$currentDateTime = date('Y-m-d H:i:s');
	
	 $defaultpassword="123456";  

    // Insert data into the database
    $query = "INSERT INTO manage_users (name, email, password, mobile, address, district, state, pincode, usertype, pannumber, adharnumber, panimg, adharfrontimg, adharbackimg, status, created_by, created_at) 
    	VALUES ('$employeename', '$email', '$defaultpassword', '$mobile', '$address', '$district', '$state', '$pincode', '$usertype', '$pannumber', '$adharnumber', '$pancardimg', '$adharfrontimg', '$adharbackimg', '$status', '$addedby','$currentDateTime')";

    $result = mysqli_query($con, $query);

    if ($result) 
    {

        // Generate agentid
        $currentYear = date("Y");
        $lastInsertId = $con->insert_id;
        $employeeid = "NIEMP" . $currentYear . $lastInsertId;
        
        //Token
        $n=10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        $token=$randomString . $lastInsertId;


        //Update Query
        $updateSql = "UPDATE manage_users SET userid = '$employeeid', token='$token' WHERE id = '$lastInsertId'";
        $updateResult = mysqli_query($con, $updateSql);
        if($updateResult)
        {
            echo "<script>alert('Employee details added successfully!');</script>";
        }
        else
        {
             echo "<script>alert('Warning ! Employee details added successfully! But userid is not created. kindly connect with Admin Team.');</script>";
        }

        
    } else {
        // JavaScript code to display an error alert
        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
    } 
}

?>