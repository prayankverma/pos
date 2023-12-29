<?php
include 'includes/header.php';
include 'includes/sidebar-menu.php';

$token=get_safe_value($con, $_GET['token']);
$sqlQuery = mysqli_query($con,"SELECT * FROM manage_policy where token='$token' and isdelete=0  ORDER BY id desc");
$row=mysqli_fetch_assoc($sqlQuery);

$adfrontimg=$row['adharfrontimg'];
$adbackimg=$row['adharbackimg'];
$panimg=$row['pancardimg'];
$rcimg=$row['rc_image'];
$previous_img=$row['previous_policy_img'];
$addeddate=$row['created_at'];
$dateTime = new DateTime($addeddate);
$formattedDate = $dateTime->format('d-m-Y h:i A');
$current_status=$row['current_status'];
$policy_id=$row['id'];


if (isset($_POST['AttachScreenShot'])) 
{

  $newstatus='Payment Done';
  $currentDateTime = date('Y-m-d H:i:s');

  $insertQuery="insert into manage_policy_process(policy_id, status, created_by, created_at) values('$policy_id', '$newstatus', '$userid', '$currentDateTime')";
  $result = mysqli_query($con, $insertQuery);
  if ($result) 
  {
  
    $transaction_id=$_POST['transaction_id'];
    $paymentscreenshot = addslashes(file_get_contents($_FILES['paymentscreenshot']['tmp_name']));

    $updateSql = "UPDATE manage_policy SET current_status='$newstatus', isPayment=1, transaction_id='$transaction_id', payment_screenshot='$paymentscreenshot' WHERE id = '$policy_id'";
    $updateResult = mysqli_query($con, $updateSql);
    if($updateResult)
    {
        echo "<script>alert('Payment has been attachedn successfully!');location.href='view-policy-details.php?token=" . $token . "';</script>";
    }
    else {
      echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
    } 
  }
  else
  {
      echo "<script>alert('Error! Something went wrong.')</script>";
  }
}

?>

<body>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Lead</li>
          <li class="breadcrumb-item active">Policy Details</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-6">

          <div class="card">
            <div class="card-body profile-card pt-4 align-items-center">

              <div class="tab-pane fade show active profile-overview">
                  <div class="row">
                   <div class="col-lg-12">
                  
                  <h5 class="card-title">Policy Details</h5>
                   
                      <form action="" method="post" enctype="multipart/form-data">
                       <?php if($current_status=='Payment Request'){ ?> 
                        <div class="row">
                        <div class="col-lg-6">
                          <input type="text" name="transaction_id" class="form-control" required>
                        </div> 
                        <div class="col-lg-6">
                            <input type="file" name="paymentscreenshot" class="form-control" required>
                        </div>
                        <div class="col-lg-12 mt-3">
                          <button type="submit" name="AttachScreenShot" onclick="return confirm('Are you sure want pay ?')" class="btn btn-primary btn-sm">Pay</button>
                        </div>
                        </div>
                        <?php } ?>
                      </form> 
                    </div>
                  </div>
                 

                  <div class="row">
                     <?php if($current_status=='Payment Request'){ ?> 
                      <div class="col-lg-6 col-md-6 label">Amount</div>
                      <div class="col-lg-6 col-md-6">
                      <th>
                          <strong><?php echo $row['amount'];?></strong>
                      </th>
                    </div>
                    <?php } ?>
                  </div>
                     

                  <div class="row">   
                    <div class="col-lg-6 col-md-6 label">Current Status</div>
                    <div class="col-lg-6 col-md-6">
                      <td>
                        <?php if($current_status=='pending') { ?> 
                        <span class="badge bg-warning">Pending document verification</span>
                        <?php }  else if($current_status=='Document verified'){ ?>
                        <span class="badge bg-success">Document Verified</span>
                        <?php } else if($current_status=='Payment Request'){ ?>  
                          <span class="badge bg-warning">Payment Pending</span>
                        <?php } else if($current_status=='Payment Done'){ ?>  
                          <span class="badge bg-success">Payment Done</span>
                       <?php } else if($current_status=='Completed'){ ?>  
                          <span class="badge bg-success">Completed</span>
                        <?php } else {} ?>
                      </td>
                        

                          
                      </div>
                  </div>
                  <?php if($current_status=='Payment Done'){ ?>  
                  <div class="row">
                    <div class="col-lg-6 col-md-6 label">Transaction Id</div>
                    <div class="col-lg-6 col-md-6"><?php echo $row['transaction_id'];?></div>
                  </div>
                <?php } ?>
                  <div class="row">
                    <div class="col-lg-6 col-md-6 label">Date</div>
                    <div class="col-lg-6 col-md-6"><?php echo $formattedDate;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6 col-md-6 label">Vehicle Type</div>
                    <div class="col-lg-6 col-md-6"><?php echo $row['vehicle_type'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6 col-md-6 label">Vehicle Regno</div>
                    <div class="col-lg-6 col-md-6"><?php echo $row['regno'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6 col-md-6 label ">Full Name</div>
                    <div class="col-lg-6 col-md-6"><?php echo $row['name'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6 col-md-6 label">Email-ID</div>
                    <div class="col-lg-6 col-md-6"><?php echo $row['email'];?></div>
                  </div>

                 <div class="row">
                    <div class="col-lg-6 col-md-6 label">Address</div>
                    <div class="col-lg-6 col-md-6"><?php echo $row['address'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6 col-md-6 label">District</div>
                    <div class="col-lg-6 col-md-6"><?php echo $row['district'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6 col-md-6 label">State</div>
                    <div class="col-lg-6 col-md-6"><?php echo $row['state'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6 col-md-6 label">Pincode</div>
                    <div class="col-lg-6 col-md-6"><?php echo $row['pincode'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6 col-md-6 label">Pancard No.</div>
                    <div class="col-lg-6 col-md-6"><?php echo $row['pannumber'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6 col-md-6 label">Aadhar No.</div>
                    <div class="col-lg-6 col-md-6"><?php echo $row['adharnumber'];?></div>
                  </div>

                  

                </div>

            </div>
          </div>

        </div>

        <div class="col-xl-6">

          <div class="card" style="min-height: 530px;">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#rc">RC</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#pr_policy">Previous Policy</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link " data-bs-toggle="tab" data-bs-target="#aadhar">Aadhar</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#pancard">Pancard</button>
                </li>

              </ul>

              <!-- Profile Details -->

              <div class="tab-content pt-2">

                <div class="tab-pane fade show active pt-3" id="rc">
                  <div class="row mb-3">
                    <div class="col-lg-12 col-md-12 label">
                        <div class="mt-3">
                          <strong>Vehicle RC</strong>
                          <img src="data:image/jpeg;base64,<?= base64_encode($rcimg); ?>" width="100%" alt="Pancard"/>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="tab-pane fade pt-3" id="pr_policy">
                  <div class="row mb-3">
                    <div class="col-lg-12 col-md-12 label">
                        <div class="mt-3">
                          <strong>Previous Policy</strong>
                          <img src="data:image/jpeg;base64,<?= base64_encode($previous_img); ?>" width="100%" alt="Pancard"/>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="tab-pane fade " id="aadhar">
                  
                  <div class="row mb-3">
                    <div class="col-lg-12 col-md-12 label ">

                      <div class="mt-3">
                        <strong>Aadhar (Front Photo)</strong>
                        <img src="data:image/jpeg;base64,<?= base64_encode($adfrontimg); ?>" width="100%" alt="Aadhar Front"/>
                      </div>

                       <div class="mt-3">
                        <strong>Aadhar (Back Photo)</strong>
                        <img src="data:image/jpeg;base64,<?= base64_encode($adbackimg); ?>" width="100%" alt="Aadhar Front"/>
                      </div>
                      
                    </div>
                  </div>
                </div>

                <div class="tab-pane fade pt-3" id="pancard">
                  <div class="row mb-3">
                    <div class="col-lg-12 col-md-12 label">
                        <div class="mt-3">
                          <strong>Pancard Photo </strong>
                          <img src="data:image/jpeg;base64,<?= base64_encode($panimg); ?>" width="100%" alt="Pancard"/>
                        </div>
                    </div>
                  </div>
                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <?php include 'includes/footer.php'; ?>