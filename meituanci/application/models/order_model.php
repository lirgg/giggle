<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model
{
    public function get_order_by_user_id($user_id)
    {
        $sql = "select order_id,product_name,price,num,order_price, num*order_price as total from t_order, t_product where t_order.product_id=t_product.product_id and t_order.user_id=".$user_id;
        return $this->db->query($sql)->result();
    }



}