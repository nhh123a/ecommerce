<?php
    Class Model extends DB{
        function get($table,$options = []){
            $select = isset($options['select']) ? $options['select'] : '*';
            $where = isset($options['where']) ? 'WHERE ' . $options['where'] : '';
            $order_by = isset($options['order_by']) ? 'ORDER BY ' . $options['order_by'] : '';
            $limit = isset($options['offset']) && isset($options['limit']) ? 'LIMIT ' . $options['offset'] . ',' . $options['limit'] : '';

            $sql = "SELECT $select FROM `$table` $where $order_by $limit";
            //echo $sql;
            $qr = mysqli_query($this->con,$sql);

            $data = [];

            while($row = mysqli_fetch_assoc($qr)){
                array_push($data,$row);
            }
            return $data;
        }

        function save($table,$data=[],$id =0){
            $dataSet = [];

            foreach ($data as $key => $value) {
                array_push($dataSet,"${key} = '". $value ."'");
            }

            if($id >0){
                $sql = "UPDATE `$table` SET ". implode(',',$dataSet) ."WHERE id = $id";
            }else{
                $sql = "INSERT INTO `$table` SET ". implode(',',$dataSet);
            }
            //echo $sql;
            return mysqli_query($this->con,$sql);
        }
        function delete($table,$option = []){
            $where = isset($option['where']) ? $option['where'] : '0';
            $sql = "DELETE FROM `$table` WHERE $where";
            //echo $sql;
            return mysqli_query($this->con,$sql);
        }

        function find($table,$option){
            
        }
        function _query($sql){
            return mysqli_query($this->con,$sql);
        }
    }
?>
