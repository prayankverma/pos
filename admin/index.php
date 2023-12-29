<?php
include_once 'includes/header.php';
include_once 'includes/sidebar-menu.php';

//============================Manage Policy==========================================//
//Today Query
$currentDate = date('Y-m-d');
$todayPolicy = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS total FROM manage_policy WHERE isdelete=0 AND DATE(created_at) = '$currentDate'"))['total'] ?? 0;

//Vehicle Type Based (Two-wheeler, Commercial, Car)
$todayCarPolicy = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS total FROM manage_policy WHERE vehicle_type='Car' and isdelete=0 AND DATE(created_at) = '$currentDate'"))['total'] ?? 0;
$today2wheelerPolicy = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS total FROM manage_policy WHERE vehicle_type='Two-wheeler' and isdelete=0 AND DATE(created_at) = '$currentDate'"))['total'] ?? 0;
$todayCommercialPolicy = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS total FROM manage_policy WHERE vehicle_type='Commercial' and isdelete=0 AND DATE(created_at) = '$currentDate'"))['total'] ?? 0;



?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Admin Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <div class="col-lg-6">
         <div class="card">
            <div class="card-body mt-3">
              <!-- <h5 class="card-title">Pills Tabs</h5> -->

              <!-- Pills Tabs -->
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-atab1" data-bs-toggle="pill"  type="button" role="tab" aria-selected="true" onclick="handleClick('todayval');">Today</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-atab2" data-bs-toggle="pill" type="button" role="tab"  aria-selected="false" onclick="handleClick('yesterdayval');">Yesterday</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-atab3" data-bs-toggle="pill" type="button" role="tab"  aria-selected="false" onclick="handleClick('monthval');">This Month</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-atab4" data-bs-toggle="pill" type="button" role="tab"  aria-selected="false" onclick="handleClick('customise');">Customise</button>
                </li>
              </ul>
              <div class="tab-content pt-2" id="myTabContent">
                <div class="tab-pane fade show active">
                  
                  <div class="row">
                    <div class="col-2">
                      <div class="icon">
                        <i class="bi bi-bookmarks-fill" style="font-size:56px;color: gray;"> </i>
                      </div>
                    </div>
                    <div class="col-8">
                       <div style="font-size: 32px;"><strong><span id="totalPolicy"><?php echo $todayPolicy;?></span></strong></div>
                       <div style="font-size: 16px;"><strong>Total Policy</strong></div>

                    </div>
                  </div>

                  <div class="row mt-3">
                    <div class="col-4">
                        <div class="box-sty"><span id="totalCarPolicy"><?php echo $todayCarPolicy;?></span></div>
                        <div class="box-text mt-2">Car</div>
                    </div>
                    <div class="col-4">
                      <div class="box-sty"><span id="totaltwowheelerPolicy"><?php echo $today2wheelerPolicy;?></span></div>
                      <div class="box-text mt-2">Two Wheeler</div>
                    </div>
                    <div class="col-4">
                      <div class="box-sty"><span id="totalCommercialPolicy"><?php echo $todayCommercialPolicy;?></span></div>
                      <div class="box-text mt-2">Commercial</div>
                   </div>
                  </div>
                  
                </div>

              </div><!-- End Pills Tabs -->

            </div>
          </div>
      </div>
      <div class="col-lg-6">
         <div class="card">
            <div class="card-body mt-3">
              <!-- <h5 class="card-title">Pills Tabs</h5> -->

              <!-- Pills Tabs -->
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-btab1" data-bs-toggle="pill" data-bs-target="#btab1" type="button" role="tab" aria-selected="true">Today</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-btab2" data-bs-toggle="pill" data-bs-target="#btab2" type="button" role="tab"  aria-selected="false">Yesterday</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-btab3" data-bs-toggle="pill" data-bs-target="#btab3" type="button" role="tab"  aria-selected="false">This Month</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-btab4" data-bs-toggle="pill" data-bs-target="#btab4" type="button" role="tab"  aria-selected="false">Customise</button>
                </li>
              </ul>
              <div class="tab-content pt-2" id="myTabContent">
                <div class="tab-pane fade show active" id="btab1" role="tabpanel" >
                  <div class="row">
                    <div class="col-2">
                      <div class="icon">

                        <i class="bi bi-currency-exchange" style="font-size:56px;color: gray;"> </i>
                      </div>
                    </div>
                    <div class="col-8">
                       <div style="font-size: 32px;"><strong>45</strong></div>
                       <div style="font-size: 16px;"><strong>Total Premium</strong></div>

                    </div>
                  </div>

                  <div class="row mt-3">
                    <div class="col-4">
                        <div class="box-sty">10</div>
                        <div class="box-text mt-2">Car</div>
                    </div>
                    <div class="col-4">
                      <div class="box-sty">0</div>
                      <div class="box-text mt-2">Two Wheeler</div>
                    </div>
                    <div class="col-4">
                      <div class="box-sty">0</div>
                      <div class="box-text mt-2">Commercial</div>
                   </div>
                  </div>
                </div>

                <div class="tab-pane fade" id="btab2" role="tabpanel" >
                  <div class="row">
                    <div class="col-2">
                      <div class="icon">

                        <i class="bi bi-currency-exchange" style="font-size:56px;color: gray;"> </i>
                      </div>
                    </div>
                    <div class="col-8">
                       <div style="font-size: 32px;"><strong>45</strong></div>
                       <div style="font-size: 16px;"><strong>Total Premium</strong></div>

                    </div>
                  </div>

                  <div class="row mt-3">
                    <div class="col-4">
                        <div class="box-sty">10</div>
                        <div class="box-text mt-2">Car</div>
                    </div>
                    <div class="col-4">
                      <div class="box-sty">5</div>
                      <div class="box-text mt-2">Two Wheeler</div>
                    </div>
                    <div class="col-4">
                      <div class="box-sty">10</div>
                      <div class="box-text mt-2">Commercial</div>
                   </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="btab3" role="tabpanel" >
                 <div class="row">
                    <div class="col-2">
                      <div class="icon">

                        <i class="bi bi-currency-exchange" style="font-size:56px;color: gray;"> </i>
                      </div>
                    </div>
                    <div class="col-8">
                       <div style="font-size: 32px;"><strong>45</strong></div>
                       <div style="font-size: 16px;"><strong>Total Premium</strong></div>

                    </div>
                  </div>

                  <div class="row mt-3">
                    <div class="col-4">
                        <div class="box-sty">10</div>
                        <div class="box-text mt-2">Car</div>
                    </div>
                    <div class="col-4">
                      <div class="box-sty">5</div>
                      <div class="box-text mt-2">Two Wheeler</div>
                    </div>
                    <div class="col-4">
                      <div class="box-sty">10</div>
                      <div class="box-text mt-2">Commercial</div>
                   </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="btab4" role="tabpanel" >
                 <div class="row">
                    <div class="col-2">
                      <div class="icon">

                        <i class="bi bi-currency-exchange" style="font-size:56px;color: gray;"> </i>
                      </div>
                    </div>
                    <div class="col-8">
                       <div style="font-size: 32px;"><strong>45</strong></div>
                       <div style="font-size: 16px;"><strong>Total Premium</strong></div>

                    </div>
                  </div>

                  <div class="row mt-3">
                    <div class="col-4">
                        <div class="box-sty">10</div>
                        <div class="box-text mt-2">Car</div>
                    </div>
                    <div class="col-4">
                      <div class="box-sty">5</div>
                      <div class="box-text mt-2">Two Wheeler</div>
                    </div>
                    <div class="col-4">
                      <div class="box-sty">10</div>
                      <div class="box-text mt-2">Commercial</div>
                   </div>
                  </div>
                </div>
              </div><!-- End Pills Tabs -->

            </div>
          </div>
      </div>



      
  </section>

  <!-- Chart -->

  <section class="section">
    <div class="row">



      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Performance </h5>

            <!-- Bar Chart -->
            <canvas id="barChart" style="max-height: 400px;"></canvas>
            <script>
              document.addEventListener("DOMContentLoaded", () => {
                new Chart(document.querySelector('#barChart'), {
                  type: 'bar',
                  data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                    datasets: [{
                      label: 'Bar Chart',
                      data: [65, 59, 80, 81, 56, 55, 40],
                      backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                      ],
                      borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                      ],
                      borderWidth: 1
                    }]
                  },
                  options: {
                    scales: {
                      y: {
                        beginAtZero: true
                      }
                    }
                  }
                });
              });
            </script>
            <!-- End Bar CHart -->

          </div>
        </div>
      </div>




    </div>
  </section>

</main><!-- End #main -->

<?php include 'includes/footer.php'; ?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script type="text/javascript">
  function handleClick(selectedval) {
    var getval = selectedval;
    console.log(selectedval);
    
    $.ajax({
        url: "get-policy-data-ajax.php",
        dataType: 'json',
        type: 'POST',
        async: false,
        data: { getval: getval },
        success: function (data) {
            if (data.totalPolicy !== undefined) {
                $('#totalPolicy').html(data.totalPolicy);
                $('#totaltwowheelerPolicy').html(data.totaltwowheelerPolicy);
                $('#totalCarPolicy').html(data.totalCarPolicy);
                $('#totalCommercialPolicy').html(data.totalCommercialPolicy);
            } else {
                console.log('Error: totalPolicy not defined in response.');
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('Error in AJAX request:', textStatus, errorThrown);
        }
    });
}

</script>