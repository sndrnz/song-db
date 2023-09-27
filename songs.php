<?php
    require "connect.php";
    session_start();

    $sql = "SELECT s.id, s.name as song_name, s.artist_id, a.name as artist_name
                    FROM song s
                    JOIN artist a ON s.artist_id=a.id
                    ORDER BY s.name;";

    if ($_SERVER['REQUEST_METHOD'] === "GET") {
        if (isset($_GET['genre']) && $_GET['genre'] !== "") {

            $genre_id = $_GET['genre'];

            $sql = "SELECT s.id, s.name as song_name, s.artist_id, a.name as artist_name
                    FROM song s
                    JOIN artist a ON s.artist_id=a.id
                    JOIN genre_to_song gs ON gs.song_id=s.id
                    WHERE gs.genre_id=${genre_id}
                    ORDER BY s.name;";

        }
    }
    
?>

<?php require "header.php" ?>
<main>
    <h1>Songs</h1>
    <form action="" method="get">
        <label for="genre">Genre</label>
        <select name="genre" id="genre">
            <option value="">All</option>
            <?php
                $sql2 = "SELECT name, id FROM genre";

                $result2 = $conn->query($sql2);

                while ($row2 = $result2->fetch_assoc()):
            ?>
            <option value="<?=$row2['id']?>"><?=$row2['name']?></option>
            <?php endwhile;?>
        </select>
        <button type="submit">Show</button>
    </form>
    

        <?php
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0):
                echo "<table>";
                while ($row = $result->fetch_assoc()):
                    ?>
                    <tr>
                        <td><?=$row['song_name']?></td>
                        <td><?=$row['artist_name']?></td>
                        <td><a href="/song.php?id=<?=$row['id']?>">Visit</a></td>
                    </tr>
                    <?php
                endwhile;
                echo "</table>";
            else:
                ?>
                    <span class="message">There are no Songs</span>
                <?php
            endif;
        ?>
</main>
<?php require "footer.php" ?>