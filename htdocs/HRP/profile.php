<style>
  .change-avatar-btn {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.change-avatar-btn input {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 5px;
}

img:hover + .change-avatar-btn,
.change-avatar-btn:hover {
    opacity: 1;
}
</style>
<?php include "check.php";?>
<?php include ("src/template/sidebar.php");?>
<?php 
if (isset($_GET["id"])) 
{   
   $id = $_GET["id"]; 
}

$id = $_SESSION["id"];
$employee_data=$obj->get_info("SELECT *
FROM employees 
JOIN department ON employees.id_de = department.id_de 
JOIN e_role ON employees.id_role = e_role.id_role
WHERE id = '$id'");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>
<div class="main" style="width:80%; height:750px; display:fixed; float:right">
<div style="padding-bottom: 5px;" class="row">
    <div class="col-md-6 col-sm-6">
        <h2>Thông tin cá nhân</h2>
    </div>
    <div class="col-md-6 col-sm-6">
    </div>
</div>
 
  <div style="overflow-x: auto;">
  <table class="table table-bordered">
  <div class="form-group">
            <div class="col-md-9">
                        <img src="img/<?= $employee_data['Avatar'] ?>" alt="" style="max-width: 300px; max-height: 300px;object-fit: contain;">
                    </div>
      <thead>
          <tr>
              <th style="text-align: center">Thông tin</th>      
              <th style="text-align: center">Chi tiết</th>      
          </tr>
      </thead>

      <tbody>
      <tr>
          <td style="text-align: center" >Username</td>
          <td style="text-align: center" ><?php echo $employee_data["username"]?></td>
      </tr>
      <tr>
          <td style="text-align: center" >Họ đệm</td>
          <td style="text-align: center" ><?php echo $employee_data["hoDem"]?></td>
      </tr>
      <tr>
          <td style="text-align: center" >Tên</td>
          <td style="text-align: center" ><?php echo $employee_data["ten"]?></td>
      </tr>
      <tr>
          <td style="text-align: center" >Ngày sinh</td>
          <td style="text-align: center" ><?php echo $employee_data["ngaySinh"]?></td>
      </tr>
      <tr>
          <td style="text-align: center" >Giới tính</td>
          <td style="text-align: center" ><?php echo $employee_data["gioiTinh"]?></td>
      </tr>
      <tr>
          <td style="text-align: center" >Số điện thoại</td>
          <td style="text-align: center" ><?php echo $employee_data["soDienThoai"]?></td>
      </tr>
      <tr>
          <td style="text-align: center" >Email</td>
          <td style="text-align: center" ><?php echo $employee_data["email"]?></td>
      </tr>
      <tr>
          <td style="text-align: center" >Phòng ban</td>
          <td style="text-align: center" ><?php echo $employee_data["name_de"]?></td>
      </tr>
      <tr>
          <td style="text-align: center" >Vai trò</td>
          <td style="text-align: center" ><?php echo $employee_data["role_name"]?></td>
      </tr>
      
      <tr>
          <td style="text-align: center" >Ngày vào làm</td>
          <td style="text-align: center" ><?php echo $employee_data["ngayVaoLam"]?></td>
      </tr>
      <tr>
          <td style="text-align: center" >QR ngân hàng</td>
          <td style="text-align: center" ><?php echo $employee_data["qr_banking"]?></td>
      </tr>';  
  
   <a class="sidebar-link" href="update_profile.php">
      <i class="ti ti-pencil fs-6"></i> <!-- Thay đổi biểu tượng tại đây -->
      <span class="hide-menu">Cập nhật thông tin</span>
    </a>
  


</div>
<script>
   var currentImage = '';
   function showImage(event) {
    var input = event.target;
    var reader = new FileReader();

    // Đọc file
    reader.onload = function() {
        var dataURL = reader.result;
        var preview = document.querySelector('.fileinput-new img');

        // Cập nhật hình ảnh mới
        preview.src = dataURL;

        // Lưu tên của hình ảnh mới vào biến toàn cục
        currentImage = input.files[0].name; // Gán tên của hình ảnh mới vào biến toàn cục
    };

    // Đọc file dưới dạng URL
    reader.readAsDataURL(input.files[0]);
}
function deleteImage() {
    // Đặt lại giá trị của input file thành rỗng
    var input = document.querySelector('input[type="file"]');
    input.value = '';

    // Cập nhật hình ảnh hiển thị về hình ảnh mặc định hoặc ảnh cũ
    var defaultImageUrl = document.getElementById('layimg').value;
    var preview = document.querySelector('.fileinput-new img');
    preview.src = defaultImageUrl;

    // Kiểm tra xem có hình ảnh mới được tải lên không
    if (currentImage) {
        // Gán tên của hình ảnh mới vào trường ẩn new_image_name
        document.getElementById('new_image_name').value = currentImage;
    } else {
        // Gán giá trị rỗng cho trường ẩn new_image_name
        document.getElementById('new_image_name').value = '';
    }
}
    </script>


</body>
</html>