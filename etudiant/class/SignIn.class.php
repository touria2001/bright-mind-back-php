<?php
require_once '../../fichierCommun/db.class.php';
require_once '../../fichierCommun/Validation.class.php';
class SignIn extends dbConnection
{
    private $email;
    private $pw;
    private $cookie;
    public $errors = array();
    public $validation ;
    public function __construct($email, $pw, $cookie)
    {
        $this->email = $email;
        $this->pw = $pw;
        $this->cookie = $cookie;
        $this->validation=  new Validation();
        $this->validation->isEmptyEmail($email);
        $this->validation->isEmptyPw($pw);
        $this->validation->isInvalidEmail($this->email);
        $this->errors = $this->validation->errors;
    }




    public function checkUser()
    {
        if ($this->errors == null) {
            parent::PDOConnection();
            $statement = $this->dbc->prepare("select * from etudiant where email=:email");
            $statement->execute([
                "email" => $this->email,

            ]);
            $i = 0;
            while ($student =  $statement->fetch(PDO::FETCH_OBJ)) {
                if (password_verify($this->pw, $student->pw)) {
                    session_start();
                    
                    $_SESSION['email'] = $student->email;
                    if ($this->cookie == true) {
                        setCookie('emailBright', $this->email, time() + 365 * 24 * 3600, "/");
                        setCookie('passwordBright', $this->pw, time() + 365 * 24 * 3600, "/");
                    }
                    $i = 1;
                }
            }
            if ($i == 0) {
                $this->errors['compteNonExist'] = "<span style='color:red;'>the email or password is wrong</span>";
            }
        }
        parent::close();
    }
}
