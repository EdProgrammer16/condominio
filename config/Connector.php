<?php

namespace Config;

use \PDO;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Connector {

    /**
     * Cria uma conexão com o banco de dados usando PDO.
     *
     * @return PDO
     * @throws \PDOException
     */
    public static function connectToDatabase() {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
        try {
            $pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (\PDOException $e) {
            throw new \PDOException("Connection failed: " . $e->getMessage());
        }
    }

    /**
     * Envia um e-mail usando PHPMailer.
     *
     * @param string $to Endereço de e-mail do destinatário
     * @param string $subject Assunto do e-mail
     * @param string $body Corpo do e-mail
     * @return bool Retorna true se o e-mail foi enviado com sucesso, false caso contrário
     */
    public static function sendEmail($to, $subject, $body) {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = EMAIL_HOST;
            $mail->Port = EMAIL_PORT;
            $mail->SMTPAuth = true;
            $mail->Username = EMAIL_USERNAME;
            $mail->Password = EMAIL_PASSWORD;

            $mail->setFrom(EMAIL_FROM, EMAIL_FROM_NAME);
            $mail->addAddress($to);

            $mail->Subject = $subject;
            $mail->Body = $body;

            $mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
            return false;
        }
    }
}
