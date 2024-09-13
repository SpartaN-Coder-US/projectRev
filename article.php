
<?php
/*
Creates the $variabls for the connection to the database (name_db,user_db,pass_db,db_host).
Then via mysqli_connect() we pass the variables, and assign the mysqli object to $conn variable
*/
$db_host = "localhost";
$db_name = "cms";
$db_user = "cms_www";
$db_pass = "64w6H2rOJ1zwLRyk";

$conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name);

/*
After esablishing connection we are checking for errors via
mysqli_connect_error() function and if the statement returns true 
we echo out the error, and exit the program.
else we print to the client "Connected succesfully"
 */
if (mysqli_connect_error()){
    echo mysqli_connect_error();
    
    exit;
}




# Asigning the $sql variable the query string for the database

$sql =
"
SELECT *
FROM article
WHERE id = " . $_GET['id'];



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
?>


<!DOCTYPE html>
<html>
<!-- 
This is the structure of the website
-->
<head>
    <title>My blog</title>
    <meta charset="utf-8">
</head>
<body>

    <header>
        <h1>My blog</h1>
    </header>

    <main>
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
    </main>
</body>
</html>
