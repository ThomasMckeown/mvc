<?php include '../view/header.php'; ?>
<main>

    <h1>character List</h1>

    <aside>
        <!-- display a list of classes -->
        <h2>classes</h2>
        <?php include '../view/class_nav.php'; ?>        
    </aside>

    <section>
        <!-- display a table of characters -->
        <h2><?php echo $class_id; ?></h2>
        <table>
            <tr>
<!--                <th>character_id</th>-->
                <th>character_name</th>
                <th class="right">pantheon</th>
                <th class="right">rank</th>
                <th class="right">strong_crowd_control</th>
                
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($characters as $character) : ?>
            <tr>
<!--                <td><?php echo $character['character_id']; ?></td>-->
                <td><?php echo $character['character_name']; ?></td>
                <td class="right"><?php echo $character['pantheon']; ?></td>               
                <td class="right"><?php echo $character['rank']; ?></td>
                <td class="right"><?php echo $character['strong_crowd_control']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="show_edit_form">
                    <input type="hidden" name="character_id"
                           value="<?php echo $character['character_id']; ?>">
                    <input type="hidden" name="class_id"
                           value="<?php echo $character['class_id']; ?>">
                    <input type="submit" value="Edit">
                </form></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_character">
                    <input type="hidden" name="character_id"
                           value="<?php echo $character['character_id']; ?>">
                    <input type="hidden" name="class_id"
                           value="<?php echo $character['class_id']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add character</a></p>
        <p><a href="?action=list_classes">List classes</a></p>
    </section>

</main>
<?php include '../view/footer.php'; ?>