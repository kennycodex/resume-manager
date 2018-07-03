<div role="tabpanel" class="panel tab-pane fade" id="portfolio">
    <div class="panelHeading">
        <ul>
            <li>
                Portfolio
            </li>
        </ul>
    </div>
    <div class="row">
        <? if($profession == 'Developer'):?>
        <div class="form-group col-md-6">
            <label for="birth_date" class="panelFormLabel">Github link <span id="tickMarkgithubLink" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
            <input type="text" class="form-control panelFormInput" name="githubLink" value="{{$github}}">
        </div> <!-- git link -->
        <div class="form-group col-md-6">
            <label for="birth_date" class="panelFormLabel">Stack overflow Link <span id="tickMarkstackoverflowLink" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
            <input type="text" class="form-control panelFormInput" name="stackoverflowLink" value="{{$stackoverflow}}">
        </div> <!-- stack link -->
        <?else:?>
        {{-- Designer --}}
        <div class="form-group col-md-6">
            <label for="behanceLink" class="panelFormLabel"> Behance Link <span id="tickMarkbehanceLink" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
            <input type="text" class="form-control panelFormInput" name="behanceLink" value="{{$behanceLink}}">
        </div> <!-- Behance Link -->
        <div class="form-group col-md-6">
            <label for="birth_date" class="panelFormLabel"> Instagram Link <span id="tickMarkinstagramLink" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
            <input type="text" class="form-control panelFormInput" name="instagramLink" value="{{$instagramLink}}">
        </div> <!-- Instagram Link -->
        <div class="form-group col-md-6">
            <label for="birth_date"class="panelFormLabel"> Dribble Link <span id="tickMarkdribbleLink" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
            <input type="text" class="form-control panelFormInput" name="dribbleLink" value="{{$dribbleLink}}">
        </div> <!-- Dribble link -->
        <? endif;?>
        <div class="form-group col-md-6">
            <label for="birth_date" class="panelFormLabel"> Personal Website Link <span id="tickMarkpersonalSite" class="d-none"><img src="resumeApp/resources/views/customTheme/images/Shape.png" width="15px;" height="12px;"></span></label>
            <input type="text" class="form-control panelFormInput" name="personalSite" value="{{$personalSite}}">
        </div> <!-- site link -->
    </div> <hr>

    <div class="form-group row">
        {{-- Developer --}}
        <label class="col-md-12" style="border-bottom:1px lightgray solid ; padding: 5px;">Please Upload 8 examples of your  <? if($profession == 'Developer'):?>development<?else:?>design<?endif;?> work (800 wide x 600 high)</label>

        @for($i=0;$i<8;$i++)
            <?
            $deleteBtn = false;
            $src = 'resumeApp/resources/views/customTheme/images/no-foto.png';
            $uploadBtn = 'Choose';
            foreach ($works as $work){
                if(strpos($work , 'works'.$i) !== false ){
                    $src = $work;
                    $deleteBtn = true;
                    $uploadBtn = 'Change';
                }
            }

            ?>
            <div class="input-group col-md-3">
                <div class="row">
                    <div class="col-md-10">
                        <div class="custom-file" id="customFile{{$i}}" style=" display: block; padding-top: 5px;">
                            <input type="file" class="custom-file-input" id="works{{$i}}" name="works{{$i}}" value="">
                            <label class="custom-file-label" for="">{{$uploadBtn}}</label>
                        </div>
                    </div>
                    @if($deleteBtn)
                        <div class="col-md-1">
                            <p class="btn btn-block btn-danger btn-sm" style="width:33px;height:25px;margin-left: 1px;" id="deletePhoto{{$i}}">X</p>
                        </div>
                    @endif
                </div>
                <div style="display:block;">
                    <img src="{{$src}}" id="portfolioImg{{$i}}"  width="220" height="200" style="padding: 10px;">
                </div>
                <div class="form-group col-md-12">
                    <textarea class="form-control" rows="2" name="workDesc{{$i}}" placeholder="Describe your work">{{$workDesc[$i]}}</textarea>
                </div>
            </div>
        @endfor
    </div>      <!-- works -->

    <div class="row">
        <div class="buttonMain col-md-3 offset-md-9">
            <a class="btn-block hireBtn nextBtn"  href="#skills">Next</a>
        </div>
    </div>
</div>