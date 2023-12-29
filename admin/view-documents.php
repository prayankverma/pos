<?php 
include_once './dbcon.php';
include_once './function.php';
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

                
//Upload Adhar Front    
if(isset($_POST['UploadFrontAdhar'])){
    

    $adharfrontimg = addslashes(file_get_contents($_FILES['adharfrontimg']['tmp_name']));

    $updateSql = "UPDATE manage_users SET adharfrontimg = '$adharfrontimg' WHERE id = '$id'";
    $updateResult = mysqli_query($con, $updateSql);
    if($updateResult)
    {
        echo "<script>alert('Updated successfully!');;location.href='view-documents.php?id=$id';</script>";
    }
    else {
      echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
    } 

    
} 

if(isset($_POST['UploadBackAdhar'])){
  $adharbackimg = addslashes(file_get_contents($_FILES['adharbackimg']['tmp_name']));

  $updateSql = "UPDATE manage_users SET adharbackimg = '$adharbackimg' WHERE id = '$id'";
  $updateResult = mysqli_query($con, $updateSql);
  if($updateResult)
  {
      echo "<script>alert('Updated successfully!');location.href='view-documents.php?id=$id';</script>";
  }
  else {
    echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
  } 
    
} 

if(isset($_POST['UploadPan'])){
  $pancardimg = addslashes(file_get_contents($_FILES['pancardimg']['tmp_name']));

  $updateSql = "UPDATE manage_users SET panimg = '$pancardimg' WHERE id = '$id'";
  $updateResult = mysqli_query($con, $updateSql);
  if($updateResult)
  {
      echo "<script>alert('Updated successfully!');;location.href='view-documents.php?id=$id';</script>";
  }
  else {
    echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
  } 
 
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
              <div class="row">
                <div class="col-lg-6">
                  <h5 class="card-title">Aadhar Front Photo</h5>
              
                </div>
                <div class="col-lg-6 mt-3" style="text-align:right">
                  <!-- Basic Modal -->
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#model1">
                      Update Photo
                    </button>
                    <div class="modal fade" id="model1" tabindex="-1" style="margin-top: 7rem;">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Upload Front Image</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data" >
                                <div class="col-sm-12">
                                  <input class="mt-5 form-control" type="file" name="adharfrontimg" required="">
                              </div>
                               <div class="text-center mt-5">
                                  <button type="submit" name="UploadFrontAdhar" class="btn btn-primary">Upload</button>
                                 
                              </div>
                            </form>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                <!-- End Basic Modal-->
                  
                </div>
              </div>
             
              
              <img src="data:image/jpeg;base64,<?= base64_encode($adfrontimg); ?>" width="100%" alt="Pancard"/>
              
            </div>
          </div><!-- End Default Card -->

          
        </div>

        <div class="col-lg-6">

          <!-- Default Card -->
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <h5 class="card-title">Aadhar Back Photo</h5>
              
                </div>
                <div class="col-lg-6 mt-3" style="text-align:right">
                  <!-- Basic Modal -->
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#model2">
                      Update Photo
                    </button>
                    <div class="modal fade" id="model2" tabindex="-1" style="margin-top: 7rem;">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Upload Back Image</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="col-sm-12">
                                  <input class="mt-5 form-control" type="file" name="adharbackimg" required="">
                              </div>
                               <div class="text-center mt-5">
                                  <button type="submit" name="UploadBackAdhar" class="btn btn-primary">Upload</button>
                                 
                              </div>
                            </form>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                <!-- End Basic Modal-->
                  
                </div>
              </div>
              
              <img src="data:image/jpeg;base64,<?= base64_encode($adbackimg); ?>" width="100%" alt="Aadhar"/>


            </div>
          </div><!-- End Default Card -->

          
        </div>

        <div class="col-lg-6">

          <!-- Default Card -->
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <h5 class="card-title">Pancard Photo</h5>
              
                </div>
                <div class="col-lg-6 mt-3" style="text-align:right">
                  <!-- Basic Modal -->
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#model3">
                      Update Photo
                    </button>
                    <div class="modal fade" id="model3" tabindex="-1" style="margin-top: 7rem;">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Upload Pan Image</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="col-sm-12">
                                  <input class="mt-5 form-control" type="file" name="pancardimg" required="">
                              </div>
                               <div class="text-center mt-5">
                                  <button type="submit" name="UploadPan" class="btn btn-primary">Upload</button>
                                 
                              </div>
                            </form>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                <!-- End Basic Modal-->
                  
                </div>
              </div>
              
              <img src="data:image/jpeg;base64,<?= base64_encode($panimg); ?>" width="100%" alt="Aadhar"/>

            </div>
          </div><!-- End Default Card -->

          
        </div>

        

        

      </div>
    </section>

  </main><!-- End #main -->

  <?php include 'includes/footer.php';?>