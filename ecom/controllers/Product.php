<?php

    Class Product extends Controller{
        
        function __construct(){
            $this->ctg = $this->model('CategoryModel');
            $this->brand= $this->model('BrandModel');
            $this->prd = $this->model('ProductModel');
            $this->order = $this->model('OrderModel');
        }
        function index(){
            $currentpage = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 4;
            $basepath = 'http://localhost/ecommerce/product/index';
            $totalrecords = count($this->prd->getproduct());
            
            $offset = ($currentpage - 1) * $limit;
            $paging = new paging($basepath,$totalrecords,$limit,$offset,$currentpage);
            $page = $paging->createlink();

            $options = [
                'limit'=>$limit,
                'offset'=>$offset
            ];
            $datactg = $this->ctg->getcategory();
            $databrand = $this->brand->getbrand();
            $dataprd = $this->prd->getproduct($options);
            $this->view('inc/header',[
                'data' => $datactg,
                'databrand' => $databrand,
                'title' =>'Product',
            ]);

            $this->view('product/index',[
                'dataprd' => $dataprd,
                'page' =>$page
            ]);

            $this->view('inc/footer');
        }

        function info_product($id){
            $datactg = $this->ctg->getcategory();
            $databrand = $this->brand->getbrand();
            $dataprd = $this->prd->getproductbyId($id);
            foreach ($dataprd as $key => $value) {
                $idcat = $value['product_cat'];
                $tag = $value['product_keywords'];
            }
            $datatop3 = $this->prd->gettop3productbyCatid($idcat);
            $topsell = $this->order->gettoporder();
            $dataprdid= [];
            foreach ($topsell as $key => $value) {
                array_push($dataprdid,$value['product_id']);
            }
            $datatopsell = [
                '0' => $this->prd->getproductbyId($dataprdid[0]),
                '1' => $this->prd->getproductbyId($dataprdid[1]),
                '2' => $this->prd->getproductbyId($dataprdid[2]),
            ];
            // echo '<pre>';
            // var_dump($datatopsell);
            // die();
            $datatag = explode(',',$tag);
            $this->view('inc/header',[
                'data' => $datactg,
                'databrand' => $databrand,
                'title' =>'Info Product'
            ]);

            $this->view('cart/info_product',[
                'data' => $dataprd,
                'datatop3' => $datatop3,
                'datatag' => $datatag,
                'datatopsell' => $datatopsell,
            ]);

            $this->view('inc/footer');
        }

        function search(){
            $search = $_GET['search'];
            $currentpage = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 4;
            $basepath = "http://localhost/ecommerce/product/search?search=$search";
            $option = [
                'where' => "`product_keywords` LIKE '%$search%'"
            ];
            $totalrecords = count($this->prd->getproduct($option));
            
            $offset = ($currentpage - 1) * $limit;
            $paging = new paging($basepath,$totalrecords,$limit,$offset,$currentpage);
            $page = $paging->createlink();

            $options = [
                'limit'=>$limit,
                'offset'=>$offset,
                'where' => "`product_keywords` LIKE '%$search%'"
            ];
            $datactg = $this->ctg->getcategory();
            $databrand = $this->brand->getbrand();
            $dataprd = $this->prd->getproduct($options);
            $this->view('inc/header',[
                'data' => $datactg,
                'databrand' => $databrand,
                'title' =>'Product',
            ]);

            $this->view('product/index',[
                'dataprd' => $dataprd,
                'page' =>$page
            ]);

            $this->view('inc/footer');
            
        }
    }
?>