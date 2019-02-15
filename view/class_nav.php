
        <nav>
            <ul>
                <!-- display links for all classes -->
                <?php foreach($classes as $class) : ?>
                <li>
                    <a href="?class_id=<?php 
                              echo $class['class_id']; ?>">
                        <?php echo $class['class_name']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>

