<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 6:39 PM
 */

namespace App\Http\Controllers;


use App\WorkHistory;
use Illuminate\Http\Request;

class WorksHistoryController extends Controller
{
    public function showHistory(){ // function for testing to open the page of works history
        return view('includes.work_overview');
    }

    public function getWorks(){
       // get current authenticated freelancer :
        $currentUser = auth()->user();
        return $currentUser->worksHistory;
    }

    public function addWork(Request $request){
        $currentUser = auth()->user();
        $request->validate([
            'job_title' => 'max:190|required',
            'job_description' => 'max:1500|required',
            'company' => 'max:190|required',
            'date_from' => 'max:190|required',
            'date_to' => 'max:190',
        ]);

        $workH = new WorkHistory;
        $workH->user_id = $currentUser->id;
        $workH->job_title = $request->job_title;
        $workH->company = $request->company;
        $workH->job_description = $request->job_description;
        $workH->date_from = $request->date_from;
        if($request->currently_working !== true){
            $workH->date_to = $request->date_to;
            $workH->currently_working = $request->currently_working;
        }
        $workH->save();


        return ['status' => 'ok'];

    }
}