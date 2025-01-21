<?php

namespace App\controllers;

class AppController{

    protected $connection;

    // Before route - session start
    public function beforeroute(){
        echo "Before routing -- ";
        //connect to the db?// You can also initialize the DB connection here if needed:
        //$this->connection = (new \App\models\Database())->connect(); // Example of connecting to DB in the AppController
    }


    // After route - session close
    public function afterroute(){
        echo " -- After routing";
        //disconnect from the db?
        //$this->connection->disconnect();
    }
}

?>