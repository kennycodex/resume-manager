{{-- Works section --}}
<div id="work" class="worksSection">
    <div class="row firstPart">
        <div class="offset-lg-1 col-lg-5 col-md-6">
            <img id="workTextImg" src="resumeApp/resources/views/customTheme/images/newResume/works.png" alt="aboutImg" width="30px;">
            <span class="aboutText" style="color: white;">WORKS</span>
        </div>
        <?
            $workExamples = $user1->projects ;
        ?>
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-12">
                <div class="row">
                    <? foreach ($workExamples as $workExample):?>
                        <div class="col-md-3">
                            <div class="workCard">
                            <div class="workImg" style="height: 150px; overflow: hidden; border-bottom:1px solid lightgray;">
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
                    {{-- modal --}}
                    <div class="modal fade" id="works{{$workExample->id}}Modal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" style="">
                            <div class="modal-content">
                                <div class="modal-body" style="padding: 0;">
                                    <div class="row">
                                        <div class="col-md-9" style="padding: 0;">
                                            <img src="{{$workExample->mainImage}}" alt="" width="100%" height="auto">
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
                    <? endforeach;?>
                </div>
            </div>
        </div>
    </div>
</div>
<hr style="width: 85%">
