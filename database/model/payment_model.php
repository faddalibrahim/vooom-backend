<?php
    #Import db connection class from db_conn.php
    require_once(__DIR__."/../db-config/db_conn.php");
    
    class PaymentModel extends DatabaseConnection{
        
        //INSERT PAYMENT
        protected function insertPayment($client_id, $datePayment, $staff){
            $sql = "INSERT INTO `payment`(`date_of_payment`,`amount`, `staff_id`) 
            VALUES ('$datePayment','$amount','$quantity','$staff')";
            $result = mysqli_query($this -> connect(), $sql);
        }

        //SELECT ALL PAYMENTS
        protected function selectAllPayments(){
            $results = mysqli_query($this -> connect(), 
                "SELECT * FROM payment"
            );
            return mysqli_fetch_all($results, MYSQLI_ASSOC);
        }

        // SUM ALL PAYMENTS
        protected function sumPayment(){
            $results = mysqli_query($this -> connect(), 
                "SELECT SUM(`amount`) FROM `payment`"
            );
            return mysqli_fetch_all($results, MYSQLI_ASSOC);
        }

    }







?>