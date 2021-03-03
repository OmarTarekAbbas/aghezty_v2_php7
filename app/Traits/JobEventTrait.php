<?php

namespace App\Traits;

trait JobEventTrait
{
  /**
   * Method sendMailToAdminWithFinishedNewsLetter
   *
   * send mail To Admin after all newsletter mail send done to all user
   *
   * @return void
   */
  public function sendMailToAdminWithFinishedNewsLetter()
  {
    $message  = '<!DOCTYPE html>
        <html lang="en">
            <head>
            </head>
            <body>
            <center> <strong> NewsLetter </strong> </center>
            </br>
            <strong> All newsletter mail send done to all subscribe users </strong>
        </body>
        </html>';
      \Mail::send([], [], function($email) use ($message)
      {
        $email->from(setting('super_mail'), __('front.title'));
        $email->to(setting('super_mail'), 'Super Admin')->subject("NewsLetter Mails Status");
        $email->setBody($message, 'text/html');
      });
  }


  public function sendMailToAdminWithFinishedImagesResized()
  {
    $message  = '<!DOCTYPE html>
        <html lang="en">
            <head>
            </head>
            <body>
            <center> <strong> Resizing </strong> </center>
            </br>
            <strong> All images are resized now </strong>
        </body>
        </html>';
      \Mail::send([], [], function($email) use ($message)
      {
        $email->from(setting('super_mail'), __('front.title'));
        $email->to(setting('super_mail'), 'Super Admin')->subject("Aghezty Images Resizing");
        $email->setBody($message, 'text/html');
      });
  }
}
