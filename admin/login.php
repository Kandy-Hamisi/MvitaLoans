<?php include "includes/auth-header.php"; ?>

<body class="auth-body">
    
    <section class="form-section">
        <div class="myCard">
            <div class="form-header">
                <h3>Login Your Details</h3>
            </div>
            <form action="" method="POST">
                <div class="error-text">This is an error text</div>
                <div class="form-group">
                    <label for="">Your Email</label>
                    <input class="input" type="email" name="email" id="email" placeholder="example@gmail.com">
                </div>
                <div class="form-group">
                    <label for="">Your Password</label>
                    <input class="input" type="password" name="pwd1" id="password" placeholder="Enter Your Password">
                </div>
                <div class="button">
                    <input type="submit" name="submit" id="submit">
                </div>
                <div class="link">
                    <h5>Dont have an account? <a href="register.php">Register</a></h5>
                </div>
            </form>
        </div>
    </section>

    <script src="../JS/admin/login.js" ></script>
</body>
</html>