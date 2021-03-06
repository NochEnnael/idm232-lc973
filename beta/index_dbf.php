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

<?php

while ($row = mysqli_fetch_assoc($result)) {
    $title = $row ['Title'];
    $subtitle = $row ['Subtitle'];
    echo $title;
    echo $subtitle;
    echo "<hr>";
    }

    //step 4 relesase returned data 
    
    mysqli_free_result($result);

    //step 5 close the database connection 

    mysqli_close($connection);
?>
    
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

        <div class="recipes">
            <a href="recipe.html">
                <img src="../graphics/0101_2PM_Steak-Diane_97315_SQ_hi_res.jpg" alt="steak">
                <p class="title">Beef Medallions & Mushroom Sauce</p>
                <p class="subtitle">With Mashed Potatoes</p>
            </a>
        </div>

        <div class="recipes">
            <a href="recipe.html">
                <img src="../graphics/0101_FPP_Chicken-Rice_97338_WEB_SQ_hi_res.jpg" alt="chicken">
                <p class="title">
                    Ancho Orange Chicken
                </p>
                <p class="subtitle">
                    With Kale Rice & Roasted Carrots
                </p>
            </a>
        </div>

        <div class="recipes">
            <a href="recipe.html">
                <img src="../graphics/1225_2PV1_Bucatini_100082_SQ_hi_res.jpg" alt="broccoli">
                <p class="title">
                    Bucatini Alfredo 
                </p>
                <p class="subtitle">
                    With Broccoli
                </p>
            </a>    
        </div>

        <div class="recipes">
            <a href="recipe.html">
                <img src="../graphics/1225_FPV_Pesto_-Broccoli-Sandwich_74916_WEB_SQ_hi_res.jpg" alt="pesto">
                <p class="title">
                    Broccoli and Basil Pesto Sandwiches
                </p>
                <p class="subtitle">
                    With Romaine & Citrus Salad
                </p>
            </a>
        </div>

        <div class="recipes">
            <a href="recipe.html">
                <img src="../graphics/0101_FPV_Broccoli-Calzones_97286_WEB_SQ_hi_res.jpg" alt="pesto">
                <p class="title">
                    Broccoli & Mozzarella Calzones
                </p>
                <p class="subtitle">
                    With Caesar Salad
                </p>
            </a>
        </div>

        <div class="recipes">
            <a href="recipe.html">
                <img src="../graphics/1120_FPV_Emchiladas_74891_WEB_SQ_hi_res.jpg" alt="enchiladas">
                <p class="title">
                    Cheesy Enchilada Rojas
                </p>
                <p class="subtitle">
                    With Mushrooms and Kale
                </p>
            </a>
        </div>

    </div>


</body>
</html>