<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Http\Repositories\NewsletterRepository;

class SendEmail extends Job implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, SerializesModels;

    /**
     * NewsletterRepository
     * @var NewsletterRepository $NewsletterRepository
     */
    private $NewsletterRepository;

    /**
     * message
     * @var message
     */
    private $message;

    /**
     * subject
     * @var subject
     */
    private $subject;

    /**
     * __construct
     * @param $NewsletterRepository
     */
    public function __construct(
      NewsletterRepository $NewsletterRepository,
      $message,
      $subject
    ) {
        $this->NewsletterRepository = $NewsletterRepository;
        $this->message = $message;
        $this->subject = $subject;
    }

    public function handle(Mailer $mailer)
    {
        $mails = $this->NewsletterRepository->all();
        foreach ($mails as $mail) {
            $mailer->send('mails.newsletter', ['content' => $this->message, 'subject' => $this->subject], function ($m) use ($mail) {
                $m->from(setting('super_mail'), "Aghezty Newsletter");
                $m->to($mail->mail, "Newsletter")->subject($this->subject);
            });
        }
    }
}
