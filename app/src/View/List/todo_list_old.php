<?php
    $user = "will";
    $password = "123456";
    $database = "willcoffee";
    $table = "todo_list";

    try {
        $db = new PDO ("mysql:host=localhost;dbname=$database", $user, $password);
        echo "<h2>TODO LIST</h2><ol>";
        foreach($db->query("SELECT content FROM $table") as $row) {
            echo "<li>" . $row['content'] . "</li>";
        }
        echo "</ol>";
    } catch (PDOExeption $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }