<?php
class Database {
    private $db;

    public function __construct() {
        $this->db = new SQLite3('items.db');
        $this->db->exec('PRAGMA encoding = "UTF-8";');
    }

    public function query($query) {
        return $this->db->query($query);
    }
    public function executeStatement($query, $params = []) {
        $statement = $this->db->prepare($query);
        foreach ($params as $key => $value) {
            $statement->bindValue($key, $value);
        }
        return $statement->execute();
    }

    public function exec($query) {
        return $this->db->exec($query);
    }

    public function prepare($query) {
        return $this->db->prepare($query);
    }

    public function close() {
        $this->db->close();
    }

    public function prepareStatement(string $query)
    {
        return $this->db->prepare($query);
    }

}
?>


