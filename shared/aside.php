<?php include_once 'C:\xampp\htdocs\INSTANT\vendor\functions.php';?>
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="<?= base_url()?>">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed"  data-bs-target="#components-nav" data-bs-toggle="collapse" href="<?= base_url('app/users/index.php')?>">
         <i class="bi bi-menu-button-wide"></i><span>Users</span>
         </a>
         <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url('app/users/create.php')?>">
              <i class="bi bi-circle"></i><span>Add User</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url('app/users/index.php')?>">
              <i class="bi bi-circle"></i><span>User Details</span>
            </a>
          </li>
        </ul>
      </li>
      

      <li class="nav-item">
        <a class="nav-link collapsed"  data-bs-target="#form-nav" data-bs-toggle="collapse" href="<?=base_url('app/instructors/index.php')?>">
          <i class="bi bi-menu-button-wide"></i><span>Instructors</span>
        </a>
        <ul id="form-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url('app/instructors/create.php')?>">
              <i class="bi bi-circle"></i><span>Add Instructor</span>
            </a>
          </li>
         <li>
            <a href="<?= base_url('app/instructors/index.php')?>">
              <i class="bi bi-circle"></i><span>Instructor Details</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed"  data-bs-target="#forms-nav" data-bs-toggle="collapse" href="<?=base_url('app/students/index.php')?>">
          <i class="bi bi-menu-button-wide"></i><span>Students</span>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url('app/students/create.php')?>">
              <i class="bi bi-circle"></i><span>Add Student</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url('app/students/index.php')?>">
              <i class="bi bi-circle"></i><span>Student Details</span>
            </a>
          </li>         
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed"  data-bs-target="#tables-nav" data-bs-toggle="collapse" href="<?=base_url('app/rounds/index.php')?>">
          <i class="bi bi-menu-button-wide"></i><span>Rounds</span>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url('app\rounds\create.php')?>">
              <i class="bi bi-circle"></i><span>Add Round</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url('app\rounds\index.php')?>">
              <i class="bi bi-circle"></i><span>Rounds Details</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed"  data-bs-target="#icons-nav" data-bs-toggle="collapse" href="<?=base_url('app/replies/index.php')?>">
          <i class="bi bi-menu-button-wide"></i><span>Replies</span>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?=base_url('app\replies\index.php')?>">
              <i class="bi bi-circle"></i><span>Replies Details</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="<?=base_url('app/projects/index.php')?>">
          <i class="bi bi-menu-button-wide"></i><span>Projects</span>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url('app\projects\index.php')?>">
              <i class="bi bi-circle"></i><span>Projects Details</span>
            </a>
          </li>
          <li>

        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icon-nav" data-bs-toggle="collapse" href="<?=base_url('app/courses/index.php')?>">
          <i class="bi bi-menu-button-wide"></i><span>Courses</span>
        </a>
        <ul id="icon-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="<?= base_url('app/courses/create.php')?>">
              <i class="bi bi-circle"></i><span>Add Course</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url('app/courses/index.php')?>">
              <i class="bi bi-circle"></i><span>Courses Details</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Components Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('profile.php')?>">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('contact.php')?>">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->
