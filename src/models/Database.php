<?php

namespace App\models;

class Database {
    private $connection;

    // Connect to the database
    public function connect() {
        try {
            // set database credentials (Use Fat-Free's DB\SQL class )
            $this->connection = new \DB\SQL('mysql:host=localhost;dbname=authtest', 'root', '');
            return $this->connection;
        } catch (\Exception $e) {
            echo "Database connection failed: " . $e->getMessage();
            exit;
        }
    }

    // Disconnect from the database
    public function disconnect() {
        $this->connection = null; // Close the connection
    }

    // Get the database connection
    public function getConnection() {
        return $this->connection;
    }
}

?>