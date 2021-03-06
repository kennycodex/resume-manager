<?php

namespace App;

use App\Notifications\ClientResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guard = 'client';

    protected $fillable = [
        'name', 'phone','email','password','username','agency','contact','emailDept','agree_with_terms','timeZone','firstName',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ClientResetPasswordNotification($token));
    }


    public function affiliate()
    {
        return $this->belongsTo(Affiliate::class);
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function conversations(){
        return $this->hasMany(Conversation::class)->orderBy('updated_at','desc');
    }

    public function campaignBriefs(){
        return $this->hasMany(CampaignBrief::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }


    public function searches()
    {
        return $this->hasMany(ClientSearch::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function jobs(){
        return $this->hasMany(Job::class);
    }

    public function unreadMessages(){
        $conversations = $this->conversations;
        $countUnread = 0 ;
        foreach ($conversations as $conversation){
            $countUnread += $conversation->unread_messages_client ;
        }

        return $countUnread;
    }


}
