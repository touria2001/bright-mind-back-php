<?php
require_once '../../fichierCommun/db.class.php';
require_once '../../fichierCommun/Validation.class.php';

class SignUp extends dbConnection
{
    private $nom;
    private $prenom;
    private $email;
    private $niveauScolaire;
    private $pw;
    private $pwVerif;
    public $errors = array();
    public $validation ;

    public function __construct($nom, $prenom, $email, $niveauScolaire, $pw, $pwVerif)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->niveauScolaire = $niveauScolaire;
        $this->pw = $pw;
        $this->pwVerif = $pwVerif;
        $this->validation=  new Validation();
        $this->validation->isEmptyNom($nom);
        $this->validation->isEmptyPrenom($prenom);
        $this->validation->isEmptyEmail($email);
        $this->validation->isEmptyPw($pw);
        $this->validation->isEmptyPwConfirmation($pwVerif);
        $this->validation->isEmptyNiveauScolaire($niveauScolaire);
        $this->validation->isInvalidNom($this->nom);
        $this->validation->isInvalidPrenom($this->prenom);
        $this->validation->isInvalidEmail($this->email);
        $this->validation->isInvalidNiveauScolaire($this->niveauScolaire);
        $this->validation->isInvalidPw($this->pw);
        $this->validation->isNotMatchPw($this->pw,$this->pwVerif);
        $this->errors = $this->validation->errors;

    }

  
    public function isEmailExist()
    {
        parent::PDOConnection();
        $sql = "select * from etudiant where email='" . $this->email . "'";
        $res = $this->dbc->query($sql);
        parent::close();
        while ($student = $res->fetch(PDO::FETCH_OBJ)) {
            if ($student) {
                $this->errors["emailExist"] = "<span style='color:red;'>this email already exists</span>";
            }
        }
        parent::close();
    }



    public function sendEmailToAdmin()
    {
        if ($this->errors == null) {
            require_once '../../lib/mail.php';
            $mail->setFrom('touriaa.abbou@gmail.com', mb_encode_mimeheader('bright mind', 'UTF-8'));
            $mail->addAddress('abboutouria20.01@gmail.com');
            $mail->Subject = mb_encode_mimeheader('Demande de création de compte par un étudiant', 'UTF-8');

            $message = "This message was sent to you via the bright mind site for the candidate<br>
                         <b>first name : </b>" . $this->prenom . "<br>
                         <b>last name :</b> " . $this->nom . ".<br>
                         <b>level school : </b>" . $this->niveauScolaire . ".<br>

                          Please visit the site to accept or reject this candidate.";
            $mail->Body    = $message;

            try {

                $resulate =   $mail->send();
            } catch (Exception $e) {
                $this->errors["erreurEnvoi"] ="sorry! a problem occurred, please try again";

            }
        }
    }
    public function createUser()
    {
        if ($this->errors == null) {
            require_once 'CRUDStudent.class.php';
            $student = new CRUDStudent();
          
            $student->setEmail($this->email);
            $student->setPw( $this->pw);
           
            
            
            
            $student-> signUpStudent($this->prenom,$this->nom,$this->niveauScolaire);
        }
    }
}
