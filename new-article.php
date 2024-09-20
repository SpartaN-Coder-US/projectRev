<?php


require 'includes/database.php';
$errors = [];
$title = '';
$content = '';
$published_at = '';
// Check if the form was submitted using the POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $title = $_POST['title'];
    $content = $_POST['content'];  
    $published_at = $_POST['published_at'];    
    // Output the POST data for debugging purposes

    

    if ($title == ''){
        $errors[] = 'Title is required';
    }

    if ($content == ''){
        $errors[] = 'Content is required';
    }
    
    if ($published_at != ''){
        $date_time = date_create_from_format('d-m-Y,H--i',$published_at);
    }
    if ($date_time === false ){
        $error[] ='Invalid date and time';
    }

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

        if ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ){
            $protocol= 'https';

        }   else{
            $protocol = 'http';

        }

        header("Location: $protocol://" . $_SERVER['HTTP_HOST'] . "/article.php?id=$id");


        exit;

 
        
    
    }else{

        echo mysqli_stmt_insert_id($stmt);

    }
}

}
}
?>

<?php require 'includes/header.php'; ?>

<h2>New Article</h2>

<?php if(! empty($errors)): ?>

<ul>
    <?php foreach ($errors as $error): ?>
        <li><?= $error ?></li>
        <?php endforeach; ?>

</ul>

<?php endif; ?>

<!-- Form for creating a new article -->
<form method="post">
    <div>
        <!-- Title input field -->
        <label for="title">Title:</label>
        <input type="name" name="title" id="title" placeholder="Article title" value = <?= htmlspecialchars($title); ?> >
    </div>

    <div>
        <!-- Content input field -->
        <label for="content">Content:</label>
        <textarea name="content" rows="4" cols="40" id="content" placeholder="Article content"><?= htmlspecialchars($content);?></textarea>
    </div>

    <div>
        <!-- Date and time input field for publication date -->
        <label for="published_at">Publication and time:</label>
        <input type="datetime-local" name="published_at" id="published_at" value= <?=  $published_at;?> >
    </div>

    <!-- Submit button for the form -->
    <button>Add</button>
</form>

<?php require 'includes/footer.php'; ?>
