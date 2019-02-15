<?php include '../view/header.php'; ?>
<main>

    <h1>class List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($classes as $class) : ?>
        <tr>
            <td><?php echo $class['class_name']; ?></td>
            <td>
                <form id="delete_character_form"
                      action="index.php" method="post">
                    <input type="hidden" name="action" value="delete_class">
                    <input type="hidden" name="class_id"
                           value="<?php echo $class['class_id']; ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br />

    <h2>Add class</h2>
    <form id="add_class_form"
          action="index.php" method="post">
        <input type="hidden" name="action" value="add_class">

        <label>Name:</label>
        <input type="input" name="class_name">
        <input type="submit" value="Add">
    </form>

    <p><a href="index.php?action=list_characters">List characters</a></p>

</main>
<?php include '../view/footer.php'; ?>