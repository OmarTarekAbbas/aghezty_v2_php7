<?php

namespace App\Jobs;

use App\Http\Repositories\NewsletterRepository;
use App\Jobs\Job;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * NewsletterRepository
     * @var NewsletterRepository $NewsletterRepository
     */
    private $NewsletterRepository;

    /**
     * __construct
     * @param $NewsletterRepository
     */
    public function __construct(
        NewsletterRepository $NewsletterRepository
    ) {
        $this->NewsletterRepository = $NewsletterRepository;
    }

    public function handle(Mailer $mailer)
    {
        $message = $request->message;

        $mails = $this->NewsletterRepository->all();

        foreach ($mails as $mail) {
            $mailer->send('mails.newsletter', ['content' => $message], function ($m) use ($mail) {
                $m->from(setting('super_mail'), "Newsletter");
                $m->to($mail->mail, "Newsletter")->subject("Newsletter");
            });
        }
    }
}
