<?php



// Check if the form was submitted using the POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Output the POST data for debugging purposes
    require 'includes/database.php';
    $sql =
    "
    INSERT INTO article (title, content, published_at)
    VALUES ('" . mysqli_escape_string($conn,$_POST['title']) . "','"
               . mysqli_escape_string($conn,$_POST['content']) . "','"
               . mysqli_escape_string($conn,$_POST['published_at']) . "')";

    
    
    
    var_dump($sql);exit;
    
    
    # Asiging the $results var, the query result object based on the connection to the database ($conn) and the query statemanet ($sql)
    
    $results = mysqli_query($conn,$sql); 
    
    if ($results === false ){
       
        echo mysqli_error($conn); #if error with the query then echo out the error @atribute = connection object from mysqli_connect()
    }
    
    else{


        $id = mysqli_insert_id($conn);
        echo "Inserted record with ID: $id";
    /*
    We are only needing one row for the Article.php page and sorted in an associative array, which mysqli_fetch_assoc() does exactly that
    @param (var)$results is the mysqli results object from the query.
    */
        
    
    }

    // Optional: Example code for handling the posted data
    // Retrieve and process the form data here if needed
    // $title = $_POST['title'];
    // $content = $_POST['content'];
    // $published_at = $_POST['published_at'];

    // Additional processing can go here, such as saving to a database
}
?>

<?php require 'includes/header.php'; ?>

<h2>New Article</h2>

<!-- Form for creating a new article -->
<form method="post">
    <div>
        <!-- Title input field -->
        <label for="title">Title:</label>
        <input type="name" name="title" id="title" placeholder="Article title">
    </div>

    <div>
        <!-- Content input field -->
        <label for="content">Content:</label>
        <textarea name="content" rows="4" cols="40" id="content" placeholder="Article content"></textarea>
    </div>

    <div>
        <!-- Date and time input field for publication date -->
        <label for="published_at">Publication and time:</label>
        <input type="datetime-local" name="published_at" id="published_at">
    </div>

    <!-- Submit button for the form -->
    <button>Add</button>
</form>

<?php require 'includes/footer.php'; ?>
