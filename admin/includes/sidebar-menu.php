<?php $page=basename($_SERVER['PHP_SELF']); ?>
<!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      
      <li class="nav-item">
        <a class="nav-link collapsed" href="./">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="lead.php">
          <i class="bi bi-card-list"></i>
          <span>Lead</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Report</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#agent" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Manage Agent</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="agent" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="add-agent.php" >
              <i class="bi bi-circle"></i><span>Add Agent</span>
            </a>
          </li>
          <li>
            <a href="pending-agent-list.php">
              <i class="bi bi-circle"></i><span>Request For Approval Agent</span>
            </a>
          </li>
          <li>
            <a href="agent-list.php">
              <i class="bi bi-circle"></i><span>Agents List</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#emp" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Manage Employee</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="emp" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="add-employee.php">
              <i class="bi bi-circle"></i><span>Add Employee</span>
            </a>
          </li>
          
          <li>
            <a href="employee-list.php">
              <i class="bi bi-circle"></i><span>Employees List</span>
            </a>
          </li>
        </ul>
      </li>



      

      
      <li class="nav-item">
        <a class="nav-link collapsed" href="support.php">
          <i class="bi bi-file-earmark"></i>
          <span>Support</span>
        </a>
      </li>

      

    </ul>

  </aside><!-- End Sidebar-->