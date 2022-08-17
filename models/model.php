<?php
namespace models;

class Model
{
    protected $table;
    protected $columns;

    public function selectCount($column, $countColumn, $search='')
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/config/database.php";

        $database = new \config\Database();
        $mysqli = $database->connect();

        $sql = "SELECT $column, COUNT($countColumn) FROM $this->table";

        if (!empty($search)) {
            $sql = $sql . " WHERE $column='$search'";
        }

        $sql = $sql . " GROUP BY $column HAVING COUNT($countColumn) > 0 ORDER BY COUNT($countColumn) DESC";

        $result = $mysqli->query($sql);

        while ($data = $result->fetch_assoc()) {
            $fetchedData[] = $data;
        }

        $mysqli->close();

        return $fetchedData;
    }
}

?>