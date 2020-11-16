<?php

/**
 * 
 */
class Categories
{
    private $id;
    private $name;
    
    public function setName($value = '')
    {
        $this->name = $value;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setId($value = '')
    {
        $this->id = $value;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getListCategoires()
    {
        $get_categories = "SELECT * FROM `Categories`";
        $results        = mysqli_query(Database::$dbc, $get_categories);
        if ($results) {
            while ($data = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                $list_categories[] = $data;
            }
            return $list_categories;
        } else {
            return array();
        }
    }
    
    public function getCategoryByID($value = '')
    {
        $query = "SELECT * FROM `Categories` WHERE `id` =$value";
        
        $results = mysqli_query(Database::$dbc, $query);
        if ($results) {
            while ($data = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                $category[] = $data;
            }
            if (isset($category[0])) {
                $this->setId($category[0]['id']);
                $this->setName($category[0]['name']);
                return $category[0];
            }
        }
        return false;
    }
}

?>