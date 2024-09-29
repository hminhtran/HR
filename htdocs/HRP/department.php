<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
 <link rel="stylesheet" href="src/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/assets/css/datatables.min.css">
    <link rel="stylesheet" href="src/assets/css/vanillaSelectBox.css">
 
</head>

<body>
 <div class="container-fluid">
       
           <?php include ("src/template/sidebar.php");?>
<?php include ("src/template/header.php");?>
            <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Responsive Table in Card Body</h5>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>John</td>
                    <td>Doe</td>
                    <td>john@example.com</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Jane</td>
                    <td>Doe</td>
                    <td>jane@example.com</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Mike</td>
                    <td>Smith</td>
                    <td>mike@example.com</td>
                  </tr>
                  <!-- Add more rows if needed -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Link JS Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>