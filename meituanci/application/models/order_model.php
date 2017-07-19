<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model
{
    public function get_order_by_user_id($user_id)
    {
        $sql = "select order_id,product_name,price,num,order_price, num*order_price as total from t_order, t_product where t_order.product_id=t_product.product_id and t_order.user_id=".$user_id;
        return $this->db->query($sql)->result();
    }

    public function get_count_by_product_id($product_id){

        $sql = "select sum(num) num from t_order where product_id = $product_id";
        return $this->db->query($sql)->row();

        //        $query = $this->db->get_where('t_order', array('product_id' => $product_id));
        //        return $query->num_rows();
    }

    public function add_order($user_id,$product_id,$price,$num){
        $data = array(
            'user_id'=>$user_id,
            'product_id'=>$product_id,
            'order_price'=>$price,
            'num'=>$num
        );

        $this->db->insert('t_order',$data);
        return $this->db->affected_rows();
    }
}