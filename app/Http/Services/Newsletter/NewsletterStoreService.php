<?php
namespace App\Http\Services\Newsletter;

use App\Jobs\SendEmail;
use Illuminate\Support\Facades\Mail;
use App\Http\Repositories\NewsletterRepository;

class NewsletterStoreService
{

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

    /**
    * handle
    * @param array $request
    * @return NewsletterRepository
    */
    public function handle($request)
    {
        //foreach newsletter send mail
        $message = $request->message;

        $mails = $this->NewsletterRepository->all();

        SendEmail::dispatch($this->NewsletterRepository)->onConnection('sync');

        return redirect()->back()->with('success', 'Sent!');
    }
}
