<?php

/**
  * Use an HTML form to edit an entry in the
  * recipes table.
*/

require "../config.php";
require "../common.php";
//REquired update catch and clause
if (isset($_POST['submit'])) {
    
    try {
      $connection = new PDO($dsn, $username, $password, $options);
      $recipe =[
        "id"        => $_POST['id'],
        "recipename" => $_POST['recipename'],
        "preptime"  => $_POST['preptime'],
        "servings"     => $_POST['servings'],
        "directions"       => $_POST['directions'],
        "author"  => $_POST['author'],
        "date"      => $_POST['date']
      ];
      //run the update query 
      $sql = "UPDATE recipes
              SET id = :id,
                recipename = :recipename,
                preptime = :preptime,
                servings = :servings,
                directions = :directions,
                author = :author,
                date = :date
              WHERE id = :id";
    //error catching
    $statement = $connection->prepare($sql);
    $statement->execute($recipe);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
  }
  

if (isset($_GET['id'])) {
    try {
      $connection = new PDO($dsn, $username, $password, $options);
      $id = $_GET['id'];
        /**SQL prepared statements */
      $sql = "SELECT * FROM recipes WHERE id = :id";
      $statement = $connection->prepare($sql);
      $statement->bindValue(':id', $id);
      $statement->execute();
  
      $recipe = $statement->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
  } else {
    echo "Something went wrong when updating!!";
    exit;
  }
?>

<?php require "templates/header.php"; ?>
<?php if (isset($_POST['submit']) && $statement) { ?>
  <?php echo escape($_POST['recipename']); ?>'s data was successfully updated.
<?php } ?>


<h2>Edit a recipe</h2>

<form method="post">
<!--Will display a running set of forms to edit all the data for the given ID -->
    <?php foreach ($recipe as $key => $value) : ?>
      <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
      <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'id' ? 'readonly' : null); ?>>
    <?php endforeach; ?>
    <input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>
