<?php
    function returnAllFromProducts(){
        return 'SELECT * FROM `products`;';
    }
    function returnCustomerOrderInfo(){
        return 'SELECT first_name, last_name, order_count, total_spent FROM customers as c
        JOIN customer_totals as ct ON c.id = ct.customer_id';
    }