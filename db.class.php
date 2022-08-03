<?php
require 'credentials.php';

class Db
{
    public $host;
    public $dbname;
    public $username;
    public $password;
    public $dbco;



    /************ *
     *Singlton
     *Db:singleton()
     */
    public static $db;

    public static function singleton()
    {

        if (!self::$db) {
            global $servername, $username, $password, $dbname;
            //creation de la Db connexion 
            self::$db = new Db();
            self::$db->connect(HOSTNAME, USERNAME, PASSWORD, DBNAME);
            echo 'connexions reussis';
        }

        return self::$db;
    }




    public function connect($set_host, $set_username, $set_password, $set_database)
    {
        $servername = "localhost";
        $username = "admin";
        $password = "azerty";
        $dbname = "whatsapp";
        $this->host = $set_host;
        $this->username = $set_username;
        $this->password = $set_password;
        $this->dbname = $set_database;
        try {
            $this->dbco = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", "$this->username", "$this->password");
            $this->dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // echo "Vous êtes connecté";
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }



    public function create($table, $fields = array(), $values = array())
    {
        try {

            $str_fields = implode(",", $fields);

            $tableau_values = [];

            foreach ($fields as $field) {

                array_push($tableau_values, ":" . $field);
            }

            $str_fields2 = implode(",", $tableau_values);

            $keys_values = array_combine($tableau_values, $values);

            $prep = $this->dbco->prepare("
                                        INSERT INTO
                                        $table($str_fields)
                                            VALUES ( $str_fields2)
                                        ");

            $prep->execute($keys_values);
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }


    public function select_one($table, $field, $id)
    {
        try {
            $sth = $this->dbco->prepare("SELECT * FROM  $table WHERE $field = '$id'");

            $sth->execute();
            $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
            if (count($resultat) == 0) return;

            return $resultat[0];
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    public function select_all2($table, $field, $value)
    {
        try {
            $sth = $this->dbco->prepare("SELECT * FROM  $table WHERE $field like'$value'");
            // $sth = $this->dbco->prepare("SELECT * FROM  $table WHERE $field <> '$value'");

            $sth->execute();
            $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    public function select_all($table, $field, $value)
    {
        try {
            $sth = $this->dbco->prepare("SELECT * FROM  $table WHERE $field = $value");
            // $sth = $this->dbco->prepare("SELECT * FROM  $table WHERE $field <> '$value'");

            $sth->execute();
            $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);

            return $resultat;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    public function select_sql($sql)
    {
        try {
            // $sth = $this->dbco->prepare("SELECT * FROM  $table WHERE $field = $value");
            $sth = $this->dbco->prepare($sql);
            $sth->execute();
            $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);

            return $resultat;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    public function select_sql2($sql)
    {
        try {
            // $sth = $this->dbco->prepare("SELECT * FROM  $table WHERE $field = $value");
            $sth = $this->dbco->prepare($sql);
            $sth->execute();
            $resultat = $sth->fetch(PDO::FETCH_ASSOC);
            echo ' <pre>';
            print_r($resultat['projet_id']);
            echo '</pre>';
            return $resultat['projet_id'];
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }




    public function delete($table, $field, $id)
    {
        //delete('users', 'pseudo', 'test');
        try {
            $sql = "DELETE FROM  $table WHERE $field ='$id'";

            $sth = $this->dbco->prepare($sql);


            $sth->execute();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    public function update($table, $fields = array(), $values = array(), $id, $field_id)
    {
        $apdate = [];
        foreach ($fields as $i => $field) {
            array_push($apdate, $field . "=" . "'" . $values[$i] . "'");
        }

        try {
            $sql = "UPDATE $table SET " . implode(",", $apdate) . " WHERE $field_id = '$id' ";

            $sth = $this->dbco->prepare($sql);
            $sth->execute();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}
