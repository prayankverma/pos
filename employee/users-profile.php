<?php
include 'includes/header.php';
include 'includes/sidebar-menu.php';
?>

<body>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="../assets/img/profile-img.jpg" alt="Profile" >
              <h2><?php echo $name ? $name : "NA";?></h2>
              <div class="pt-2">
                <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profile Details</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>

              <!-- Profile Details -->

              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8">Kevin Anderson</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Position</div>
                    <div class="col-lg-9 col-md-8">Eg Master Agent , Individual, Employee</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8">Full Address (address+ District+ state+pin)</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8">(436) 486-3538 x29071</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email-ID</div>
                    <div class="col-lg-9 col-md-8">k.anderson@example.com</div>
                  </div>

                  <h5 class="card-title">Document Details </h5>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label ">Pan Card Number</div>
                    <div class="col-lg-8 col-md-8">BLOIUYT5465</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Aadhar Number</div>
                    <div class="col-lg-8  col-md-8">7654 8765 8767 0986</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Bank Account Number</div>
                    <div class="col-lg-8 col-md-8">876543256789</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">IFSC CODE</div>
                    <div class="col-lg-8 col-md-8">k.anderson@example.com</div>
                  </div>

                </div>






                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form id="changePasswordForm">
                    <input type="hidden" name="userid" id="userid" value="<?php echo $userid;?>">
                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="currentPassword" type="password" class="form-control" id="currentPassword" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newPassword" type="password" class="form-control" id="newPassword" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewPassword" type="password" class="form-control" id="renewPassword" required>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <?php include 'includes/footer.php'; ?>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
$(document).ready(function() {
    // Intercept the form submission
    $("#changePasswordForm").submit(function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Get form data
        var formData = $(this).serialize();

        // Send AJAX request
        $.ajax({
            type: "POST",
            url: "change-password.php", // Replace with the actual PHP page URL
            data: formData,
            success: function(response) {
                // Handle the successful response
                alert(response); // Display the success message or handle it as needed

               // Check if the response contains the word 'success' (adjust this based on your actual response)
              if (response.includes("Password changed successfully")) {
                    // Reset the form
                    $("#changePasswordForm")[0].reset();
                }
            },
            error: function(xhr, status, error) {
                // Handle errors
                alert("Error: " + error); // Display the error message
            }
        });
    });
});
</script>
