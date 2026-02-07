<?php 
//PDO

try {
    $dbFile = 'test.db';

    $pdo = new PDO("sqlite:$dbFile");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected to the SQLite database successfully.";
    echo '<br>';
    echo "Database file path: " . realpath($dbFile);

   // $stmt = $pdo->query("select * from food");
    //$food = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $id = 1;
    $stmt = $pdo->prepare("select * from foods where id = ?"); //positional parameter
    $stmt->execute([$id]);
    $food = $stmt->fetch(PDO::FETCH_ASSOC);

    print_r($food);
    echo '<br>';      
    $stmt->execute([3]);
    $food = $stmt->fetch(PDO::FETCH_ASSOC);
    print_r($food);



    $id4 = 4;
    $stmt = $pdo->prepare("select * from foods where id = :id AND calory < :calory"); //named parameter
    $stmt->execute([':id' => $id4, ':calory' => 100]);
    $food = $stmt->fetch(PDO::FETCH_ASSOC);
    print_r($food);
   
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}