<?php
class Database {
  private PDO $connection;
  private PDOStatement $statement;

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
  public function query($query, $params = []): Database {
    $this->statement = $this->connection->prepare($query);
    $this->statement->execute($params);

    return $this;
  }

  public function findOrFail(): mixed
  {
    $data = $this->statement->fetch();

    if (!$data) {
      abort();
    }

    return $data;
  }

  public function findAllOrFail(): false|array
  {
    $data = $this->statement->fetchAll();

    if (!$data) {
      abort();
    }

    return $data;
  }
}
