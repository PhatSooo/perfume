<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="register_page/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="register_page/css/style.css">

</head>
<?php include 'classes/customer.php' ?>
<?php
$cus = new Customer();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $create = $cus->create_customer($_POST);
}
?>

<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <?= $create ? '<h1 style="color=green;text-align:center">Create Account Successfully</h1>' : '<h5 style="color=red;text-align:center">Create Account failed</h5>' ?>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input required type="text" name="name" id="name" placeholder="Your Name" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input required type="text" name="username" id="email" placeholder="Username" />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input required type="password" name="pass" id="pass" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input required type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input required type="text" name="address" id="email" placeholder="Your Address" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input required type="text" name="phone" id="email" placeholder="Your Phone" />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register">
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="register_page/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="register_page/vendor/jquery/jquery.min.js"></script>
    <script src="register_page/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>