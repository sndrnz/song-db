<?php
    require "connect.php";
    session_start();

    $song_id = "";
    $artist_id = "";
    $name = "";
    $date = "";
    $bpm = "";
    $key = "";
    $lyrics = "";
    $youtube = "";
    $soundcloud = "";
    $spotify = "";
    $apple = "";
    $website = "";

    if ($_SERVER['REQUEST_METHOD'] === 'GET' || $_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_GET['id'])) {        
            $song_id = $_GET['id'];
            
            $sql = "SELECT name, artist_id, date, song_bpm, song_key, lyrics, youtube, soundcloud, spotify, apple, website
                FROM song
                WHERE id=${song_id};";
               
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            
            $artist_id = $row['artist_id'];
            $name = $row['name'];
            $date = $row['date'];
            $bpm = $row['song_bpm'];
            $key = $row['song_key'];
            $lyrics = $row['lyrics'];
            $youtube = $row['youtube'];
            $soundcloud = $row['soundlcoud'];
            $spotify = $row['spotify'];
            $apple = $row['apple'];
            $website = $row['werbsite'];


            $sql = "SELECT name
                    FROM artist
                    WHERE id=${artist_id};";
            
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $artist = $row['name'];

        } else {
            header("Location: /songs.php");
            exit;
        }

        if (isset($_POST['comment'])) {
            if (!isset($_SESSION['userid'])) {
                header("Location: /login.php?redirect=song.php?id=${song_id}");
                exit;
            }

            $content = $_POST['content'];
            $datetime = date("Y-m-d H:i:s");
            $user_id = $_SESSION['userid'];

            $sql = "INSERT INTO comment (user_id, song_id, content, date)
                    VALUES ('${user_id}', '${song_id}', '${content}', '${datetime}')";

            $conn->query($sql);
            header("Location: /song.php?id=${song_id}");
            exit;
        }
    }
    
?>

<?php require "header.php" ?>
<head>
    <link rel="stylesheet" href="/css/song.css">
</head>
<main>
    <h1><?=$name?></h1>
    
    <table>
        <tr>
            <td>Artist</td>
            <td><a href="/artist.php?id=<?=$artist_id?>"><?=$artist?></a></td>
        </tr>
        <tr>
            <td>Release Date</td>
            <td><?=$date?></td>
        </tr>
        <tr>
            <td>BPM</td>
            <td><?=$bpm?></td>
        </tr>
        <tr>
            <td>Key</td>
            <td><?=$key?></td>
        </tr>
        <tr>
            <td>Genre</td>
            <td>
            <?php
                $sql = "SELECT g.name
                        FROM genre g
                        JOIN genre_to_song gs ON g.id=gs.genre_id
                        WHERE gs.song_id=${song_id};";

                $result = $conn->query($sql);
    
                $row = $result->fetch_assoc();
                echo $row['name'];
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo ", " . $row['name'];
                }
            ?>
            </td>
        </tr>
        
    </table>

    <h2>Lyrics</h2>
    <div class="text">
        <?=str_replace("%a%", "'", nl2br($lyrics))?>
    </div>


    <h2>Links</h2>
    <ul class="links">
        <?php
            if ($youtube !== ""):
            ?>
                <li><a href="<?=$youtube?>" target="_blank"><img src="/assets/icons/youtubeBlack.svg" alt="" width="30"></a></li>
            <?php
            endif;         
        ?>

        <?php
            if ($soundcloud !== ""):
            ?>
                <li><a href="<?=$soundcloud?>" target="_blank"><img src="/assets/icons/soundcloudBlack.svg" alt="" width="30"></a></li>
            <?php
            endif;         
        ?>

        <?php
            if ($spotify !== ""):
            ?>
                <li><a href="<?=$spotify?>" target="_blank"><img src="/assets/icons/spotifyBlack.svg" alt="" width="30"></a></li>
            <?php
            endif;         
        ?>

        <?php
            if ($apple !== ""):
            ?>
                <li><a href="<?=$apple?>" target="_blank"><img src="/assets/icons/appleBlack.svg" alt="" width="30"></a></li>
            <?php
            endif;         
        ?>

        <?php
            if ($website !== ""):
            ?>
                <li><a href="<?=$website?>" target="_blank"><img src="/assets/icons/internet.svg" alt="" width="30"></a></li>
            <?php
            endif;         
        ?>
    </ul>

    <h2>Comments</h2>
    <form action="" method="post">
        <textarea name="content" id="content" cols="30" rows="5" maxlength="500"></textarea>
        <br>
        <button type="submit" name="comment">Comment</button>
    </form>
    
        <?php
            
            $sql = "SELECT u.username, c.content, c.date
                    FROM comment c
                    JOIN user u ON u.id=c.user_id
                    WHERE c.song_id=${song_id}
                    ORDER BY c.date DESC;";
            
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0):
                echo "<div class='comments'>";
                while ($row = $result->fetch_assoc()):
                    ?>
                    <div class="comment">
                        <div>
                            <?=$row['username']?>
                        </div>
                        <p class="content">
                            <?=nl2br($row['content'])?>
                        </p>
                    </div>
                    
                    <?php
                endwhile;
                echo "</div>";
            endif;
        
        ?>
</main>
<?php require "footer.php" ?>