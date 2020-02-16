<?php 
  class Model
  {
    // protected static $table;
    protected static $columns = ['*'];
    protected static $table;

    public static function first($extend_query = "")
    {
      $DB = new Database();
      $table = strtolower(static::$table);
      $columns = join(",", static::$columns);

      $stmt = $DB->connect()->query("SELECT $columns FROM $table $extend_query");
      $res = $stmt->fetch();
      
      return $res;
      
      $DB->disconnect();
    }

    public static function all($extend_query = "")
    {
      $DB = new Database();
      $table = strtolower(static::$table);
      $columns = join(",", static::$columns);

      $stmt = $DB->connect()->query("SELECT $columns FROM $table $extend_query");
      $res = $stmt->fetchAll();
      
      return $res;
      
      $DB->disconnect();
    }

    public static function insert($params = []) 
    {
      $DB = new Database();
      $DB->connect();

      $table = strtolower(static::$table);
      $insertColumn = join(",", array_keys($params));
      $insertValue = ":" . join(",:", array_keys($params)); // This will return example ":nik, :nama, :umur"

      $stmt = $DB->connect()->prepare("INSERT INTO $table ($insertColumn) VALUES ($insertValue)");
      $res = $stmt->execute($params);
      
      return $res;
      
      $DB->disconnect();
    }

    public static function update($params = [], $identifiers = [])
    {
      $DB = new Database();

      $table = strtolower(static::$table);

      $update_params = [];

      $update_query = "";
      foreach ($params as $key => $value) {
        $update_params[$key] = $value;
        $update_query .= $key . "=:" . $key . ","; 
      }
      $update_query = rtrim($update_query, ","); // Remove the last comma 
      
      $update_identifier = "";
      foreach ($identifiers as $key => $value) {
        $param = "id_" . $key;
        
        $update_params[$param] = $value;
        $update_identifier .= $key . "=:" . $param;
        
        // If there is more than 1 update condition add "AND" keyword
        if (count($identifiers) > 1) {
          $update_identifier .= " AND ";
        }
      }
      $update_identifier = count($identifiers) > 1 ? substr($update_identifier, 0, -5) : $update_identifier; // Remove the last "AND" string
      
      $stmt = $DB->connect()->prepare("UPDATE $table SET $update_query WHERE $update_identifier");
      $res = $stmt->execute($update_params);
      
      return $res;
      
      $DB->disconnect();
    }

    public static function delete($identifiers = [])
    {
      $DB = new Database();

      $table = strtolower(static::$table);
      
      $delete_identifier = "";
      foreach ($identifiers as $key => $value) {
        $delete_identifier .= $key . "=:" . $key;
        
        if (count($identifiers) > 1) {
          $delete_identifier .= " AND ";
        }
      }
      $delete_identifier = count($identifiers) > 1 ? substr($delete_identifier, 0, -5) : $delete_identifier; // Remove the last "AND" string

      $stmt = $DB->connect()->prepare("DELETE FROM $table WHERE $delete_identifier");
      $res = $stmt->execute($identifiers);
      
      return $res;
      
      $DB->disconnect();
    }

  }
  