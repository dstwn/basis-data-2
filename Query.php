<?php 
class Query {
    private $results;
    private $connection;

    function __construct($host,$user, $pass, $db){
        $this->connection = mysqli_connect(
            $host,$user, $pass, $db
        );
    }
    function Execute($query){
        $this->results = ($this->connection ? mysqli_query($this->connection,$query):false);
        return $this->result !==false;
    }
    function Display(){
        while(($row = mysqli_fetch_row($this->results))) print r($row);
    }
};
$host = "localhost";
$user = "root";
$pass = "";
$db   = "kurikulum_design";

$query = new Query($host,$user,$pass,$db);

if($query->Execute(
    'SELECT * FROM profile_lulusan'
))
{
    $query->Display();
}
?>