<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 6:39 PM
 */

namespace App\Http\Controllers;


use App\Agent;
use App\classes\Upload;
use App\Recording;
use App\User;
use Illuminate\Http\Request;

class AgentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('viewAgents','isAdmin','getAgents');
    }

    public function viewAgents(){
        $agents = $this->getAgents();
        return view('agents',compact('agents'));
    }

    public function isAdmin(){
        if (auth()->user() &&  auth()->user()->admin == 1) {
            return 'admin';
        }
        return 'not-admin';
    }

    public function getAgents(){
       // get current authenticated freelancer :
        $agents = Agent::orderBy('number','ASC')->get();
        foreach ($agents as &$agent){
            $agent['records'] = $agent->records;
        }
        return $agents;
    }

    public function addAgent(Request $request){
        $request->validate([
            'number' => 'max:10|required',
            'name' => 'max:191|required',
            'language' => 'max:191|required',
            'hourly_rate' => 'max:10',
            'available_hours' => 'max:1500',
            'location' => 'max:191|required',
            'experience'  => 'max:1500|required'
        ]);

        if(isset($request->id)){
            // edit
            $agent = Agent::where('id',$request->id)->first();
        }else{
            // add
            $agent = new Agent;
        }

        $agent->name = $request->name;
        $newNumber = $request->number;
        if($request->number == '100'){
            // get the last number and add 1
            $newNumber = count(Agent::all()) + 1;
        }
        $agent->number = $newNumber;
        $agent->experience = $request->experience;
        $agent->language = $request->language;
        $agent->hourly_rate = $request->hourly_rate;
        $agent->available_hours = $request->available_hours;
        $agent->location = $request->location;

        if(isset($request->user_id)){
            $agent->user_id = $request->user_id ;
        }

        $agent->save();



        // get user recordings to agents :

        if(isset($request->user_id)){
            $agent->user_id = $request->user_id;
            $user= User::where('id',$request->user_id)->first();
            $records = $user->recordings;
            foreach ($records as $rec){
                $record = new Recording;
                $record->title = 'Business agent record';
                $record->agent_id = $agent->id;
                $record->src = $rec->src;
                $record->save();
            }
        }


        return ['id'=>$agent->id];

    }

    public function addRecordToAgent(Request $request){
        $record = new Recording;
        $record->title = $request->title;
        $record->agent_id = $request->agent_id;

        if($request->src){
            $record->src = $request->src;
        }
        elseif($request->audioFile) {
            $pathToAudio = Upload::audio($request->audioFile, 'audioFile', '_160'.$request->agent_id.'Record_');
            if ($pathToAudio) {
                $record->src = '/'.$pathToAudio;
            }
        }

        $record->save();
        return $record;
    }

        public function deleteAgentRecord(Request $request){
            // delete education history
            $record = Recording::where('id',$request->recordID);
            // delete the audio file
            if(strpos($record->first()->src,'drive.google.com') !== false){
                $record->delete();
                return 'Record deleted';
            }
            if (file_exists(substr($record->first()->src, 1))){
                unlink(substr($record->first()->src, 1));
            }
            $record->delete();
            return 'Record deleted';
        }

    public function deleteAgent(Request $request){
        // delete agent
        $agent = Agent::where('id',$request->agentID);
        $agent->delete();
        return 'Agent deleted';
    }

    public function getAgentRecords($agent_id){
        $agent = Agent::where('id',$agent_id)->first();
        return $agent->records;
    }

}