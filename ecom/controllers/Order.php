<?php

    Class Order extends Controller{
        
        function __construct()
        {
            $this->ctg = $this->model('CategoryModel');
            $this->brand = $this->model('BrandModel');
            $this->prd = $this->model('ProductModel');
            $this->cart = $this->model('CartModel');
            $this->order = $this->model('OrderModel');
        }

        function order(){
            
            $options= [
                'select' => 'product_id,qty',
                'where' =>"user_id = ".$_SESSION['user_id'].""
            ];
            $datacart = $this->cart->getcart1($options);
            for ($i=0; $i < count($datacart); $i++) { 
                $datacart[$i]['user_id'] = $_SESSION['user_id'];
                $datacart[$i]['p_status'] = 'Completed';
                // echo '<pre>';
                // var_dump($datacart[$i]);
                $saveorder = $this->order->saveorder($datacart[$i]);
            }
            if($saveorder){
                $option = [
                    'select' =>'id',
                    'where' =>"user_id = ".$_SESSION['user_id'].""
                ];
                $datacartid = $this->cart->getcart1($option);
                for ($i=0; $i < count($datacartid); $i++) { 
                    $id = $datacartid[$i]['id'];
                    $option = [
                        'where' => "id = $id"
                    ];
                    $deletecart = $this->cart->deletecartbyId($option);
                }
                unset($_SESSION['cart']);
                $_SESSION['notifysucces'] = "Đặt hàng thành công";
                header('location: http://localhost/ecommerce/');
            }
        }
    }