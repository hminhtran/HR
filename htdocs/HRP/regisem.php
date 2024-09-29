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
                    <label for="inputField" class="form-label">Họ đệm</label>
                    <input name="txthodem" type="text" class="form-control" aria-describedby="textHelp">
                
                  </div>
                  <div class="mb-3">
                    <label for="inputField" class="form-label">Tên</label>
                    <input name="txtten" type="text" class="form-control" aria-describedby="textHelp">
                
                  </div>
                  <div class="mb-3">
                    <label for="inputField" class="form-label">Ngày sinh</label>
                    <input name="doB" type="date" class="form-control"  aria-describedby="textHelp">
                  </div> 
                    <div class="mb-3">
                     <label for="inputField"  class="form-label">Giới tính</label>
                    <select name="sex" id="inputField"class="form-control " >
                        <option selected disabled hidden>Chọn lựa chọn</option>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                       </select>
                  </div> 
                  <div class="mb-3">
                    <label for="inputField" class="form-label">Số điện thoại</label>
                    <input name="phone" type="text" class="form-control"  aria-describedby="textHelp">
                  </div>
                   <div class="mb-3">
                    <label for="inputField" class="form-label">Email</label>
                    <input name="txtemail" type="email" class="form-control"  aria-describedby="textHelp">
                  </div>
                 
             		<div class="mb-3">
                    <label for="inputField" class="form-label">Phòng ban</label>
                    <input name="txtdep" type="text" class="form-control"  aria-describedby="textHelp">
                  </div> <div class="mb-3">
                    <label for="inputField" class="form-label">Vai trò</label>
                    <input name="txtrole" type="text" class="form-control" aria-describedby="textHelp">
                  </div>
                  <div class="mb-3">
                    <label for="inputField" class="form-label">Ảnh đại diện</label>
                    <input name="myfile" type="file" class="form-control"  aria-describedby="textHelp">
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
		$hodem = $_POST['txthodem'];
		$ten = $_POST['txtten'];
		$doB = $_POST['doB'];
		$sex = $_POST['sex'];
		$phone = $_POST['phone'];
		$email = $_POST['txtemail'];
		$dep = $_POST['txtdep'];
		$role = $_POST['txtrole'];
		$type = $_FILES['myfile']['type'];
		$name = $_FILES['myfile']['name'];
		$tmp_name = $_FILES['myfile']['tmp_name'];
		$qrname = "../qrcode/".$id.".png";
					$qrCode = new QrCode('http://192.168.46.27/hrp/regis/regisem.php');
						$qrCode->writeFile($qrname);
    $qr = $id . ".png";
    
		if ($type=='image/jpeg')
			{	
				$name = time()."_".$name;
				if($p->uploadhinh($name,"../img",$tmp_name))
				{
					if($p->sql("INSERT INTO `employees` (`password`, `hoDem`, `ten`, `ngaySinh`, `gioiTinh`, `soDienThoai`, `email`, `phongBan`, `vaiTro`, `ngayVaoLam`, `Avatar`,qr) VALUES ('$pass', '$hodem', '$ten', '$doB', '$sex', '$phone ', '$email', '$dep', '$role', current_timestamp(), '$name','$qr')")==1)
					{
						echo'<script>
							alert("Thêm thành công");
							</script>';	
					}
					else
					{
							echo'Thêm thất bại';
					}
				}
				else
				{
				echo "Upload ảnh thât bại";
				 }
			}
		else
		{
			echo "Vui lòng chọn file ảnh";
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