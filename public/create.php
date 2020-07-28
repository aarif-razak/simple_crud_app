<?php include "templates/header.php"; ?>
<?php include "templates/footer.php"; ?>

<!-- To add a recipe, we need the name of the dish, prep time, servings, link to an image?-->

<form method="post">
    	<label for="recipename">Recipe Name:</label>
    	<input type="text" name="recipiename" id="recipename">
    	<label for="preptime">Estimated Prep/Cooking Time:</label>
    	<input type="text" name="preptime" id="preptime">
    	<label for="servings">Number of Servings:</label>
    	<input type="text" name="servings" id="servings">
    	<label for="imageLink">Link to an image:</label>
    	<input type="text" name="imageLink" id="imageLink">
    	<label for="author">Submitted by:</label>
        <input type="text" name="author" id="author">
        
    	<input type="submit" name="submit" value="Submit">
    </form>

	
	<a href="index.php">Back to home</a>

