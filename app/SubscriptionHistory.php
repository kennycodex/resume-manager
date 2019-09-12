<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscriptionHistory extends Model
{
    protected $table = 'subscriptions_updates_history';

    protected $fillable= [
        'amount_paid',
        'hours_per_week',
        'hourly_rate',
        'duration_in_weeks',
        'original_duration_in_weeks',
        'start_date',
        'end_date',
        'canceled_at',
        'finished_at',
        'invoice_generated_at',
        'booking_email',
        'payment_gateway_subscription_id',
        'applied_at',
        'client_id',
        'agent_id',
        'subscription_id',
        'campaign_id',
    ];


    public function campaign(){
        return $this->belongsTo(Campaign::class) ;
    }

    public function subscription(){
        return $this->belongsTo(Subscription::class) ;
    }

    public function manager(){
        return $this->belongsTo(Agent::class,'agent_id') ;
    }

    public function invoices(){
        return $this->hasMany(Invoice::class);
    }
}