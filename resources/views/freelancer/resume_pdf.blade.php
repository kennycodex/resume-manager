<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $agent["firstName"] }} Resume</title>
  <style>
  
    body,
    html {
      padding: 40px;
      padding-bottom: 20px;
      margin: 0;
      font-family: Roboto, Arial, Helvetica, sans-serif;
      position: relative;
    }
    .resume {
      width: 100%;
    }

    .resume__header {
      background: #4E75E8;
      color: white;
      padding: 20px;
      width: 100%;
    }

    .resume__header > * {
      display: inline-block;
    }

    .resume__header__userImg img {
      height: 100px;
      margin-top: 55px;
    }

    .resume__header__userInfo {
      margin-left: 20px;
      margin-top: 10px;
      max-width: 200px;
    }

    .resume__header__invoiceData {
      background-color: #4367D3;
      padding: 0 50px;
      border-radius: 5px;
      width: 250px;
      height: 55px;
      float: right;
      margin-top: 50px;
    }

    .resume__header__invoiceData table {
      width: 100%;
      margin-top: 5px;
    }

    .resume__header__invoiceData td {
      text-align: center;
    }

    .resume__header__invoiceData .little {
      font-size: 11px;
      margin-top: 3px;
    }

    .resume__header__invoiceData .value {
      font-size: 18px;
      margin-top: 7px;
    }

    .resume__header__invoiceData p {
      width: 100%;
      margin: 0;
      text-align: center;
    }


    /* Content */
    .resume__content {
      width: 100%;
      padding: 20px 0;
    }

    .resume__content__titleWrapper {
      text-align: center;
      color: #4E75E8;
      position: relative;
    }
    .resume__content section {
      margin-top: 40px;
    }

    .resume__content__titleWrapper .title {
      margin-bottom: 10px;
      font-size: 20px;
    }

    .resume__content__titleWrapper .decorator {
      margin: 0 auto;
      height: 5px;
      background: #4E75E8;
      width: 100px;
    }


    .resume__content__details {
      margin-top: 0;
      color: #6d6d6d;
    }

    .resume__content__details .container {
      margin-top: 40px;
    }

    .resume__content__details__subtitle {
      color: #4E75E8;
      margin-bottom: 15px;
    }

    .resume__content__details .skillName,
    .resume__content__details .skillBar {
      margin: 10px 0;
    }

    .resume__content__details .skillName {
      font-size: 12px;
    }

    .resume__content__details .skillBar {
      width: 100%;
    }

    .resume__content__details .skillBar .right {
      background: #4367D3;
      width: 50%;
      height: 3px;
      float: right;
    }

    .resume__content__details .skillBar .left {
      width: 50%;
      height: 3px;
      background: #f6f6f6;
      float: right;
    }

    .resume__content__details__companyName {
      color: #515151;
      font-weight: bold;
    }

    .resume__content__details__workDate,
    .resume__content__details__educationDate {
      margin: 10px 0;
    }

    .resume__content__details__workDetails,
    .resume__content__details__educationDetails {
      margin-top: 10px;
      margin-bottom: 20px;
    }

  </style>
</head>
<body>

  <?
    $auxDateStart = new \DateTime();
    $auxDateEnd = new \DateTime();
  ?>

  <main class="resume">
    <header class="resume__header">
      <picture class="resume__header__userImg">
        <img src="{{public_path().$user_data['photo']}}" alt="">
      </picture>
      <div class="resume__header__userInfo">
        <h2>{{ $agent['firstName'].' '.$agent["lastName"] }}</h2>
        <p>{{ $user_data["job_title"] }}</p>
      </div>

      <div class="resume__header__invoiceData">
        <table>
          <tr class="resume__header__invoiceData__hourlyRate">
            <td class="value"><b>{{ number_format(floatval($user_data["salary"]), 2) }}</b></td>
            <td class="value"><b>{{ intval($user_data["availableHours"]) }} hours</b></td>
          </tr>
          <tr class="resume__header__invoiceData__weeklyAvailability">
            <td class="little">hourly rate</td>
            <td class="little">week availability</td>
          </tr>
        </table>
      </div>

    </header>

    <div class="resume__content">

      @if (!empty($skills))
        <section>
          <div class="resume__content__titleWrapper">
            <div class="title">Skills</div>
            <div class="decorator"></div>
          </div>

          <?
            function isProgrammingSkill ($item_values) {
              return ($item_values['type'] == 'programming' ? true : false);
            }

            function isFrameworkOrDatabaseSkill ($item_values) {
              return ($item_values['type'] == 'framework' || $item_values['type'] == 'database' ? true : false);
            }

            function isSoftwareSkill ($item_values) {
              return ($item_values['type'] == 'software' ? true : false);
            }

            function isDesignSkill ($item_values) {
              return ($item_values['type'] == 'design' ? true : false);
            }

            $programmingSkills = array_filter($skills, 'isProgrammingSkill');
            $frameworkOrDatabaseSkills = array_filter($skills, 'isFrameworkOrDatabaseSkill');
            $softwareSkills = array_filter($skills, 'isSoftwareSkill');
            $designSkills = array_filter($skills, 'isDesignSkill');
          ?>

          <div class="resume__content__details">
            @if(count($programmingSkills) > 0)
            <div class="container">
              <div class="resume__content__details__subtitle">Programming Languages</div>
              @foreach ($programmingSkills as $skill)
                <div class="skillName">{{ $skill['skill_title'] }}</div>

                <div class="skillBar">
                  <div class="left"></div>
                  <div class="right"></div>
                </div>
              @endforeach
            @endif
            </div>

            @if(count($frameworkOrDatabaseSkills) > 0)
              <div class="container">
                <div class="resume__content__details__subtitle">Frameworks / Databases</div>
                @foreach ($frameworkOrDatabaseSkills as $skill)
                  <div class="skillName">{{ $skill['skill_title'] }}</div>
    
                  <div class="skillBar">
                    <div class="left"></div>
                    <div class="right"></div>
                  </div>
                @endforeach
              @endif
              </div>
            
            @if(count($softwareSkills) > 0)
              <div class="container">
                <div class="resume__content__details__subtitle">Software</div>
                @foreach ($softwareSkills as $skill)
                  <div class="skillName">{{ $skill['skill_title'] }}</div>
    
                  <div class="skillBar">
                    <div class="left"></div>
                    <div class="right"></div>
                  </div>
                @endforeach
              @endif
              </div>
            
            @if(count($designSkills) > 0)
              <div class="container">
                <div class="resume__content__details__subtitle">Design Skills</div>
                @foreach ($designSkills as $skill)
                  <div class="skillName">{{ $skill['skill_title'] }}</div>
    
                  <div class="skillBar">
                    <div class="left"></div>
                    <div class="right"></div>
                  </div>
                @endforeach
              @endif
              </div>
          </div>
        </section>
      @endif

      @if (!empty($worksHistory))
          
        <section>
          <div class="resume__content__titleWrapper">
            <div class="title">Work</div>
            <div class="decorator"></div>
          </div>

          <div class="resume__content__details">
            @foreach ($worksHistory as $work)
              <section>
                <div class="resume__content__details__companyName">
                  {{ $work['company'] }}
                </div>
                <div class="resume__content__details__workDate">
                  <?
                    $auxDateStart->setTimestamp($work['date_from']);
                    if (!$work['currently_working']) {
                      $auxDateEnd->setTimestamp($work['date_end']);
                    }
                  ?>                
                  {{ date_format($auxDateStart, 'F\' Y') }} - {{ ($work['currently_working']) ? 'Now' : date_format($auxDateEnd, 'F\' Y')  }}
                </div>
                <div class="resume__content__details__workDetails">
                  <i>{{ $work['job_title'] }}</i>
                  <br />
                  {{ $work['job_description'] }}
                </div>
              </section>
            @endforeach
          </div>
        </section>
      @endif

      @if (!empty($educationHistory))
        <section>
          <div class="resume__content__titleWrapper">
            <div class="title">Education</div>
            <div class="decorator"></div>
          </div>

          <div class="resume__content__details">
            @foreach ($educationHistory as $education)
              <section>
                <div class="resume__content__details__companyName">
                    {{ $education['school_title'] }}
                </div>
                <div class="resume__content__details__educationDate">
                  <?
                    $auxDateStart->setTimestamp($education['date_from']);
                    if (!$education['currently_learning']) {
                      $auxDateEnd->setTimestamp($education['date_end']);
                    }
                  ?>                   
                  {{ date_format($auxDateStart, 'F\' Y') }} - {{ ($education['currently_learning']) ? 'Now' : date_format($auxDateEnd, 'F\' Y')  }}
                </div>
                <div class="resume__content__details__educationDetails">
                  {{ $education['description'] }}
                </div>
              </section>
            @endforeach
          </div>
        </section>
      @endif
    </div>
  </main>

  
</body>
</html>