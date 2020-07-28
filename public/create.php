<?php
if (isset($_POST['submit'])) {
	require "../config.php";
	/**we need the escape function from common */
	require "../common.php";
    
    try  {
        $connection = new PDO($dsn, $username, $password, $options);
        /**make the connection and store our inputs into an array */
        $new_recipe = array(
            "recipename" => $_POST['recipename'],
            "preptime"  => $_POST['preptime'],
            "servings"     => $_POST['servings'],
            "directions"       => $_POST['directions'],
            "author"  => $_POST['author']
		);
		/*More condensed insert into DB method that breaks apart our input array and 
		runs the insert into value into it */

        $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "recipes",
                implode(", ", array_keys($new_recipe)),
                ":" . implode(", :", array_keys($new_recipe))
        );
        
        $statement = $connection->prepare($sql);
        $statement->execute($new_recipe);
    } catch(PDOException $error) { /**if there is an error we output this  */
        echo $sql . "<br>" . $error->getMessage();
    }
}

?>




<?php include "templates/header.php";
//** if the form is submitted, then we can just show that the form completed it */ ?>

<?php if (isset($_POST['submit']) && $statement) { ?>
  <?php echo escape($_POST['recipename']); ?> was successfully added to the database.
<?php } ?>



<!-- To add a recipe, we need the name of the dish, prep time, servings, link to an image?-->

<form method="post">
    	<label for="recipename">Recipe Name:</label>
    	<input type="text" name="recipename" id="recipename">
    	<label for="preptime">Estimated Prep/Cooking Time:</label>
    	<input type="text" name="preptime" id="preptime">
    	<label for="servings">Number of servings:</label>
    	<input type="text" name="servings" id="servings">
    	<label for="directions">Link to directions:</label>
    	<input type="text" name="directions" id="directions">
    	<label for="author">Submitted by:</label>
        <input type="text" name="author" id="author">
        
    	<input type="submit" name="submit" value="Submit">
    </form>

	<?php include "templates/footer.php"; ?>
	<a href="index.php">Back to home</a>

