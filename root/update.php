<?php

/**
  * List all recipes with a link to edit
  */

try {
  require "../config.php";
  require "../common.php";
  require "../simple_crud_app/credentials.php";


  $connection = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT * FROM recipes";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();

} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>

<?php require "templates/header.php"; ?>
<?php if (isset($_POST['submit']) && $statement) { ?>
  <?php echo escape($_POST['recipename']); ?>'s data was successfully updated.
<?php } ?>


<h2>Update recipes</h2>

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
  <?php foreach ($result as $row) : ?>
    <tr>
<td><?php echo escape($row["id"]); ?></td>
<td><?php echo escape($row["recipename"]); ?></td>
<td><?php echo escape($row["preptime"]); ?></td>
<td><?php echo escape($row["servings"]); ?></td>
<td><?php echo escape($row["directions"]); ?></td>
<td><?php echo escape($row["author"]); ?></td>
<td><?php echo escape($row["date"]); ?> </td>
<!-- Editing a single entry via the id, need another php file for it -->
<td><a href="update-single.php?id=<?php echo escape($row["id"]); ?>">Edit</a></td>

      </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<a href="../index.php">Back to home</a>