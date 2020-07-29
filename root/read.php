<?php

/**
  * Function to query information based on
  * a parameter: in this case, we are querying by recipe name
  *
  */

  
if (isset($_POST['submit'])) {
  try {
    require "../config.php";
    require "../common.php";
    


    $connection = new PDO($dsn, $username, $password, $options);

    $sql = "SELECT *
    FROM recipes
    WHERE recipename = :recipename";

    $recipename = $_POST['recipename'];

    $statement = $connection->prepare($sql);
    $statement->bindParam(':recipename', $recipename, PDO::PARAM_STR);
    $statement->execute();

    $result = $statement->fetchAll();
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}
?>



<?php include "templates/header.php"; ?>


<?php
//**Main result screen of search results */
if (isset($_POST['submit'])) {
  if ($result && $statement->rowCount() > 0) { ?>
    <h2>Results</h2>

    <table>
      <thead>
<tr>
  <th>#</th>
  <th>Recipe Name</th>
  <th>Prep Time</th>
  <th>Servings</th>
  <th>Directions Link</th>
  <th>Author</th>
  <th>Date Added</th>
</tr>
      </thead>
      <tbody>
  <?php foreach ($result as $row) { ?>
      <tr>
<td><?php echo escape($row["id"]); ?></td>
<td><?php echo escape($row["recipename"]); ?></td>
<td><?php echo escape($row["preptime"]); ?></td>
<td><?php echo escape($row["servings"]); ?></td>
<td onClick= "document.location.href = '<?php echo escape($row["directions"]); ?>';">Click Here</td>
<td><?php echo escape($row["author"]); ?></td>
<td><?php echo escape($row["date"]); ?> </td>
      </tr>
    <?php } ?>
      </tbody>
  </table>
  <?php } else { ?>
    > No results found for <?php echo escape($_POST['recipename']); ?>.
  <?php }
} ?>
<h2>Find recipe by name</h2>

<form method="post">
    <label for="recipename">Recipe name:</label>
    <input type="text" id="recipename" name="recipename">
    <input type="submit" name="submit" value="View Recipes">
</form>

<a href="../index.php">Back to home</a>
    <?php include "templates/footer.php"; ?>