<?php
include_once '../dbcon.php';
include_once '../function.php';

// Retrieve form data
$userid= get_safe_value($con, $_POST['userid']);
$currentPassword = get_safe_value($con, $_POST['currentPassword']);
$newPassword = get_safe_value($con, $_POST['newPassword']);
$renewPassword = get_safe_value($con, $_POST['renewPassword']);

// Check if the new password matches the re-entered password
if ($newPassword !== $renewPassword) {
    echo "Error: New passwords do not match";
    exit();
}


// Fetch the current password from the database for the user
$sql = "SELECT password FROM manage_users WHERE id = $userid";
$result = mysqli_query($con, $sql);
if ($result->num_rows > 0) {
    $row = mysqli_fetch_array($result);
    $storedPassword = $row['password'];

    // Check if the entered current password matches the stored password
    if ($currentPassword === $storedPassword) {
        $updateSql = "UPDATE manage_users SET password = '$newPassword' WHERE id = $userid";
        $checkpassword=mysqli_query($con, $updateSql);

        if ($checkpassword === TRUE) {
            echo "Password changed successfully";
        } else {
            echo "Error updating password: " . $con->error;
        }
    } else {
        echo "Error: Current password is incorrect";
    }
} else {
    echo "Error: User not found";
}

?>
