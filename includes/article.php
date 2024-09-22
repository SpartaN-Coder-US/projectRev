<?php
/**
 * This function retrieves an article by its ID from the database.
 *
 * @param mysqli $conn The MySQLi connection object.
 * @param int $id The unique ID of the article to fetch.
 * @return array|null An associative array containing the article data, or null if no article is found.
 */



function getArticle($conn,$id)
{
    $sql = "SELECT *
            FROM article
            WHERE id = ?";
    
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {

        echo mysqli_error($conn);

    } else { 

        mysqli_stmt_bind_param($stmt, "i", $id);  

        if (mysqli_stmt_execute($stmt))  {

            $result = mysqli_stmt_get_result($stmt); 

            return mysqli_fetch_array($result, MYSQLI_ASSOC);

        } 
         
        
    }

    
}


/**
 * In order to check that the edited fields are acooriding to the correct format.
 *
 * @param [string] $title
 * @param [string] $content
 * @param [string] $published_at
 * @return the errors array if any else null
 */
function validateArticle($title, $content,$published_at) 
{
    $errors = [];

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

    return $errors;
}