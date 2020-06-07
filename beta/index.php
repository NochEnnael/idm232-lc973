<?php
//step 1 open a connection to DB
require '../include/db.php';

//Get filter info if passed in URL
$filter = $_GET['filter'];
//print_r($filter);

$table = 'recipes';

if (isset($_POST['submit'])) {
    //echo "User clicked on submit";
    //$search = $_POST['search'];
    $search = htmlspecialchars($_POST['search']);

    $query = "SELECT * FROM {$table} WHERE tle LIKE '%{$search}%' OR subtitle LIKE '%{$search}%'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die('Search query failed');
    }
} else if (isset($filter)) {
    $query = "SELECT * FROM {$table} WHERE proteine LIKE '%{$filter}%'";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die('Filter query failed');
    }
} else {
    //step 2 perform a DB table query
    $query = "SELECT * FROM {$table}";
    $result = mysqli_query($connection, $query);

    //check for errors in SQL statement 
    if (!$result) {
        die('Database query failed');
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../alpha/index.css">
 <!--    <link rel="stylesheet" href="../alpha/sorry.css"> -->
    <title>Leanne's Luncheon: Cooking It Up</title>
</head>

<body>


    <div class="header">
        <a href="index.php">
            <header>Leanne's Luncheon</header>
        </a>
    </div>

    <div class="bar">

        <div hidden class="webnav">
            <nav>
                <ul>
                    <!-- change to the proteine that ther is in databse -->
                    <li><a href="index.php">All Recipes</a></li>
                    <li><a href="index.php?filter=Chicken">Chicken</a></li>
                    <li><a href="index.php?filter=Beef">Beef</a></li>
                    <li class="cook"><a href="index.php">Cooking It Up</a></li>
                    <li><a href="index.php?filter=Vegitarian">Vegetarian</a></li>
                    <li><a href="index.php?filter=Steak">Steak</a></li>
                    <li><a href="index.php?filter=Fish">Fish</a></li>
                </ul>
            </nav>
        </div>


        <div class="choose_food">
            <p class="cookingit">Cooking It Up</p>
            <div class="chooseselect">
                <select class="choose" name="forma" onchange="javascript:handleSelect(this.value)">
                    <option value="#">Choose Option </option>
                    <option value="index.php">All Recipes</option>
                    <option value="index.php?filter=Chicken">Chicken</option>
                    <option value="index.php?filter=Beef">Beef</option>
                    <option value="index.php?filter=Vegitarian">Vegetarian</option>
                    <option value="index.php?filter=Steak">Steak</option>
                    <option value="index.php?filter=Fish">Fish</option>
                </select>
            </div>
        </div>

    </div>

    <!-- search bar!!!! -->

    <div class="secondbar">
        <div class="searchbar">

            <form class="formsearch" action="index.php" method="POST">
                <input type="text" placeholder="Search.." name="search" class="inputsearch">
                <input type="submit" name="submit" value="Go" class="submitsearch"> <!-- Make sure to stylize the submit -->
            </form>

        </div>

        <div class="helpbut">
            <a href="help.php">
                <button class="help">
                    <p class="quest">?</p>
                </button>
            </a>
        </div>

    </div>

    <div class="type">
        <?php
        if (isset($_POST['submit'])) {
            if ($result->num_rows == 0) {
                echo "<p class=\"typepara\">No Recipes Found</p>"; //put the page I built for the nothing found
            } else {
                echo "<p class=\"typepara\">Found Recipes</p>";
            }
        } else if (isset($filter)) {
            echo "<p class=\"typepara\">Filter Recipes</p>";
        } else {
            echo "<p class=\"typepara\">All Recipes</p>";
        }
        ?>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        if ($result->num_rows == 0) {
            echo "<div class=\"recipes\">"; 
            echo "<img src=\"../graphics/none.png\" alt=\"none avatar\">";
            echo "<p class=\"title\">No Results</p>";
            echo "</div>";
        }
    }
    ?>

    <!-- 
    <div class="recipes">
        <img src="../graphics/none.png" alt="none avatar">

        <p class="title">No Results</p>

    </div> -->


    <!-- selections for reciepes -->

    <div class="grid">

        <?php

        while ($row = mysqli_fetch_assoc($result)) {

        ?>


            <div class="recipes">
                <!-- <a href="recipe.php"> -->
                <?php
                $id = $row['id'];
                echo "<a href=\"recipe.php?id={$id}\">";
                //took anchor tag and put it inside of a php tag. The echo generates it in the browser. Can't have quotes within one another, have to use the back slash!!
                ?>

                <img src="../headimg/<?php echo $row['main_img'] ?>" alt="steak">
                <p class="title">
                    <?php echo $row['tle']; ?>
                </p>
                <p class="subtitle">
                    <?php echo $row['subtitle']; ?>
                </p>
                </a>
            </div>


        <?php } // end php while of loop

        //step 4 relesase returned data 
        mysqli_free_result($result);
        //step 5 close the database connection 
        mysqli_close($connection);
        ?>



    </div>

    <script>
        function handleSelect(whichone) {
            console.log("hello world " + whichone);
            window.location.href = whichone;
        }
    </script>

</body>

</html>