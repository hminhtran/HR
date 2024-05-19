//Server settings
                        $mail->SMTPDebug = 0;                      // Enable verbose debug output
                        $mail->isSMTP();                                            // Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                        $mail->Username   = 'nongsanquenha20@gmail.com';                     // SMTP username
                        $mail->Password   = 'xkku fkst ivpb fjva';                               // SMTP password
                        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; PHPMailer::ENCRYPTION_SMTPS also accepted
                        $mail->Port       = 587;                                    // TCP port to connect to
                        $mail->CharSet = 'UTF-8';
                        //Recipients
                        $mail->setFrom('nongsanquenha20@gmail.com', 'Nông sản quê nhà');
                        $mail->addAddress($user_email, $username);     // Add a recipient
<?php 
    session_start();
    include_once("cls/mycls.php");
    $obj = new HR();

    if (isset($_POST['user_login_btn'])) {
        $obj->login($_POST);
    }
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
                  <img src="../src/assets/images/logos/dark-logo.svg" width="180" alt="">
                </a>
                <p class="text-center">Đăng ký tài khoản</p>


                <form method="post" name="frm-login">
                      <div class="mb-3">
                      <label for="username" >Username</label>
                    <input name="username" type="text" class="form-control"  aria-describedby="textHelp">
                  </div>
                     <div class="mb-3">
                    <label for="password" >Password</label>
                    <input name="password" type="password" class="form-control"  aria-describedby="textHelp">
                  </div>
                  <div class="mb-3">
                  <p class="wrap-btn">
                                    <input type="submit" value="Đăng nhập" name="user_login_btn" class="btn btn-success">
                                    <a href="user_password_recover.php" class="link-to-help">Quên mật khẩu?</a>
                                </p>
                  </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>