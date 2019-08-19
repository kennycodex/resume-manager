<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>123workforce</title>

  <link href="https://fonts.googleapis.com/css?family=Nunito:400,700&display=swap" rel="stylesheet">

  @include('layouts.includes.styles')
</head>
<body class="home">
  <?
    $curPage = url()->current();
    $admin = false;
    $isClient = true;

    if(strpos($curPage, 'client') !== false){
        $curPage = 'client';
    }else{
        $curPage = 'home';
    }

    $user = auth()->user();
    if($user){
        if($user->admin == 1){
            $admin = true;
        }
    }

    if(auth()->guard('client')->guest()){
        $isClient = false;
    }

  ?>
  <img src="/images/home/mainBg-designers.svg" alt="" class="topBg">
  <div id="app">
    <nav class="navbar nav-home-designers">
        <a href="{{ url('/') }}">
          <img class="logo hideOnSm" src="/images/home/123workforce.png" alt="logo">
          <img class="logo showOnSm" src="/images/home/icon123.png" alt="" />
        </a>
        {{-- <button class="navbar-toggler" id="navBarToggle" type="button" data-toggle="collapse" style="border: none;" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="background-image: url('/images/newResume/menu.png');"></span>
        </button> --}}

        <div id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav">
                
            </ul>

            <!-- Right Side Of Navbar -->
            <li class="navbar-nav chatWithUsText">
                <? if($admin || (session()->get('admin') && session()->get('admin') == 'AdminWasHere')):?>
                <a class="nav-item nav-link customNavLink" href="/admin" style="color:#0290D8;">Admin-area</a>
                <?else :?>
                {{--<a class="nav-item nav-link customNavLink" href="#chatOn" id="liveChat" style="color:#0290D8;">--}}
                    {{--<img src="/images/textsms_24px.png" alt="chat img" width="16px">--}}
                    {{--&nbsp; Chat with us!--}}
                {{--</a>--}}
                <? endif;?>
            </li>
            <ul class="navbar-nav">
                <!-- Authentication Links -->
                {{-- if guest : --}}
                <?php if(!$isClient): ?>
                    
                    <a class="nav-item customNavLink nav-link text-blue" href="{{ route('client.login') }}" data-toggle="modal" data-target="#loginModal" ><b style="font-weight: 500;">{{ __('LOG IN') }}</b></a>
                <? else: ?>
                    <a class="nav-item nav-link customNavLink" href="/chat-room" style="color:#0290D8;">
                        Messaging
                        <span id="MessagingClient{{Auth::guard('client')->user()->id}}" class="unread" style="margin-left: 0;">
                            {{Auth::guard('client')->user()->unreadMessages()}}
                        </span>
                    </a>
                    <a class="nav-item nav-link customNavLink" href="/client">
                        {{ Auth::guard('client')->user()->name }}
                    </a>
                    <a class="nav-item nav-link customNavLink" href="{{ route('client.logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('client.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                <? endif;?>
                <a class="nav-item nav-link customNavLink text-blue hideOnSm" href="#" data-toggle="modal" data-target="#talkToSales"><b style="font-weight: 500;">TALK TO SALES</b></a>
            <? if(!$isClient): ?>
                    <li class="nav-link registerBtn">
                        <a href="/client/register/"
                          data-toggle="modal" 
                          data-target="#exampleModalCenter">{{ __('BECOME A CLIENT') }}</a>
                    </li>
                <? else: ?>
                    <a class="nav-item nav-link customNavLink" href="/chat-room" style="color:#0290D8;">
                        Messaging
                        <span id="MessagingClient{{Auth::guard('client')->user()->id}}" class="unread" style="margin-left: 0;">
                            {{Auth::guard('client')->user()->unreadMessages()}}
                        </span>
                    </a>
                    <a class="nav-item nav-link customNavLink" href="/client">
                        {{ Auth::guard('client')->user()->name }}
                    </a>
                    <a class="nav-item nav-link customNavLink" href="{{ route('client.logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('client.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                <? endif;?>
            </ul>
        </div>
    </nav>

    <div class="mainSection flex-column">
      <h1 class="mainSection__title">Search and hire awesome freelance designers</h1>
      <div class="mainSection__content">
        <div class="mainSection__content__description">
          Product designers <span class="gold-divider"></span>
          Illustrators <span class="gold-divider"></span>
          UX/UI designers <br />
          Motion designers <span class="gold-divider"></span>
          Digital artists
        </div>
      </div>
    </div>
    <div id="freelancers_container">
      <freelancers-container :freelancers="{{ json_encode($agents) }}"></freelancers-container>
    </div>
  </div>
  @include('layouts.includes.modals')
  @include('layouts.includes.scripts')
</body>
</html>