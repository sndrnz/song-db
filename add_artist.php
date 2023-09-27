<?php
    require "connect.php";
    session_start();

    if (!isset($_SESSION['userid'])) {
        header("Location: /login.php?redirect=add_artist.php");
        exit;
    }

    $userid = $_SESSION['userid'];
    $name = "";
    $description = "";
    $youtube = "";
    $soundcloud = "";
    $spotify = "";
    $apple = "";
    $website = "";
    $redirect = "";

    if ($_SERVER['REQUEST_METHOD'] === "GET") {
        if (isset($_GET['redirect'])) {
            $redirect = $_GET['redirect'];
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $redirect = $_POST['redirect'];

        if (isset($_POST['addartist'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $youtube = $_POST['youtube'];
            $soundcloud = $_POST['soundcloud'];
            $spotify = $_POST['spotify'];
            $apple = $_POST['apple'];
            $website = $_POST['website'];

            $sql = "SELECT name from artist
                    WHERE name='${name}';";
            
            $result = $conn->query($sql);
            
            if ($result->num_rows === 0) {
                
                $sql = "INSERT INTO artist (name, description, youtube, soundcloud, spotify, apple, website, user_id)
                        VALUES ('${name}', '${description}', '${youtube}', '${soundcloud}', '${spotify}', '${apple}', '${website}', '${userid}');";
                
                if ($conn->query($sql)) {
                    if ($redirect === "add_song.php") {
                        $redirect = "${redirect}?artist=${name}";
                    }
                    header("Location: /${redirect}");
                    exit;
                } else {
                    $error_message = "Something went wrong!";
                }
                
            } else {
                $error_message = "This Artist already exists!";
            }   
        }          
    }
?>

<?php require "header.php" ?>

<main>
    <h1>Add Artist</h1>

    <form action="" method="post">
        <label for="artist">Artist Information</label>
        <fieldset id="artist">
            <label for="name">Artist Name</label>
            <br>
            <input type="text" name="name" id="name" value="<?=$name?>" required>

            <br>
            <br>

            <label for="name">Description (max. 1000 characters)</label>
            <br>
            <textarea name="description" id="description" cols="30" rows="10" maxlength="1000"><?=$description?></textarea>
        </fieldset>
        
        <br>
        <br>
        
        <label for="links">Artist Links</label>
        <fieldset id="links">
            <label for="name">YouTube Channel</label>
            <br>
            <input type="text" name="youtube" id="youtube" placeholder="https://www.youtube.com/..." maxlength="200" value="<?=$youtube?>">
            <br>
            <br>
            
            <label for="name">Soundcloud</label>
            <br>
            <input type="text" name="soundcloud" id="soundcloud" placeholder="https://soundcloud.com/..." maxlength="200" value="<?=$soundcloud?>">
            <br>
            <br>
        
            <label for="name">Spotify</label>
            <br>
            <input type="text" name="spotify" id="spotify" placeholder="https://open.spotify.com/..." maxlength="200" value="<?=$spotify?>">
            <br>
            <br>
            
            <label for="name">Apple Music</label>
            <br>
            <input type="text" name="apple" id="apple" placeholder="https://music.apple.com/..." maxlength="200" value="<?=$apple?>">            
            <br>
            <br>

            <label for="name">Website</label>
            <br>
            <input type="text" name="website" id="website" placeholder="https://www.example.com" maxlength="200" value="<?=$website?>">
            <br>
            <br>
        </fieldset>
        <br>
        <span class="error"><?=$error_message?></span>
        <br>
        <input type="hidden" name="redirect" value="<?=$redirect?>">
        <button type="submit" name="addartist">Add Artist</button>
        
    </form>
</main>
<?php require "footer.php" ?>