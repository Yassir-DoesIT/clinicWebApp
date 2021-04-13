<?php

class Connection{
    public static function make(){
        try{
            return new PDO('mysql:host=127.0.0.1;dbname=HealthGeist','root', '',[
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
        ]);
        }catch(PDOException $e){
            die($e->getmessage());
        }
    }
}