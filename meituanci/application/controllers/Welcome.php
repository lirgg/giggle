<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this -> load -> model("product_model");
        $this -> load -> model("order_model");
    }
	public function index()
    {
        $results = $this->product_model->get_product();

        //[1,2,3];
        // like
        //[5,0,3]
//
//        foreach ($results as $product){
//            $product->num = $product->num == null?0:$product->num;
//        }

//
//        foreach ($results as $product){
//            //在order表通过product_id查询记录条数
//            $num = $this->order_model->get_count_by_product_id($product->product_id);
////            if($num->num == null){
////                $product->num = 0;
////            }else{
////                $product->num = $num->num;
////            }
//            $product->num = $num->num == null?0:$num->num;
//
//        }


        //var_dump($results[0]->product_id);

		$this->load->view('index',array('result'=>$results));
	}

	public function detail($product_id)
    {
//        var_dump($product_id);
//        die();
//
        $row = $this->product_model->get_product_by_id($product_id);

        $results = $this->product_model->get_comment($product_id);

        foreach($results as $res){
            $imgs = $this->product_model->get_img($res->id);
            $res->imgs = $imgs;
        }
        $userinfo = $this->session->userdata('userinfo');
        if(empty($userinfo)){
            //没登录
            $row->collect = '收藏';
        }else{
            //已登录
            $user_id = $userinfo -> user_id;
            $collect = $this->product_model->get_collect($user_id,$product_id);
            if(($collect == null)){
                //未收藏 显示收藏
                $row->collect = '收藏';
            }else{
                //已收藏 显示取消
                $row->collect = '取消';
            }
        }
//        $user_id = $userinfo -> user_id;


        $this -> load -> view('detail',array(

      // 跟控制器中的view传参的名字一致即可(在view中调用时)

        'row'=>$row,
        'results'=>$results

        ));
    }

    public function success()
    {
        $this -> load -> view('success');
    }

    public function submit_order()
    {
        $product_id = $this->input->get('productId');
        //        var_dump($product_id);

        $product = $this->product_model->get_product_by_id($product_id);

        $this->load->view('submit_order',array(
           'product'=>$product
        ));
    }
    public function add_order(){
        $product_id = $this->input->get('productId');
        $num = $this->input->get('num');
        $price = $this->input->get('price');
        $userinfo = $this->session->userdata('userinfo');
        $user_id = $userinfo->user_id;

        $rows = $this->order_model->add_order($user_id,$product_id,$price,$num);
        if($rows>0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }
}
