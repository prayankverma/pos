<?php
include 'includes/header.php';
include 'includes/sidebar-menu.php';
?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Sell Policy</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Pages</li>
        <li class="breadcrumb-item active">Sell Policy</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->



  <!-- Vertical Form -->
  <form action="sell-policy-controller.php" method="post"  enctype="multipart/form-data"  class="row g-3 row g-3 col-12 mt-4 mx-auto bg-white p-4  shadow bg-body rounded ">
    <input type="hidden" name="userid" value="<?php echo $userid;?>">
    <div class="text-divider my-4">Personal Details</div><br><br>
    <div class="col-6">
      <label for="inputNanme4" class="form-label"> Name</label>
      <input type="text" name="name" class="form-control" id="inputNanme4" placeholder="Enter name..." required="">
    </div>
    <div class="col-6">
      <label for="inputEmail4" class="form-label">Email</label>
      <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Enter email..." required="">
    </div>
    <div class="col-12">
      <label for="inputAddress" class="form-label">Address</label>
      <input type="text" name="address" class="form-control" id="inputAddress" placeholder="Enter address..." required="">
    </div>
    <div class="col-4">
      <label for="inputAddress" class="form-label">District</label>
      <input type="text" name="district" class="form-control" id="inputAddress" placeholder="Enter district..." required="">
    </div>
    <div class="col-4">
      <label for="inputAddress" class="form-label">State</label>
      <input type="text" name="state" class="form-control" id="inputAddress" placeholder="Enter state..." required="">
    </div>
    <div class="col-4">
      <label for="inputAddress" class="form-label">Pin Code</label>
      <input type="text" name="pincode" class="form-control" id="inputAddress" placeholder="Enter pincode..." required="">
    </div>
    <div class="text-divider my-4">Vehicle Details</div><br><br>




    <div class="col-md-12">
      <div class="form-floating mb-3">
        <select class="form-select" id="reg-employee" name="vehicletype" aria-label="Employee" required="">
          <option value="">---Select---</option>
          <option value="Two-wheeler">2 Wheeler</option>
          <option value="Commercial">Commercial</option>
          
          <option value="Car">Car</option>
          

        </select>
        <label for="floatingSelect">Select Vehicle Type</label>
      </div>
    </div>




    <div class="col-4">
      <label for="inputAddress" class="form-label">Registration Number</label>
      <input type="text" name="regno" class="form-control" id="inputAddress" placeholder="UP 41ax 4634" required="">
    </div>
    <div class="col-md-4">
      <div class="col-sm-12">
        <label for="UploadPan" class="form-label">Upload RC</label>
        <input class="form-control" type="file"  name="rc_image" required="">
      </div>
    </div>
    <div class="col-md-4">
      <div class="col-sm-12">
        <label for="UploadPan" class="form-label">Upload Previous Policy </label>
        <input class="form-control" type="file" name="previous_policy_img" required="">
      </div>
    </div>
    <div class="col-4">
      <label for="inputAddress" class="form-label">Aadhar Number</label>
      <input type="text" name="adharnumber" class="form-control" id="inputAddress" placeholder="123456789765" required="">
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
    <div class="col-6">
      <label for="inputAddress" class="form-label">Pan Number</label>
      <input type="text" class="form-control" name="pannumber" id="inputAddress" placeholder="ABCDA001Z" required="">
    </div>
    <div class="col-md-6">
      <div class="col-sm-12">
        <label for="UploadPan">Upload Pan</label>
        <input class="form-control" type="file" name="pancardimg" required="">
      </div>
    </div>









    <div class="text-center">
      <button type="submit" name="AddSellPolicy" class="btn btn-primary">Submit</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
    </div>
  </form><!-- Vertical Form -->


</main><!-- End #main -->
<?php include 'includes/footer.php'; ?>