<?php include 'db.class.php';

class Crud extends DatabaseConnection
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getData($query)
    {
        $result = $this->connect->query($query);

        if ($result == false) {
            return false;
        }

        $rows = array();

        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function update($id, $startpoint, $endpoint, $iterations)
    {
        $id = $this->escape_string($id);
        $startpoint = $this->escape_string($startpoint);
        $endpoint = $this->escape_string($endpoint);
        $iterations = $this->escape_string($iterations);

        $query = "UPDATE multiplication SET start='$startpoint',end='$endpoint',iterations='$iterations' WHERE id=$id";
        $result = $this->connect->query($query);

        if ($result == false) {
            echo 'Error: cannot execute the command';
            return false;
        } else {
            return true;
        }
    }

    public function delete($id, $basename)
    {

        $query = "DELETE FROM $basename WHERE id = $id";

        $result = $this->connect->query($query);

        if ($result == false) {
            echo 'Error: cannot delete id ' . $id . ' from table ' . $basename;
            return false;
        } else {
            return true;
        }
    }

    public function escape_string($value)
    {
        return $this->connect->real_escape_string($value);
    }
}

