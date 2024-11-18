<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Artist Details</title>
    <style> @import url('https://fonts.googleapis.com/css2?family=Aboreto&family=Luckiest+Guy&display=swap'); </style>
    <link rel="stylesheet" href="style1.css">
</head>

<body>
<header>
    <h1>Artist Details</h1>
</header>

<a href="index.php"> <button>Home</button> </a>

    <?php
    if (isset($_POST['artist'])) {
        $artistPath = substr($_POST['artist'],0,-4);
        $artistName = pathinfo($artistPath,PATHINFO_FILENAME);

        echo "<h1>$artistName</h1>";
        echo "<img src='$artistPath.jpg' alt='$artistName'><br>";

        // Display artist's description
        echo "<h2>Biography</h2>";
        if (file_exists("$artistPath.txt")) {
            $description = file_get_contents("$artistPath.txt");
            $description = nl2br($description); //nl2br keeps text format
            echo "<p>$description</p>";
        } else {
            echo "<p>No description available.</p>";
        }

        // Display artist's audio file
        echo "<h2>Listen</h2>";
        if (file_exists("$artistPath.mp3")) {
            echo "<audio controls>
                    <source src='$artistPath.mp3' type='audio/mpeg'>
                    Your browser does not support the audio element.
                  </audio>";
        } else {
            echo "<p>Audio not available.</p>";
        }
    } else {
        echo "<p>No artist selected.</p>";
    }
    ?>

</body>
</html>