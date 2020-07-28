<?php include "templates/header.php"; ?>
<h2>Find recipe by Author</h2>

<form method="post">
    <label for="author">Author</label>
    <input type="text" id="author" name="author">
    <input type="submit" name="submit" value="View Recipes">
</form>

<a href="index.php">Back to home</a>
    <?php include "templates/footer.php"; ?>