<?php

/**
  * Delete a recipe
  */

require "../config.php";
require "../common.php";
require "../simple_crud_app/credentials.php";


if (isset($_GET["id"])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);

    $id = $_GET["id"];

    $sql = "DELETE FROM recipes WHERE id = :id";

    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    $success = "Recipe successfully deleted!";
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}

try {
  $connection = new PDO($dsn, $username, $password, $options);
//more sql prepared statements
  $sql = "SELECT * FROM recipes";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>
<?php require "templates/header.php"; ?>

<h2>Delete recipe</h2>

<?php if ($success) echo $success; ?>

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
  <th>Delete</th>
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
      <td><a href="delete.php?id=<?php echo escape($row["id"]); ?>">Delete</a></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<a href="../index.php">Back to home</a>

<?php require "templates/footer.php"; ?>