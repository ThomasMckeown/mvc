<?php include '../view/header.php';
include "../model/database.php";
?>

<main>
    <h1>Add character</h1>
    <form action="index.php" method="post" id="add_character_form" enctype="multipart/form-data">
        <input type="hidden" name="action" value="add_character">

        <label>class:</label>
        <select name="class_id">
        <?php foreach ( $classes as $class ) : ?>
            <option value="<?php echo $class['class_id']; ?>">
                <?php echo $class['class_id']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>
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
               $query = "INSERT INTO character_image VALUES('".$target."')";
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
        
        <!--<form method="post" enctype="multipart/form-data">-->
            
        
            <!--<input type="submit" name="insert" id="insert" value="insert"/>-->
        <!--</form>-->
        
        
        
         <input type="file" name="image" id="image" accept="image/*"/>
            <br>
        
        <label>Code:</label>
        <input type="input" name="character_id">
        <br>

        <label>Name:</label>
        <input type="input" name="character_name">
        <br>

        <label>List Price:</label>
        <input type="input" name="pantheon">
        
        <label>List Price:</label>
        <input type="input" name="rank">
        
        <label>List Price:</label>
        <input type="input" name="strong_crowd_control">
        <br>

        <label>&nbsp;</label>
        <input type="submit" name="insert" id="insert" value="Add character">
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_characters">View character List</a>
    </p>

</main>
 
<?php include '../view/footer.php'; ?>