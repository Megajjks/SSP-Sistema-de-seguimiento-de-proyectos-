<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use View;

class Email1Controller extends Controller
{
    public function email(){
        // Configuration
        $smtpAddress = 'smtp-mail.outlook.com';
        $port = 587;
        $encryption = 'tls';
        $yourEmail = '5871@itescam.edu.mx';
        $yourPassword = 'LabelNET227';

        // Prepare transport
        $transport = \Swift_SmtpTransport::newInstance($smtpAddress, $port, $encryption)
                ->setUsername($yourEmail)
                ->setPassword($yourPassword);
        $mailer = \Swift_Mailer::newInstance($transport);

        // Prepare content 
        $view = View::make('email_template', [
            'message' => '<h1>Hello Bitch, I´m your father !</h1>'
        ]);

        $html = $view->render();
        
        // Send email
        $message = \Swift_Message::newInstance('Test')
             ->setFrom(['5871@itescam.edu.mx' => 'Our Code World'])
             ->setTo(["5854@itescam.edu.mx" => "5854@itescam.edu.mx"])
             // If you want plain text instead, remove the second paramter of setBody
             ->setBody($html, 'text/html');
             
        if($mailer->send($message)){
            return "Check your inbox";
        }

        return "Something went wrong :(";
    }

    public function contact(Request $request){
        $subject = "</~Creación de un nuevo proyecto~/>";
        $for = "5854@itescam.edu.mx";
        Mail::send('mails.startproject',$request->all(), function($msj) use($subject,$for){
            $msj->from("jayrojesuskusalazar@gmail.com","webadminSSP");
            $msj->subject($subject);
            $msj->to($for);
        });
        return redirect()->back();
    }
}
