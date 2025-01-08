<?php
// Database connection
$host = 'localhost';
$dbname = 'serch';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Build the query with filters
$sql = "SELECT * FROM books WHERE 1=1";
$params = [];

if (!empty($_GET['title'])) {
    $sql .= " AND title LIKE :title";
    $params[':title'] = '%' . $_GET['title'] . '%';
}

if (!empty($_GET['author'])) {
    $sql .= " AND author LIKE :author";
    $params[':author'] = '%' . $_GET['author'] . '%';
}

if (!empty($_GET['genre'])) {
    $sql .= " AND genre = :genre";
    $params[':genre'] = $_GET['genre'];
}

if (!empty($_GET['min_price'])) {
    $sql .= " AND price >= :min_price";
    $params[':min_price'] = $_GET['min_price'];
}

if (!empty($_GET['max_price'])) {
    $sql .= " AND price <= :max_price";
    $params[':max_price'] = $_GET['max_price'];
}

// Execute the query
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
</head>
<body>
    <h1>Search Results</h1>
    <?php if (empty($books)): ?>
        <p>No results found.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($books as $book): ?>
                <li>
                    <strong><?php echo htmlspecialchars($book['title']); ?></strong><br>
                    Author: <?php echo htmlspecialchars($book['author']); ?><br>
                    Genre: <?php echo htmlspecialchars($book['genre']); ?><br>
                    Price: $<?php echo htmlspecialchars($book['price']); ?><br>
                    Published: <?php echo htmlspecialchars($book['published_date']); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>
