<?php include '../view/header.php'; ?>
<main>
    <h1>Add character</h1>
    <form action="index.php" method="post" id="add_character_form">
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
        <input type="submit" value="Add character">
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_characters">View character List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>