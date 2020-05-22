<?php 

//step 1 open a connection to DB

require '../include/db.php';

//step 2 perform a DB table query

$table = 'recipes'; 
$query = "SELECT * FROM {$table} ";
$result = mysqli_query($connection, $query);

//check for errors in SQL statement 

if (!$result) {
    die ('Database query failed');

}
    

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../alpha/index.css">
    <title>Home Page</title>
</head>
<body>


    
    <div class="header">
        <a href="index.html">
         <header>Leanne's Luncheon</header>
        </a>
    </div>

    <div class="bar">

        <div hidden class="webnav">
            <nav>
                <ul>
                    <li><a href="index.html">All Recipes</a></li>
                    <li><a href="broccoli.html">Chicken</a></li>
                    <li><a href="sorry.html">Fish</a></li>
                    <li class="cook"><a href="index.html">Cooking It Up</a></li>
                    <li><a href="broccoli.html">Spinach</a></li>
                    <li><a href="broccoli.html">Broccoli</a></li>
                    <li><a href="broccoli.html">Potatoes</a></li>
                </ul>
            </nav>
        </div>
    
        

       <div class="choose_food">
            <p class="cookingit">Cooking It Up</p>
            <div class="chooseselect">
                <select class="choose" name="forma" onchange="location = this.value;">
                    <option value="0">Choose Option </option>
                    <option value="index.html">All Recipes</option>
                    <option value="broccoli.html">Chicken</option>
                    <option value="sorry.html">Fish</option>
                    <option value="broccoli.html">Spinach</option>
                    <option value="broccoli.html">Brocccoli</option>
                    <option value="broccoli.html">Potatoes</option>
                </select>
            </div>
        </div> 
   
    </div>

    <!-- search bar!!!! -->
    
    <div class="secondbar">
        <div class="searchbar">
            <form class="formsearch">
                <input type="text" placeholder="Search.." name="search" class="inputsearch">
              </form>
        </div>

        <div class="helpbut">
            <a href="help.html">
                <button class="help">
                    <p class="quest">?</p>
                </button>
            </a>
        </div>

    </div>

    <div class="type">
        <p class="typepara">All Recipes</p>
    </div>

    <!-- selections for reciepes -->

    <div class="grid"> 

        <?php

            while ($row = mysqli_fetch_assoc($result)) {

        ?>    


        <div class="recipes">
            <a href="recipe.html">
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


</body>
</html>