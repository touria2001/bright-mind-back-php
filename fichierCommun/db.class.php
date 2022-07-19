
<?php

class dbConnection
{
    private $dsn="mysql:host=localhost;dbname=brightmind";
    private $user = "root";
    private $password ="";
    public $dbc;

  

    

    protected function PDOConnection()
    {
        if ($this->dbc == NULL) {
            try {
                $this->dbc = new PDO($this->dsn, $this->user, $this->password);
            } catch (PDOException $e) {
                echo __LINE__ . $e->getMessage();
            }
        }
    }   

    protected function execQuery($sql)
    {
        try {
            $res = $this->dbc->exec($sql) or print_r($this->dbc->errorInfo());
        } catch (PDOException $e) {
            echo __LINE__ . $e->getMessage();
        }

        return $res;
    }
    public function close()
    {
        $this->dbc = NULL;
    }
}
