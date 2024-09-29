<?php 
include ("check.php");
include ("src/template/sidebar.php");
$employee_id = $_SESSION["id"];
$employee_data=$obj->get_info("SELECT * FROM employees WHERE id = $employee_id");
if (isset($_POST['update_user'])) {
    $obj->update_hoso($_POST);
}

?>
<?php
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Chấm Công</title>
  
  <link rel="stylesheet" href="/src/assets/css/styles.min.css" />
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
                <p class="text-center">Thông tin cá nhân</p>
                <form method="post" enctype="multipart/form-data" onSubmit="return validateForm()">
                <div class="form-group">
                <label for="hinhđaiien" class="form-label">Hình đại diện</label>
            <div class="col-md-9">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        
                        <input id="layqr" type="hidden" value="img/<?= $employee_data['Avatar'] ?>">
                        <img src="img/<?= $employee_data['Avatar'] ?>" alt="" style="max-width: 150px; max-height: 150px;object-fit: contain;">
                    </div>
                    <div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 300px;object-fit: contain;"></div>
                        <label class="btn btn-success">
                       Chọn ảnh <input type="file" name="avaimg" onchange="showImage(event, '.fileinput-new')" style="display: none;">
                        </label>
                        <label class="btn btn-warning" onclick="deleteImage()">
                            <a href="javascript:void(0)" class="fileinput-exists" data-dismiss="fileinput">Xóa</a>
                        </label>

                    </div>
                </div>
                <div class="clearfix margin-top-10"></div>
            </div>
        </div>
                <div class="mb-3">
                    <label for="inputField" class="form-label">Họ đệm</label>
                    <input type="text" id="name" name="name" value="<?php echo $employee_data['hoDem']; ?>" class="form-control" aria-describedby="textHelp">
                
                  </div>
                  <div class="mb-3">
                    <label for="inputField" class="form-label">Tên</label>
                    <input type="text" id="name" name="name" value="<?php echo $employee_data['ten']; ?>" class="form-control" aria-describedby="textHelp">
                
                  </div>
                  <div class="mb-3">
                    <label for="inputField" class="form-label">Ngày sinh</label>
                    <input name="doB" type="date" class="form-control" value="<?php echo $employee_data['ngaySinh']; ?>" aria-describedby="textHelp">
                  </div> 
                    <div class="mb-3">
                     <label for="inputField"  class="form-label">Giới tính</label>
                     <select name="sex" id="inputField" class="form-control">
                            <option disabled>Chọn giới tính</option>
                            <option value="Nam" <?php if($employee_data['gioiTinh'] === "Nam") echo "selected"; ?>>Nam</option>
                            <option value="Nữ" <?php if($employee_data['gioiTinh'] === "Nữ") echo "selected"; ?>>Nữ</option>
                        </select>   
                  </div> 
                  <div class="mb-3">
                    <label for="inputField" class="form-label">Số điện thoại</label>
                    <input name="phone" type="text" class="form-control"  value="<?php echo $employee_data['soDienThoai']; ?>" aria-describedby="textHelp">
                  </div>
                   <div class="mb-3">
                    <label for="inputField" class="form-label">Email</label>
                    <input name="txtemail" type="email" class="form-control" value="<?php echo $employee_data['email']; ?>" aria-describedby="textHelp">
                    </div>
                    <div class="form-group">
                    <label for="hinhđaiien" class="form-label">Hình QR ngân hàng</label>
            <div class="col-md-9">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail">
                        <input type="hidden" name="id_acc" value="<?= $id ?>">
                        
                        <input id="layimg" type="hidden" value="img/<?= $employee_data['Avatar'] ?>">
                        <img src="img/<?= $employee_data['Avatar'] ?>" alt="" style="max-width: 150px; max-height: 150px;object-fit: contain;">
                    </div>
                    <div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 300px;object-fit: contain;"></div>
                        <label class="btn btn-success">
                        Chọn ảnh<input type="file" name="hinhqr" onchange="showImage(event, '.fileinput-qr')" style="display: none;">
                        </label>
                        <label class="btn btn-warning" onclick="deleteImage()">
                            <a href="javascript:void(0)" class="fileinput-exists" data-dismiss="fileinput">Xóa</a>
                        </label>
                    <input type="submit" name="nut" value="Thay đổi" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="src/assets/libs/jquery/dist/jquery.min.js"></script>


 
  ?> 
    <script>
         var currentImage = '';
         var currentqr = '';
         function showImage(event, targetClass) {
    var input = event.target;
    var reader = new FileReader();

    // Đọc file
    reader.onload = function() {
        var dataURL = reader.result;
        var preview = document.querySelector(targetClass + ' img'); // Sử dụng tham số targetClass để chọn vị trí cập nhật hình ảnh

        // Cập nhật hình ảnh mới
        preview.src = dataURL;

        // Lưu tên của hình ảnh hiện tại vào biến toàn cục tương ứng
        if (targetClass === '.fileinput-new') {
            currentImage = input.files[0].name;
        } else if (targetClass === '.fileinput-qr') {
            currentqr = input.files[0].name;
        }
    };

    // Đọc file dưới dạng URL
    reader.readAsDataURL(input.files[0]);
}
    // Hàm được gọi khi người dùng nhấn nút "Xóa"
    function deleteImage() {
        // Đặt lại giá trị của input file thành rỗng
        var input = document.querySelector('input[type="file"]');
        input.value = '';

        // Cập nhật hình ảnh hiển thị về hình ảnh mặc định hoặc ảnh cũ
        var defaultImageUrl = document.getElementById('layimg').value;
        var preview = document.querySelector('.fileinput-new img');
        preview.src = defaultImageUrl;

        // Kiểm tra nếu có hình ảnh mới được tải lên, gán tên của hình ảnh mới vào biến toàn cục
        if (currentImage) {
            document.getElementById('new_image_name').value = currentImage;
        } else {
            // Nếu không có hình ảnh mới, gán tên của hình ảnh cũ cho trường ẩn new_image_name
            document.getElementById('new_image_name').value = '';
        }
    }
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