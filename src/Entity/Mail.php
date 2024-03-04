<?php
namespace Entity;
use PHPMailer\PHPMailer\PHPMailer;
use Others\Configuration as config;

class Mail {

    public $mailer; 

    public function __construct() {
        $this->mailer = new PHPMailer();
        $this->mailer->IsSMTP();
        $this->mailer->SMTPDebug = 0;
        $this->mailer->SMTPAuth = true;
        $this->mailer->SMTPSecure = 'tls'; 
        $this->mailer->Host = config::get("MAIL_HOST");
        $this->mailer->Port = 587;
        $this->mailer->Username = config::get("MAIL_USER");
        $this->mailer->Password = config::get("MAIL_PASSWORD");
        $this->mailer->CharSet = 'UTF-8';
    }

    public function addHtmlPage(){
        $this->mailer->isHTML(true);
        return $this;
    }

    public function addBody(string $body) {
        $this->mailer->Body = $body;
        return $this;
    }

    public function addSubject(string $subject) {
        $this->mailer->Subject = ($subject);
        return $this;
    }

    public function addEmail(array $emails) {
        foreach ($emails as $email) {
            $this->mailer->addAddress($email);
        }
        return $this;
    }

    public function send(){
        $this->mailer->send();
    }

}