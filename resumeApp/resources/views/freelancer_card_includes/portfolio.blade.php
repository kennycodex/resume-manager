{{-- Portfolio --}}
<div class="portfolioRow">

    {{-- carousel controls --}}
    <div class="row" style="width: 100%;">
        <div class="col-2 NoDecor text-center">
            <a href="javascript:void(0)"  data-target="#carouselExampleControls" data-slide-to="4" role="button" data-slide="prev" class="cardLabel_interviews noScroll"
               style="color:#697786;">
                <img src="/resumeApp/resources/views/customTheme/images/newResume/prev.png"
                     alt="prev" width="25px">
            </a>
        </div>
        <div class="col-8 text-center">
            <span class="cardLabel">Portfolio</span>
        </div>
        <div class="col-2 NoDecor text-center">
            <a href="javascript:void(0)"  data-target="#carouselExampleControls" data-slide-to="4" role="button" data-slide="next" class="cardLabel_interviews noScroll"
               style="color:#697786;">
                <img src="/resumeApp/resources/views/customTheme/images/newResume/next.png"
                     alt="next" width="25px">
            </a>
        </div>
    </div>
    {{--end of carousel controller--}}

    <?
    $workExamples =\App\Project::where('user_id',$freelancer->id)->orderBy('order','ASC')->get();
    $i = 0;
    $maxNumberOfWorks = 50;
    $firstSlideWorks = [];
    $secondSlideWorks = [];
    $thirdSlideWorks = [];
    $fourthSlideWorks = [];
    ?>
    @if($workExamples)
        <? foreach ($workExamples as $workExample):?>
        <? if ($i >= $maxNumberOfWorks) {
            break;
        }
        if (!$workExample->isActive) {
            continue;
        }

        if ($i < 2) {
            $firstSlideWorks[] = $workExample;
        } elseif ($i < 4) {
            $secondSlideWorks[] = $workExample;
        } elseif ($i < 6) {
            $thirdSlideWorks[] = $workExample;
        } elseif ($i < 8) {
            $fourthSlideWorks[] = $workExample;
        }
        ?>
        {{-- modal --}}
        <div class="modal fade" id="works{{$workExample->id}}Modal" tabindex="-1"
             role="dialog"
             aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document" style="">
                <div class="modal-content modal-mobile-resume" data-dismiss="modal"
                     aria-label="Close">
                    <div class="modal-body" style="padding: 0;">
                        <div class="row">
                            <div class="col-md-9" style="padding: 0;">
                                <img src="/{{$workExample->mainImage}}" alt=""
                                     width="100%" height="auto">
                                <?
                                // more images
                                $moreImagesArr = explode(',', $workExample->images);
                                foreach($moreImagesArr as $image){
                                if(!empty(trim($image))){
                                ?>
                                @if(strpos($image, 'embed') !== false)
                                    <iframe height="400" width="100%" src="{{$image}}?bgcolor=%23191919" allowfullscreen autoplay style="margin: 0px auto; display: block;"></iframe>
                                @else
                                    <img src="{{$image}}" alt="" width="100%" height="auto">
                                @endif

                                <?}
                                }?>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group" style="padding-top: 25px;">
                                    <label class="panelFormLabel"> Description
                                        <hr>
                                    </label><br/>
                                    <div class="panelFormLabel">
                                        {{$workExample->projectDesc}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="panelFormLabel"> Link
                                        <hr>
                                    </label><br/>
                                    @if(!empty($workExample->link))
                                        <a href="{{$workExample->link}}" onclick="javascript:window.location='{{$workExample->link}}'">
                                            Project Link
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <? $i++;?>
        <? endforeach;?>
    @endif

    {{-- works section carousel --}}
    <div id="carouselExampleControls" class="carousel slide d-md-block" data-ride="carousel"
         data-interval="false">
        <div class="carousel-inner">
            @if(!empty($firstSlideWorks))
                <div class="carousel-item active">
                    <div class="row">
                        @foreach($firstSlideWorks as $workExample)
                            <div class="col-md-6">
                                <div class="workCard" style="margin-left: 0">
                                    <div class="workImg">
                                        <a href="javascript:void(0)" data-toggle="modal" style="outline: none;"
                                           data-target="#works{{$workExample->id}}Modal">
                                            <img src="/{{$workExample->mainImage}}" alt="work img"
                                                 width="260" >
                                        </a>
                                    </div>
                                    <div class="workTitle">
                                        <div class="row">
                                            <div class="col-md-9">
                                                {{$workExample->projectName}}
                                            </div>
                                            <a class="col-md-2" href="javascript:void(0)"
                                               data-toggle="modal"
                                               data-target="#works{{$workExample->id}}Modal"
                                               style="outline: none;">
                                                <img src="/resumeApp/resources/views/customTheme/images/newResume/link.png"
                                                     alt="view work">
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
                                    <div class="workImg">
                                        <a href="javascript:void(0)" data-toggle="modal" style="outline: none;"
                                           data-target="#works{{$workExample->id}}Modal">
                                            <img src="/{{$workExample->mainImage}}" alt="work img"
                                                 width="260" >
                                        </a>
                                    </div>
                                    <div class="workTitle">
                                        <div class="row">
                                            <div class="col-md-9">
                                                {{$workExample->projectName}}
                                            </div>
                                            <a class="col-md-2" href="javascript:void(0)"
                                               data-toggle="modal"
                                               data-target="#works{{$workExample->id}}Modal"
                                               style="outline: none;">
                                                <img src="/resumeApp/resources/views/customTheme/images/newResume/link.png"
                                                     alt="view work">
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
                                    <div class="workImg">
                                        <a href="javascript:void(0)" data-toggle="modal" style="outline: none;"
                                           data-target="#works{{$workExample->id}}Modal">
                                            <img src="/{{$workExample->mainImage}}" alt="work img"
                                                 width="260" >
                                        </a>
                                    </div>
                                    <div class="workTitle">
                                        <div class="row">
                                            <div class="col-md-9">
                                                {{$workExample->projectName}}
                                            </div>
                                            <a class="col-md-2" href="javascript:void(0)"
                                               data-toggle="modal"
                                               data-target="#works{{$workExample->id}}Modal"
                                               style="outline: none;">
                                                <img src="/resumeApp/resources/views/customTheme/images/newResume/link.png"
                                                     alt="view work">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            @if(!empty($fourthSlideWorks))
                <div class="carousel-item row">
                    <div class="row">
                        @foreach($fourthSlideWorks as $workExample)
                            <div class="col-md-6">
                                <div class="workCard" style="margin-left: 0">
                                    <div class="workImg">
                                        <a href="javascript:void(0)" data-toggle="modal" style="outline: none;"
                                           data-target="#works{{$workExample->id}}Modal">
                                            <img src="/{{$workExample->mainImage}}" alt="work img"
                                                 width="260" >
                                        </a>
                                    </div>
                                    <div class="workTitle">
                                        <div class="row">
                                            <div class="col-md-9">
                                                {{$workExample->projectName}}
                                            </div>
                                            <a class="col-md-2" href="javascript:void(0)"
                                               data-toggle="modal"
                                               data-target="#works{{$workExample->id}}Modal"
                                               style="outline: none;">
                                                <img src="/resumeApp/resources/views/customTheme/images/newResume/link.png"
                                                     alt="view work">
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

</div>


{{-- end of portfolio --}}