<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Queue;
use Illuminate\Queue\Events\JobProcessed;
use App\Constants\OrderStatus;
use App\Traits\JobEventTrait;
use View;

class AppServiceProvider extends ServiceProvider
{
    use JobEventTrait;
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        View::composer("*", function ($view) {
          $view->with("orderStatus", OrderStatus::class);
        });

        Queue::after(function (JobProcessed $event) {
          switch ($event->job->resolveName()) {
            case "App\Jobs\SendEmail":
              $this->sendMailToAdminWithFinishedNewsLetter();
            default:
              break;
          }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      Builder::macro('whereLike', function($attributes, string $searchTerm) {
          $this->where(function($q) use ($attributes,$searchTerm){
            foreach($attributes as $attribute) {
              $q->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
            }
          });
        return $this;
      });
    }
}
