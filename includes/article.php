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