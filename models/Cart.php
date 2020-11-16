<?php

/**
 * 
 */
class Cart
{
    private $id_cart;
    private $list_item_cart = array();
    /**
     * $is_paid = 0 is in cart
     * $is_paid = 1 is order
     * $is_paid = 2 is paid
     */

    function __construct($id_user=null)
    {
       $this->list_item_cart=$this->getListItem($id_user,0);
    }

    public function setDataForCart($id_user='')
    {
             $this->list_item_cart=$this->getListItem($id_user,0);
    }

    public function getListItemInCart($value='')
    {
        return $this->list_item_cart;
    }

    public function getListItem($id = '', $is_paid = '')
    {
        $get_item_in_cart = "SELECT * FROM `Cart` WHERE user_id = $id AND status = $is_paid";
        $results          = mysqli_query(Database::$dbc, $get_item_in_cart);
        if ($results == true) {
            while ($data = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                $row_data[] = $data;
            }
            if (!empty($row_data)) {
                $list_item   = array();
                if ($is_paid==0) {
                    $this->id_cart    = $row_data[0]['id'];
                }
                $get_id_item                 = "SELECT * FROM `Cart_item` WHERE id_card = $this->id_cart";
                $results_id_item             = mysqli_query(Database::$dbc, $get_id_item);
                if ($results_id_item) {
                    while ($data = mysqli_fetch_array($results_id_item, MYSQLI_ASSOC)) {
                        $list_id_item[] = $data;
                    }
                    if (isset($list_id_item)) {
                        foreach ($list_id_item as $id) {
                            $info = $this->getInfoItem($id['id_item']);
                            if ($info != NULL) {
                                $info['date']     = $id['date'];
                                $info['category'] = $this->getCategory($info['id_category']);
                                $list_item[]      = $info;
                            }
                        }
                    }
                }
                
                return $list_item;
            }
        }
    }
    
    public function getAllItemOfUser($id = '', $is_paid = '')
    {
        $list_item        = array();
        $get_item_in_cart = "SELECT * FROM `Cart` WHERE user_id = $id AND status = $is_paid";
        $results          = mysqli_query(Database::$dbc, $get_item_in_cart);
        if ($results == true) {
            while ($data = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                $row_data[] = $data;
            }
            if (!empty($row_data)) {
                foreach ($row_data as $value) {
                    $id_card         = $value['id'];
                    $get_id_item     = "SELECT * FROM `Cart_item` WHERE id_card = $id_card";
                    $results_id_item = mysqli_query(Database::$dbc, $get_id_item);
                    if ($results_id_item) {
                        
                        while ($data = mysqli_fetch_array($results_id_item, MYSQLI_ASSOC)) {
                            $list_id_item[] = $data;
                        }
                        
                        if (isset($list_id_item)) {
                            foreach ($list_id_item as $id) {
                                $info = $this->getInfoItem($id['id_item']);
                                if ($info != NULL) {
                                    $info['date']     = $id['date'];
                                    $info['category'] = $this->getCategory($info['id_category']);
                                    $list_item[]      = $info;
                                }
                            }
                        }
                    }
                    unset($list_id_item);
                }
                
            }
        }
        return $list_item;
    }
    
    public function getInfoItem($id = '')
    {
        $query   = "SELECT * FROM `Item` WHERE id = $id";
        $results = mysqli_query(Database::$dbc, $query);
        if ($results == true) {
            while ($data = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                $row_data[] = $data;
            }
            return $row_data[0];
        } else {
            return NULL;
        }
        
    }
    
    public function getCategory($id = '')
    {
        $query   = "SELECT name FROM `Categories` WHERE id = $id";
        $results = mysqli_query(Database::$dbc, $query);
        if ($results == true) {
            while ($data = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                $row_data[] = $data;
            }
            return $row_data[0]['name'];
        } else {
            return NULL;
        }
        
    }
    
    
    public function removeItemFormCart($id_card = '', $id_item = '')
    {
        $query   = "DELETE FROM `Cart_item` WHERE `id_card` = $id_card AND `id_item`= $id_item";
        $results = mysqli_query(Database::$dbc, $query);
        return $results;
    }
    
    public function createNewCart($id = '')
    {
        $get_item_in_cart = "SELECT * FROM `Cart` WHERE user_id = $id AND status = 0";
        $results          = mysqli_query(Database::$dbc, $get_item_in_cart);
        if ($results) {
            while ($data = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                $row_data[] = $data;
            }
            if (isset($row_data)) {
                $_SESSION['current_cart_id'] = $row_data[0]['id'];
            } else {
                $_SESSION['current_cart_id'] = $this->insertNewCart($id);
            }
        } else {
            $_SESSION['current_cart_id'] = $this->insertNewCart($id);
        }
    }
    
    public function insertNewCart($id = '')
    {
        $insert_cart = "INSERT INTO `Cart` (`id`, `user_id`, `status`) VALUES (NULL, $id, '0');";
        $results     = mysqli_query(Database::$dbc, $insert_cart);
        if ($results) {
            $get_last_id = "SELECT LAST_INSERT_ID();";
            $results_id  = mysqli_query(Database::$dbc, $get_last_id);
            if ($results_id) {
                while ($data = mysqli_fetch_array($results_id, MYSQLI_ASSOC)) {
                    $row_data[] = $data;
                }
                return $row_data[0]['LAST_INSERT_ID()'];
            }
        }
        return;
    }
    
    
    public function addItemInToCart($id_item = '', $id_card = '')
    {
        date_default_timezone_set("Asia/Bangkok");
        $date    = date('Y-m-d h:i:s', time());
        $insert  = "INSERT INTO `Cart_item` (`id_card`, `id_item`, `date`) VALUES ('$id_card', '$id_item', '$date');";
        $results = mysqli_query(Database::$dbc, $insert);
        return $results;
    }
    
    public function countItemInCart()
    {
        return count($this->list_item_cart);
    }
    
    public function orderItem($id_card = '', $status = '')
    {
        /**
         * 0 is in cart
         * 1 is order
         * 2 is payed
         */
        $query                       = "UPDATE `Cart` SET `status` = $status WHERE `Cart`.`id` = $id_card;";
        $_SESSION['current_cart_id'] = $this->insertNewCart($id);
        return mysqli_query(Database::$dbc, $query);
    }
    
    
    public function getListCartInOrder()
    {
        $query   = "SELECT * FROM `Cart` WHERE `status`=1";
        $results = mysqli_query(Database::$dbc, $query);
        if ($results) {
            while ($data = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                $list_cart[] = $data;
            }
            
            if (!empty($list_cart)) {
                return $list_cart;
            }
        }
        return false;
    }
    
    public function getListItemWithCartId($id_cart = '')
    {
        $query   = "SELECT * FROM `Cart_item` WHERE `id_card`=$id_cart";
        $results = mysqli_query(Database::$dbc, $query);
        if ($results) {
            while ($data = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                $list_cart[] = $data;
            }
            
            if (!empty($list_cart)) {
                return $list_cart;
            }
        }
        return false;
    }
}
?>