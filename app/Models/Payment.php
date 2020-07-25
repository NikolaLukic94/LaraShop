<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        $table->unsignedBigInteger('invoice_id')->nullable();
        $table->foreign('invoice_id')->references('id')->on('invoices');

        $table->unsignedBigInteger('payment_method_id')->nullable();
        $table->foreign('payment_method_id')->references('id')->on('payment_methods');

        $table->date('payment_date');
        $table->integer('payment_amount');
    ];

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function invoice()
	{
	    return $this->belongsTo(Invoice::class);
	}
}
