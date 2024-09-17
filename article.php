
<?php

require 'includes/database.php';


# Asigning the $sql variable the query string for the database

if (isset($_GET['id']) && is_numeric($_GET['id'])){ # to prevent sql injection we are checking if the id first exists and if the id is numeric in order to limit the posibility of sql injection

$sql =
"
SELECT *
FROM article
WHERE id = " . $_GET['id']; # instead of hardcoding the id we are pasiing in the id from the querry.



# Asiging the $results var, the query result object based on the connection to the database ($conn) and the query statemanet ($sql)

$results = mysqli_query($conn,$sql); 

if ($results === false ){
   
    echo mysqli_error($conn); #if error with the query then echo out the error @atribute = connection object from mysqli_connect()
}

else{
/*
We are only needing one row for the Article.php page and sorted in an associative array, which mysqli_fetch_assoc() does exactly that
@param (var)$results is the mysqli results object from the query.
*/
    $article = mysqli_fetch_assoc($results);

}

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
                            <h2><?= $article['title']; ?></h2>
                            <p><?= $article['content']; ?></p>
                        </article>
                    </li>
                
            </ul>

        <?php endif; ?>
<?php require 'includes/footer.php';