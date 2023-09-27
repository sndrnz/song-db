<?php
    require "connect.php";
    session_start();

    if (!isset($_SESSION['userid'])) {
        header("Location: /login.php?redirect=account.php");
        exit;
    }
    $error_message = "";

    if ($_SERVER['REQUEST_METHOD'] === "POST") {

        if (isset($_POST['register'])) {
            $oldpassword = $_POST['oldpassword'];
            $password = $_POST['password'];
            $repassword = $_POST['repassword'];
            $userid = $_SESSION['userid'];

            $sql = "SELECT password from user
                    WHERE id='${userid}';";
            
            $result = $conn->query($sql);
            
            $row = $result->fetch_assoc();

            if (hash("sha256", hash("md5", $oldpassword)) === $row['password']) {
                if ($password === $repassword) {

                    $hashed_password = hash("sha256", hash("md5", $password));
                    
                    $sql = "UPDATE user
                            SET password='${hashed_password}'
                            WHERE id=${userid};";

                    if ($conn->query($sql)) {
                        header("Location: /account.php");
                        exit;
                    } else {
                        $error_message = "Something went wrong!";
                    }

                } else {
                    $error_message = "Passwords don't match!";
                }

            } else {
                $error_message = "Wrong password!";
            }
        }     
    }
    
?>

<?php require "header.php" ?>
<main>
    <h1>Account</h1>
    <span>Change password or <a href="/logout.php">Logout</a></span>
    <form action="" method="post">
        <fieldset>
            <label for="oldpassword">Old Password</label>
            <br>
            <input type="password" name="oldpassword" id="oldpassword" required>
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
        <span class="error"><?=$error_message?></span>
        <br>
        <button type="submit" name="register" id="register">Change Password</button>
    </form>
</main>
<?php require "footer.php" ?>