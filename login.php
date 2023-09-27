<?php
    require "connect.php";
    session_start();

    $error_message = "";
    $username = "";
    $redirect = "";

    if ($_SERVER['REQUEST_METHOD'] === "GET") {
        if (isset($_GET['redirect'])) {
            $redirect = $_GET['redirect'];
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $redirect = $_POST['redirect'];
        
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            

            $sql = "SELECT id, username, email, password from user
                    WHERE username='${username}';";
            
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                
                $row = $result->fetch_assoc();

                if (hash("sha256", hash("md5", $password)) === $row['password']) {

                    $_SESSION['userid'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    header("Location: /${redirect}");
                    exit;

                } else {
                    $error_message = "Wrong Password!";
                }

            } else {
                $error_message = "User does not exist!";
            }
        }      
    }
    
?>

<?php require "header.php" ?>
<main>
    <h1>Login</h1>
    <span>Or <a href="/register.php">Create new Account</a></span>
    <br>
    <form action="" method="post">
        <fieldset>
            <label for="username">Username</label>
            <br>
            <input type="text" name="username" id="username" value="<?=$username?>" required>
            <br>
            <br>
            <label for="password">Password</label>
            <br>
            <input type="password" name="password" id="password" required>
        </fieldset>
        <br>
        <span class="error"><?=$error_message?></span>
        <br>
        <input type="hidden" name="redirect" value="<?=$redirect?>">
        <button type="submit" name="login" id="login">Login</button>
    </form>
</main>
<?php require "footer.php" ?>