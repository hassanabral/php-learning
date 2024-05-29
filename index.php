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
        'purchaseUrl' => 'http://example.com'
      ],
      [
        'name' => 'Book 2',
        'author' => 'John Doe',
        'purchaseUrl' => 'http://example.com'
      ]
    ];

    function filterByAuthor($books, $authorName) {
      $filteredBooks = [];

      foreach($books as $book) {
        if ($book['author'] === $authorName) {
          $filteredBooks[] = $book;
        }
      }

      return $filteredBooks;

  }
  ?>

  <ul>
    <?php

    $filteredBooks = filterByAuthor($books, "John Doe");

    foreach ($filteredBooks as $book) {
        echo "<li>{$book['name']} by {$book['author']}</li>";
      }
    ?>

  </ul>

</body>
</html>