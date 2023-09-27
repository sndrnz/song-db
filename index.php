<?php
    session_start();
    require "connect.php";
    
?>

<?php require "header.php" ?>
<main>
    <?php
        if (isset($_SESSION['userid']) && isset($_SESSION['username'])):
            ?>
                <h1>Hello, <?=$_SESSION['username']?></h1>
                <span>Welcome to the m104 Project</span>
                <br>
                <br>
                <ul>
                    <li><a href="/add_artist.php">Add artist</a></li>
                    <li><a href="/add_song.php">Add song</a></li>
                    <li><a href="/account.php">Go to your account</a></li>
                    <li><a href="/songs.php">Go to songs</a></li>
                    <li><a href="/artists.php">Go to all artists</a></li>
                    <li><a href="/artists.php?user=<?=$_SESSION['userid']?>">Go to your artists</a></li>
                    <li><a href="/logout.php">Or logout</a></li>
                </ul>
            <?php
        else:
            ?>
                <h1>Hello</h1>
                <span><a href="/login.php">Login to your Account</a> or <a href="/register.php">Create new Account</a></span>
            <?php
        endif;
    ?>

</main>
<?php require "footer.php" ?>