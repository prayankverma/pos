<?php
include 'includes/header.php';
include 'includes/sidebar-menu.php';
?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Agent Dashboard</li>
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
                <button class="nav-link active" id="pills-atab1" data-bs-toggle="pill" data-bs-target="#atab1" type="button" role="tab" aria-selected="true">Today</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-atab2" data-bs-toggle="pill" data-bs-target="#atab2" type="button" role="tab" aria-selected="false">Yesterday</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-atab3" data-bs-toggle="pill" data-bs-target="#atab3" type="button" role="tab" aria-selected="false">This Month</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-atab4" data-bs-toggle="pill" data-bs-target="#atab4" type="button" role="tab" aria-selected="false">Customise</button>
              </li>
            </ul>
            <div class="tab-content pt-2" id="myTabContent">
              <div class="tab-pane fade show active" id="atab1" role="tabpanel">

                <div class="row">


                  <div class="col-6">

                    <div class="col-2">
                      <div class="icon">
                        <i class="bi bi-bookmarks-fill" style="font-size:56px;color: gray;"> </i>
                      </div>
                    </div>
                    <div class="col-8">
                      <div style="font-size: 32px;"><strong>45</strong></div>
                      <div style="font-size: 16px;"><strong>Total Policy</strong></div>

                    </div>

                  </div>


                  <div class="col-6">

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

              <div class="tab-pane fade" id="atab2" role="tabpanel">
                <div class="row">
                  <div class="col-2">
                    <div class="icon">
                      <i class="bi bi-bookmarks-fill" style="font-size:56px;color: gray;"> </i>
                    </div>
                  </div>
                  <div class="col-8">
                    <div style="font-size: 32px;"><strong>45</strong></div>
                    <div style="font-size: 16px;"><strong>Total Policy</strong></div>

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

              <div class="tab-pane fade" id="atab3" role="tabpanel">
                <div class="row">
                  <div class="col-2">
                    <div class="icon">
                      <i class="bi bi-bookmarks-fill" style="font-size:56px;color: gray;"> </i>
                    </div>
                  </div>
                  <div class="col-8">
                    <div style="font-size: 32px;"><strong>45</strong></div>
                    <div style="font-size: 16px;"><strong>Total Policy</strong></div>

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

              <div class="tab-pane fade" id="atab4" role="tabpanel">
                <div class="row">
                  <div class="col-2">
                    <div class="icon">
                      <i class="bi bi-bookmarks-fill" style="font-size:56px;color: gray;"> </i>
                    </div>
                  </div>
                  <div class="col-8">
                    <div style="font-size: 32px;"><strong>45</strong></div>
                    <div style="font-size: 16px;"><strong>Total Policy</strong></div>

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
      <div class="col-lg-6">


      
      
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