<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 19.1.24
 * Time: 16.58
 */

namespace App\Classes;


class Errorhandler
{
    public function handleErrors($error_number, $error_message, $error_file, $error_line)
    {
        $error = "[{$error_number}] An error occured in file {$error_file} on line $error_line: $error_message";
        $enviroment = getenv('APP_ENV');

        if ($enviroment === 'local') {
            $whoops = new \Whoops\Run;
            $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
            $whoops->register();
        } else {
            $data = [
                'to' => getenv('ADMIN_EMAIL'),
                'subject' => 'System error',
                'view' => 'errors',
                'name' => 'Admin',
                'body' => $error
            ];
            Errorhandler::emailAdmin($data)->outputFriendlyError();
        }
    }
    public function outputFriendlyError()
    {
        ob_end_clean();
        view('errors/generic');
        exit;
    }
    public static function emailAdmin($data)
    {
         $mail = new Mail;
         $mail->send($data);

         return new static;
    }
}