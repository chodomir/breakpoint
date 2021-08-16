<?php
class DB
{
    private string $host = "localhost";
    private string $username = "root";
    private string $password = "";
    private string $database = "breakpoint";
    private string $port = "3306";

    private mysqli $link;

    public function __construct()
    {
        $this->link = new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->database,
            $this->port
        );
        if ($this->link->connect_error) {
            // TODO throw exception here as well
            die("Connection failed: " . $this->link->connect_error);
        }
    }

    /** Summary of execute_query
     * @param string $query SQL query - data should be properly escaped
     * @param Closure $mapper Takes in as a first parameter array
     * where to store a mapped object and as a second parameter an object to map
     */
    public function execute_query(string $query, Closure $mapper = null): mixed
    {
        $result = $this->link->query($query);
        // TODO Add debug log
        if (!is_bool($result) && $result->num_rows > 0) {
            // TODO make this a warning and throw and exception
            if (is_null($mapper))
                die("execute_query()::Mapper function cannot be null");
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $mapper($row);
            }
            return $data;
        }
        return $result;
    }

    public function escape_string(string $query): string
    {
        return $this->link->real_escape_string($query);
    }
}
