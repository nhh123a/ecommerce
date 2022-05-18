<?php

    class usermodel extends Model{
        const table  = 'user_info';
        function finduserbyEaP($email,$pass){
            $option = [
                'where' => "`email` = '$email' AND `password` = '$pass'",
            ];
            return $this->get(self::table,$option);   
        }
        
        function finduserbyE($email){
            $option = [
                'where' => "email = '$email'"
            ];
            return $this->get(self::table,$option);
        }
        function saveuser($data=[] ,$id=0){
            $this->save(self::table,$data,$id =0);
        }
    }