<?php
class Database {
  private $connection;

  public function __construct($config, $username = 'root', $password = '') {
    $dsn = 'mysql:' . http_build_query($config, '', ';');

    try {
      $this->connection = new PDO($dsn, $username, $password, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
      ]);
    } catch(Exception $ex) {
      dd($ex);
    }
  }
  public function query($query, $params = []) {
    $statement = $this->connection->prepare($query);
    $statement->execute($params);

    return $statement;
  }
}
