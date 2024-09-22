
<?php

require 'includes/database.php';
require 'includes/article.php';

$conn = getDB();

# Asigning the $sql variable the query string for the database

if (isset($_GET['id'])){ 


  $article = getArticle($conn,$_GET['id']);  
  
  if ($article) {
    $title = htmlspecialchars($article['title']);
    $content = htmlspecialchars($article['content']);
    $published_at = htmlspecialchars($article['published_at']);



    

} else {

    die('Article not found');
    
} 



} else {
    echo 'ID incorret or not found';
    die;
}





?>

<?php require 'includes/header.php'; ?>

<h2>Edit article</h2>

<?php require 'includes/article-form.php'; ?>

<?php require 'includes/footer.php'; ?>
