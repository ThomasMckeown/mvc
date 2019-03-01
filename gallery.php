<?php include 'view/header.php'; ?>
<link href="main.css" rel="stylesheet" type="text/css"/><?php 
require('model/database.php');
   
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

        <?php
        if(isset($_FILES['image']))
    {
        echo 'running';
        $image = $_FILES['image']['name'];
        
       
    
        $target = "images/".basename($image);
        if(!empty($image))
        {
            if(move_uploaded_file($_FILES['image']['tmp_name'], $target))
            {

                echo $target;
               $query = "INSERT INTO image VALUES('".$target."')";
               $statement = $db->prepare($query);
               $statement->execute();
               $statement->closeCursor();

            }else
            {

                echo 'error';    

            }
        }else
        {       
            echo 'run';
            createContentNoImage($topic_id,$type,$content,0,$author_id,getNextOrderNumber($topic_id));
        }
    }
//    echo $id;
        ?>
        
        <form method="post" enctype="multipart/form-data">
            
            <input type="file" name="image" id="image" accept="image/*"/>
            <br>
            <input type="submit" name="insert" id="insert" value="insert" />
        </form>
        
        <?php 
        $query = "SELECT * FROM image";
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor(); 
        
        foreach($result as $r)
        {
            echo '<img src="'.$r["image"].'" width="200em" height="250em">';
        }
        ?>
   <?php include 'view/footer.php'; ?>

