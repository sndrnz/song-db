<?php
    require "connect.php";
    session_start();

    $id = "";
    $name = "";
    $description = "";
    $youtube = "";
    $soundcloud = "";
    $spotify = "";
    $apple = "";
    $website = "";

    if ($_SERVER['REQUEST_METHOD'] === "GET") {
        if (isset($_GET['name']) || isset($_GET['id'])) {

            if (isset($_GET['name'])) {
                $name = $_GET['name'];
                $sql = "SELECT id, name, description, youtube, soundcloud, spotify, apple, website
                    FROM artist
                    WHERE name='${name}';";

            } else if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT id, name, description, youtube, soundcloud, spotify, apple, website
                    FROM artist
                    WHERE id=${id};";
            }
            
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            
            $artistid = $row['id'];
            $name = $row['name'];
            $description = $row['description'];
            $youtube = $row['youtube'];
            $soundcloud = $row['soundcloud'];
            $spotify = $row['spotify'];
            $apple = $row['apple'];
            $website = $row['website'];

        } else {
            header("Location: /artists.php");
            exit;
        }
    }
    
?>

<?php require "header.php" ?>

<main>
    <h1><?=$name?></h1>

    <div class="text">
        <?=$description?>
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
 
        <?php
        
            $sql = "SELECT id, name, date
                    FROM song
                    WHERE artist_id=${artistid}
                    ORDER BY date DESC;";
            
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0):
                echo "<h2>Songs</h2>";
                echo "<table>";
                while ($row = $result->fetch_assoc()):
                    ?>
                    <tr>
                        <td><?=$row['name']?></td>
                        <td><a href="/song.php?id=<?=$row['id']?>">Visit</a></td>
                    </tr>
                    <?php
                endwhile;
                echo "</table>";
            endif;
        
        ?>
</main>
<?php require "footer.php" ?>