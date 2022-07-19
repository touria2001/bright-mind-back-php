<?php
require_once '../../fichierCommun/db.class.php';
require_once '../../fichierCommun/Validation.class.php';
class CreerClass extends dbConnection {
    private $nom;
    private $subject;
    private $teacher;
    
    public $errors = array();
    public $validation ;

    public function __construct($nom,$subject,$teacher)
    {
        $this->nom = $nom;
        $this->subject = $subject;
        $this->teacher = $teacher;
        $this->validation=  new Validation();
        $this->validation->isEmptyNom($nom);
        $this->validation->isEmptySubject($subject);
        $this->validation->isEmptyTeacher($teacher);
      
        $this->errors = $this->validation->errors;

    }

    public function isNomExist()
    {
        parent::PDOConnection();
        $sql = "select * from class where nom='" . $this->nom . "'";
        $res = $this->dbc->query($sql);
        parent::close();
        while ($prof = $res->fetch(PDO::FETCH_OBJ)) {
            if ($prof) {
                $this->errors["nomExist"] = "<span style='color:red;'>this nom already exists</span>";
            }
        }
        parent::close();
    }

  

    public function createClass()
    {
        if ($this->errors == null) {
            require_once 'CRUDClass.class.php';
            $admin= new CRUDClass();         
            session_start();
            $idAdmin = $_SESSION['id'];
            $admin->addClass($this->nom,$this->subject,$this->teacher);
        }
    }

}