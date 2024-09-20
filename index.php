
<?php

require 'includes/database.php';

$conn = getDB();

# Asigning the $sql variable the query string for the database

$sql =
"
SELECT *
FROM article
ORDER BY published_at;";

# Asiging the $results var, the query result object based on the connection to the database ($conn) and the query statemanet ($sql)

$results = mysqli_query($conn,$sql); 

if ($results === false ){

    echo mysqli_error($conn); #if error with the query then echo out the error @atribute = connection object from mysqli_connect()
}

else{
/*
@param $results is the result object from the mysqli_query()
@param $MYSQLI_ASSOC (constant) formats the data from the result object mysqli into an associative array.
*/
    $articles = mysqli_fetch_all($results,MYSQLI_ASSOC);

    
}
?>


<?php require 'includes/header.php'; ?>

    <a href= 'new-article.php'>Insert new article</a>
        <?php if (empty($articles)): ?> <!-- check if the query returns empty list of articles  -->
            <p>No articles found.</p>
        <?php else: ?>

            <ul>
                <?php foreach ($articles as $article): ?> <!-- if articles are present loop trough the array   -->
                    <li>  <!-- The list element creates die to the loop, every iteration a list item thus creating an article every iteration -->
                        <article>
                            <!-- Here we will echo out via the keys('title' & 'content') the content of title and content
                                 Also we are making the title a link with the referencec to our article.php where the id 
                                 is taken from the $article -->
                            <h2><a href = "article.php?id=<?=$article['id'];?>"><?php echo htmlspecialchars($article['title']) ?></a></h2>

                            <p><?= htmlspecialchars($article['content']); ?></p>
                        </article>
                    </li>
                <?php endforeach; ?>
            </ul>

        <?php endif; ?>
<?php require 'includes/footer.php';?>