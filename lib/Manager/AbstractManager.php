<?php


namespace Plugo\Manager;
 
require dirname(__DIR__, 2) . '/config/database.php';
 
abstract class AbstractManager {
 
  private function connect(): \PDO {
    $db = new \PDO(
      "mysql:host=" . DB_INFOS['host'] . ";port=" . DB_INFOS['port'] . ";dbname=" . DB_INFOS['dbname'],
      DB_INFOS['username'],
      DB_INFOS['password']
    );
    $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES utf8");
    return $db;
  }

  private function executeQuery(string $query, array $params = []): \PDOStatement {
    $db = $this->connect();
    $stmt = $db->prepare($query);
    foreach ($params as $key => $param){
      $stmt->bindValue($key, $param);
    }
    $stmt->execute();
    return $stmt;
  }

  private function classToTable(string $class): string {
    $tmp = explode('\\', $class);
    return strtolower(end($tmp));
  }
  


protected function readOne(string $class, array $criteria) {
    if(!empty($criteria)){
      $strParams = [];
      foreach($criteria as $key => $value) {
        array_push($strParams, urlencode((string) $key) . " = '" .
        urlencode((string) $value) . "'");
      }
      $filter = ' WHERE ' . implode('&', $strParams);
      $query = "SELECT * FROM " . $this->classToTable($class) . $filter;
      
      $stmt = $this->executeQuery($query);

      $stmt->setFetchMode(\PDO::FETCH_CLASS, $class);
      return $stmt->fetch();
    };
}


//Première fonction ReadOne et ReadMany Initiales (à ne pas modifier)

// protected function readOne(string $class, int $id) {
//   $query = "SELECT * FROM " . $this->classToTable($class) . " WHERE id = :id";
//   $stmt = $this->executeQuery($query, [ 'id' => $id ]);
//   $stmt->setFetchMode(\PDO::FETCH_CLASS, $class);
//   return $stmt->fetch();
// }


  // protected function readMany(string $class) {
  //   $query = "SELECT * FROM " . $this->classToTable($class);
  //   if ($stmt = $this->executeQuery($query)) {
  //     $stmt->setFetchMode(\PDO::FETCH_CLASS, $class);
  //     return $stmt->fetchAll();
  //   }
  // }


  protected function readMany(string $class, array $criteria) {
    //var_dump('pas le même ? ',$criteria);
    if(!empty($criteria)){
      $strParams = [];
      foreach($criteria as $key => $value) {
        array_push($strParams, urlencode((string) $key) . " = '" .
        urlencode((string) $value) . "'");
      }
      // var_dump("array à la sortie", $strParams);

      $filter = ' WHERE ' . implode(' AND ', $strParams);

  } else {
    $filter = '';
  }
    $query = "SELECT * FROM " . $this->classToTable($class) . $filter;
    $stmt = $this->executeQuery($query);
    $stmt->setFetchMode(\PDO::FETCH_CLASS, $class);
    return $stmt->fetchAll();

}

  protected function create(string $class, array $fields) {
    //var_dump("array à l'entré", $fields);
    $query = "INSERT INTO " . $this->classToTable($class) . " (";
    foreach (array_keys($fields) as $field) {
      $query .= $field;
      if ($field != array_key_last($fields)) $query .= ', ';
    }
    $query .= ') VALUES (';
    foreach (array_keys($fields) as $field) {
      $query .= ':' . $field;
      if ($field != array_key_last($fields)) $query .= ', ';
    }
    $query .= ')';
    //var_dump('query', $query);
    return $this->executeQuery($query, $fields);
  }

  protected function update(string $class, array $fields, int $id) {
    $query = "UPDATE " . $this->classToTable($class) . " SET ";
    foreach (array_keys($fields) as $field) {
      $query .= $field . " = :" . $field;
      if ($field != array_key_last($fields)) $query .= ', ';
    }
    $query .= ' WHERE id = :id';
    $fields['id'] = $id;
    return $this->executeQuery($query, $fields);
  }

  protected function delete(string $class, int $id) {
    $query = "DELETE FROM " . $this->classToTable($class) . " WHERE id = :id";
    return $this->executeQuery($query, [ 'id' => $id ]);
  }
  
}