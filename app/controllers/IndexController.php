<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 19.1.24
 * Time: 14.05
 */

namespace App\Controllers;


use App\Classes\Mail;

class IndexController extends BaseController
{

    public function show()
    {
        $datsa = [
            'to' => 'arturas.ubie@gmail.com',
            'subject' => 'Welcome to acme store',
            'view' => 'welcome',
            'name' => 'John Doe',
            'body' => 'Testing email template'
        ];
        echo "Inside Homepage controller class";
        $mail = new Mail();
        if ($mail->send($data)) {
            echo 'Email sent successfully';
        } else {
            echo 'Email sending failed successfully';
        }
    }
}