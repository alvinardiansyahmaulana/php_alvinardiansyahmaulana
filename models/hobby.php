<?php 
namespace models;

require "model.php";

class Hobby extends Model
{
    public function __construct()
    {
        $this->table = 'hobi';
    }

    public function searchHobby($search='')
    {
        return $this->selectCount('hobi', 'person_id', $search);
    }
}


?>