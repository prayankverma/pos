<?php 
	
  include 'includes/header.php';
  include 'includes/sidebar-menu.php';
?>
	
	<main id="main" class="main">

    <div class="pagetitle">
      <h1>Agent List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./">Home</a></li>
          <li class="breadcrumb-item">Manage Agent</li>
          <li class="breadcrumb-item active">Agents List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Agent List</h5>
              

              <!-- Table with stripped rows -->
              <div class="table-responsive">
                <table class="table datatable">
                  <thead class="thead-dark">
                    <tr>
                      <th>S.N.</th>
                      <th>AgentId</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Address</th>
                      <th>District</th>
                      <th>State</th>
                      <th>Pincode</th>
                      <th>Employee</th>
                      <th>Agent Type</th>
                      <th>PAN</th>
                      <th>Aadhar</th>
                      <th>Documents</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
  	                $i=0;
  	                //Select Query
                    $sqlQuery = mysqli_query($con,"SELECT * FROM manage_users where usertype='agent' ORDER BY id desc");
  	                while($row=mysqli_fetch_assoc($sqlQuery))
  	                {
  	                	$i++;
                	?>	
                    <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $row['userid'];?></td>
                      <td><?php echo $row['name'];?></td>
                      <td><?php echo $row['email'];?></td>
                      <td><?php echo $row['mobile'];?></td>
                      <td><?php echo $row['address'];?></td>
                      <td><?php echo $row['district'];?></td>
                      <td><?php echo $row['state'];?></td>
                      <td><?php echo $row['pincode'];?></td>
                      <td><?php echo $row['agentemployee'];?></td>
                      <td><?php echo $row['userrole'];?></td>
                      <td><?php echo $row['pannumber'];?></td>
                      <td><?php echo $row['adharnumber'];?></td>
                      <td style="white-space: nowrap;">
                        <a href="view-documents.php?id=<?php echo $row['id'];?>" class="btn btn-primary btn-sm">
                        <i class="bi bi-eye me-1"></i> View</a>
                      </td>

                    </tr>
                 <?php } ?>   
                    
                  </tbody>
                </table>
              </div>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

<?php include 'includes/footer.php';?>