<?php 

include 'includes/header.php';
include 'includes/sidebar-menu.php';

//Select Query

$panimg=""; $adfrontimg=""; $adbackimg="";
$id= get_safe_value($con, $_GET['id']);

$sqlQuery = mysqli_query($con,"SELECT * FROM manage_users where id='$id'");
while($row=mysqli_fetch_assoc($sqlQuery))
{
    $panimg=$row['panimg'];
    $adfrontimg=$row['adharfrontimg'];
    $adbackimg=$row['adharbackimg'];
}
                 
    
         
        
?>



 <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">View Documents</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row align-items-top">
        <div class="col-lg-6">

          <!-- Default Card -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Aadhar Front Photo</h5>
              
              <img src="data:image/jpeg;base64,<?= base64_encode($adfrontimg); ?>" width="100%" alt="Pancard"/>
              
            </div>
          </div><!-- End Default Card -->

          
        </div>

        <div class="col-lg-6">

          <!-- Default Card -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Aadhar Front Photo</h5>
              <img src="data:image/jpeg;base64,<?= base64_encode($adbackimg); ?>" width="100%" alt="Aadhar"/>


            </div>
          </div><!-- End Default Card -->

          
        </div>

        <div class="col-lg-6">

          <!-- Default Card -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Pancard Photo</h5>
              <img src="data:image/jpeg;base64,<?= base64_encode($panimg); ?>" width="100%" alt="Aadhar"/>

            </div>
          </div><!-- End Default Card -->

          
        </div>

        

        

      </div>
    </section>

  </main><!-- End #main -->

  <?php include 'includes/footer.php';?>