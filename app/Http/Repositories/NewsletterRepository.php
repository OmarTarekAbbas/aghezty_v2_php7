<?php
namespace App\Http\Repositories;

use App\Newsletter;

class NewsletterRepository
{

    private $newsletter;

    public function __construct(Newsletter $newsletter)
    {

      $this->newsletter = $newsletter;

    }

    public function __call($name , $arguments)
    {

      return $this->newsletter->$name(...$arguments);

    }

}
