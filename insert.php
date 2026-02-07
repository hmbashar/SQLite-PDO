<?php 
//PDO

try {
    $dbFile = 'test.db';

    $pdo = new PDO("sqlite:$dbFile");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected to the SQLite database successfully.";
    echo '<br>';
    echo "Database file path: " . realpath($dbFile);

    // Insert a new record into the foods table
    // $query = "INSERT INTO foods (name, calory) VALUES (:name, :calory)";
    // $stmt = $pdo->prepare($query);
    // $stmt->execute([':name' => 'Pizza', ':calory' => 300]);
    // echo "New record inserted successfully with ID: " . $pdo->lastInsertId();


    // Insert multiple records using a transaction
    // $foodsToInsert = [
    //     ['name' => 'Burger', 'calory' => 500],
    //     ['name' => 'Salad', 'calory' => 150],
    //     ['name' => 'Pasta', 'calory' => 400],
    // ];
    
    // $pdo->beginTransaction();
    // $query = "INSERT INTO foods (name, calory) VALUES (:name, :calory)";
    // $stmt = $pdo->prepare($query);

    // foreach ($foodsToInsert as $food) {
    //     $stmt->execute([':name' => $food['name'], ':calory' => $food['calory']]);
    // }

    // $pdo->commit();
    // echo "Multiple records inserted successfully.";

    // Delete a record
    // $idToDelete =6;
    // $stmt = $pdo->prepare("DELETE FROM foods WHERE id = :id");
    // $stmt->execute([':id' => $idToDelete]);
    // echo '<br>';
    // echo "Record with ID $idToDelete deleted successfully.";

    // Update a record
    $idToUpdate = 8;
    $newCalory = 450;
    $newName = 'Pizza Margherita';
    $stmt = $pdo->prepare("UPDATE foods SET calory = :calory, name = :name WHERE id = :id");
    $stmt->execute([':calory' => $newCalory, ':name' => $newName, ':id' => $idToUpdate]);
    echo '<br>';
    echo "Record with ID $idToUpdate updated successfully to new calory: $newCalory. New name: $newName";


} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}