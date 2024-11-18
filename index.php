<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Tune Select</title>
    <style> @import url('https://fonts.googleapis.com/css2?family=Aboreto&family=Luckiest+Guy&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');</style>
    <link rel="stylesheet" href="style1.css">
</head>

<body>

<header>
    <h1>Tune Select</h1>
</header>
    
    <h2>Choose Your Genre and Artist</h2>

    <form action="index.php" method="GET">
        <label for="genre-filter">Filter by genre:</label>
        <select name="genre" id="genre-filter">
            <option value="all">All Genres</option>
            <option value="Bluegrass">Bluegrass</option>
            <option value="House">House</option>
            <option value="Indie">Indie</option>
            <option value="Rap">Rap</option>
        </select>
        <button type="submit">Filter</button>
    </form>

    <form action="ca1-result.php" method="POST">

    <?php
        $genres = glob('*',GLOB_ONLYDIR); // get all genre folders
 
        $selectedGenre = isset($_GET['genre']) ? $_GET['genre'] : 'all';

        foreach ($genres as $genre) {
            if ($selectedGenre === 'all' || $selectedGenre === $genre) {
                echo "<h2>" .$genre. "</h2>";


                $artists = glob($genre.'/*.jpg'); //get all artists in genre folder

                foreach ($artists as $artist) {
                    echo "<div class='artist'>";
                    echo "<label><img src='$artist' alt='$artist'><br>";
                    echo "<div id='artistname'>".pathinfo($artist,PATHINFO_FILENAME)."</div>";  //pathinfo() returns information about path: either an associative array or a string, depending on flags
                    echo "<input type='radio' name='artist' value='$artist'>";
                    echo "</label></div>";
                }
            }
        }
    ?>

<footer>
    <button type="submit">Submit</button>
</footer>

</form>
        
</body>
</html>