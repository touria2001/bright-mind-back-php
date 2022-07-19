<?php
require_once '../../fichierCommun/db.class.php';
require_once '../../fichierCommun/Validation.class.php';
class oubliePw extends dbConnection
{
    
    private $email;
    private  $pw ;
    private $hashedPassword ;
    public $errors = array();
    public $validation ;
    public function __construct($email)
    {
        $this->email = $email;
        $this->pw = uniqid();
        $this->hashedPassword = password_hash($this->pw, PASSWORD_DEFAULT);
        $this->validation=  new Validation();
        $this->validation->isEmptyEmail($this->email);
        $this->validation->isInvalidEmail($this->email);
        $this->errors = $this->validation->errors;
    }
 
    public function mainFunction()
    {
        parent::PDOConnection();


        $resultat = $this->dbc->prepare("SELECT id FROM etudiant where email=:email");
        $resultat->execute([
            "email" => $this->email,

        ]);
        $verif = 0;
        while ($student = $resultat->fetch(PDO::FETCH_OBJ)) {
            if ($student) {
                $verif  = 1;
            }
        }
        parent::close();
        if ($verif == 0) {
            $this->errors['emailNotExist'] = "<span style='color:red;'>you are not registered yet</span>";
        } else {

            $this->sendEmail();
            $this->updatePw();
        }
    }
   
    private function sendEmail()
    {
        require_once '../../lib/mail.php';
        $message = "Hello, here is your new password : " . $this->pw . "";
        $mail->setFrom('touriaa.abbou@gmail.com', mb_encode_mimeheader('Bright mind', 'UTF-8'));
        $mail->addAddress($this->email);
        $mail->Subject = mb_encode_mimeheader('Password change', 'UTF-8');
        $mail->Body    = $message;
        $mail->send();
    }

    private function updatePw()
    {
        parent::PDOConnection();
        $stmt = $this->dbc->prepare("update etudiant set pw = :pw where email = :email");
        $stmt->execute([
            "pw" => $this->hashedPassword,
            "email" => $this->email,
        ]);
        parent::close();
    }
}
