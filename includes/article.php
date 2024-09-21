<?php

function getArticle($conn,$id)
{
    $sql = "SELECT *
            FROM article
            WHERE id = ?";
    
    $stmt = mysqli_prepare($conn, $sql);
}