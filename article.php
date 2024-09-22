
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
?>


<?php require 'includes/header.php';?>

        <?php if ($article === NULL): ?> <!-- check if the query returns a NULL result and stop the program if it does.  -->
            <p>Article not found.</p>
        <?php else: ?>

            <ul>
                
                    <li>  
                        <article>
                            <!-- Here we will echo out via the keys('title' & 'content') the content of title and content -->
                            <h2><?= htmlspecialchars($article['title']); ?></h2>
                            <p><?= htmlspecialchars($article['content']); ?></p>
                        </article>
                    </li>
                
            </ul>

        <?php endif; ?>
<?php require 'includes/footer.php';