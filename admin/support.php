<?php
include 'includes/header.php';
include 'includes/sidebar-menu.php';
?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Contact</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Help & Support</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section contact">

    <div class="row gy-4">

      <div class="col-xl-6">

        <div class="row">

          <div class="col-lg-12">
            <div class="info-box card">
              <i class="bi bi-telephone"></i>
              <h3>Call Us</h3>
              +91 8004891173
            </div>
          </div>
          <div class="col-lg-12">
            <div class="info-box card">
              <i class="bi bi-envelope"></i>
              <h3>Email Us</h3>
              info@thenimbusinsurance.com
            </div>
          </div>

        </div>

      </div>

      <div class="col-xl-6">
        <div class="card p-4">
          <form class="php-email-form">
            <div class="row gy-4">
              <div class="col-md-12">
                <div class="">
                  <span class="mb-3 response-success text-success"></span>
                  <span class="mb-3 response-error text-success"></span>
                </div>
              </div>
              <strong><center><h4>Help & Support</h4></center></b></strong>
            <center><p>Send Message for quick help on Support</p> </center>


              <div class="col-md-12">
                <input type="text" class="form-control" name="subject" placeholder="Subject" required>
              </div>

              <div class="col-md-12">
                <textarea class="form-control" name="message" rows="1" placeholder="Message" required></textarea>
              </div>

              <div class="col-md-12 text-center">
                <div class="loading">Loading</div>


                <button type="submit">Send Message</button>
              </div>

            </div>
          </form>
        </div>

      </div>

    </div>

  </section>

</main><!-- End #main -->
<?php include 'includes/footer.php'; ?>
<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
  $(document).ready(function() {
    // Intercept the form submission
    $(".php-email-form").submit(function(e) {
      e.preventDefault(); // Prevent the default form submission

      // Get form data
      var formData = $(this).serialize();

      // Reference to the form
      var form = this;

      // Send AJAX request
      $.ajax({
        type: "POST",
        url: "send-request.php", // Replace with the actual PHP page URL
        data: formData,
        success: function(response) {
          // Handle the successful response
          $(".response-success").html(response); // Display the success message

          // Reset the form to clear the input fields
          form.reset();
        },
        error: function(xhr, status, error) {
          // Handle errors
          $(".response-error").html("Error: " + error); // Display the error message
        },
        beforeSend: function() {
          // Show loading message
          $(".loading").show();
        },
        complete: function() {
          // Hide loading message after request is complete
          $(".loading").hide();
        }
      });
    });
  });
</script>