
<?php

require 'includes/database.php';
require 'includes/article.php';

$conn = getDB();

# Asigning the $sql variable the query string for the database

if (isset($_GET['id'])){ 


  $article = getArticle($conn,$_GET['id']);  

} else {
    $article = null;    #if the id != valid then we assign $article null.
}

var_dump($article);