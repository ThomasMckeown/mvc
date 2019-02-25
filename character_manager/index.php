<?php
require('../model/database.php');
require('../model/character_db.php');
require('../model/class_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_characters';
    }
}

if ($action == 'list_characters') {
    // Get the current class ID
    $class_id = filter_input(INPUT_GET, 'class_id');
    if ($class_id == NULL || $class_id == FALSE) {
        $class_id = $class_id;
    }
    
    // Get character and class data
    $class_id = get_class_id($class_id);
    $classes = get_classes();
    $characters = get_characters_by_class($class_id);

    // Display the character list
    include('character_list.php');
} else if ($action == 'show_edit_form') {
    $character_id = filter_input(INPUT_POST, 'character_id', 
            FILTER_VALIDATE_INT);
    if ($character_id == NULL || $character_id == FALSE) {
        $error = "Missing or incorrect character id.";
        include('../errors/error.php');
    } else { 
        $character = get_character($character_id);
        include('character_edit.php');
    }
} else if ($action == 'update_character') {
    $character_id = filter_input(INPUT_POST, 'character_id', 
            FILTER_VALIDATE_INT);
     $character_image = filter_input(INPUT_POST, 'character_image');
    $class_id = filter_input(INPUT_POST, 'class_id');
    $character_name = filter_input(INPUT_POST, 'character_name');
    $pantheon = filter_input(INPUT_POST, 'pantheon');
    $rank = filter_input(INPUT_POST, 'rank');
    $strong_crowd_control = filter_input(INPUT_POST, 'strong_crowd_control');
    

    // Validate the inputs
    if ($character_image == NULL || $character_id == NULL || $character_id == FALSE || $class_id == NULL || 
           $character_name == NULL || $pantheon == NULL || 
            $rank == NULL || $strong_crowd_control == NULL) {
        $error = "Invalid character data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        update_character($character_image, $character_id, $class_id, $character_name, $pantheon, $rank, $strong_crowd_control);

        // Display the character List page for the current class
        header("Location: .?class_id=$class_id");
    }
} else if ($action == 'delete_character') {
    $character_id = filter_input(INPUT_POST, 'character_id', 
            FILTER_VALIDATE_INT);
    $class_id = filter_input(INPUT_POST, 'class_id');
    if ($class_id == NULL ||
            $character_id == NULL || $character_id == FALSE) {
        $error = "Missing or incorrect character id or class id.";
        include('../errors/error.php');
    } else { 
        delete_character($character_id);
        header("Location: .?class_id=$class_id");
    }
} else if ($action == 'show_add_form') {
    $classes = get_classes();
    include('character_add.php');
} else if ($action == 'add_character') {
    $character_image = filter_input(INPUT_POST, 'character_image');
    $class_id = filter_input(INPUT_POST, 'class_id');
    $character_id = filter_input(INPUT_POST, 'character_id', FILTER_VALIDATE_INT);
    $character_name = filter_input(INPUT_POST, 'character_name');
    $pantheon = filter_input(INPUT_POST, 'pantheon');
    $rank = filter_input(INPUT_POST, 'rank');
    $strong_crowd_control = filter_input(INPUT_POST, 'strong_crowd_control');
    if ($character_image == NULL || $class_id == NULL || $character_id == NULL || $character_id == FALSE || 
            $character_name == NULL || $pantheon == NULL || $rank == NULL || $strong_crowd_control == NULL) {
        $error = "Invalid character data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        add_character($character_image, $class_id, $character_id, $character_name, $pantheon, $rank, $strong_crowd_control);
        header("Location: .?class_id=$class_id");
    }
} else if ($action == 'list_classes') {
    $classes = get_classes();
    include('class_list.php');
} else if ($action == 'add_class') {
    $class_id = filter_input(INPUT_POST, 'class_id');

    // Validate inputs
    if ($class_id == NULL) {
        $error = "Invalid class name. Check name and try again.";
        include('../errors/error.php');
    } else {
        add_class($class_id);
        header('Location: .?action=list_classes');  // display the class List page
    }
} else if ($action == 'delete_class') {
    $class_id = filter_input(INPUT_POST, 'class_id');
    delete_class($class_id);
    header('Location: .?action=list_classes');      // display the class List page
}
?>