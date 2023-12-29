<?php
include_once '../dbcon.php';
include_once '../function.php';

if (isset($_POST['getval'])) {

    $getval = $_POST['getval'];
    if($getval=='todayval')
    {
    	$currentDate = date('Y-m-d');
		$totalPolicy = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS total FROM manage_policy WHERE isdelete=0 AND DATE(created_at) = '$currentDate'"))['total'] ?? 0;
		$data["totalPolicy"] = $totalPolicy;
		
		//==============================Vehicle Type======================================

		// 1. Car
		$totalCarPolicy = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS total FROM manage_policy WHERE vehicle_type='Car' and isdelete=0 AND DATE(created_at) = '$currentDate'"))['total'] ?? 0;
		$data["totalCarPolicy"] = $totalCarPolicy;

		// 2. Two-Wheeler
			$totaltwowheelerPolicy = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS total FROM manage_policy WHERE vehicle_type='Two-wheeler' and isdelete=0 AND DATE(created_at) = '$currentDate'"))['total'] ?? 0;
			$data["totaltwowheelerPolicy"] = $totaltwowheelerPolicy;
		
		// 3. Commercial
			$totalCommercialPolicy = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS total FROM manage_policy WHERE vehicle_type='Commercial' and isdelete=0 AND DATE(created_at) = '$currentDate'"))['total'] ?? 0;
			$data["totalCommercialPolicy"] = $totalCommercialPolicy;


    }
    else if($getval=='yesterdayval')
    {
    	$yesterdayDate = date('Y-m-d', strtotime('-1 day'));
    	$totalPolicy = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS total FROM manage_policy WHERE isdelete=0 AND DATE(created_at) = '$yesterdayDate'"))['total'] ?? 0;
		$data["totalPolicy"] = $totalPolicy;

		//==============================Vehicle Type======================================
		// 1. Car
    	$totalCarPolicy = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS total FROM manage_policy WHERE vehicle_type='Car' and isdelete=0 AND DATE(created_at) = '$yesterdayDate'"))['total'] ?? 0;
		$data["totalCarPolicy"] = $totalCarPolicy;

		// 2. Two-Wheeler
			$totaltwowheelerPolicy = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS total FROM manage_policy WHERE vehicle_type='Two-wheeler' and isdelete=0 AND DATE(created_at) = '$yesterdayDate'"))['total'] ?? 0;
			$data["totaltwowheelerPolicy"] = $totaltwowheelerPolicy;
		
		// 3. Commercial
			$totalCommercialPolicy = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS total FROM manage_policy WHERE vehicle_type='Commercial' and isdelete=0 AND DATE(created_at) = '$yesterdayDate'"))['total'] ?? 0;
			$data["totalCommercialPolicy"] = $totalCommercialPolicy;
    }
    else if($getval=='monthval')
    {
    	$currentMonth = date('Y-m');
		$totalPolicy = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS total FROM manage_policy WHERE isdelete=0 AND DATE_FORMAT(created_at, '%Y-%m') = '$currentMonth'"))['total'] ?? 0;
		$data["totalPolicy"] = $totalPolicy;

		//==============================Vehicle Type======================================
		// 1. Car
    	$totalCarPolicy = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS total FROM manage_policy WHERE vehicle_type='Car' and isdelete=0 AND DATE_FORMAT(created_at, '%Y-%m') = '$currentMonth'"))['total'] ?? 0;
		$data["totalCarPolicy"] = $totalCarPolicy;

		// 2. Two-Wheeler
			$totaltwowheelerPolicy = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS total FROM manage_policy WHERE vehicle_type='Two-wheeler' and isdelete=0 AND DATE_FORMAT(created_at, '%Y-%m') = '$currentMonth'"))['total'] ?? 0;
			$data["totaltwowheelerPolicy"] = $totaltwowheelerPolicy;
		
		// 3. Commercial
			$totalCommercialPolicy = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS total FROM manage_policy WHERE vehicle_type='Commercial' and isdelete=0 AND DATE_FORMAT(created_at, '%Y-%m') = '$currentMonth'"))['total'] ?? 0;
			$data["totalCommercialPolicy"] = $totalCommercialPolicy;
    }
    else
    {
    	$todayPolicy=0;
    }
    

  
    
    echo json_encode($data);
} else {
    // Handle the case where 'getval' is not set
    echo json_encode(['error' => 'Invalid request']);
}
?>
