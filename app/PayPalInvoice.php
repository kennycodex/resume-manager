<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayPalInvoice extends Model
{
    protected $fillable = ['title', 'price', 'payment_status','payer_email'];

    public function getPaidAttribute() {
        if ($this->payment_status == 'Invalid') {
            return false;
        }
        return true;
    }
}
