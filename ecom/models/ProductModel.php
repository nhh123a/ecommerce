<?php
    class productmodel extends Model{
        const table = 'products';
        function getproduct($option = []){

            return $this->get(self::table,$option);
        }

        function getproductbyId($id,$option=[]){
            $option = [
                'where' => "product_id=$id"
            ];
            return $this->get(self::table,$option);
        }

        function gettop3productbyCatid($id,$option = []){
            $option = [
                'where' => "product_cat = $id",
                'limit' => '3',
                'offset' => '0',
            ];
            return $this->get(self::table,$option);
        }
        function getproductbyCatid($id,$option =[]){
            return $this->get(self::table,$option);
        }

        function getproductbyBrandid($id,$option =[]){
            return $this->get(self::table,$option);
        }

        function saveproduct($data = [],$id = 0){
            $this->save(self::table,$data,$id);
        }

    }