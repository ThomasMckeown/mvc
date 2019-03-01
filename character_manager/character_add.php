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
        
         <label>Character ID:</label>
        <input type="input" name="character_id" required>
        <br>

        <label>Name:</label>
        <input type="input" name="character_name" required>
        <br>

        <label>Pantheon:</label>
        <input type="input" name="pantheon" required>
        <br>
        
        <label>Rank:</label>
        <input type="input" name="rank" required>
        <br>
        <label>Strong Crowd Contol:</label>
        <input type="input" name="strong_crowd_control" required pattern="[YNyn]">
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