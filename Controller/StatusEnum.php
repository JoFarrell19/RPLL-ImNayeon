<?php

enum Status {
    case OrderReceived;
    case InKitchen;
    case OnTheWay;
}

// // Using the enum values
// $OrderReceived = Status::OrderReceived;
// $banInKitchenana = Status::InKitchen;
// $OnTheWay = Status::OnTheWay;

// // You can also use switch-case to handle enum values
// switch ($OrderReceived) {
//     case Status::OrderReceived:
//         echo "Order Received";
//         break;
//     case Status::InKitchen:
//         echo "Your Order is being cooked!";
//         break;
//     case Status::OnTheWay:
//         echo "Your Order is On The Way!";
//         break;
// }

?>
