<?php
    class brandmodel extends Model{
        const table = 'brands';
        function getbrand($option =[]){
            return $this->get(self::table,$option);
        }
        
    }
?>