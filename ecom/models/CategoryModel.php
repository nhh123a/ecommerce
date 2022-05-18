<?php
    class categorymodel extends Model {
        const table = 'categories';
        function getcategory($option = []){
            return $this->get(self::table,$option);
        }

        
    }