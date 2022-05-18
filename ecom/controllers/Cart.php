<?php

class Cart extends Controller
{
    function __construct()
    {
        $this->ctg = $this->model('CategoryModel');
        $this->brand = $this->model('BrandModel');
        $this->prd = $this->model('ProductModel');
        $this->cart = $this->model('CartModel');
    }

    function index()
    {
        if ($_SESSION['user_id']) {
            $currentpage = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 4;
            $basepath = 'http://localhost/ecommerce/cart/index';
            $totalrecords = count($this->cart->getcart());
            $offset = ($currentpage - 1) * $limit;
            $paging = new paging($basepath,$totalrecords,$limit,$offset,$currentpage);
            $page = $paging->createlink();

            $options = [
                'limit' =>$limit,
                'offser' => $offset
            ];
            $datactg   = $this->ctg->getcategory();
            $databrand = $this->brand->getbrand();
            $datacart  = $this->cart->getcart($options);
            $this->view('inc/header', [
                'data' => $datactg,
                'databrand' => $databrand,
                'title' => 'Cart'
            ]);
            $this->view('cart/cart', [
                'datacart' => $datacart,
                'page' => $page,
            ]);

            $this->view('inc/footer');
        } else {
            $_SESSION['notifyinfo'] = "Vui lòng đăng nhập";
            header("Location: http://localhost/ecommerce/user/login");
        }
    }

    function addtocart($id)
    {
        if ($_SESSION['user_id']) {
            $data = [
                'product_id'      => $id,
                'user_id'   => $_SESSION['user_id'],
                'ip_add'    => $_SERVER['REMOTE_ADDR'],
                'qty'       => '1',
            ];
            $checkp_id = $this->cart->getcartbyP_id($id);
            //var_dump($checkp_id);

            if (empty($checkp_id)) {
                $save = $this->cart->savecart($data);
                if ($save) {
                    header("Location: http://localhost/ecommerce/cart/cart");
                } else {
                    echo "Thêm thất bại";
                }
            } else {
                $data['qty'] = $checkp_id[0]['qty'] + 1;
                echo $data['qty'];
                $save = $this->cart->savecart($data, $checkp_id[0]['id']);
                if ($save) {
                    header("Location: http://localhost/ecommerce/cart/cart");
                } else {
                    echo "Thêm thất bại";
                }
            }
        } else {
            $_SESSION['notifyinfo'] = "Vui lòng đăng nhập";
            header("Location: http://localhost/ecommerce/user/login");
        }
    }
    function delete($id)
    {
        $option = [
            'where' => "id = $id"
        ];
        $delete = $this->cart->deletecartbyId($option);
        if ($delete) {
            header('Location: http://localhost/ecommerce/cart/cart');
        } else {
            echo 'Xóa thất bại';
        }
    }

    function update($id){
        if(isset($_SESSION['user_id'])){
            $data = [
                'qty' => $_COOKIE['qty'],
            ];
            //setcookie("qty", "", time()-3600);
            $updatecart = $this->cart->savecart($data,$id);
            if($updatecart){
                 
                 $_SESSION['notifysucces'] = "Cập nhật thành công";
                 header('Location: http://localhost/ecommerce/cart/cart');
            }else{
                 $_SESSION['notifyerror'] = "Cập nhật thất bại";
                 header('Location: http://localhost/ecommerce/cart/cart');
            }

        }else {
            $_SESSION['notifyinfo'] = "Vui lòng đăng nhập";
            header("Location: http://localhost/ecommerce/user/login");
        }
    }
}
