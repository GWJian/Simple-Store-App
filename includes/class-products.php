<?php

class PRODUCTS
{
    public $database;

    public function __construct()
    {
       try {
            //we will try to establish the database connection
            $this->database = connectToDB();
       } catch ( PDOException $error ) {
        die ("Datavase Connection Failed:" . $error->getMessage());
       }
    }

    /**
     * retrieve all products from database
     */
    public function listAllProducts()
    {
        $products = [];
        // prepare the database, execute, and the fetchAll
        $statement = $this->database->prepare('SELECT * FROM products');
        
        //execute
        $statement->execute();

        /**
         * fetch all data brom database
         * use PDO::FETCH_OBJ if you want array -> name
         * use PDO::FETCH_ASSOC if you want object  ['name']
         * or left it empty for PDO::FETCH_BOTH
         */

        //fetchAll
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

    /**
     * 简化版
        *   {
        
        *   // prepare the database, execute, and the fetchAll
        *   $statement = $this->database->prepare('SELECT * FROM products');
        
        *  //execute
        *  $statement->execute();

        *  //fetchAll
        *  return $statement->fetchAll();

        *  }
     */

         /**
     * Find product by id
     */
    public function findProduct( $product_id )
    {

        // find the product based on given product_id
        $statement = $this->database->prepare("SELECT * from products WHERE id = :id");
        $statement->execute([
            'id' => $product_id
        ]);

        // retrieve the product (array)
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}