<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\OrderConfirmation;
use Illuminate\Support\Facades\Auth;

class SendSuccessfulPurchaseEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $body;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($body)
    {
        $this->body = $body;
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->body->user = Auth::user();

        \Mail::to(Auth::user()->email)->send(new OrderConfirmation($this->body));
    }
}
