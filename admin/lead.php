<?php
include 'includes/header.php';
include 'includes/sidebar-menu.php';
?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Lead</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Lead</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <!-- Table -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Lead List</h5>
              <!--Start Table-->
                
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr class="table-secondary">
                      <th>#</th>
                      <th>Created On</th>
                      <th>Agent</th>
                      <th>Name</th>
                      <th>Vehicle Type</th>
                      <th>Vehicle Number</th>
                      <th>Current Status</th>
                      <th>View Details</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                     try {
                      $i=0;
                      //Select Query
                      $sqlQuery = mysqli_query($con,"SELECT * FROM manage_policy where isdelete=0  ORDER BY id desc");
                      if (mysqli_num_rows($sqlQuery) > 0) 
                      {
                        while($row=mysqli_fetch_assoc($sqlQuery))
                        {
                          $i++;
                          $name=$row['name'];
                          $addeddate=$row['created_at'];
                          $dateTime = new DateTime($addeddate);
                          $formattedDate = $dateTime->format('d-m-Y h:i A');
                          $current_status=$row['current_status'];

                          //Agent
                          $agentid=$row['created_by'];
                          $getAgentsqlQuery = mysqli_query($con,"SELECT userid, name FROM manage_users where id='$agentid'");
                          $rowname=mysqli_fetch_assoc($getAgentsqlQuery);

                    ?> 
                    <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $formattedDate;?></td>
                      <td>
                        <?php
                            if($agentid==0)
                            {
                              echo 'None';
                            }
                            else
                            {
                              echo $rowname['name'].' <br>['.$rowname['userid'].']';
                            }
                        ?>
                      </td>
                      <td><?php echo $name;?></td>
                      <td><?php echo $row['vehicle_type'];?></td>
                      <td><?php echo $row['regno'];?></td>
                      <td>
                        <?php if($current_status=='pending') { ?> 
                        <span class="badge bg-warning">Pending document verification</span>
                        <?php }  else if($current_status=='Document verified'){ ?>
                        <span class="badge bg-success">Document Verified</span>
                        <?php } else if($current_status=='Payment Request'){ ?>  
                          <span class="badge bg-warning">Payment Pending</span>
                         <?php } else if($current_status=='Payment Done'){ ?>  
                          <span class="badge bg-success">Payment Done</span>
                         <?php } else if($current_status=='Payment Done'){ ?>  
                          <span class="badge bg-success">Payment Done</span>
                       <?php } else if($current_status=='Completed'){ ?>  
                          <span class="badge bg-success">Completed</span>
                        <?php } else {} ?>
                      </td>
                      <td><a href="view-policy-details.php?token=<?php echo $row['token'];?>" class="btn btn-dark btn-sm"><i class="bi bi-eye"></i> View</a></td>
                    </tr>
                    <?php
                          }
                      } else {
                          ?>
                          <tr>
                              <td colspan="8" class="text-center">
                                <img src="../assets/img/empty-box.png" style="width: 200px;">
                                <br><strong>No data is available.</strong>
                              </td>
                          </tr>
                      <?php
                      }
                  } catch (Exception $e) {
                      echo "Error: " . $e->getMessage();
                  }
                  ?>
                  
                    
                  </tbody>
                </table>
              </div>
              <!-- End Table-->

            </div>
          </div>

        </div>
      </div>
    </section>

    
  </main><!-- End #main -->
  <?php include 'includes/footer.php'; ?>