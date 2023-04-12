<?php
class DataBase
{

    private $hostname;
    private $username;
    private $password;
    private $database;
    private $connection;
    private $sql;

    function __construct($hostname, $username, $password, $database)
    {
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;

        $this->connection = new mysqli($this->hostname, $this->username, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
        // echo "Connected successfully";
        return true;
    }

    public function setQuery($sql)
    {
        $this->sql = $sql;

        if ($this->connection->query($sql) === TRUE) {
            // echo "New record created successfully";
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->connection->error;
            return false;
        }
    }

    public function getQuery($sql)
    {
        $this->sql = $sql;
        $result = $this->connection->query($this->sql);

        if ($result->num_rows > 0) {

            // echo "result num_rows: " . $result->num_rows . "<br>";
            for ($i = 0; $i < $result->num_rows; $i++) {

                $rows[] = $result->fetch_assoc();
            }
            // echo "count rows: " . count($rows) . "<br>";
            return $rows;
        } else {

            return false;
        }
    }

    function __destruct()
    {
        $this->connection->close();
    }
}
