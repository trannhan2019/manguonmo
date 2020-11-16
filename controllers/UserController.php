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

class UserController extends User

    {
    private $message;
    private $cart;
    private $home;
    private $categories;
    private $item;
    public

    function __construct()
        {
        $this->message = new Message();
        $this->home = new Home();
        $this->categories = new Categories();
        $this->item = new Item();
        if (isset($_SESSION['id']))
            {
            parent::setUserId($_SESSION['id']);
            $this->cart = new Cart($_SESSION['id']);
            }
        }

    public

    function index()
        {
        if (isset($_SESSION['id']))
            {
            $user_name = parent::getName();
            if (!empty($_SESSION['current_cart_id']))
                {
                $count_item = $this->cart->countItemInCart($_SESSION['current_cart_id']);
                }
              else
                {
                $count_item = 0;
                }

            $_SESSION['item_at_current_cart'] = $count_item;
            }
        }

    public

    function infomation()
        {
        if (isset($_SESSION['id']))
            {
            $user_name = parent::getName();
            $permission = parent::getPermission();
            include ("views/layouts/user/user.php");

            }
          else
            {
            $this->message->backOnly();
            }
        }

    public

    function change_infomation()
        {
        if (isset($_SESSION['id']))
            {
            $user_name = parent::getName();
            $permission = parent::getPermission();
            include ("views/layouts/user/change_infomation.php");

            }
          else
            {
            $this->message->backOnly();
            }
        }

    public

    function register_user()
        {
        if (isset($_POST['register']))
            {
            $member = $_POST;
            if ($member['username'] == NULL || $member['password'] == NULL || $member['name'] == NULL)
                {
                $this->message->errorDefault('Đăng ký thất bại');
                }
              else
                {
                $ketquaDangKy = parent::registerUserIntoDatabse($member['username'], $member['password'], $member['name']);
                if ($ketquaDangKy == true)
                    {
                    $this->message->successDefault('Đăng ký thành công', './login_user');
                    }
                  else
                    {
                    $this->message->errorDefault('Fail Add Member');
                    }
                }
            }
          else
            {
            require ('views/layouts/user/register.php');

            }
        }

    public

    function login_user()
        {
        if (isset($_POST['login']))
            {
            $member = $_POST;
            if ($member['username'] == NULL || $member['password'] == NULL)
                {
                $this->message->errorDefault('Đăng nhập thất bại');
                }
              else
                {
                $ketquaDangKy = parent::loginUser($member['username'], $member['password']);
                $_SESSION['id'] = $ketquaDangKy;
                if ($ketquaDangKy == true)
                    {
                    $this->cart->createNewCart($ketquaDangKy);
                    $this->message->successDefault('Đăng nhập thành công', '..');
                    }
                  else
                    {
                    $this->message->errorDefault('Đăng nhập thất bại');
                    }
                }
            }
          else
            {
            require ('views/layouts/user/login.php');

            }
        }

    public

    function update_user()
        {
        $user_name = parent::getName();
        $permission = parent::getPermission();
        if (isset($_POST['realname']))
            {
            $info = $_POST['realname'];
            if (isset($_SESSION['id']) && $info != NULL)
                {
                $user_name = parent::updateInfo($info);
                if ($user_name == true)
                    {
                    $this->message->successDefault('Thay đổi thành công', './change_infomation');
                    }
                  else
                    {
                    $this->message->errorDefault('Thay đổi thất bại');
                    }
                }
              else
                {
                echo "<script>alert('Something wrong!!')</script>";
                }
            }
          else
            {
            require ('./change_infomation');

            }
        }

    public

    function change_password()
        {
        if ($_POST['old_pass'] != NULL && $_POST['new_pass'] != NULL && $_POST['re_new_pass'] != NULL)
            {
            if ($_POST['new_pass'] != $_POST['re_new_pass'])
                {
                $this->message->errorDefault('Xác nhận mật khẩu mới không đúng!!');
                return;
                }

            $result = parent::changePassword($_POST['old_pass'], $_POST['new_pass']);
            if ($result)
                {
                $this->message->successDefault('Thay đổi thành công', './change_infomation');
                }
              else
                {
                $this->message->errorDefault('Thay đổi thất bại');
                }
            }
          else
            {
            $this->message->errorDefault('Thay đổi thất bại');
            }
        }

    public

    function log_out($value = '')
        {
        session_destroy();
        $this->message->successDefault('Đăng xuất thành công', '..');
        }

    public

    function list_item_in_cart()
        {
        if (isset($_SESSION['id']))
            {
            $user_name = parent::getName();
            $permission = parent::getPermission();
            $list_item = $this->cart->getListItemInCart();
            require ('views/layouts/user/item_in_cart.php');

            }
          else
            {
            $this->message->errorDefault('Có lỗi xảy ra!!');
            }
        }

    public

    function list_item_paid()
        {
        if (isset($_SESSION['id']))
            {
            $user_name = parent::getName();
            $permission = parent::getPermission();
            $list_item_in_progress = $this->cart->getAllItemOfUser($_SESSION['id'], '1');
            $list_item_paid = $this->cart->getAllItemOfUser($_SESSION['id'], '2');
            require ('views/layouts/user/item_paid.php');

            }
          else
            {
            $this->message->errorDefault('Có lỗi xảy ra!!');
            }
        }

    public

    function remove_item_from_cart($id_item = '')
        {
        $remove_item = $this->cart->removeItemFormCart($_SESSION['current_cart_id'], $id_item);
        if ($remove_item)
            {
            $this->message->successDefault('Xoá thành công!!', '../list_item_in_cart');
            }
        }

    public

    function get_current_cart()
        {
        $this->cart->createNewCart($_SESSION['id']);
        }

    public

    function add_item($id_item = '')
        {
        if (isset($_SESSION['id']))
            {
            $this->cart->createNewCart($_SESSION['id']);
            $id_card = $_SESSION['current_cart_id'];
            $add_item_success = $this->cart->addItemInToCart($id_item, $id_card);
            if ($add_item_success)
                {
                $count_item = $this->cart->countItemInCart($_SESSION['id']);
                $_SESSION['item_at_current_cart'] = $count_item;
                $this->message->successDefault('Thêm thành công!!', '../../');
                return;
                }
              else
                {
                $this->message->errorDefault('Có lỗi xảy ra!!');
                return;
                }
            }
          else
            {
            $this->message->errorDefault('Bạn chưa đăng nhập!!');
            return;
            }
        }

    public

    function order_item()
        {

        // status 1 is order item

        $order = $this->cart->orderItem($_SESSION['current_cart_id'], 1);
        if ($order)
            {
            $_SESSION['current_cart_id'] = $this->cart->insertNewCart($this->id_user);
            $this->message->successDefault('Đặt hàng thành công!!', './list_item_paid');
            }
          else
            {
            $this->message->errorDefault('Có lỗi xảy ra!!');
            }
        }
    }

?>