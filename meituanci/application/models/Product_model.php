<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
    public function get_product(){
        //.....
//        $sql = 'select * from t_product';

//        $query = $this->db->get('t_product');   //查询数据库
//        return $query->result();                  //以数组形式返回查询结果

        $sql = "select t_product.*,(select sum(num) num from t_order where t_order.product_id = t_product.product_id) num from t_product";
        return $this->db->query($sql)->result();
    }

    public function get_product_by_id($product_id){
//        $query = $this->db->get_where('t_product',array('product_id'=>$product_id));
//        return $query->row();
//
        $this->db->select('pro.*,bus.*');
        $this->db->from('t_product pro');
        $this->db->join('t_business bus', 'pro.business_id = bus.business_id');
        $this->db->where('pro.product_id',$product_id);
        return $this->db->get()->row();

    }
    public function add_collect($user_id,$product_id){

        $data = array(
            'user_id' => $user_id,
            'product_id' => $product_id
        );
        $this->db->insert('t_collect', $data);
        return $this->db->affected_rows();

    }

    public function get_collect($user_id,$product_id){
//        $this->db->get_where('t_collect',array('user_id'=>$user_id,'product_id'=>$product_id,'is_delete'=>0));
//        return $this->db->get()->row();

        $sql = "select * from t_collect where user_id=$user_id and product_id =$product_id and is_delete = 0";
        $this->db->query($sql)->row();
    }

    public function cancel_collect($user_id,$product_id){
        $this->db->set('is_delete', 1);
        $this->db->where('user_id', $user_id);
        $this->db->where('product_id', $product_id);
        $this->db->update('t_collect');
        return $this->db->affected_rows();
    }

    public function get_comment($product_id){
        $sql = "select t_comment.*,t_user.username from t_comment,t_user where t_user.user_id = t_comment.user_id and product_id = $product_id";
        return $this->db->query($sql)->result();
    }
    public function get_img($comment_id){
        $sql = "select * from t_comment_img where comment_id = $comment_id";
        return $this->db->query($sql)->result();
    }
}