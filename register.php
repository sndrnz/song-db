<?php
    require "connect.php";
    $error_message = "";
    $username = "";
    $email = "";

    if ($_SERVER['REQUEST_METHOD'] === "POST") {

        if (isset($_POST['register'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $repassword = $_POST['repassword'];

            $sql = "SELECT username from user
                    WHERE username='${username}';";
            
            $result = $conn->query($sql);
            
            if ($result->num_rows === 0) {
                
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                    $sql = "SELECT username from user
                    WHERE email='${email}';";
            
                    $result = $conn->query($sql);

                    if ($result->num_rows === 0) {

                        if ($password === $repassword) {

                            $hashed_password = hash("sha256", hash("md5", $password));
                            
                            $sql = "INSERT INTO user (username, email, password)
                                    VALUES ('${username}', '${email}', '${hashed_password}');";
        
                            if ($conn->query($sql)) {
                                header("Location: /login.php");
                                exit;
                            } else {
                                $error_message = "Something went wrong!";
                            }
        
                        } else {
                            $error_message = "Passwords don't match!";
                        }

                    } else {
                        $error_message = "Email is already in use!";
                    }

                } else {
                    $error_message = "Email is not valid!";
                }

            } else {
                $error_message = "Username is already in use!";
            }
        }     
    }
    
?>

<?php require "header.php" ?>
<main>
    <h1>Register</h1>
    <span>Or <a href="/login.php">Login to your Account</a></span>
    <form action="" method="post">
        <fieldset>
            <label for="username">Username</label>
            <br>
            <input type="text" name="username" id="username" value="<?=$username?>" required>
            <br>
            <br>
            <label for="email">Email</label>
            <br>
            <input type="email" name="email" id="email" value="<?=$email?>" required>
            <br>
            <br>
            <label for="password">Password</label>
            <br>
            <input type="password" name="password" id="password" required>
            <br>
            <br>
            <label for="repassword">Repeat Password</label>
            <br>
            <input type="password" name="repassword" id="repassword" required>
        </fieldset>
        <br>
        <button type="submit" name="register" id="register">Register</button>
        <br>
        <span class="error"><?=$error_message?></span>
    </form>
</main>
<?php require "footer.php" ?>