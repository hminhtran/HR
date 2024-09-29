<?php session_start();
include "check_admin.php";
?>

<?php include ("template/ad_sidebar.php");?>
<?php 
if (isset($_GET["id"])) 
{   
   $id = $_GET["id"]; 
}
if(isset($_GET['page'])){
    $trang_hien_tai = $_GET['page'];
  } else {
    $trang_hien_tai = 1;
  }
  $so_ban_ghi_mot_trang = 10;
  $so_ban_ghi =$admin->getTotalRows("employees");
  $tong_so_trang = ceil($so_ban_ghi / $so_ban_ghi_mot_trang);
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
        <h2>Quản lý nông sản</h2>
    </div>
    <div class="col-md-6 col-sm-6">
    </div>
</div>
 	<?php 
   $limit = 10;
   $page = isset($_GET['page']) ? $_GET['page'] : 1;
   $offset = ($page - 1) * $limit;
  $admin->load_detail("SELECT *
  FROM employees 
  JOIN department ON employees.id_de = department.id_de 
  JOIN e_role ON employees.id_role = e_role.id_role
  WHERE id = '$id'
  LIMIT $limit OFFSET $offset ");

  $total_pages = $admin->getTotalPages('employees', $limit);

echo "<div class='pagination'  style='float: right;'> ";
if($trang_hien_tai > 1){
    echo "<a href='?page=".($trang_hien_tai - 1)."' class='btn btn-white text-dark ti-angle-left' ></a>";
}
for($i = max(1, $trang_hien_tai - 2); $i <= min($tong_so_trang, $trang_hien_tai + 2); $i++){
    if ($i > 1) {
        echo "&nbsp;";
    }
    if ($i == $trang_hien_tai) {
        echo "<a href='?page=".$i."' class='btn btn-white text-dark' style='font-weight: bold; background-color: gray;'>$i</a>";
    } else {
        echo "<a href='?page=".$i."' class='btn btn-white text-dark'>$i</a>";
    }
}
if($trang_hien_tai < $tong_so_trang){
    echo "<a href='?trang=".($trang_hien_tai + 1)."' class='btn btn-white text-dark ti-angle-right'></a>";
}
echo "</div>";

  ?>

</div>

</body>
</html>