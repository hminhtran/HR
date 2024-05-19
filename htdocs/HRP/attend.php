<?php 
include_once("cls/mycls.php");
$obj = new HR();
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>

<?php
if (isset($_COOKIE['login'])) {
    $login_cookie_value = $_COOKIE['login'];
} 
else {
     // If the login cookie does not exist, we will use JavaScript to prompt the user
     echo "<script>
     var username = prompt('Vui lòng nhập mã nhân viên của bạn:');
     if (username) {
         document.cookie = 'login=' + username + '; path=/';
         window.location.reload();
     }
 </script>";
 exit(); // Exit to prevent further PHP execution until the page reloads

}
$trangthai= '';
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Chấm Công</title>
  
  <link rel="stylesheet" href="src/assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="img/<?php $obj->get_avatar("select * from employees where username =  'NV" . $login_cookie_value . "'") ?>" width="180" alt="">
                </a>
                <p class="text-center">Chấm công</p>


                <form method="POST" name="frm-login">
                      <div class="mb-3">
                      <label for="user" >Username</label>
                      <input name="user" type="text" class="form-control" value="NV<?php echo $login_cookie_value; ?>"  aria-describedby="textHelp" readonly>
                  </div>
                     <div class="mb-3">
                    <label for="date" >Ngày</label>
                    <input name="date" type="text" class="form-control" value="<?php echo date('l, \n\g\à\y d \t\h\á\n\g m'); ?>" aria-describedby="textHelp" readonly>
                  </div>
                  <div class="mb-3">
                    <label for="time" >Thời gian</label>
                    <input name="time" type="text" class="form-control" value="<?php echo date('H:i'); ?>" aria-describedby="textHelp" readonly>
                  </div>
                  <div class="mb-3">
                  <p class="wrap-btn">
                                   <input type="submit" value="<?php $obj->attend_button("SELECT * FROM attend WHERE date = CURDATE()") ?>" name="attend" class="btn btn-success">
                                </p>
                  </div>

               
                  </form>
                  <?php
  if (isset($_POST['attend'])) {
    switch ($_POST['attend']) {
        case 'Chấm công vào':
            $user = $login_cookie_value;
            if ($obj->sql("INSERT INTO `attend` (`id_attend`, `id`, `date`, `checkin_time`, `checkout_time`) VALUES (NULL, '$user', CURDATE(), CURRENT_TIME(), NULL);") == 1) {
              $trangthai = "Chấm công vào thành công";
          } else {
            $trangthai = "Chấm công vào thất bại";
          }
          break;

        case 'Chấm công ra':
            $user = $login_cookie_value;
            if ($obj->sql("UPDATE `attend` SET `checkout_time` = CURRENT_TIME() WHERE attend.id='$login_cookie_value' AND attend.date = CURDATE();") == 1) {
              $trangthai = "Chấm công ra thành công";
          } else {
              $trangthai = "Chấm công ra thất bại";
          }
          break;

        default:
        $trangthai = "Không hợp lệ";
            break;
    }
    }
    if (!empty($trangthai)) {
        echo "<script>
            alert('".addslashes($trangthai)."');
         
        </script>";
    }
    
?> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>