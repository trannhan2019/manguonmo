<?php
require ('models/Home.php');

require ('models/User.php');

require ("models/Cart.php");

require ('models/Categories.php');

class HomeController extends Home

	{
	private $user;
	private $cart;
	private $categories;
	function __construct()
		{
		$this->categories = new Categories();
		$this->user = new User();
		$this->cart = new Cart();
		}

	public

	function index()
		{
		$topSell = parent::getTopSale();
		if (isset($_SESSION['id']))
			{
			$this->user->setUserId($_SESSION['id']);
			$this->cart->setDataForCart($_SESSION['id']);
			$user_name = $this->user->getName();
			}

		$category = $this->categories;
		if ($category->getId() != null)
			{
			$listBook = parent::getAllBookByID($category->getId());
			}
		  else
			{
			$listBook = parent::getAllBook();
			}

		require ('views/layouts/home/home.php');

		}

	public

	function item_short($value = '')
		{
		$category = $this->categories->getCategoryByID($value);
		$this->index();
		}
	}

?>