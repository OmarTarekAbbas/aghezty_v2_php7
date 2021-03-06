<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Throwable;

class SendOrderMailJob extends Job
{
    use Dispatchable, SerializesModels;

    /**
     * order
     *
     * @var Order
     */
    private $order;

    /**
     * client
     *
     * @var Client
     */
    private $client;

    /**
     * message
     *
     * @var String
     */
    private $message;

    /**
     * mail_template_page
     *
     * @var String
     */
    private $mail_template_page;


    /**
     * Method __construct
     *
     * @param Order  $order
     * @param Client $client
     * @param String $message
     * @param String $mail_template_page
     *
     * @return void
     */
    public function __construct($order, $client, $message, $mail_template_page) {
        $this->order              = $order;
        $this->client             = $client;
        $this->message            = $message;
        $this->mail_template_page = $mail_template_page;
    }

    /**
     * Method handle
     *
     * @param Mailer $mailer
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
      $mailer->send($this->mail_template_page, ['order' => $this->order, 'client' => $this->client, 'subject' => $this->message], function ($m) {
        $m->from(setting('super_mail'), __('front.title'));
        $m->cc(setting('super_mail'));
        $m->to($this->client->email, $this->client->name)->subject(__('front.order'));
      });
    }

    /**
     * Handle a job failure.
     *
     * @param Exception $exception
     *
     * @return void
     */
    public function failed(Throwable $exception)
    {
      \File::append(storage_path('logs') . '/' . basename(get_class($this)) . '.log', $exception->getMessage().PHP_EOL);
    }
}
