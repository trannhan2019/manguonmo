<?php

/**
 * Use for get all data at home
 */
class Home
{
    public function getAllBook()
    {
        $query   = 'SELECT * FROM Item ORDER BY id DESC';
        $results = mysqli_query(Database::$dbc, $query);
        if ($results) {
            while ($data = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                $row[] = $data;
            }
            if (!empty($row)) {
                return $row;
            }
        }
        return false;
    }
    
    
    public function getAllBookByID($value = '')
    {
        $query   = "SELECT * FROM `Item` WHERE `id_category` = $value";
        $results = mysqli_query(Database::$dbc, $query);
        if ($results) {
            while ($data = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                $row[] = $data;
            }
            if (!empty($row)) {
                return $row;
            }
            
        }
        return false;
    }
    
    
    
    public function getTopSale()
    {
        $home     = new Home();
        $top_sale = array();
        $query    = "select id_item, count(id_item) as sl from `Cart_item` group by id_item order by sl desc";
        $results  = mysqli_query(Database::$dbc, $query);
        if ($results) {
            while ($data = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                $listCart[] = $data;
            }
            if (!empty($listCart)) {
                
                if (count($listCart) > 4) {
                    for ($i = 0; $i < 4; $i++) {
                        $top_sale[] = $home->getInfoItem($listCart[$i]['id_item']);
                    }
                } else {
                    foreach ($listCart as $value) {
                        $top_sale[] = $home->getInfoItem($value['id_item']);
                    }
                }
                
            }
            
        }
        return $top_sale;
    }
    
    public function getInfoItem($id = '')
    {
        $query   = "SELECT * FROM `Item` WHERE id = $id";
        $results = mysqli_query(Database::$dbc, $query);
        if ($results) {
            while ($data = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                return $data;
            }
        }
        
        return false;
    }
}
?>