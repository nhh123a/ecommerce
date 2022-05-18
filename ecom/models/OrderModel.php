<?php

    class OrderModel extends Model{
        const table ='orders';
        
        function gettoporder(){
            $sql ="SELECT product_id,COUNT(product_id)as soluong FROM `orders` 
            group by product_id ORDER BY `soluong` DESC limit 3;";

            //$qr = mysqli_query($this->con,$sql);
            $qr = $this->_query($sql);

            $data = [];

            while($row = mysqli_fetch_assoc($qr)){
                array_push($data,$row);
            }
            return $data;
        }
        function saveorder($data = [], $id = 0){
            return $this->save(self::table,$data,$id);
        }
    }