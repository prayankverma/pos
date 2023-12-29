<?php
include_once '../dbcon.php';
include_once '../function.php';

if (isset($_POST['AddSellPolicy'])) {
    // Assuming you have a function get_safe_value to sanitize input and prevent SQL injection
    $addedby=get_safe_value($con, $_POST['userid']);
    $name = get_safe_value($con, $_POST['name']);
    $email = get_safe_value($con, $_POST['email']);
    $address = get_safe_value($con, $_POST['address']);
    $district = get_safe_value($con, $_POST['district']);
    $state = get_safe_value($con, $_POST['state']);
    $pincode = get_safe_value($con, $_POST['pincode']);
    $vehicletype = get_safe_value($con, $_POST['vehicletype']);
    $regno = get_safe_value($con, $_POST['regno']);
    $adharnumber = get_safe_value($con, $_POST['adharnumber']);
    $pannumber = get_safe_value($con, $_POST['pannumber']);

    // Handling image uploads
    $rc_image = addslashes(file_get_contents($_FILES['rc_image']['tmp_name']));
    $previous_policy_img = addslashes(file_get_contents($_FILES['previous_policy_img']['tmp_name']));
    $adharfrontimg = addslashes(file_get_contents($_FILES['adharfrontimg']['tmp_name']));
    $adharbackimg = addslashes(file_get_contents($_FILES['adharbackimg']['tmp_name']));
    $pancardimg = addslashes(file_get_contents($_FILES['pancardimg']['tmp_name']));

    //
    $currentDateTime = date('Y-m-d H:i:s');
    
    // Check if regno already exists in the database
    $check_query = "SELECT * FROM manage_policy WHERE regno = '$regno'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo "Registration number already exists. Record not added.";
    } else {

        // Insert data into the database
        $insert_query = "INSERT INTO manage_policy (name, email, address, district, state, pincode, vehicle_type, regno, rc_image, previous_policy_img, adharnumber, pannumber, adharfrontimg, adharbackimg, pancardimg, created_by, created_at) 
                         VALUES ('$name', '$email', '$address', '$district', '$state', '$pincode', '$vehicletype', '$regno', '$rc_image', '$previous_policy_img', '$adharnumber', '$pannumber', '$adharfrontimg', '$adharbackimg', '$pancardimg', '$addedby', '$currentDateTime')";

        $result = mysqli_query($con, $insert_query);
        if ($result) 
        {
            $lastInsertId = $con->insert_id;
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
            $updateSql = "UPDATE manage_policy SET token='$token' WHERE id = '$lastInsertId'";
            $updateResult = mysqli_query($con, $updateSql);
            if($updateResult)
            {
                echo "<script>alert('Data inserted successfully!');location.href='lead.php';</script>";
            } else {
                echo "Error: " . mysqli_error($con);
            }
        }
    }
}
?>
