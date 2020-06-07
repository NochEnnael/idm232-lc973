<?php

//step 1 open a connection to DB

require '../include/db.php';


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../alpha/index.css">
    <link rel="stylesheet" href="../alpha/recipe.css">
    <title>Recipe</title>
</head>

<body>

    <div class="header">
        <a href="index.php">
            <header>Leanne's Luncheon</header>
        </a>
    </div>


    <div class="back">
        <!-- Back button to home page -->
        <a href="index.php">BACK TO HOME</a>
    </div>


    <?php
    // get ID passed to this page 

    $id = $_GET['id'];

    //query for said ID number 
    //step 2 perform a DB table query

    $table = 'recipes';
    $query = "SELECT * FROM {$table} WHERE id={$id}";
    $result = mysqli_query($connection, $query);

    //check for errors in SQL statement 

    if (!$result) {
        die('Database query failed');
    } else {
        $row = mysqli_fetch_assoc($result);
        //print_r($row);
    }


    ?>


    <div class="recipe">

        <h1><?php echo $row['tle']; ?></h1>

        <h2><?php echo $row['subtitle']; ?></h2>

        <img src="../headimg/<?php echo $row['main_img'] ?>" alt="Acho" class="hero">

        <div class="about">

            <p class="aboutintro">
                <?php echo $row['description']; ?>
            </p>

        </div>

        <div class="ingredients">

            <img src="../ingred_ph/<?php echo $row['ingredients_img'] ?>" alt="placeholder" class="recipeingredient">

            <br>

            <ol class="ingredienttext">

                <?php
                $ingredStr = $row['all_ingredients'];
                //echo $ingredStr;

                // convert string into an array 

                $ingredArray = explode("*", $ingredStr);
                // array of the ingrdients in the string: first paramater is special character, second parapmeter is what we are pulling in 
                //print_r($ingredArray); 

                for ($lp = 0; $lp < count($ingredArray); $lp++) {
                    $oneIngred = $ingredArray[$lp];
                    echo "<li>" . $oneIngred . "</li>";
                }

                ?>

            </ol>

        </div>


        <div class="stepdiv">

            <?php

            $photoStr = $row['step_imgs']; //step photos
            $stepStr = $row['all_steps']; //actual steps and descriptions
            //echo $photoStr;
            // echo stepStr;

            // convert string into an array 

            $photoArray = explode("*", $photoStr);
            $stepArray = explode("*", $stepStr);
            // array of the ingrdients in the string: first paramater is special character, second parapmeter is what we are pulling in 
            //print_r($photoArray); 

            for ($ph = 0; $ph < count($photoArray); $ph++) {

                $onePhoto = $photoArray[$ph];
                $oneStep = $stepArray[$ph];

                /* echo $onePhoto;
                        echo $oneStep; */

                echo "<img src=\"../recipe_ph/$onePhoto\" alt=\"rice\" class=\"recipephoto\">";

                echo "<p class=\"steps\">$oneStep</p>";
            }

            ?>

            <div class="back">
                <!-- Back button to home page -->
                <a href="index.php">BACK TO HOME</a>
            </div>






            <!-- <img src="../graphics/Recipe_Beef_Medallions_Mushroom_Sauce_with_Mashed_Potatoes/#" alt="rice" class="recipephoto">

            <p class="steps">
            
            </p> -->

        </div>

        <!--         <div class="stepdiv">

            <img src="../graphics/0101_FPP_Chicken-Rice_18622_WEB_high_feature.jpg" alt="rice" class="recipephoto">

            <p class="steps">
                2 Prepare the ingredients & make the glaze:

                <br><br>
                    While the rice cooks, wash and dry the fresh produce. Peel the carrots; quarter lengthwise, then halve crosswise. Peel and roughly chop the garlic. Remove and discard the stems of the kale; finely chop the leaves. Using a peeler, remove the lime rind, avoiding the white pith; mince to get 2 teaspoons of zest (or use a zester). Halve the lime crosswise. Halve the orange; squeeze the juice into a bowl, straining out any seeds. Whisk in the chile paste and 2 tablespoons of water until smooth.
            </p>

        </div>

        <div class="stepdiv">

            <img src="../graphics/Recipe_Ancho-Orange_Chicken_with_Kale_Rice_Roasted_Carrots/0101_FPP_Chicken-Rice_18626_WEB_high_feature.jpg" alt="rice" class="recipephoto">

            <p class="steps">
                
                Place the sliced carrots on a sheet pan. Drizzle with olive oil and season with salt and pepper; toss to coat. Arrange in an even layer. Roast 15 to 17 minutes, or until tender when pierced with a fork. Remove from the oven.
            </p>

        </div>

        <div class="stepdiv">

            <img src="../graphics/Recipe_Ancho-Orange_Chicken_with_Kale_Rice_Roasted_Carrots/0101_FPP_Chicken-Rice_18609_WEB_retina_feature.jpg" alt="rice" class="recipephoto">

            <p class="steps">
                
                While the carrots roast, in a large pan (nonstick, if you have one), heat 2 teaspoons of olive oil on medium-high until hot. Add the chopped garlic and cook, stirring constantly, 30 seconds to 1 minute, or until fragrant. Add the chopped kale; season with salt and pepper. Cook, stirring occasionally, 3 to 4 minutes, or until slightly wilted. Add 1/3 cup of water; season with salt and pepper. Cook, stirring occasionally, 3 to 4 minutes, or until the kale has wilted and the water has cooked off. Transfer to the pot of cooked rice. Stir to combine; season with salt and pepper to taste. Cover to keep warm. Wipe out the pan.
            </p>

        </div>

        
        <div class="stepdiv">

            <img src="../graphics/Recipe_Ancho-Orange_Chicken_with_Kale_Rice_Roasted_Carrots/0101_FPP_Chicken-Rice_18639_WEB_high_feature.jpg" alt="rice" class="recipephoto">

            <p class="steps">
                
                5 Cook & glaze the chicken:

                <br><br>
                
                While the carrots continue to roast, pat the chicken dry with paper towels; season with salt and pepper on both sides. In the same pan, heat 2 teaspoons of olive oil on medium-high until hot. Add the seasoned chicken and cook 4 to 6 minutes on the first side, or until browned. Flip and cook 2 to 3 minutes, or until lightly browned. Add the glaze and cook, frequently spooning the glaze over the chicken, 2 to 3 minutes, or until the chicken is coated and cooked through. Turn off the heat; stir the butter and the juice of 1 lime half into the glaze until the butter has melted. Season with salt and pepper to taste.    
            </p>

        </div>


        <div class="stepdiv">

            <img src="../graphics/Recipe_Ancho-Orange_Chicken_with_Kale_Rice_Roasted_Carrots/0101_FPP_Chicken-Rice_18630_WEB_high_feature.jpg" alt="rice" class="recipephoto">

            <p class="steps">
                
                6 Finish the rice & serve your dish:
                
                <br><br>

                To the pot of cooked rice and kale, add the lime zest, crème fraîche, raisins, and the juice of the remaining lime half. Stir to combine; season with salt and pepper to taste. Serve the glazed chicken with the finished rice and roasted carrots. Top the chicken with the remaining glaze from the pan. Enjoy!
            </p>

        </div>

 -->
    </div>



</body>

</html>