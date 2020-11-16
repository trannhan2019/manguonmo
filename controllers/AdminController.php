<?php
/**
 *
 */
require ("models/User.php");

require ("models/Message.php");

require ("models/Cart.php");

require ('models/Home.php');

require ('models/Categories.php');

require ('models/Item.php');

class AdminController extends User

    {
    private $home;
    private $categories;
    private $item;
    private $message;
    private $cart;
    public

    function __construct()
        {
        $this->home = new Home();
        $this->categories = new Categories();
        $this->item = new Item();
        $this->message = new Message();
        $this->cart = new Cart($_SESSION['id']);
        parent::setUserId($_SESSION['id']);
        }

    public

    function item_manager()
        {
        $user_name = parent::getName();
        $permission = parent::getPermission();
        $list_book = $this->home->getAllBook();
        $list_category = $this->categories->getListCategoires();
        $list_book_success = array();
        foreach($list_book as $book)
            {
            foreach($list_category as $category)
                {
                if ($book['id_category'] == $category['id'])
                    {
                    $book['category'] = $category['name'];
                    $list_book_success[] = $book;
                    }
                }
            }

        require ('views/layouts/admin/item_manage.php');

        }

    public

    function remove_item($id_item = '')
        {
        $remove = $this->item->removeItem($id_item);
        if ($remove)
            {
            return $this->message->successDefault('Xoá thành công', '/manguonmo/admin/item_manager');
            }
          else
            {
            return $this->message->errorDefault('Xoá thất bại');
            }
        }

    public

    function view_insert_item($id_item = '')
        {
        $user_name = parent::getName();
        $permission = parent::getPermission();
        $list_category = $this->categories->getListCategoires();
        $item_data = new Item($id_item);
        require ('views/layouts/admin/item_insert.php');

        }

    public

    function action_insert_item()
        {
        if (isset($_POST['insert_item']))
            {
            if (empty($_POST['name']) || empty($_POST['price']) || empty($_POST['avatar']) || empty($_POST['category']))
                {
                $this->message->showMessage('Vui lòng nhập đầy đủ các trường');
                }
              else
                {
                $result = $this->item->insertItem($_POST['name'], $_POST['price'], $_POST['avatar'], $_POST['category']);
                if ($result)
                    {
                    $this->message->successDefault('Thêm thành công', '/manguonmo/admin/item_manager');
                    }
                  else
                    {
                    $this->message->showMessage('Thêm thất bại');
                    }
                }
            }
        }

    public

    function action_update_item($id_item = '')
        {
        if (isset($_POST['update_item']))
            {
            if (empty($_POST['name']) || empty($_POST['price']) || empty($_POST['avatar']) || empty($_POST['category']))
                {
                $this->message->showMessage('Vui lòng nhập đầy đủ các trường');
                }
              else
                {
                $this->item->updateItem($id_item, $_POST['name'], $_POST['price'], $_POST['avatar'], $_POST['category']);
                $this->message->successDefault('Cập nhật thành công', '/manguonmo/admin/item_manager');
                }
            }
        }

    public

    function cart_manager($id_cart = '')
        {
        $user_name = parent::getName();
        $permission = parent::getPermission();
        if (isset($_POST['thanhtoan']) && isset($id_cart))
            {
            $this->cart->orderItem($id_cart, 2);
            $this->message->successDefault('Cập nhật thành công', '/manguonmo/admin/cart_manager');
            }
          else
            {
            if (empty($id_cart))
                {
                $list_cart = array();
                $carts = $this->cart->getListCartInOrder();
                if (!empty($carts))
                    {
                    foreach($carts as $value)
                        {
                        $new_user = new User($value['user_id']);
                        $value['name'] = $new_user->getName();
                        $list_cart[] = $value;
                        }
                    }
                }
              else
                {
                $books = array();
                $data = $this->cart->getListItemWithCartId($id_cart);
                foreach($data as $book)
                    {
                    $item_cart = new Item($book['id_item']);
                    $book['name'] = $item_cart->getName();
                    $book['price_item'] = $item_cart->getPrice();
                    $books[] = $book;
                    }
                }

            require ('views/layouts/admin/cart_manager.php');

            }
        }
    }

?>