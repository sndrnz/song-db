<!DOCTYPE html>
<html lang="en">
<head>
    <title>m104</title>
    <link rel="stylesheet" href="/css/main.css">

</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="/"><img src="/assets/icons/homeWhite.svg" alt="" width="50"></a></li>
                <li><a href="/add_song.php"><img src="/assets/icons/addWhite.svg" alt="" width="50"></a></li>
                <li><a href="/artists.php"><img src="/assets/icons/musicWhite.svg" alt="" width="50"></a></li>
                <li><a href="/songs.php"><img src="/assets/icons/vinylWhite.svg" alt="" width="50"></a></li>
                <li><a href="/mediawiki/index.php/M104"><img src="/assets/icons/dokumentationWhite.svg" alt="" width="50"></a></li>
                
                <li class="right"><a href="/account.php"><img src="/assets/icons/accountWhite.svg" alt="" width="50"></a></li>
                <li class="right" id="usernamedisplay"><span><?=$_SESSION['username']?></span></li>
            </ul>
        </nav>
    </header>