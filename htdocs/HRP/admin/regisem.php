<?php include ("clsad/clsadmin.php");
$p = new Admin;
?>
<?php
require '../src/vendor/autoload.php';
use Endroid\QrCode\QrCode;
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Chấm Công</title>
  
  <link rel="stylesheet" href="../src/assets/css/styles.min.css" />
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
                  <img src="../src/assets/images/logos/dark-logo.svg" width="180" alt="">
                </a>
                <p class="text-center">Đăng ký tài khoản</p>
                <form method="post" enctype="multipart/form-data" onSubmit="return validateForm()">
                      <div class="mb-3">
                    <label for="inputField" class="form-label">Username</label>
                     <input name="user" type="text" class="form-control" value="NV<?php echo $p->load_user(); ?>"  aria-describedby="textHelp" readonly>
                  </div>
                     <div class="mb-3">
                    <label for="inputField" class="form-label">Password</label>
                    <input name="txtpass" type="password" class="form-control"  aria-describedby="textHelp">
                  </div>
             		<div class="mb-3">
                    
                   <?php  $p->load_de(); ?>
                  </div>
                   <div class="mb-3">
                   <?php $p->load_role() ?>
                  </div>
          	 <input type="submit" name="nut" value="Tạo thông tin nhân viên" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                    <a class="text-primary fw-bold ms-2" href="./authentication-login.html">Sign In</a>
                  </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../src/assets/libs/jquery/dist/jquery.min.js"></script>


  <?php
  switch(isset($_POST['nut'])){
  	case 'Tạo thông tin nhân viên':
	{
		$id = $p->load_user();
		$pass = md5($_POST['txtpass']);
		$dep = $_POST['department'];
		$role = $_POST['role'];
		$qrname = "../qrcode/".$id.".png";
		$qrCode = new QrCode('http://192.168.46.27/hrp/regis/regisem.php');
    $qrCode->writeFile($qrname);
    $qr = $id . ".png";
		
			
					if($p->sql("INSERT INTO `employees` (`id`, `username`, `password`, `hoDem`, `ten`, `ngaySinh`, `gioiTinh`, `soDienThoai`, `email`, `id_de`, `id_role`, `ngayVaoLam`, `Avatar`, `qr`) 
          VALUES (NULL, NULL, '$pass', NULL, NULL, NULL, NULL, NULL, NULL, '$dep', '$role', CURRENT_DATE(), NULL, '$qr');")==1)
					{
						echo'<script>
							alert("Thêm thành công");
							</script>';	
					}
					else
					{
							echo'Thêm thất bại';
					}
          break;
				}
			
			}

  ?> 
    <script>
        function validateForm() {
            var inputs = document.getElementsByTagName("input");

            for (var i = 0; i < inputs.length; i++) {
                if (inputs[i].value.trim() === "") {
                    alert("Vui lòng điền đầy đủ thông tin vào tất cả các trường.");
                    return false;
                }
            }

            return true;
        }
    </script>


  
</body>

</html>