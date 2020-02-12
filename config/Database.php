<?php 

  class Database
  {
    protected $connection;
    private $server = 'localhost';
    private $database = 'ukk_pengaduan_masyarakat';
    private $user = 'root';
    private $password = 'root';

    public function connect()
    {
      $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
      ];

      try {
        $this->connection = new PDO("mysql:host=$this->server;dbname=$this->database", $this->user, $this->password, $options);

        return $this->connection;
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    }

    public function disconnect()
    {
      $this->connection = null;
    }

    public function query($sql_query)
    {
      return $this->connect()->query($sql_query);
    }

    public function getAll($table)
    {
      return $this->connect()->query("SELECT * FROM $table")->fetchAll();
    }

  }
  