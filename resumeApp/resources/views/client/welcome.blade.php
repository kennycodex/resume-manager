@extends('layouts.client-app')
@section('content')
    <? use Illuminate\Support\Facades\Auth;if(session()->get('admin') && session()->get('admin') == 'AdminWasHere'):?>
    <div class="container alert alert-success">
        You are viewing as Admin
    </div>
    <? endif;?>
   <div class="container">
       <!-- Success Messages  -->
       <div style="padding-top: 20px;">
           @if(session()->has('successMessage'))
               <div class="alert alert-success" id="successMessage">
                   {{ session()->get('successMessage') }}
               </div>
           @endif
       </div>

       <?
        $client = Auth::guard('client')->user();
       $searchesArr = [];
       ?>
       <h3 class="pageHeading text-left">Hello {{$client->name}} !</h3>
       <br>
        <? $searches = $client->searches; ?>

       @if( count($searches) > 0)
       <b class="pageSubHeading text-left" style="font-size: 14px;">Your saved searches :</b><br/><br/>
       <?
            $i =0;
          foreach ($searches as $search){
              if(empty(rtrim($search->freelancers_id,','))){
                 $searchDelete = \App\ClientSearch::where('id',$search->id);
                 $searchDelete->delete();
                 continue;
              }
              $searchesArr[$i]['name'] = $search->name;
              $searchesArr[$i]['id'] = $search->id;
              foreach (explode(',',$search->freelancers_id) as $id){
                  $searchesArr[$i]['freelancers'][] = \App\User::where('id',$id)->first();
              }
              $i++;
          }
       ?>

           <table class="table">
               <thead class="black white-text">
               <tr>
               </tr>
               </thead>
               <tbody>

                    @foreach($searchesArr as $key => $value)

                        <tr id="selectedSearch{{$value['id']}}">
                            <th scope="row" class="NoDecor">
                                <a class="panelFormLabel" data-toggle="collapse" href="#{{$value['id']}}" role="button" aria-expanded="false" aria-controls="collapseExample" style="margin-bottom: 10px;">
                                    <b>{{$value['name']}}</b>
                                </a>
                                <div class="" id="{{$value['id']}}" style="padding-top: 10px; padding-bottom: 12px;">
                                    <div style="padding-top: 20px; margin-top: 60px;">
                                        @foreach($value['freelancers'] as $freelancer)

                                            <div class="freelancerCard" id="card{{$freelancer->id}}">
                                                {{-- photo and name + multimedia--}}
                                                    <div class="row">
                                                    <div class="col-lg-5 col-md-12 freelancerCardLeft text-left">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-6 imageContainer">
                                                                <img src="{{$freelancer->userData->photo}}" alt="freelancer" class="freelancerImg" width="100" height="100">

                                                            </div>
                                                            <div class="col-lg-8 col-6 text-left">
                                                                <div class="nameCard">
                                                                    {{$freelancer->firstName}} {{$freelancer->lastName}}
                                                                </div>
                                                                <div class="jobTitle">
                                                                   {{$freelancer->userData->jobTitle}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5 offset-lg-1 col-md-12 freelancerCardRight">
                                                        <div class="row interviewIcons" >
                                                            <div class="cardLabel_interviews col-md-6">Recorded interviews</div>
                                                            <div class="col-md-4" style="padding-left: 35px;">
                                                                <div class="cardIconsCon">
                                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#{{$freelancer->id}}_audio_modal" style="outline: none;">
                                                                        <span style="border-right: 2px white solid; padding-right: 5px">
                                                                            <img src="/resumeApp/resources/views/customTheme/images/transcript.png" alt="" width="20px;">
                                                                        </span>
                                                                        <span style="padding-left: 5px;">
                                                                                <img src="/resumeApp/resources/views/customTheme/images/mic.png" alt="" width="20px">
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="cardIconsCon2">
                                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#{{$freelancer->id}}_video_modal" style="outline: none;">
                                                                        <span style="padding: 5px;">
                                                                            <img src="/resumeApp/resources/views/customTheme/images/video.png" alt="" width="25px">
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                {{-- end of photo and multimedia --}}
                                                <hr style="width: 95%;">
                                                {{-- Pricing and skills --}}
                                                    <div class="row">
                                                    <div class="col-lg-3 col-md-12">
                                                        <div class="cardLabel">Pricing:</div>
                                                        <div class="nameCard" style="padding-left: 0;">${{$freelancer->userData->salary +5}}/hour<br/>
                                                            ${{$freelancer->userData->salary_month}}/month
                                                        </div>
                                                        {{-- stripe goes here --}}
                                                        <div class="buttonMain whiteBg">
                                                            <button class="hireBtn btn-block hire" style="width: 80%;">Hire Me</button>
                                                        </div>
                                                        {{-- stripe ends here--}}
                                                    </div>
                                                    <div class="col-lg-8 col-md-12">
                                                        <div class="cardLabel">Skills:</div>
                                                        <div class="skillsCard">
                                                                {{$freelancer->userData->design_skills_checkbox}}
                                                        </div><br/>
                                                        <div class="panelFormLabel" style="	color: #697786;">
                                                            <div class="cardLabel" style="padding: 15px;">No.hours/week available: </div>
                                                            <div class="">
                                                                <div class="form-group">
                                                                    <? $workingHours = ['10 Hours per Week','20 Hours per Week','30 Hours per Week','40 Hours per Week'] ;?>
                                                                    <? $k=1 ?>
                                                                    <? $availableHoursCheckBox = explode(',',$freelancer->userData->availableHours);?>
                                                                    <div class="form-check">
                                                                        @foreach($workingHours as $option)
                                                                            <label class="form-check-label col-md-2 checkBoxContainer checkBoxText"  <? if(!in_array($option,$availableHoursCheckBox)): ?> style="color: lightgray;" <?endif;?>>{{str_replace('per Week','',$option)}}
                                                                                <input class="form-check-input" id="hours{{$k}}" type="checkbox" name="availableHours[]" value="{{$option}}"
                                                                                        <? if(in_array($option,$availableHoursCheckBox)): ?> checked <?endif;?> disabled>
                                                                                <span class="checkmark"></span>
                                                                            </label>
                                                                            <? $k++; ?>
                                                                        @endforeach
                                                                    </div>
                                                                </div>  <!-- Hours availabel -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- end of pricing and skills --}}

                                                {{-- expand btns--}}
                                                    <div class="row" style="margin-top: 15px ; border-top:1px solid whitesmoke; ">
                                                            <div class="col-md-6 text-right border-right NoDecor" style="background-color: #FDFDFD;">
                                                                <a  href="#viewEducationBtn{{$freelancer->id}}" id="viewPortfolioBtn{{$freelancer->id}}" class="viewPortfolioLink">
                                                                    <div class="cardLabel_interviews" style="padding-bottom: 10px; height:52px;">
                                                                       <img src="resumeApp/resources/views/customTheme/images/portfolio_NOT_active.png" alt="read more arrow" width="18px" id="portfolioBtnImg">
                                                                       <span style="padding-left: 8px;">View Portfolio </span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                    <div class="col-md-6 text-left NoDecor" style="background-color: #FDFDFD;">
                                                        <a  href="#viewEducationBtn{{$freelancer->id}}" id="viewEducationBtn{{$freelancer->id}}" class="viewEducationLink">
                                                            <div class="cardLabel_interviews" style="padding-bottom: 10px; height:52px;">
                                                                <img src="resumeApp/resources/views/customTheme/images/newResume/what_i_do.png" alt="read more arrow" width="18px" id="workBtnImg">
                                                                <span style="padding-left: 8px;" id="workBtnText">Work/Education</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                {{-- end of expand btns --}}
                                            </div>

                                             {{-- resume expanded --}}
                                                {{-- portfolio --}}
                                                <div class="row resumeExpand d-none" id="area_viewPortfolioBtn{{$freelancer->id}}">
                                                    <div class="worksSection" style="margin-top: 0;">
                                                        <div class="firstPart" style="background: none; padding-top: 0;">
                                                            <?
                                                            $workExamples = $freelancer->projects ;
                                                            $i = 0 ;
                                                            $maxNumberOfWorks = 50 ;
                                                            $firstSlideWorks=[];
                                                            $secondSlideWorks=[];
                                                            $thirdSlideWorks=[];
                                                            ?>
                                                            @if($workExamples)
                                                            <div class="row">
                                                                    <div class="col-lg-12">
                                                                    <div class="row">
                                                                        <? foreach ($workExamples as $workExample):?>
                                                                        <? if($i >= $maxNumberOfWorks ){break;}
                                                                           if(!$workExample->isActive){continue;}

                                                                           if($i<4){
                                                                               $firstSlideWorks[]  = $workExample;
                                                                           }elseif($i<8){
                                                                               $secondSlideWorks[] = $workExample;
                                                                           }elseif($i<12){
                                                                               $thirdSlideWorks[]  = $workExample;
                                                                           }
                                                                        ?>
                                                                            {{-- modal --}}
                                                                            <div class="modal fade" id="works{{$workExample->id}}Modal" tabindex="-1" role="dialog"
                                                                                 aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                                                <div class="modal-dialog modal-lg" role="document" style="">
                                                                                    <div class="modal-content" data-dismiss="modal" aria-label="Close">
                                                                                        <div class="modal-body" style="padding: 0;">
                                                                                            <div class="row">
                                                                                                <div class="col-md-9" style="padding: 0;">
                                                                                                    <img src="{{$workExample->mainImage}}" alt="" width="100%" height="auto">
                                                                                                    <?
                                                                                                    // more images
                                                                                                    $moreImagesArr = explode(',',$workExample->images);
                                                                                                    foreach($moreImagesArr as $image){
                                                                                                    if(!empty(trim($image))){
                                                                                                    ?>
                                                                                                    <img src="{{$image}}" alt="" width="100%" height="auto">
                                                                                                    <?}
                                                                                                    }?>
                                                                                                </div>
                                                                                                <div class="col-md-3">
                                                                                                    <div class="form-group" style="padding-top: 25px;">
                                                                                                        <label class="panelFormLabel"> Description <hr></label><br/>
                                                                                                        {{$workExample->projectDesc}}
                                                                                                    </div>
                                                                                                    <div class="form-group">
                                                                                                        <label class="panelFormLabel"> Link <hr></label><br/>
                                                                                                        <a href="{{$workExample->link}}">{{$workExample->link}}</a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                      <? $i++ ;?>
                                                                        <? endforeach;?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    {{-- works section carousel --}}

                                                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="false">
                                                        <div class="carousel-inner">
                                                            @if(!empty($firstSlideWorks))
                                                                <div class="carousel-item active">
                                                                    <div class="row">
                                                                        @foreach($firstSlideWorks as $workExample)
                                                                            <div class="col-md-6">
                                                                                <div class="workCard" style="margin-left: 0">
                                                                                    <div class="workImg" style="height: 290px; overflow: hidden; border-bottom:1px solid lightgray;">
                                                                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#works{{$workExample->id}}Modal">
                                                                                            <img src="{{$workExample->mainImage}}" alt="work img" width="260">
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="workTitle">
                                                                                        <div class="row">
                                                                                            <div class="col-md-9">
                                                                                                {{$workExample->projectName}}
                                                                                            </div>
                                                                                            <a class="col-md-2" href="javascript:void(0)" data-toggle="modal" data-target="#works{{$workExample->id}}Modal" style="outline: none;">
                                                                                                <img src="resumeApp/resources/views/customTheme/images/newResume/link.png" alt="view work">
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if(!empty($secondSlideWorks))
                                                                <div class="carousel-item">
                                                                    <div class="row">
                                                                        @foreach($secondSlideWorks as $workExample)
                                                                            <div class="col-md-6">
                                                                                <div class="workCard" style="margin-left: 0">
                                                                                    <div class="workImg" style="height: 290px; overflow: hidden; border-bottom:1px solid lightgray;">
                                                                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#works{{$workExample->id}}Modal">
                                                                                            <img src="{{$workExample->mainImage}}" alt="work img" width="260">
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="workTitle">
                                                                                        <div class="row">
                                                                                            <div class="col-md-9">
                                                                                                {{$workExample->projectName}}
                                                                                            </div>
                                                                                            <a class="col-md-2" href="javascript:void(0)" data-toggle="modal" data-target="#works{{$workExample->id}}Modal" style="outline: none;">
                                                                                                <img src="resumeApp/resources/views/customTheme/images/newResume/link.png" alt="view work">
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if(!empty($thirdSlideWorks))
                                                                <div class="carousel-item row">
                                                                    <div class="row">
                                                                        @foreach($thirdSlideWorks as $workExample)
                                                                            <div class="col-md-6">
                                                                                <div class="workCard" style="margin-left: 0">
                                                                                    <div class="workImg" style="height: 290px; overflow: hidden; border-bottom:1px solid lightgray;">
                                                                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#works{{$workExample->id}}Modal">
                                                                                            <img src="{{$workExample->mainImage}}" alt="work img" width="260">
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="workTitle">
                                                                                        <div class="row">
                                                                                            <div class="col-md-9">
                                                                                                {{$workExample->projectName}}
                                                                                            </div>
                                                                                            <a class="col-md-2" href="javascript:void(0)" data-toggle="modal" data-target="#works{{$workExample->id}}Modal" style="outline: none;">
                                                                                                <img src="resumeApp/resources/views/customTheme/images/newResume/link.png" alt="view work">
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    {{-- end of works section --}}

                                                    {{-- carousel controls --}}

                                                    <div class="row" style="padding-top: 25px; padding-bottom: 25px; width: 100%;">
                                                        <div class="col-md-6 NoDecor text-left">
                                                            <a href="#carouselExampleControls" role="button" data-slide="prev" class="cardLabel_interviews" style="color:#697786;">
                                                                <img src="resumeApp/resources/views/customTheme/images/newResume/prev.png"
                                                                     alt="prev" width="75px">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-6 NoDecor text-right">
                                                            <a href="#carouselExampleControls" role="button" data-slide="next" class="cardLabel_interviews" style="color:#697786;">
                                                                <img src="resumeApp/resources/views/customTheme/images/newResume/next.png"
                                                                     alt="next" width="75px">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    {{--end of carousel controller--}}

                                                    {{-- vc btns row --}}
                                                    <div class="row fullCV" style="width: 100%;">
                                                        <div class="col-md-6 text-right">
                                                            <div class="buttonMain whiteBg text-right" style="padding: 0; margin: 0; margin-left: 60%;">
                                                                <a href="#" class="hireBtn btn-block hire">Chat</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 text-left">
                                                            <div class="buttonMain whiteBg" style="padding: 0; margin: 0;">
                                                                <a href="/{{$freelancer->username}}" class="hireBtn btn-block hire" style="width: 40%;">Full CV</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- un expand btns --}}
                                                    <div class="row" style="border-top:1px solid whitesmoke; width: 100%;">
                                                        <div class="col-md-12 text-center NoDecor" style="background-color: #FDFDFD;">
                                                            <a href="#card{{$freelancer->id}}" id="minimize{{$freelancer->id}}" class="Minimize" >
                                                                <div class="cardLabel_interviews" style="padding-top: 15px;height:52px;">
                                                                    <span style="padding-right: 6px; color: grey;">Minimize</span>
                                                                    <img src="resumeApp/resources/views/customTheme/images/close_menu.png" alt="read more arrow" width="11px" id="portfolioBtnImg">
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    {{-- end of un expand btns --}}

                                                </div>
                                                {{-- education --}}
                                                <div class="row resumeExpand d-none" id="area_viewEducationBtn{{$freelancer->id}}">
                                                    <div id="about" class="education">
                                                        <div class="row">
                                                            <div class="offset-lg-1 col-lg-5 col-md-6 educationSection">
                                                                <img src="resumeApp/resources/views/customTheme/images/newResume/education.png" alt="aboutImg" width="30px;">
                                                                <span class="aboutText">EDUCATION</span>
                                                                <div class="aboutText">
                                                                    <? if(!empty($freelancer->userData->eduTitle1)):?>
                                                                    <div class="row">
                                                                        <div class="col-md-12 aboutSubText">
                                                                            <div class="year"><span class="circle"></span> {{$freelancer->userData->eduYear1}}</div>
                                                                            <div class="title">{{$freelancer->userData->eduTitle1}}</div>
                                                                            <div class="desc">{{$freelancer->userData->eduDesc1}}</div>
                                                                        </div>
                                                                    </div><br/>
                                                                    <? endif; ?>
                                                                    <? if(!empty($freelancer->userData->eduTitle2)):?>
                                                                    <div class="row">
                                                                        <div class="col-md-10 aboutSubText">
                                                                            <div class="year"><span class="circle"></span> {{$freelancer->userData->eduYear2}}</div>
                                                                            <div class="title">{{$freelancer->userData->eduTitle2}}</div>
                                                                            <div class="desc">{{$freelancer->userData->eduDesc2}}</div>
                                                                        </div>
                                                                    </div><br/>
                                                                    <? endif; ?>
                                                                    <? if(!empty($freelancer->userData->eduTitle3)):?>
                                                                    <div class="row">
                                                                        <div class="col-md-10 aboutSubText">
                                                                            <div class="year"><span class="circle"></span> {{$freelancer->userData->eduYear3}}</div>
                                                                            <div class="title">{{$freelancer->userData->eduTitle3}}</div>
                                                                            <div class="desc">{{$freelancer->userData->eduDesc3}}</div>
                                                                        </div>
                                                                    </div>
                                                                    <? endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-5">
                                                                <img src="resumeApp/resources/views/customTheme/images/newResume/trainings.png" alt="aboutImg" width="30px;">
                                                                <span class="aboutText">TRAININGS</span>
                                                                <div class="aboutText">
                                                                    <? if(!empty($freelancer->userData->trnTitle1)):?>
                                                                    <div class="row">
                                                                        <div class="col-md-12 aboutSubText">
                                                                            <div class="year"><span class="circle"></span> {{$freelancer->userData->trnYear1}}</div>
                                                                            <div class="title">{{$freelancer->userData->trnTitle1}}</div>
                                                                            <div class="desc">{{$freelancer->userData->trnDesc1}}</div>
                                                                        </div>
                                                                    </div><br/>
                                                                    <? endif; ?>
                                                                    <? if(!empty($freelancer->userData->trnTitle3)):?>
                                                                    <div class="row">
                                                                        <div class="col-md-10 aboutSubText">
                                                                            <div class="year"><span class="circle"></span> {{$freelancer->userData->trnYear2}}</div>
                                                                            <div class="title">{{$freelancer->userData->trnTitle2}}</div>
                                                                            <div class="desc">{{$freelancer->userData->trnDesc2}}</div>
                                                                        </div>
                                                                    </div><br/>
                                                                    <? endif; ?>
                                                                    <? if(!empty($freelancer->userData->trnTitle3)):?>
                                                                    <div class="row">
                                                                        <div class="col-md-10 aboutSubText">
                                                                            <div class="year"><span class="circle"></span> {{$freelancer->userData->trnYear3}}</div>
                                                                            <div class="title">{{$freelancer->userData->trnTitle3}}</div>
                                                                            <div class="desc">{{$freelancer->userData->trnDesc3}}</div>
                                                                        </div>
                                                                    </div>
                                                                    <? endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr style="width: 85%">
                                                    {{-- work exp --}}
                                                    <div id="about" class="education">
                                                        <div class="row">
                                                            <div class="offset-lg-1 col-lg-5 col-md-6 educationSection">
                                                                <img src="resumeApp/resources/views/customTheme/images/newResume/what_i_do.png" style="padding-bottom: 10px;" alt="aboutImg" width="30px;">
                                                                <span class="aboutText">WORK OVERVIEW</span>
                                                                <?php
                                                                $works = $freelancer->worksHistory;
                                                                ?>
                                                                <div class="aboutText">
                                                                    <? foreach ($works as $work):?>
                                                                    <div class="row">
                                                                        <div class="col-md-12 aboutSubText">
                                                                            <div class="title work">
                                                                                <span class="circle"></span>
                                                                                {{$work->job_title}}
                                                                            </div>
                                                                            <div class="company">{{$work->company}}</div>
                                                                            <div class="year"><span class="work">
                                    {{date('F Y', strtotime($work->date_from))}}
                                                                                    <? if($work->currently_working):?>
                                                                                    - Present
                                                                                    <? else: ?>
                                                                                    - {{date('F Y', strtotime($work->date_to))}}
                                                                                    <? endif;?>
                                </span>
                                                                            </div>
                                                                            <div class="desc">{{$work->job_description}}</div>
                                                                        </div>
                                                                    </div>
                                                                    <? endforeach;?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- un expand btns --}}
                                                    <div class="row" style="border-top:1px solid whitesmoke; ">
                                                        <div class="col-md-12 text-center NoDecor" style="background-color: #FDFDFD;">
                                                            <a href="#card{{$freelancer->id}}" id="minimize{{$freelancer->id}}" class="Minimize" >
                                                                <div class="cardLabel_interviews" style="padding-top: 15px;height:52px;">
                                                                    <span style="padding-right: 6px; color: grey;">Minimize</span>
                                                                    <img src="resumeApp/resources/views/customTheme/images/close_menu.png" alt="read more arrow" width="11px" id="portfolioBtnImg">
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    {{-- end of un expand btns --}}
                                                </div>
                                            <br>
                                        @endforeach
                                    </div>
                                </div>
                            </th>
                            <td>
                            </td>
                            <td>
                                <a class="btn panelFormLabel deleteSearch" id="{{$value['id']}}">
                                    x
                                </a>
                            </td>

                        </tr>

                        {{-- modals --}}
                            {{-- audio modal--}}
                            <div class="modal fade" style="background-color:rgba(255, 255, 255, 0.95);" id="{{$freelancer->id}}_audio_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="row">
                                    <div class="col-md-12 text-center" style="padding-top: 20px;">
                                        <img src="/resumeApp/resources/views/customTheme/images/newResume/123wf_logo.png" alt="logo" width="250">
                                    </div>
                                </div>
                                <div class="modal-dialog modal-lg" role="document" style="max-width: 400px;">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6" style="padding-left: 35px; padding-top: 15px;">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="cardIconsCon">
                                                                <span style="border-right: 2px white solid; padding-right: 5px">
                                                                    <img src="/resumeApp/resources/views/customTheme/images/transcript.png"
                                                                         alt="" width="20px;">
                                                                </span>
                                                                <span style="padding-left: 5px;">
                                                                    <img src="/resumeApp/resources/views/customTheme/images/mic.png"
                                                                         alt="" width="20px">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8 ">
                                                            <div class="modal-card-name">
                                                                {{$freelancer->firstName}}
                                                                {{$freelancer->lastName}}
                                                            </div>
                                                            <div class="modal-card-subName">
                                                                Audio
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?
                                            $valid = true;
                                            $notValidText = 'NOT-VALID-LINK';
                                            if ($freelancer->userData->audio == $notValidText) {
                                                $valid = false;
                                            }
                                            $audioSrc = "";
                                            if(!empty(trim($freelancer->userData->audioFile))){
                                                $audioSrc = $freelancer->userData->audioFile;
                                            }else{
                                                if($valid){
                                                    $audioSrc = "https://drive.google.com/uc?export=download&id=".$freelancer->userData->audio."&key=AIzaSyC0bK_7ASw3QylYDzs_Pqo_TeoI7jfFj8M";
                                                }else{
                                                    $audioSrc = "" ;
                                                }
                                            }
                                            ?>
                                            <div class="row card-audio-con">
                                                <div class="col-md-6 offset-md-3 text-center">
                                                    <audio controls>
                                                        <source src="{{$audioSrc}}" type="audio/ogg">
                                                        Your browser does not support the audio element.
                                                    </audio>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- video modal--}}
                            <div class="modal fade" style="background-color:rgba(255, 255, 255, 0.95);" id="{{$freelancer->id}}_video_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="row">
                                    <div class="col-md-12 text-center" style="padding-top: 20px;">
                                        <img src="/resumeApp/resources/views/customTheme/images/newResume/123wf_logo.png" alt="logo" width="250">
                                    </div>
                                </div>
                                <div class="modal-dialog modal-lg" role="document" style="max-width: 400px;">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6" style="padding-left: 35px; padding-top: 15px;">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="cardIconsCon2">
                                                                    <span style="padding: 5px;">
                                                                        <img src="/resumeApp/resources/views/customTheme/images/video.png" alt="" width="25px">
                                                                    </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8 ">
                                                            <div class="modal-card-name">
                                                                {{$freelancer->firstName}}
                                                                {{$freelancer->lastName}}
                                                            </div>
                                                            <div class="modal-card-subName">
                                                                Video
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($freelancer->userData->video_file !== null)
                                                    <div class="row card-audio-con"  style="background-color: white;">
                                                        <div class="col-md-12">
                                                            <div class="text-center">
                                                                <video width="100%" id="videoResume" height="auto" controls>
                                                                    <source src="{{$freelancer->userData->video_file}}">
                                                                </video>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($freelancer->userData->video !== null)
                                                    <div class="row card-audio-con" style="background-color: white;">
                                                        <div class="col-md-12">
                                                            <div class="text-center">
                                                                <iframe src="{{$freelancer->userData->video}}" frameborder="1" allow="encrypted-media" allowfullscreen width="100%" height="auto">

                                                                </iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    @endforeach

               </tbody>
           </table>

           <script>
               let stripe_buttons = document.getElementsByClassName("stripe-button-el");
               for (let i = 0; i < stripe_buttons.length; ++i) {
                   let item = stripe_buttons[i];
                   item.style.display = 'none';
               }
           </script>
       @else
           <b class="pageSubHeading text-left" style="font-size: 14px;">You don't have any saved searches at the moment</b>
       @endif

   </div>


@endsection