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
<div class="form-group">
            <label class="control-label col-md-3">Ảnh</label>
            <div class="col-md-9">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail">
                        <input type="hidden" name="id_acc" value="<?= $admin_id ?>">
                        <input id="layimg" type="hidden" value="uploads/avatar/<?= $user['hinhdaidien'] ?>">
                        <img src="uploads/avatar/<?= $user['hinhdaidien'] ?>" alt="" style="max-width: 300px; max-height: 300px;object-fit: contain;">
                    </div>
                    <div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 300px;object-fit: contain;"></div>
                        <label class="btn btn-success">
                            Chọn ảnh <input type="file" name="hinhdaidien" onchange="showImage(event)" style="display: none;">
                        </label>
                        <label class="btn btn-warning" onclick="deleteImage()">
                            <a href="javascript:void(0)" class="fileinput-exists" data-dismiss="fileinput">Xóa</a>
                        </label>

                    </div>
                </div>
                <div class="clearfix margin-top-10"></div>
            </div>
        </div>
        <script>
function showImage(event) {
        var input = event.target;
        var reader = new FileReader();

        // Đọc file
        reader.onload = function() {
            var dataURL = reader.result;
            var preview = document.querySelector('.fileinput-new img');

            // Cập nhật hình ảnh mới
            preview.src = dataURL;

            // Lưu tên của hình ảnh hiện tại vào biến toàn cục
            currentImage = input.files[0].name;
        };

        // Đọc file dưới dạng URL
        reader.readAsDataURL(input.files[0]);
    }
    </script>