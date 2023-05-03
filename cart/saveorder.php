<?php
session_start();
 ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
  require_once '../class/order.php';
  $order = new order(
    $_SESSION['info_customer']['customerId'],
    date("Y-m-d"),
    $_SESSION['cart']['totalPrice'],
    $_POST['note'],
    );
    $orderdetails = [];
    foreach( $_SESSION['cart']['product'] as $product){
      $orderdetails[] = new orderdetail(
        $product['id'],
        $product['amount'],
        $product['price'],
        $product['name'],
        $product['picture'],
        );
    }
      if(isset($_SESSION['info_customer']['fullname'])){


        $order->addOrder($order, $orderdetails);

        $_SESSION['cart']['product']= [];
        $_SESSION['cart']['totalPrice']= 0;

      } else {

        $array_respone = [
          "success" => 100,
          "data" => null,
          "message" => "account not invalid",
          "error" => true,
      ];
      echo json_encode($array_respone);
      }      
