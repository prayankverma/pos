
<?php
include_once 'includes/header.php';
include_once 'includes/sidebar-menu.php';


$editid=get_safe_value($con, $_GET['editid']);
$sqlQuery = mysqli_query($con,"SELECT *FROM manage_users where id='$editid'");
$getrow=mysqli_fetch_array($sqlQuery);


?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add Agent</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item">Manage Agent</li>
                <li class="breadcrumb-item active">Edit Agent</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->




    <section class="section add-agent ">


        <!-- Floating Labels Form -->
        <form action="employee-controller.php" method="post"  enctype="multipart/form-data" class="row g-3 col-12 mt-4 mx-auto bg-white p-4  shadow bg-body rounded ">
            <input type="hidden" name="userid" value="<?php echo $userid;?>">
             <input type="hidden" name="id" value="<?php echo $editid;?>">
            <center>
                <h4><b>UPDATE AGENT DETAILS</b></h4>
            </center>
            <div class="text-divider my-4">Personal Details</div><br><br>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="status" name="status" aria-label="status" required="">
                        <option value="">---Select---</option>
                        <option value="active" <?php if($getrow['status']=='active'){echo 'Selected';} ?> > Active</option>
                        <option value="Inactive" <?php if($getrow['status']=='Inactive'){echo 'Selected';} ?>>Inactive</option>
                    </select>
                    <label for="floatingSelect">Select Status</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" name="agentname" value="<?php echo $getrow['name'];?>" class="form-control" id="floatingName" placeholder="Your Name" required="">
                    <label for="floatingName">Agent Name</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="email" name="email" value="<?php echo $getrow['email'];?>" class="form-control" id="floatingEmail" placeholder="Your Email" required="">
                    <label for="floatingEmail">Email</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="tel" name="mobile" value="<?php echo $getrow['mobile'];?>" class="form-control" id="floatingMobile" placeholder="Mobile" required="">
                    <label for="floatingPassword">Mobile No.</label>
                </div>
            </div>
            <div class="col-12">
                <div class="form-floating">
                    <textarea class="form-control" name="address"  placeholder="Address" id="floatingTextarea" style="height: 100px;" required=""><?php echo $getrow['address'];?></textarea>
                    <label for="floatingTextarea">Address</label>
                </div>
            </div>
            <div class="col-md-5">
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" name="district" value="<?php echo $getrow['district'];?>" class="form-control" id="floatingDistrict" placeholder="District" required="">
                        <label for="floatingCity">District</label>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <input type="text" name="state" value="<?php echo $getrow['state'];?>" class="form-control" id="floatingState" placeholder="State" required="">
                    <label for="floatingState">State</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating">
                    <input type="text" name="pincode" value="<?php echo $getrow['pincode'];?>" class="form-control" id="floatingZip" placeholder="Zip" required="">
                    <label for="floatingZip">Pin</label>
                </div>
            </div>

            <div class="text-divider my-4">Document Details & Uploads</div>

            


            <div class="col-md-6">
                <div class=""><label for="floatingPan">Pan Number</label>
                    <input type="text" name="pannumber" value="<?php echo $getrow['pannumber'];?>"  class="form-control" placeholder="Enter Pan Card" required="">

                </div>
            </div>

            <div class="col-md-6">
                
                <div class="">
                    <label for="aadhar">Aadhar Number</label>
                    <input type="text" name="adharnumber" value="<?php echo $getrow['adharnumber'];?>"  class="form-control" placeholder="Enter Aadhar Card" required="">

                </div>
            </div>
           
            
            <hr class="mt-4" >
            <div class="text-center">
                <button type="submit" name="UpdateAgent" class="btn btn-primary">Update</button>
                
            </div>
            
        </form><!-- End floating Labels Form -->
    </section>



</main><!-- End #main -->

<?php include_once 'includes/footer.php'; ?>