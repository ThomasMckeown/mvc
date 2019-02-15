<?php
function get_classes() {
    global $db;
    $query = 'SELECT * FROM classes
              ORDER BY class_id';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement; 
}

function get_class_id($class_id) {
    global $db;
    $query = 'SELECT * FROM classes
              WHERE class_id = :class_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();    
    $class = $statement->fetch();
    $statement->closeCursor();    
    $class_id = $class['class_id'];
    return $class_id;
}

function add_class($class_id) {
    global $db;
    $query = 'INSERT INTO classes (class_id)
              VALUES (:class_id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $statement->closeCursor();    
}

function delete_class($class_id) {
    global $db;
    $query = 'DELETE FROM classes
              WHERE class_id = :class_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $statement->closeCursor();
}
?>