<?php
    require "connect.php";
    session_start();


    $user_id = "";
    $sql = "SELECT id, name
            FROM artist
            ORDER BY name;";

    if ($_SERVER['REQUEST_METHOD'] === "GET") {
        if (isset($_GET['user'])) {

            $user_id = $_GET['user'];

            $sql = "SELECT id, name
                    FROM artist
                    WHERE user_id=${user_id}
                    ORDER BY name;";
        }
    }
    
?>

<?php require "header.php" ?>
<main>
    <h1>Artists</h1>

    <?php
        if (isset($_GET['user'])):
            ?>
                <a href="/artists.php">All Artists</a>
            <?php
        elseif (isset($_SESSION['userid'])):
            $user_id = $_SESSION['userid'];
            ?>
                <a href="/artists.php?user=<?=$user_id?>">My Artists</a>
            <?php
        endif;
    ?>

        <?php
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0):
                echo "<table>";
                while ($row = $result->fetch_assoc()):
                    ?>
                    <tr>
                        <td><?=$row['name']?></td>
                        <td><a href="/artist.php?id=<?=$row['id']?>">Visit</a></td>
                    </tr>
                    <?php
                endwhile;
                echo "</table>";
            else:
                ?>
                    <span class="message">There are no Artists</span>
                <?php
            endif;
        ?>
</main>
<?php require "footer.php" ?>