<?php 
include_once 'connection.php';
     function responeCheckQuery($query){
        if (!$result = mysqli_query(connection(), $query)) {
            $array_respone = [
                "success" => 100,
                "data" => null,
                "message" => "lấy dữ liệu không thành công",
                "error" => true,
            ];
            return json_encode($array_respone);
        }
        
        if ($result) {
            $list = array();
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $list[] = $row;
                    
                }
            }
    
            $array_respone = [
                "success" => 200,
                "data" => $list,
                "message" => "",
                "error" => "lấy dữ liệu thành công",
            ];
            return json_encode($array_respone);
        } else {

            $array_respone = [
                "success" => 100,
                "data" => null,
                "message" => "lấy dữ liệu không thành công",
                "error" => true,
            ];
            return json_encode($array_respone);

        }
    }

    function responeField($field){
        if (!$result = mysqli_query(connection(), $field)) {
            mysqli_error(connection());
        }
        
        if ($result) {
            $respone = array();
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_row($result)) {
                    $respone[] = $row;
                }
            }
    
            return $respone;
        }
    }
    

