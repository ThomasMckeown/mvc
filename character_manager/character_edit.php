<?php include '../view/header.php'; ?>
<main>
    <h1>Edit character</h1>
    <form action="index.php" method="post" id="add_character_form">

        <input type="hidden" name="action" value="update_character">

        <input type="hidden" name="character_id"
               value="<?php echo $character['character_id']; ?>">


        <label>Class:</label>
        <input type="input" name="class_id"
               value="<?php echo $character['class_id']; ?>">
        <br>

        <label>Code:</label>
        <input type="input" name="character_id"
               value="<?php echo $character['character_id']; ?>">
        <br>

        <label>Name:</label>
        <input type="input" name="character_name"
               value="<?php echo $character['character_name']; ?>">
        <br>

        <label>List Price:</label>
        <input type="input" name="pantheon"
               value="<?php echo $character['pantheon']; ?>">
        
        <label>List Price:</label>
        <input type="input" name="rank"
               value="<?php echo $character['rank']; ?>">
        
        <label>List Price:</label>
        <input type="input" name="strong_crowd_control"
               value="<?php echo $character['strong_crowd_control']; ?>">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Save Changes">
        <br>
    </form>
    <p><a href="index.php?action=list_characters">View character List</a></p>

</main>
<?php include '../view/footer.php'; ?>