<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class workingShift extends Model
{

    protected $table = 'working_shifts';
    protected $fillable = [
        'start_time','end_time','status','campaign_id','total_hours','campaign_id','agent_id'
    ];

}