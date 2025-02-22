<?php include "assets/script.php"; ?>

<?php
error_reporting(0);
session_start();

if (isset($_SESSION['uid'])) {
  $uid = $_SESSION['uid'];

  $query = "SELECT `role` FROM `users` WHERE `users`.`id`=?";
  $query_result = mysqli_prepare($connection, $query);

  mysqli_stmt_bind_param($query_result, "s", $uid);
  mysqli_stmt_execute($query_result);

  $result = mysqli_stmt_get_result($query_result);
  $row = mysqli_fetch_array($result);

  mysqli_stmt_close($query_result);

  if ($row && isset($row['role'])) {
    if ($row['role'] == "admin") {
      header('Location: admin_panel/dashboard.php');
      exit();
    } else if ($row['role'] == "owner") {
      header('Location: founder_panel/dashboard.php');
      exit();
    } else if ($row['role'] == "teacher") {
      header('Location: teacher_panel/dashboard.php');
      exit();
    } else if ($row['role'] == "student") {
      header('Location: student_panel/index.php');
      exit();
    }
  }
}






?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Unique Schools - Login</title>
  <link rel="shortcut icon" href="includes/assets/favicon.svg" type="image/svg+xml" />

  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="includes/assets/css/login_style.css">
</head>

<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="includes/assets/images/loginbg.jpeg" alt="">
      </div>

    </div>
    
    <div class="forms">
      <div class="form-content">
        <div class="login-form">

          <div class="title" id='board-title'>Login</div>

          <div class="alert-box">
            <div class="alert alert-danger text-center mt-3" role="alert" id="error-msg">

            </div>
          </div>

          <!-- LOGIN FORM -->
          <form action="" id="login-form" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Enter your email" id='loginEmail' required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Enter your password" id="password" required>
                <i class="bi bi-eye-fill" style="margin-left:auto;margin-right: 6px;" id="togglePassword"></i>
              </div>
              <div class="text"><a id="forgotpassword">Forgot password?</a></div>
              <div class="button input-box">
                <button type="submit" class="btn">
                  Submit
                </button>
              </div>
              <div class="text" style="margin-bottom: 20px; display: flex; justify-content: center;">
                <a href="index.php">Back to Homepage?</a>
              </div>


            </div>
          </form>

          <!-- forgot password -->
          <form action="" id="forgotPassword-form" method="post" style="display:none;">

            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="forgotEmail" placeholder="Enter your email" required>
              </div>

              <div class="text" style="margin-bottom: 20px;display:flex">
                <a id="backToLogin">back to login?</a>
              </div>

              <div class="button input-box">
                <button type="submit" id='sendCodeBtn'>
                  Send Code
                </button>
              </div>

            </div>
          </form>

          <!-- OTP VERIFICATIO FORM -->
          <form id="otpVarification-form" method="post" style="display:none;">

            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="email" value="some value" id="otpDisabledEmail">
              </div>

              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="text" name="otp" placeholder="Enter code" id="otpCode" required>
              </div>

              <div class="text" style="margin-bottom: 20px;display:flex">
                <a id="backToforgotPasswordForm">back</a>
                <a id="resendOTP" style='margin-left: auto;'>resend OTP?</a>
              </div>

              <div class="button input-box">
                <button type="submit" id='verifyCodeBtn'>
                  Verify Code
                </button>
              </div>

            </div>
          </form>

          <!-- CREATE NEW PASSWORD FORM -->
          <form id="createNewPassword-form" method="post" style="display:none;">

            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="newpassword" id='newpassword' placeholder='Enter new password' required>
              </div>

              <div class="invalid-feedback" id='weakPasswordFeedback'></div>

              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="confirmpassword" id='confirmpassword' placeholder='Confirm password' required>
              </div>

              <div class="invalid-feedback" id='passwordNotSame'>
                New password and confirm password are not same!
              </div>

              <div class="form-check mt-3 ">
                <input class="form-check-input" type="checkbox" value="" id="showPasswords">
                <label class="form-check-label" for="showPasswords" id='showPasswordLabel'>
                  Show password
                </label>
              </div>

              <div class="button input-box">
                <button type="submit" id='changePasswordBtn'>
                  Change password
                </button>
              </div>

            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="login/login_script.js"></script>


</body>

</html>