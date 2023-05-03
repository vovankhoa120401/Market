<?php
require_once '../myhelper.php';

class vegetable
{
    // Properties
    public $vegetableID;
    public $categoryId;
    public $vegetableName;
    public $unit;
    public $amount;
    public $images;
    public $price;

    // public function __construct($vegetableID, $categoryId, $vegetableName, $unit,$amount, $images, $price)
    // {
    //     $this->vegetableID = $vegetableID;
    //     $this->categoryId = $categoryId;
    //     $this->vegetableName = $vegetableName;
    //     $this->unit = $unit;
    //     $this->amount = $amount;
    //     $this->images = $images;
    //     $this->price = $price;
    // }

    public function getAllVegetable() 
    {   

        try {

            $query = "SELECT * FROM vegetable LIMIT 20;";

            return json_decode(responeCheckQuery($query));

        } catch (Exception $e) {
            $e->getMessage();
        }
        echo json_encode(responeCheckQuery($query));
    }

    public function getListVegetableByCatId($catId)
    {
        try {

            if ($catId <= 0) {
                    $array_respone = [
                        "success" => false,
                        "status_code" => 100,
                        "message" => "error",
                        "error" => "lay du lieu khong lieu thanh cong",
                    ];
                    echo json_encode($array_respone);
                }
            $query = "SELECT * FROM vegetable WHERE CategoryId = $catId;";
            echo responeCheckQuery($query);

        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function getListVegetableByCatIds($catIds = [] )
    {
        try {

            if ($catIds == []) {
                    $array_respone = [
                        "success" => false,
                        "status_code" => 100,
                        "message" => "error",
                        "error" => "lay du lieu khong lieu thanh cong",
                    ];
                    echo json_encode($array_respone);
                }

            $query = "SELECT * FROM vegetable WHERE CategoryId = (";

            foreach($catIds as $catId) {

                $query = $query.$catId.","; 

            }
            $query = str_replace(',)',')',$query);

            echo responeCheckQuery($query);

        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function getVegetableById($vegetableID )
    {
        try {

            if ( $vegetableID <=0 ) {
                    $array_respone = [
                        "success" => false,
                        "status_code" => 100,
                        "message" => "error",
                        "error" => "lay du lieu khong lieu thanh cong",
                    ];
                return json_encode($array_respone);
                }

            $query = "SELECT * FROM vegetable WHERE vegetableID = $vegetableID";

            echo responeCheckQuery($query);

        } catch (Exception $e) {
            $e->getMessage();
        }
    }

}
