<?php
function get_characters() {
    global $db;
    $query = 'SELECT * FROM characters
              ORDER BY character_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $characters = $statement->fetchAll();
    $statement->closeCursor();
    return $characters;
}

function get_characters_by_class($class_id) {
    global $db;
    $query = 'SELECT * FROM characters
              WHERE characters.class_id = :class_id
              ORDER BY character_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":class_id", $class_id);
    $statement->execute();
    $characters = $statement->fetchAll();
    $statement->closeCursor();
    return $characters;
}

function get_character($character_id) {
    global $db;
    $query = 'SELECT * FROM characters
              WHERE character_id = :character_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":character_id", $character_id);
    $statement->execute();
    $character = $statement->fetch();
    $statement->closeCursor();
    return $character;
}

function delete_character($character_id) {
    global $db;
    $query = 'DELETE FROM characters
              WHERE character_id = :character_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':character_id', $character_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_character($class_id, $character_id, $character_name, $pantheon, $rank, $strong_crowd_control) {
    global $db;
    $query = 'INSERT INTO characters
                 (class_id, character_id, character_name, pantheon, rank, strong_crowd_control)
              VALUES
                 (:class_id, :character_id, :character_name, :pantheon, :rank, :strong_crowd_control)';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->bindValue(':character_id', $character_id);
    $statement->bindValue(':character_name', $character_name);
    $statement->bindValue(':pantheon', $pantheon);
    $statement->bindValue(':rank', $rank);
    $statement->bindValue(':strong_crowd_control', $strong_crowd_control);
    $statement->execute();
    $statement->closeCursor();
}

function update_character($character_id, $class_id, $character_name, $pantheon, $rank, $strong_crowd_control) {
    global $db;
    $query = 'UPDATE characters
              SET class_id = :class_id,
                  character_id = :character_id,
                  character_name = :character_name,
                  pantheon = :pantheon,
                  rank = :rank,
                  strong_crowd_control = :strong_crowd_control
               WHERE character_id = :character_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->bindValue(':character_id', $character_id);
    $statement->bindValue(':character_name', $character_name);
    $statement->bindValue(':pantheon', $pantheon);
    $statement->bindValue(':rank', $rank);
    $statement->bindValue(':strong_crowd_control', $strong_crowd_control);   
    $statement->execute();
    $statement->closeCursor();
}
?>