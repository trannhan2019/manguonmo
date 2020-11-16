<?php
/**
 * 
 */
class Item
{
    private $id_item;
    private $name;
    private $price;
    private $avatar;
    private $id_categories;
    
    function __construct($value = null)
    {
        $this->id_item = $value;
        $this->getInfoItem($value);
    }
    
    public function setIdItem($value = '')
    {
        $this->id_item = $value;
        $this->getInfoItem($value);
    }
    public function getIdItem()
    {
        return $this->id_item;
    }
    
    public function getName()
    {
        return $this->name;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getAvatar()
    {
        return $this->avatar;
    }
    public function getCategoryId()
    {
        return $this->id_categories;
    }
    public function insertItem($name = '', $price = '', $avatar_link = '', $id_categories = '')
    {
        $inser_query = "INSERT INTO `Item` (`id`, `name`, `price`, `avatar`, `id_category`) VALUES (NULL, '$name', '$price', '$avatar_link', '$id_categories');";
        $result      = mysqli_query(Database::$dbc, $inser_query);
        
        return $result;
    }
    
    
    public function removeItem($id = '')
    {
        $remove_all_item_with_id = "DELETE FROM `Cart_item` WHERE `id_item` =$id;";
        $remove_all_item_with_id .= "DELETE FROM `Item` WHERE `id`=$id;";
        $result_remove = mysqli_multi_query(Database::$dbc, $remove_all_item_with_id);
        return $result_remove;
    }
    
    
    public function getInfoItem($id = '')
    {
        $get_info_query = "SELECT * FROM `Item` WHERE `id`=$id";
        $result         = mysqli_query(Database::$dbc, $get_info_query);
        
        if ($result) {
            while ($data = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $item[] = $data;
            }
            if (!empty($item)) {
                $this->name          = $item[0]['name'];
                $this->price         = $item[0]['price'];
                $this->avatar        = $item[0]['avatar'];
                $this->id_categories = $item[0]['id_category'];
            }
        }
    }
    
    
    public function updateItem($id_item = '', $name = '', $price = '', $avatar = '', $id_category = '')
    {
        $query_update_item = "UPDATE `Item` SET `name`='$name',`price`=$price,`avatar`='$avatar',`id_category`=$id_category WHERE id = $id_item";
        echo $query_update_item;
        $result = mysqli_query(Database::$dbc, $query_update_item);
        return $result;
    }
}

?>