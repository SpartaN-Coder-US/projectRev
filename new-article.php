<?php


require 'includes/database.php';
require 'includes/url.php';
require 'includes/article.php';
$title = '';
$content = '';
$published_at = '';
 
// Check if the form was submitted using the POST method

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $title = $_POST['title'];
    $content = $_POST['content'];  
    $published_at = $_POST['published_at'];    
    // Output the POST data for debugging purposes

    
    $errors = validateArticle($title,$content,$published_at); 
  
    if(empty($errors)){

    
   
    $conn =  getDB();
    

  
    $sql =
    "
    INSERT INTO article (title, content, published_at)
    VALUES ( ?, ?, ?)";

    
    
    
    
    
    # Asiging the $results var, the query result object based on the connection to the database ($conn) and the query statemanet ($sql)
    
    $stmt = mysqli_prepare($conn,$sql);
    
    if ($stmt === false ){
       
        echo mysqli_error($conn); #if error with the query then echo out the error @atribute = connection object from mysqli_connect()
    }
    
    else{

        if ($published_at == "" && $published_at == null ){

            $published_at = null;
        }

        mysqli_stmt_bind_param($stmt,'sss',$title,$content,$published_at);

      if( mysqli_stmt_execute($stmt)){

        $id = mysqli_insert_id($conn);

        redirect("/article.php?id=$id");
 
        
    
    }else{

        echo mysqli_stmt_insert_id($stmt);

    }
}

}
}
?>

<?php require 'includes/header.php'; ?>

<h2>New Article</h2>

<?php require 'includes/article-form.php'; ?>

<?php require 'includes/footer.php'; ?>
