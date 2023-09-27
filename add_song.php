<?php
    require "connect.php";
    session_start();

    if (!isset($_SESSION['userid'])) {
        header("Location: /login.php?redirect=add_song.php");
        exit;
    }

    $user_id = $_SESSION['userid'];
    $artist = "";
    $artist_id = "";
    $name = "";
    $date = "";
    $bpm = "";
    $key1 = "";
    $key2 = "";
    $key = "";
    $lyrics = "";
    $youtube = "";
    $soundcloud = "";
    $spotify = "";
    $apple = "";
    $website = "";
    $genre1 = "";
    $genre2 = "";


    if ($_SERVER['REQUEST_METHOD'] === "GET") {
        if (isset($_GET['artist'])) {
            $artist = $_GET['artist'];
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (isset($_POST['addsong'])) {
            $artist = $_POST['artist'];
            $artistid = "";
            $name = $_POST['name'];
            $date = $_POST['date'];
            $bpm = $_POST['bpm'];
            $key1 = $_POST['key1'];
            $key2 = $_POST['key2'];
            if ($key2 === "Minor") {
                $key = $key1 . "m";
            } else {
                $key = $key1;
            }
            $lyrics = str_replace("'", "%a%", $_POST['lyrics']);
            $youtube = $_POST['youtube'];
            $soundcloud = $_POST['soundcloud'];
            $spotify = $_POST['spotify'];
            $apple = $_POST['apple'];
            $website = $_POST['website'];
            $genre1 = $_POST['genre1'];
            $genre2 = $_POST['genre2'];


            $sql = "SELECT id FROM artist
                    WHERE name='${artist}';";
        
            $result = $conn->query($sql);

            $row = $result->fetch_assoc();
            $artist_id = $row['id'];

            
            $sql = "INSERT INTO song (artist_id, name, date, song_bpm, song_key, lyrics, youtube, soundcloud, spotify, apple, website)
                    VALUES ('${artist_id}', '${name}', '${date}', '${bpm}', '${key}', '${lyrics}', '${youtube}', '${soundcloud}', '${spotify}', '${apple}', '${website}');";
            
            $conn->query($sql);
                
            $sql = "SELECT MAX(id) as id
                    FROM song;";

            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $song_id = $row['id'];
      
            $sql = "INSERT INTO genre_to_song (genre_id, song_id)
                    VALUES ('${genre1}', '${song_id}');";

            if ($genre2 !== "") {
                $conn->query($sql);

                $sql = "INSERT INTO genre_to_song (genre_id, song_id)
                        VALUES ('${genre2}', '${song_id}');";
            }

            if ($conn->query($sql)) {
                header("Location: /song.php?id=${song_id}");
                exit;
            } else {
                $error_message .= "Something went wrong!";  
            }
        }
    }
?>

<?php require "header.php" ?>
<main>
    <h1>Add Song</h1>

    <form action="" method="post">

        <label for="artists">Artist</label>
        <fieldset id="artists">
            <label for="artist">Select</label>
            <select name="artist" id="artist" value="" required>
                <?php
                    $sql = "SELECT name FROM artist
                            WHERE user_id='${user_id}';";

                    $result = $conn->query($sql);

                    if ($result->num_rows == 0) {
                        header("Location: /add_artist.php?redirect=add_song.php");
                        exit;
                    }
                    $selected = "";
                    while ($row = $result->fetch_assoc()):
                        if (strtolower($row['name']) === strtolower($artist)) {
                            $selected = "selected";
                        } else {
                            $selected = "";
                        }
                ?>
                <option <?=$selected?>><?=$row['name']?></option>
                <?php endwhile;?>
            </select>
            <span>or</span>
            <a href="/add_artist.php?redirect=add_song.php">Add an Artist</a>
        </fieldset>    
        <br>
        <br>       

        <label for="generel">General Information</label>
        <fieldset id="general">
            <label for="name">Name</label>
            <br>
            <input type="text" name="name" id="name" value="<?=$name?>" required>
            <br>
            <br>
            <label for="name">Release Date</label>
            <br>
            <input type="date" name="date" id="date" value="<?=$date?>" required>
        </fieldset>
        <br>
        <br>

        <label for="meta">Meta Information</label>
        <fieldset id="meta">
            <label for="bpm">Song BPM</label>
            <input type="number" name="bpm" id="bpm" min="0" max="999" value="<?=$bpm?>" required>
            <br>
            <br>

            <label for="key1">Song Key</label>
            <select name="key1" id="key1" size="1" required>
                <option>C</option>
                <option>C#</option>
                <option>D</option>
                <option>D#</option>
                <option>E</option>
                <option>F</option>
                <option>F#</option>
                <option>G</option>
                <option>G#</option>
                <option>A</option>
                <option>A#</option>
                <option>B</option>
            </select>

            <select name="key2" id="key2" size="1" required>
                <option>Major</option>
                <option>Minor</option>
            </select>
        </fieldset>
        <br>
        <br>

        <label for="genre">Genre</label>
        <fieldset id="genre">
            <label for="genre1">Primary Genre (Required)</label>
            <select name="genre1" id="genre1" required>
                <option value=""></option>
                <?php
                    $sql = "SELECT name, id FROM genre";

                    $result = $conn->query($sql);

                    while ($row = $result->fetch_assoc()):
                ?>
                <option value="<?=$row['id']?>"><?=$row['name']?></option>
                <?php endwhile;?>
            </select>
            <br>

            <label for="genre2">Secondary Genre (Optional)</label>
            <select name="genre2" id="genre2">
                <option value=""></option>
                <?php
                    $sql = "SELECT name, id FROM genre";

                    $result = $conn->query($sql);

                    while ($row = $result->fetch_assoc()):
                ?>
                <option value="<?=$row['id']?>"><?=$row['name']?></option>
                <?php endwhile;?>
            </select>
        </fieldset>
        <br>
        <br>
        
        <label for="songtext">Song Text</label>
        <fieldset id="songtext">
            <label for="lyrics">Lyrics (max. 4000 characters)</label>
            <br>
            <textarea name="lyrics" id="lyrics" cols="50" rows="10" maxlength="4000"><?=str_replace("%a%", "'", $lyrics);?></textarea>
        </fieldset>
        <br>
        <br>


        <label for="links">Song Links</label>
        <fieldset id="links">
            <label for="name">YouTube</label>
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
        <button type="submit" name="addsong">Add Song</button>
    </form>
</main>
<?php require "footer.php" ?>