
        <nav>
            <ul class="sideNav">
                <!-- display links for all classes -->
                <?php foreach($classes as $class) : ?>
                <li>
                    <a  class="active" href="?class_id=<?php 
                              echo $class['class_id']; ?>">
                        <?php echo $class['class_id']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>

