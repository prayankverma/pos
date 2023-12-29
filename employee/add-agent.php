
<?php
include_once 'includes/header.php';
include_once 'includes/sidebar-menu.php';
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add Agent</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item">Manage Agent</li>
                <li class="breadcrumb-item active">Add Agent</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->




    <section class="section add-agent ">


        <!-- Floating Labels Form -->
        <form action="agent-controller.php" method="post"  enctype="multipart/form-data" class="row g-3 col-12 mt-4 mx-auto bg-white p-4  shadow bg-body rounded ">
            <input type="hidden" name="userid" value="<?php echo $userid;?>">
            <center>
                <h4><b>AGENT REGISTRATION</b></h4>
            </center>
            <div class="text-divider my-4">Personal Details</div><br><br>

            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" name="agentname" class="form-control" id="floatingName" placeholder="Your Name" required="">
                    <label for="floatingName">Agent Name</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="Your Email" required="">
                    <label for="floatingEmail">Email</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="tel" name="mobile" class="form-control" id="floatingMobile" placeholder="Mobile" required="">
                    <label for="floatingPassword">Mobile No.</label>
                </div>
            </div>
            <div class="col-12">
                <div class="form-floating">
                    <textarea class="form-control" name="address" placeholder="Address" id="floatingTextarea" style="height: 100px;" required=""></textarea>
                    <label for="floatingTextarea">Address</label>
                </div>
            </div>
            <div class="col-md-5">
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" name="district" class="form-control" id="floatingDistrict" placeholder="District" required="">
                        <label for="floatingCity">District</label>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <input type="text" name="state" class="form-control" id="floatingState" placeholder="State" required="">
                    <label for="floatingState">State</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating">
                    <input type="text" name="pincode" class="form-control" id="floatingZip" placeholder="Zip" required="">
                    <label for="floatingZip">Pin</label>
                </div>
            </div>

            <div class="text-divider my-4">Document Details & Uploads</div>

            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="reg-employee" name="agentemployee" aria-label="Employee" required="">
                        <option value="">---Select---</option>
                        <option value="0">None</option>
                        <?php
                            //Select Query
                            $getEmployeeSql = mysqli_query($con,"SELECT * FROM manage_users where usertype='employee' ORDER BY name asc");
                            while($row=mysqli_fetch_assoc($getEmployeeSql))
                            {
                        
                        ?>  
                        <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?> [<?php echo $row['userid'];?>]</option>
                        
                        <?php } ?>

                    </select>
                    <label for="floatingSelect">Select Employee</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="agent-role" name="agentrole" aria-label="Agent-Type" required="">
                        <option value="">---Select---</option>
                        <option value="Master">Master</option>
                        <option value="Individual">Individual</option>
                    </select>
                    <label for="floatingSelect">Select Agent Type</label>
                </div>
            </div>



            <div class="col-md-6">
                <div class=""><label for="floatingPan">Pan Number</label>
                    <input type="text" name="pannumber" class="form-control" placeholder="Enter Pan Card" required="">

                </div>
            </div>
            <div class="col-md-6">

                <div class="col-sm-10">
                    <label for="UploadPan">Upload Pan Card</label>
                    <input class="form-control" type="file" name="pancardimg" required="">
                </div>
            </div>
            <hr class="mt-4" >

            <div class="col-md-4">
                
                <div class="">
                    <label for="aadhar">Aadhar Number</label>
                    <input type="text" name="adharnumber" class="form-control" placeholder="Enter Aadhar Card" required="">

                </div>
            </div>

            <div class="col-md-4">

                <div class="col-sm-12">
                    <label for="UploadPan">Upload Aadhar Front</label>
                    <input class="form-control" type="file" name="adharfrontimg" required="">
                </div>
            </div>
            <div class="col-md-4">

                <div class="col-sm-12">
                    <label for="UploadPan">Upload Aadhar Back</label>
                    <input class="form-control" type="file" name="adharbackimg" required="">
                </div>
            </div>
            <hr class="mt-4" >
            <div class="text-center">
                <button type="submit" name="AddAgent" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
            
        </form><!-- End floating Labels Form -->
    </section>



</main><!-- End #main -->

<?php include_once 'includes/footer.php'; ?>