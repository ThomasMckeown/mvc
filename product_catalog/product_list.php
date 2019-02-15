<?php include '../view/header.php'; ?>
<main>
    <aside>
        <!-- display a list of classes -->
        <h2>classes</h2>
        <?php include '../view/class_nav.php'; ?>        
    </aside>
    <section>
        <h1><?php echo $class_name; ?></h1>
        <ul class="nav">
            <!-- display links for characters in selected class -->
            <?php foreach ($characters as $character) : ?>
            <li>
                <a href="?action=view_character&amp;character_id=<?php 
                          echo $character['characterID']; ?>">
                    <?php echo $character['characterName']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </section>
</main>
<?php include '../view/footer.php'; ?>