<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PHP Learning</title>
</head>
<style>
    body {
        display: grid;
        place-items: center;
        height: 100vh;
        margin: 0;
        font-family: sans-serif;
    }
</style>
<body>
  <h1>Recommended Books</h1>

  <?php
    $books = [
      [
        'name' => 'Book 1',
        'author' => 'Philip K. Dick',
        'releaseYear' => 1968,
        'purchaseUrl' => 'http://example.com'
      ],
      [
        'name' => 'Book 2',
        'author' => 'John Doe',
        'releaseYear' => 1973,
        'purchaseUrl' => 'http://example.com'
      ]
    ];

    function filter($items, $fn) {
      $filteredItems = [];

      foreach($items as $item) {
        if ($fn($item)) {
          $filteredItems[] = $item;
        }
      }

      return $filteredItems;

  }

  $filteredBooks = array_filter($books, function($book) {
    return $book['releaseYear'] === 1968;
  })

  ?>

  <ul>
    <?php

    $filteredBooks = filterBooks($books, "John Doe");

    foreach ($filteredBooks as $book) {
        echo "<li>{$book['name']} by {$book['author']}</li>";
      }
    ?>

  </ul>

</body>
</html>