<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Simple Recipe Database App</title>
    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body>
  <h1>Simple Recipe Database App</h1>
    
    <!--We need to import the header and footers -->
    <?php include "..root/templates/header.php"; ?>

    <ul>
      <li>
        <a href="../root/create.php"><strong>Create</strong></a> - add a Recipe
      </li>
      <li>
        <a href="../root/read.php"><strong>View</strong></a> - Find a specific Recipe
      </li>
      <li><a href="../root/update.php"><strong>Update</strong></a> - edit a Recipe</li>
      <li>
      <a href="../root/delete.php"><strong>Delete</strong></a> - delete a Recipe
      </li>
    </ul>

    <?php include "../root/templates/footer.php"; ?>
  </body>
</html>