<?php
include_once './dbcon.php';
include_once './function.php';

//Add New Agent Operation
// =====================================================================================================//
if (isset($_POST['AddAgent'])) {
	$userid= get_safe_value($con, $_POST['userid']);
    $agentname = get_safe_value($con, $_POST['agentname']);
    $email = get_safe_value($con, $_POST['email']);
    $mobile = get_safe_value($con, $_POST['mobile']);
    $address = get_safe_value($con, $_POST['address']);
    $district = get_safe_value($con, $_POST['district']);
    $state = get_safe_value($con, $_POST['state']);
    $pincode = get_safe_value($con, $_POST['pincode']);
    $agentemployee = get_safe_value($con, $_POST['agentemployee']);
    $agenttype="agent";
    $agentrole = get_safe_value($con, $_POST['agentrole']);

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
    $query = "INSERT INTO manage_users (name, email, password, mobile, address, district, state, pincode, agentemployee, usertype, userrole, pannumber, adharnumber, panimg, adharfrontimg, adharbackimg, status, created_by, created_at) 
    	VALUES ('$agentname', '$email', '$defaultpassword', '$mobile', '$address', '$district', '$state', '$pincode', '$agentemployee', '$agenttype', '$agentrole', '$pannumber', '$adharnumber', '$pancardimg', '$adharfrontimg', '$adharbackimg', '$status', '$userid','$currentDateTime')";

    $result = mysqli_query($con, $query);

    if ($result) 
    {

        // Generate agentid
        $currentYear = date("Y");
        $lastInsertId = $con->insert_id;
        $agentid = "NIAG" . $currentYear . $lastInsertId;
        
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
        $updateSql = "UPDATE manage_users SET userid = '$agentid', token='$token'  WHERE id = '$lastInsertId'";
        $updateResult = mysqli_query($con, $updateSql);
        if($updateResult)
        {
            echo "<script>alert('Agent details added successfully!');location.href='agent-list.php';</script>";
        }
        else
        {
             echo "<script>alert('Warning ! Agent details added successfully! But userid is not created. kindly connect with Admin Team.');location.href='agent-list.php';</script>";
        }

        
    } else {
        // JavaScript code to display an error alert
        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
    } 
}


//Update Agent Details
// ==============================================================================================

if (isset($_POST['UpdateAgent'])) {
    $userid= get_safe_value($con, $_POST['userid']);
    $id= get_safe_value($con, $_POST['id']);
    $agentname = get_safe_value($con, $_POST['agentname']);
    $email = get_safe_value($con, $_POST['email']);
    $mobile = get_safe_value($con, $_POST['mobile']);
    $address = get_safe_value($con, $_POST['address']);
    $district = get_safe_value($con, $_POST['district']);
    $state = get_safe_value($con, $_POST['state']);
    $pincode = get_safe_value($con, $_POST['pincode']);
    $agentemployee = get_safe_value($con, $_POST['agentemployee']);
    $agentrole = get_safe_value($con, $_POST['agentrole']);
     //number
    $pannumber = get_safe_value($con, $_POST['pannumber']);
    $adharnumber = get_safe_value($con, $_POST['adharnumber']);
    //
    $status=get_safe_value($con, $_POST['status']);
    $currentDateTime = date('Y-m-d H:i:s');

     $updateSql = "UPDATE manage_users SET status='$status', name = '$agentname', email='$email', mobile='$mobile', address='$address', district='$district',  state='$state', pincode='$pincode',  agentemployee='$agentemployee',  userrole='$agentrole',  pannumber='$pannumber',  adharnumber='$adharnumber', updated_by='$userid', updated_at='$currentDateTime' WHERE id = '$id'";
        
        $updateResult = mysqli_query($con, $updateSql);
        if($updateResult)
        {
            echo "<script>alert('Agent details updated successfully!');location.href='agent-list.php';</script>";
        }
        else
        {
            echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
        }
    

}


?>