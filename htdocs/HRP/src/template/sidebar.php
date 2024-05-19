<!doctype html>
<html lang="en">
<?php 
include("cls/mycls.php");
$obj = new HR;
$id = $_SESSION["id"];
$employee_data=$obj->get_info("SELECT *
FROM employees 
JOIN e_role ON employees.id_role = e_role.id_role
WHERE id = '$id'
");
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="../src/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="src/assets/css/styles.min.css" />
  <style>
 
   
    .custom-toggler {
      background-color: #007bff;
      border: none;
      color: white;
      padding: 10px 20px;
      font-size: 18px;
      border-radius: 5px;
      transition: background-color 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .custom-toggler i {
      margin-right: 10px;
    }

    .custom-toggler:hover {
      background-color: #0056b3;
    }

    .custom-toggler:focus {
      outline: none;
      box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.25);
    }

    @media (max-width: 768px) {
      .custom-toggler {
        padding: 8px 16px;
        font-size: 16px;
      }
    }

    /* Custom styles for mobile sidebar */
    @media (max-width: 768px) {
      .left-sidebar {
        position: fixed;
        top: 0;
        left: -250px;
        width: 250px;
        height: 950px;
        background: #fff;
        transition: left 0.3s ease;
        z-index: 1000;
      }
      .scroll-sidebar
      {
      height: 900px;
      }

      .left-sidebar.sidebar-visible {
        left: 0;
      }

      .sidebar-backdrop {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 999;
      }

      .sidebar-backdrop.visible {
        display: block;
      }
    
    }
  </style>
</head>

<body>
  <!-- Sidebar Start -->

  <aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
      <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="./index.html" class="text-nowrap logo-img">
          <img src="src/assets/images/logos/dark-logo.svg" width="180" alt="" />
        </a>
        <button class="nav-link sidebartoggler custom-toggler" id="headerCollapse" onclick="toggleSidebar()">
  <i class="ti ti-menu-2"></i>
</button>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Thông tin</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="javascript:void(0)" aria-expanded="false">
              <span>
                <img src="src/assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
              </span>
              <span class="hide-menu"><?php echo $employee_data['ten']."-".$employee_data['role_name']?> </span>
            </a>
            <ul class="collapse list-unstyled" id="userProfileMenu">
              <li class="sidebar-item">
                <a class="sidebar-link" href="profile.php">
                  <i class="ti ti-user fs-6"></i>
                  <span class="hide-menu">My Profile</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="javascript:void(0)">
                  <i class="ti ti-mail fs-6"></i>
                  <span class="hide-menu">My Account</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="javascript:void(0)">
                  <i class="ti ti-list-check fs-6"></i>
                  <span class="hide-menu">My Task</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="log_out.php">
                  <i class="ti ti-logout fs-6"></i>
                  <span class="hide-menu">Logout</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Home</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="./index.html" aria-expanded="false">
              <span>
                <i class="ti ti-layout-dashboard"></i>
              </span>
              <span class="hide-menu">Dashboard</span>
            </a>
          </li>
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">UI COMPONENTS</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="admin/employee_list.php" aria-expanded="false">
              <span>
                <i class="ti ti-article"></i>
              </span>
              <span class="hide-menu">Danh sách nhân viên</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="#" aria-expanded="false">
              <span>
                <i class="ti ti-alert-circle"></i>
              </span>
              <span class="hide-menu">Alerts</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="./ui-card.html" aria-expanded="false">
              <span>
                <i class="ti ti-cards"></i>
              </span>
              <span class="hide-menu">Card</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="./ui-forms.html" aria-expanded="false">
              <span>
                <i class="ti ti-file-description"></i>
              </span>
              <span class="hide-menu">Forms</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="./ui-typography.html" aria-expanded="false">
              <span>
                <i class="ti ti-typography"></i>
              </span>
              <span class="hide-menu">Typography</span>
            </a>
          </li>
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">AUTH</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="./authentication-login.html" aria-expanded="false">
              <span>
                <i class="ti ti-login"></i>
              </span>
              <span class="hide-menu">Login</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="regis/regisem.php" aria-expanded="false">
              <span>
                <i class="ti ti-user-plus"></i>
              </span>
              <span class="hide-menu">Register</span>
            </a>
          </li>
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">EXTRA</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="./icon-tabler.html" aria-expanded="false">
              <span>
                <i class="ti ti-mood-happy"></i>
              </span>
              <span class="hide-menu">Icons</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
              <span>
                <i class="ti ti-aperture"></i>
              </span>
              <span class="hide-menu">Sample Page</span>
            </a>
          </li>
          <!-- Avatar and Profile Options -->
         
        </ul>
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>
  <!--  Sidebar End -->

  <script>
    function toggleSidebar() {
      var sidebar = document.querySelector('.left-sidebar');
      var backdrop = document.getElementById('sidebarBackdrop');
      sidebar.classList.toggle('sidebar-visible');
      backdrop.classList.toggle('visible');
    }
  </script>
  <script src="src/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="src/assets/js/sidebarmenu.js"></script>
  <script src="src/assets/js/app.min.js"></script>
  <script src="src/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="src/assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="src/assets/js/dashboard.js"></script>
</body>

</html>