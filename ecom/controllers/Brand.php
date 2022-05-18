<?php

    Class Brand extends Controller{
        
        function __construct(){
            $this->ctg = $this->model('CategoryModel');
            $this->brand= $this->model('BrandModel');
            $this->prd = $this->model('ProductModel');
        }
        function index($id){
            $currentpage = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 4;
            $basepath = "http://localhost/ecommerce/brand/index/$id/";
            $totalrecords = count($this->prd->getproductbyBrandid($id,['where' => "`product_brand` = $id"]));
            
            $offset = ($currentpage - 1) * $limit;
            $paging = new paging($basepath,$totalrecords,$limit,$offset,$currentpage);
            $page = $paging->createlink();

            $options = [
                'where' => "`product_brand` = $id",
                'limit'=>$limit,
                'offset'=>$offset,
            ];
            $datactg = $this->ctg->getcategory();
            $databrand = $this->brand->getbrand();
            $dataprd = $this->prd->getproductbyBrandid($id,$options);
            $this->view('inc/header',[
                'data' => $datactg,
                'databrand' => $databrand,
                'title' => 'Brand'
            ]);

            $this->view('product/index',[
                'dataprd' => $dataprd,
                'page'=>$page
            ]);

            $this->view('inc/footer');
        }

    }
?>