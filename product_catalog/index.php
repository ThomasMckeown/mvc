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
    $class_id = filter_input(INPUT_GET, 'class_id', 
            FILTER_VALIDATE_INT);
    if ($class_id == NULL || $class_id == FALSE) {
        $class_id = 1;
    }
    $classes = get_classes();
    $class_name = get_class_name($class_id);
    $characters = get_characters_by_class($class_id);

    include('character_list.php');
} else if ($action == 'view_character') {
    $character_id = filter_input(INPUT_GET, 'character_id', 
            FILTER_VALIDATE_INT);   
    if ($character_id == NULL || $character_id == FALSE) {
        $error = 'Missing or incorrect character id.';
        include('../errors/error.php');
    } else {
        $classes = get_classes();
        $character = get_character($character_id);

        // Get character data
        $code = $character['characterCode'];
        $name = $character['characterName'];
        $list_price = $character['listPrice'];

        // Calculate discounts
        $discount_percent = 30;  // 30% off for all web orders
        $discount_amount = round($list_price * ($discount_percent/100.0), 2);
        $unit_price = $list_price - $discount_amount;

        // Format the calculations
        $discount_amount_f = number_format($discount_amount, 2);
        $unit_price_f = number_format($unit_price, 2);

        // Get image URL and alternate text
        $image_filename = '../images/' . $code . '.png';
        $image_alt = 'Image: ' . $code . '.png';

        include('character_view.php');
    }
}
?>