<?php

namespace App\Http\Controllers;

use App\Mail\welcome;
use App\UserData;
use Illuminate\Http\Request;
use App\classes\Telegram;
use Illuminate\Support\Facades\Mail;
use PharIo\Manifest\Email;

class UserDataController extends Controller
{

    public function store(Request $request){
        $userData = UserData::where('user_id',auth()->user()->id)->first();
        if ($userData){
            $sendTelegram = false;
            if(!$request->ajax()){
                $request->validate([
                   'trnTitle1'=>'max:225',
                   'trnTitle2'=>'max:225',
                   'trnTitle3'=>'max:225',
                   'eduTitle1'=>'max:225',
                   'eduTitle2'=>'max:225',
                   'eduTitle3'=>'max:225',
                   'nationality'=>'max:225',
                   'currency'=>'max:225',
                   'personalSite'=>'max:225',
                   'behanceLink'=>'max:225',
                   'instagramLink'=>'max:225',
                   'dribbleLink'=>'max:225',
                   'stackoverflowLink'=>'max:225',
                   'personal_interests'=>'max:225',
                   'name'=>'required|max:225',
                   'jobTitle'=>'required',
                   'salary'=>'required|max:225',
                   'availableHours'=>'required',
                   'city'=>'required|max:225',
                   'email'=>'required|max:225',
                   'primarySkills'=>'required',
                   'design_skills_checkbox'=>'required',
                ]);

                $sendTelegram = true;
            }
            $data = $request->all();
            $works = $userData->works ;
            foreach ($data as $key => $value){
                if($key == '_token'){
                    continue;
                }
                elseif ($key == 'photo'){
                    $pathToPhoto = $this->uploadPhoto($value,'photo','');
                    $userData->{$key} = $pathToPhoto ;
                }elseif($key == 'audioFile'){
                    if(is_numeric($value)){
                        $userData->{$key} = " ";
                    }else{
                        $pathToAudio = $this->uploadAudio($value,'audioFile','');
                        if($pathToAudio){
                            $userData->{$key} = $pathToAudio ;
                        }
                    }
                }elseif ($key == 'design_skills_checkbox'){
                    // convert to string and save on database
                    $skillsCheckBox = implode(',',$value);
                    $userData->{$key} = $skillsCheckBox ;
                }elseif($key == 'primarySkills'){
                    // convert to string and save on database
                    $PrimarySkillsCheckBox = implode(',',$value);
                    $userData->{$key} = $PrimarySkillsCheckBox ;
                }elseif ($key == 'charSkills'){
                    $charSkillsCheckBox = implode(',',$value);
                    $userData->{$key} = $charSkillsCheckBox ;
                }elseif ($key == 'availableHours'){
                    $availableHoursCheckBox = implode(',',$value);
                    $userData->{$key} = $availableHoursCheckBox ;
                }elseif(strpos($key, 'works') !== false){
                    // clear array
                    $worksArr = array_filter(explode(',',$works));

                    if(is_numeric($value)){ // delete photo number x
                        if(!empty($works)){
                            foreach ($worksArr as &$work){
                                if(strpos($work, 'works'.$value) !== false){
                                    $work ='';
                                }
                            }
                            $works = implode(',',$worksArr);
                        }
                    }else{
                        // check if photo is not repeated :
                        $pathToPhoto = $this->uploadPhoto($value,$key,$key);
                        if(empty($works)){
                            $works = $pathToPhoto ;
                        }else{
                            $works .= ','.$pathToPhoto;
                        }

                    }

                }elseif($key == 'audio'){
                    // get Id :
                    $data = $value;
                    $explodedData= explode("/", $data);
                    foreach ($explodedData as $id){
                        if(strlen($id) == 33){
                            $userData->{$key} = $id;
                            break;
                        }else{
                            $userData->{$key} = "NOT-VALID-LINK";
                        }
                    }
                }elseif(strpos($key, 'day') !== false){
                    // save in the database values of days and from to also !
                    $days=['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
                    foreach ($days as $day){
                        $DBColumn = $day.'Hours';
                        if($key == $day.'From'){
                            $userData->{$DBColumn} = $value;
                        }elseif ($key == $day.'To'){
                            $userData->{$DBColumn} .= ','.$value;
                        }
                    }
                }
                else{
                    $userData->{$key} = $value ;
                }
                $userData->works = $works ;
            }
            $userData->save();
            if($sendTelegram){
                $this->sendTelegram();
                $this->sendNotification();
            }
            return redirect('/freelancer')->with('successMessage', 'Your changes have been successfully saved.');
        }else{
            return redirect('/freelancer/home');
        }
    }

    public function uploadAudio($src,$name,$newName){
        $target_dir = "resumeApp/uploads/";
        $uploadOk = 1;
        if ($_FILES[$name]["size"] > 25000000) { // 25 megabyte
            $uploadOk = 0;
        }
        // allowed formats :
        $formats = ['audio/mpeg', 'audio/x-mpeg', 'audio/mpeg3', 'audio/x-mpeg-3', 'audio/aiff',
            'audio/mid', 'audio/x-aiff', 'audio/x-mpequrl','audio/midi', 'audio/x-mid',
            'audio/x-midi','audio/wav','audio/x-wav','audio/xm','audio/x-aac','audio/basic',
            'audio/flac','audio/mp4','audio/x-matroska','audio/ogg','audio/s3m','audio/x-ms-wax',
            'audio/xm','audio/x-m4a'];

        // check file type :
        if(!in_array($_FILES[$name]['type'],$formats)){
            $uploadOk = 0 ;
        }

        if ($uploadOk == 0) {
            return false;
        } else {
            $target_file = $target_dir . $newName . basename($_FILES[$name]["name"]);
            if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
                return $target_file;
            } else {
                return false;
            }
        }
    }


    public function uploadPhoto($src,$name,$newName){
        $target_dir = "resumeApp/uploads/";
        $target_file = $target_dir . $newName. basename($_FILES[$name]["name"]);
        $uploadOk = 1;
// Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES[$name]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
// Check file size
        if ($_FILES[$name]["size"] > 25000000) {
            $uploadOk = 0;
        }
// check if image exists in the folder :
        $userData = UserData::where('user_id',auth()->user()->id)->first();
        // get the works photos
        $works = explode(',',$userData->works);
        foreach ($works as $work){
            if (strpos($work, basename($_FILES[$name]["name"])) !== false) {
                $uploadOk = 0;
            }
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return false;
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
                return $target_file;
            } else {
                return false;
            }
        }
    }

    public function sendMail($msg){

    }

    public function sendTelegram(){
        $msg = auth()->user()->username ;
        $msg .= ' has updated his resume .. please view updated resume here..  ';
        $msg .= 'https://123workforce.com/'.auth()->user()->username;
        $telegram = new Telegram('-279372621');
        $telegram->sendMessage($msg);
    }

    public function sendNotification(){
        Mail::send('emails.welcome', ['key' => 'value'], function($message)
            {
                $message->to('AhmedMarzouk266@gmail.com', 'Ahmed Ragab')->subject('User has updated resume !');
            });
    }

}
