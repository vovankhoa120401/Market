<?php
require_once '../myhelper.php';
class category
{
    // Properties
    public $categoryId;
    public $name;
    public $description;

    public function __construct($categoryId, $name, $description)
    {
        $this->categoryId = $categoryId;
        $this->name = $name;
        $this->description = $description;
    }

    public function getAllCategory()
    {

        try {

            $query = "SELECT * FROM category";

            return json_decode(responeCheckQuery($query));

        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function addCcategory(category $category)
    {
        try {

            if (
                $category->categoryId === ''
                || $category->name === ''
                || $category->description === ''
            ) {
                $array_respone = [
                    "success" => false,
                    "status_code" => 100,
                    "message" => "error",
                    "error" => "lay du lieu khong lieu thanh cong",
                ];
                return json_encode($array_respone);
            }
            // $customer->password, $customer->fullName , $customer->address, $customer->city
            $query = sprintf("INSERT INTO customers ( name, description) VALUES ('%s','%s')", $category->name, $category->description);
            if (!$result = mysqli_query(connection(), $query)) {
                mysqli_error(connection());
            }
            if ($result) {
                $queryNew = "SELECT * FROM category";
                responeCheckQuery($queryNew);

            } else {
                mysqli_error(connection());
            }
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
}
