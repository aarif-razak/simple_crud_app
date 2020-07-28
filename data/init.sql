CREATE DATABASE recipeBook;

use recipeBook;

CREATE TABLE recipes (
    id INT(11)  NOT NULL PRIMARY KEY,
    recipename VARCHAR(30) NOT NULL,
    preptime VARCHAR(30) NOT NULL,
    servings VARCHAR(50) NOT NULL,
    imageLink VARCHAR(50) NOT NULL,
    author varchar(50) NOT NULL,
    date TIMESTAMP


)