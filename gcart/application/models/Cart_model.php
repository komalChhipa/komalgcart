<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends MY_Model
{
	/**
	 * @var mixed
	 */
	protected $soft_delete = TRUE;

	/**
	 * @var string
	 */
	protected $soft_delete_key = 'is_deleted';

	/**
	 * @var string
	 */
	protected $_table = 'cart';

	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();
	}

// public function add_Cart_products($data)

// {

// 	$this->db->insert($data);

// }

	/**
	 * [get_cart_products description]
	 * @param  array  $where [array where condition]
	 * @return where condition wise get cart data
	 */
	public function get_cart_data($where = array())
	{
		if (empty($where))
		{
			$query  = $this->db->get_where('cart', array('is_deleted' => 0));
			$result = $query->result_array();

			if (empty($result))
			{
				return false;
			}
			else
			{
				return $result;
			}
		}
		else
		{
			$this->db->where($where);
			$query  = $this->db->get_where('cart', array('is_deleted' => 0));
			$result = $query->result_array();

			if (empty($result))
			{
				return false;
			}
			else
			{
				return $result;
			}
		}
	}

	public function get_cart_products_detail($where = array(), $products_id)
	{
		if (empty($where))
		{
			return array();
		}
		else
		{
			$this->db->select('products.*,cart.total_amount');
			$this->db->from('cart');
			$this->db->join('products', 'products.id=cart.product_id', 'inner');
			$this->db->where($where);
			$this->db->where_in('products.id', $products_id);
			$this->db->where(array('products.is_active' => 1, 'products.is_deleted' => 0, 'cart.is_deleted' => 0));
			$query  = $this->db->get();
			$result = $query->result_array();

			if ($result)
			{
				return $result;
			}
		}
	}

	/**
	 * [count_cart_row description]
	 * @param  array  $where [array where condition]
	 * @return where condition wise get cart total rows
	 */
	public function count_cart_row($where = array())
	{
		if (empty($where))
		{
			$this->db->select('count(*) AS cart_row');
			$query  = $this->db->get_where('cart', array('is_deleted' => 0));
			$result = $query->row_array();

			if (empty($result))
			{
				return 0;
			}
			else
			{
				return $result['cart_row'];
			}
		}
		else
		{
			$this->db->select('count(*) AS cart_row');
			$this->db->where($where);
			$query  = $this->db->get_where('cart', array('is_deleted' => 0));
			$result = $query->row_array();

			if (empty($result))
			{
				return 0;
			}
			else
			{
				return $result['cart_row'];
			}
		}
	}

	/**
	 * [count_total_procucts_amount description]
	 * @param  array  $where [array where condition]
	 * @return where condition wise get cart total Amount
	 */

	public function count_total_procucts_amount($where = array())
	{
		$this->db->select('sum(total_amount) AS total_amount');
		$this->db->where($where);
		$query  = $this->db->get_where('cart', array('is_deleted' => 0));
		$result = $query->row_array();

		if (empty($result))
		{
			return 0;
		}
		else
		{
			return $result['total_amount'];
		}
	}
}
