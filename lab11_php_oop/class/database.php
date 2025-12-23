<?php
class Database {
    protected $conn;

    public function __construct() {
        include "config.php";
        $this->conn = new mysqli(
            $config['host'],
            $config['username'],
            $config['password'],
            $config['db_name']
        );

        if ($this->conn->connect_error) {
            die("Koneksi database gagal");
        }
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function insert($table, $data) {
        $cols = implode(",", array_keys($data));
        $vals = "'" . implode("','", array_values($data)) . "'";
        return $this->conn->query("INSERT INTO $table ($cols) VALUES ($vals)");
    }

    public function update($table, $data, $where) {
        $set = [];
        foreach ($data as $k => $v) {
            $set[] = "$k='$v'";
        }
        $set = implode(",", $set);
        return $this->conn->query("UPDATE $table SET $set WHERE $where");
    }
}
