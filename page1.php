<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Search Filter</title>
    <!-- Book A
    Author: Author A
    Genre: Fiction
    Price: $9.99
    Published: 2023-01-01 -->
</head>

<body>
    <form method="GET" action="search.php">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title">

        <label for="author">Author:</label>
        <input type="text" name="author" id="author">

        <label for="genre">Genre:</label>
        <select name="genre" id="genre">
            <option value="">All</option>
            <option value="Fiction">Fiction</option>
            <option value="Non-fiction">Non-fiction</option>
        </select>

        <label for="min_price">Min Price:</label>
        <input type="number" step="0.01" name="min_price" id="min_price">

        <label for="max_price">Max Price:</label>
        <input type="number" step="0.01" name="max_price" id="max_price">

        <button type="submit">Search</button>
    </form>
</body>

</html>
