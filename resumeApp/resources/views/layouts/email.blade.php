<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(0deg, #FFFFFF 0%, #FCFCFC 100%);
            overflow-x: hidden;
            width: 100%; }

        .customContainer {
            padding: 0 0 0 8.50%; }
        @media only screen and (max-width: 600px) {
            .customContainer {
                padding: 0; } }

        .customNav {
            -webkit-box-shadow: 0 8px 6px -6px #999;
            -moz-box-shadow: 0 8px 6px -6px #999;
            box-shadow: 0 8px 6px -6px #999;
            background-color: white; }

        .customNavLink {
            opacity: 0.75;
            color: #637280 !important;
            font-family: Roboto !important;
            font-size: 15px;
            letter-spacing: 0.2px;
            line-height: 16px;
            text-align: center; }
        .customNavLink.active {
            color: #18A6DF !important;
            border-bottom: #AC81FC 2px solid;
            opacity: 1;
            font-weight: 300;
            padding-bottom: 10px; }

        .navbar-brand img {
            width: 75%; }

        .navbar-collapse.collapse.in {
            display: block !important; }

        .loginBtnHolder {
            margin-left: auto; }

        .loginBtn {
            padding: 6px 25px 7px 25px;
            border: 1px solid rgba(24, 166, 223, 0.3);
            border-radius: 25px;
            margin-right: 35px;
            font-weight: bold;
            margin-left: 300px;
            text-decoration: none !important; }
        @media only screen and (max-width: 600px) {
            .loginBtn {
                margin-right: 0px;
                margin-left: 25%;
                text-align: center;
                width: 50%; } }
        .loginBtn :hover {
            text-decoration: none !important; }

        .nav-link.loginBtn {
            margin-left: 0px;
            width: 100%;
            text-align: center; }

        .freelancerItem {
            margin-top: 2.5%;
            padding-bottom: 10px; }

        .freelancerImg {
            border-radius: 50%;
            padding: 3px;
            border: 2px solid rgba(24, 166, 223, 0.3); }

        .freelancerName {
            color: #30323D;
            font-family: Roboto;
            font-size: 30px;
            font-weight: bold;
            line-height: 35px;
            text-align: center;
            padding: 5px 0 5px 0; }

        .freelancerJob {
            color: #697786;
            font-family: Roboto;
            font-size: 16px;
            line-height: 19px;
            text-align: center; }

        .line {
            background-color: #F8F8F8;
            transform: scaleY(-1);
            padding: 2px 0 0 0;
            margin-top: 5px; }

        .socialIcons {
            text-align: center;
            padding: 10px; }
        .socialIcons img {
            width: 20px; }
        .socialIcons .imgText {
            color: #697786;
            font-family: Roboto;
            font-size: 12px;
            font-weight: 300;
            line-height: 14px;
            padding-left: 5px; }

        .row {
            margin-right: 0 !important;
            margin-left: 0 !important; }

        .buttonMain {
            padding: 5% 0 0 0;
            margin-top: 20px;
            text-decoration: none; }
        @media only screen and (max-width: 600px) {
            .buttonMain {
                text-align: center; } }
        .buttonMain a:hover {
            text-decoration: none; }
        .buttonMain .hireBtn {
            border: 1px solid #44E5EF;
            border-radius: 24px;
            background: linear-gradient(270deg, #45E6EF 0%, #088FD9 100%);
            padding: 13px 0 13px 0;
            color: #FFFFFF;
            font-family: Roboto;
            font-size: 16px;
            font-weight: bold;
            letter-spacing: 0.5px;
            line-height: 19px;
            text-align: center;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.3); }
        .buttonMain .hireBtn.hire {
            background: white;
            color: #088FD9; }

        #quote {
            background: linear-gradient(90deg, #F8F8F8 0%, #FCFCFC 100%);
            margin-top: 5%;
            margin-bottom: 1%;
            padding: 20px; }
        #quote img {
            height: 50px;
            width: 50px;
            opacity: 0.5; }
        #quote .quoteText {
            color: #697786;
            font-family: Roboto;
            font-size: 20px;
            font-weight: 300;
            line-height: 24px; }

        .secondNavLink {
            opacity: 0.75;
            color: #637280;
            font-family: Roboto;
            font-size: 14px;
            letter-spacing: 0.1px;
            line-height: 16px;
            padding-top: 5px;
            padding-right: 10px; }
        .secondNavLink.active {
            color: #18A6DF;
            border-bottom: #AC81FC 2px solid;
            opacity: 1;
            font-weight: 300;
            padding-bottom: 10px; }

        .downCV {
            opacity: 0.75;
            color: #18A6DF;
            font-family: Roboto;
            font-size: 14px;
            letter-spacing: 0.1px;
            line-height: 16px;
            padding-top: 5px;
            margin-left: 400px;
            text-decoration: none !important; }
        @media only screen and (max-width: 600px) {
            .downCV {
                margin-left: 0px; } }
        .downCV :hover {
            text-decoration: none !important; }

        #about {
            margin-top: 5%; }

        .aboutText {
            color: #6A6F72;
            font-family: Roboto;
            font-size: 25px;
            line-height: 29px;
            padding-left: 5px; }

        .aboutSubText {
            color: #697786;
            font-family: Roboto;
            font-size: 20px;
            font-weight: 300;
            line-height: 24px;
            padding-top: 15px; }

        .circle:before {
            content: ' \25CF';
            font-size: 11px;
            color: #FCFCFC;
            border: 1px solid lightgray;
            border-radius: 50%;
            padding: 0 3px 0 3px;
            margin: 3px; }

        @media only screen and (max-width: 600px) {
            .mobileCenter {
                text-align: center;
                margin-right: auto; } }

        #audio {
            background: linear-gradient(90deg, #F8F8F8 0%, #FCFCFC 100%);
            margin-top: 5%;
            margin-bottom: 3%;
            padding: 20px; }
        #audio img {
            height: 50px;
            width: 50px;
            opacity: 0.9; }
        #audio .quoteText {
            color: #697786;
            font-family: Roboto;
            font-size: 20px;
            font-weight: 300;
            line-height: 24px;
            margin-top: 1.5%; }

        .aboutSubText .year {
            color: #697786;
            font-family: Roboto;
            font-size: 20px;
            font-weight: 300;
            line-height: 24px; }
        .aboutSubText .title {
            color: #697786;
            font-family: Roboto;
            font-size: 22px;
            font-weight: 500;
            line-height: 25px;
            padding-left: 20px; }
        .aboutSubText .desc {
            color: #C5A7FD;
            font-family: Roboto;
            font-size: 22px;
            font-weight: 300;
            line-height: 25px;
            padding-left: 20px; }

        .education {
            padding-bottom: 4% !important; }

        .aboutSubText {
            word-wrap: break-word; }
        .aboutSubText .skill {
            color: #697786;
            font-family: Roboto;
            font-size: 20px;
            font-weight: 300;
            line-height: 24px;
            padding-bottom: 0px;
            padding-top: 5px; }
        .aboutSubText .bar {
            padding-top: 7px;
            width: 100%;
            background-color: #CAAFFE; }

        .skillBox {
            border: 1.5px solid #44E5EF;
            opacity: 0.5;
            padding: 6px 20px 6px 20px;
            border-radius: 21.5px;
            text-align: center;
            width: auto;
            margin: 10px; }

        .moreSkills {
            margin-right: 20px;
            padding-top: 25px; }

        .worksSection {
            margin-top: 5%;
            padding-bottom: 5%; }
        .worksSection .firstPart {
            padding-top: 4%;
            padding-bottom: -1%;
            background: url("/background.svg"); }
        .worksSection .worksText {
            color: #FFFFFF;
            font-family: Roboto;
            font-size: 25px;
            line-height: 29px; }

        .workCard {
            background: white;
            margin-top: 2%;
            padding: 2%;
            border: 1px solid #F7F7F7;
            border-radius: 5px;
            background-color: #FFFFFF;
            box-shadow: 0 11px 16px -7px #E5ECED; }
        .workCard .workImg img {
            width: 100%;
            padding: 1%; }
        .workCard .workTitle {
            color: #697786;
            font-family: Roboto;
            font-size: 20px;
            font-weight: 300;
            line-height: 24px;
            padding: 3%; }
        .workCard .workTitle img {
            width: 20px; }

        #ourClients {
            background: linear-gradient(0deg, #FCFCFC 0%, #FCFCFC 100%); }

        .heading h2 {
            color: #6A6F72;
            font-family: Roboto;
            font-size: 25px;
            line-height: 29px;
            padding-top: 2%; }
        .heading h2 img {
            width: 30px; }
        @media only screen and (max-width: 600px) {
            .heading h2 {
                text-align: center;
                padding-right: 14px; } }

        .clientsBox {
            height: 308px;
            border-radius: 5px;
            background-color: #FFFFFF;
            box-shadow: 0 11px 16px -7px #E5ECED;
            margin: 2% 5% 0 5%; }
        .clientsBox .leftSide {
            padding: 4%; }
        @media only screen and (max-width: 600px) {
            .clientsBox {
                height: auto; } }

        .formLabel {
            opacity: .7;
            color: #18A6DF;
            font-family: Roboto;
            font-size: 12px;
            font-weight: bold;
            line-height: 14px; }

        .form {
            padding: 5%; }

        .no-border {
            border-top: 0;
            border-right: 0;
            border-left: 0; }

        .footerText {
            opacity: 0.4;
            color: #000000;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            line-height: 16px; }
        @media only screen and (max-width: 600px) {
            .footerText {
                text-align: center !important;
                padding-top: 10px;
                padding-bottom: 10px; } }

        .customFooter {
            height: 180px;
            padding-top: 6%;
            background: linear-gradient(0deg, #FCFCFC 0%, #FCFCFC 100%); }
        @media only screen and (max-width: 600px) {
            .customFooter {
                height: auto;
                text-align: center; } }
        .customFooter .footerImg img {
            width: 60px;
            opacity: .5; }

        .info {
            color: #697786;
            font-family: Roboto;
            font-size: 20px;
            font-weight: 300;
            line-height: 24px; }

        /*MAP*/
        .location-map {
            border-radius: 5px;
            box-shadow: 0 11px 16px -7px #E5ECED;
            margin-top: 10px; }

        .map-canvas {
            height: 150px; }

        #skills {
            padding-top: 5%; }

        #work {
            padding-top: 4%; }

        .customFormHeader {
            color: #697786;
            font-family: Roboto;
            font-size: 30px;
            font-weight: 300;
            line-height: 35px;
            text-align: center;
            background: linear-gradient(0deg, #FFFFFF 0%, #FCFCFC 100%); }

        .clientForm {
            padding-top: 3%; }
        .clientForm .formLabel {
            color: #A6A9BE;
            font-family: Roboto;
            font-size: 14px;
            letter-spacing: 0.1px;
            line-height: 16px; }
        .clientForm .formLabel a:hover {
            text-decoration: none; }
        .clientForm .buttonMain {
            padding-top: 0; }
        .clientForm .rememberText {
            color: #697786;
            font-family: Roboto;
            font-size: 14px;
            font-weight: bold;
            letter-spacing: 0.1px;
            line-height: 16px; }
        .clientForm .smallText {
            padding-top: 16px;
            color: #A6A9BE;
            font-family: Roboto;
            font-size: 14px;
            letter-spacing: 0.1px;
            line-height: 16px;
            text-align: center; }
        .clientForm .smallText span {
            color: #4A90E2;
            font-family: Roboto;
            font-size: 14px;
            letter-spacing: 0.1px;
            line-height: 16px; }
        .clientForm .smallText span a:hover {
            text-decoration: none; }

        #content {
            /* Freelancers' boxes*/ }
        #content .lineDivider {
            transform: scaleY(-1);
            padding: 3px 0 0 0;
            width: 30px;
            background-color: #30323D;
            margin-top: 8px; }
        #content .line {
            transform: scaleY(-1);
            background-color: whitesmoke;
            padding: 3px 0 0 0; }
        #content #mainSection {
            background: url("/resumeApp/resources/views/customTheme/images/new_theme/rectangle_big.png");
            background-position-x: right;
            background-position-y: 2%;
            background-size: 14% 100%;
            background-repeat: no-repeat;
            border-bottom: 2px solid #F8F8F8;
            padding-bottom: 50px; }
        @media only screen and (max-width: 600px) {
            #content #mainSection {
                background: linear-gradient(0deg, #FFFFFF 0%, #FCFCFC 100%); } }
        #content .mainSectionHeading {
            padding: 12% 0 2% 0;
            color: #30323D;
            font-family: Roboto;
            font-size: 38px;
            font-weight: bold;
            line-height: 44px; }
        #content .mainSectionHeading span {
            color: #18A6DF; }
        @media only screen and (max-width: 600px) {
            #content .mainSectionHeading {
                font-size: 26px;
                font-weight: bold;
                line-height: 30px;
                text-align: center;
                padding-right: 3%;
                padding-left: 3%; } }
        #content .mainSectionSubHeading {
            color: #697786;
            font-family: Roboto;
            font-size: 20px;
            font-weight: 300;
            line-height: 24px;
            padding: 4% 0 2% 0; }
        @media only screen and (max-width: 600px) {
            #content .mainSectionSubHeading {
                font-size: 16px;
                font-weight: 300;
                line-height: 19px;
                text-align: center;
                padding-right: 3%;
                padding-left: 3%;
                padding-top: 12%; } }
        #content .buttonMain {
            padding: 5% 0 0 0;
            text-decoration: none; }
        @media only screen and (max-width: 600px) {
            #content .buttonMain {
                text-align: center;
                padding-top: 13%; } }
        #content .buttonMain a:hover {
            text-decoration: none; }
        #content .buttonMain .hireBtn {
            border: 1px solid #44E5EF;
            border-radius: 24px;
            background: linear-gradient(270deg, #45E6EF 0%, #088FD9 100%);
            padding: 3.5% 20% 3.5% 20%;
            color: #FFFFFF;
            font-family: Roboto;
            font-size: 16px;
            font-weight: bold;
            letter-spacing: 0.5px;
            line-height: 19px;
            text-align: center;
            box-shadow: 0px 8px 15px rgba(0, 0, 255, 0.3); }
        #content .secondSectionHeading {
            padding: 4% 0 2% 0;
            color: #30323D;
            font-family: Roboto;
            font-size: 30px;
            font-weight: bold;
            line-height: 35px; }
        #content .secondSectionHeading span {
            color: #18A6DF; }
        @media only screen and (max-width: 600px) {
            #content .secondSectionHeading {
                padding-left: 5%; } }
        #content .freelancerItem {
            text-decoration: none; }
        #content .slickFreelancerImg {
            border-radius: 50%;
            width: 100%;
            padding: 15px; }
        #content .freelancerBox {
            transition-duration: 300ms; }
        #content .freelancerBox:hover {
            -ms-transform: translateY(-2px);
            /* IE 9 */
            -webkit-transform: translateY(-2px);
            /* Safari */
            transform: translateY(-2px);
            border-radius: 5px;
            background-color: #FFFFFF;
            box-shadow: 0 11px 16px -7px;
            transition-duration: 300ms; }
        #content .textImg {
            display: none;
            position: absolute;
            top: 35%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: gray;
            font-size: 14px; }
        #content .itemLink:hover {
            text-decoration: none; }
        #content .freelancers {
            padding: 25px;
            text-align: left; }
        #content .freelancerName {
            color: #666666;
            font-family: Roboto;
            font-size: 16px;
            font-weight: 500;
            line-height: 19px;
            text-align: center;
            padding-bottom: 10px;
            white-space: nowrap;
            overflow: hidden; }
        #content .freelancerName :hover {
            text-decoration: none; }
        #content .freelancerJob {
            color: #697786;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 300;
            line-height: 16px;
            text-align: center;
            padding-top: 5px;
            white-space: nowrap;
            overflow: hidden; }
        #content .freelancerJob :hover {
            text-decoration: none;
            border: 0px; }
        #content .freelancerData {
            padding: 6px 2px 6px 2px; }
        #content .freelancersHeading {
            font-size: 5vh;
            font-weight: bolder;
            padding-bottom: 35px;
            padding-top: 5px; }
        #content .slickSlide {
            padding-bottom: 25px; }
        #content .slick-next:before {
            color: black; }
        #content .slick-prev:before {
            color: black; }
        #content #freelanceTalent {
            padding: 20px 0 10px 0; }
        #content .talentText {
            color: #697786;
            font-family: Roboto;
            font-size: 20px;
            font-weight: 300;
            line-height: 24px;
            padding-top: 10px; }
        @media only screen and (max-width: 600px) {
            #content .talentText {
                text-align: center; } }
        #content #devDesBoxes {
            margin-top: 10px;
            background: url("/background.svg"); }
        #content .designerBox {
            border-radius: 5px;
            background-color: #FFFFFF;
            box-shadow: 0 11px 16px -7px #E5ECED;
            width: 100%;
            margin-top: 5%; }
        @media only screen and (max-width: 600px) {
            #content #developerBox {
                padding: 20px; } }
        @media only screen and (max-width: 600px) {
            #content #designerBox {
                padding: 20px; } }
        #content .borderRight {
            border-right: 1px solid #ECECEC; }
        @media only screen and (max-width: 600px) {
            #content .borderRight {
                border: 0; } }
        #content .designerLeftSide {
            padding: 18px; }
        #content .designerLeftSide h2 {
            opacity: 0.9;
            color: #464646;
            font-family: Roboto;
            font-size: 14px;
            line-height: 16px;
            padding: 10px;
            margin-right: 10px; }
        @media only screen and (max-width: 600px) {
            #content .designerLeftSide h2 {
                padding: 5px 0 0 0; } }
        #content .designerLeftSide img {
            width: 20%; }
        @media only screen and (max-width: 600px) {
            #content .designerLeftSide img {
                width: 20%; } }
        #content .designerRightSide {
            padding: 20px; }
        #content .designerRightSide h2 {
            opacity: 0.9;
            color: #273D52;
            font-family: Roboto;
            font-size: 25px;
            font-weight: bold;
            line-height: 37px; }
        #content .designerRightSide h2 img {
            width: 7%; }
        #content .designerRightSide a {
            opacity: 0.9;
            color: #18A6DF;
            font-family: Roboto;
            font-size: 14px;
            line-height: 16px; }
        #content .designerRightSide a img {
            width: 2.5%; }
        #content .designerRightSide a :hover {
            text-decoration: none; }
        #content .designerRightSide .getStartBtn {
            border: 1px solid #D9F9FF;
            border-radius: 5px;
            background-color: #FFFFFF;
            color: #18A6DF;
            font-family: Roboto;
            font-size: 14px;
            font-weight: bold;
            line-height: 16px;
            text-align: center;
            padding: 10px;
            margin-top: 13px; }
        #content .designerRightSide .getStartBtn img {
            width: 7%; }
        #content #ourClients {
            padding: 5% 8.5% 0 8.5%; }
        #content .heading h2 {
            color: #18A6DF;
            font-family: Roboto;
            font-size: 30px;
            font-weight: bold;
            line-height: 35px; }
        @media only screen and (max-width: 600px) {
            #content .heading h2 {
                text-align: center;
                padding-right: 14px; } }
        #content .clientsBox {
            height: auto;
            border-radius: 5px;
            background-color: #FFFFFF;
            box-shadow: 0 11px 16px -7px #E5ECED;
            margin: 5% 5% 0 5%; }
        #content .clientsBox .leftSide {
            padding: 4%; }
        @media only screen and (max-width: 600px) {
            #content .clientsBox {
                height: auto; } }
        #content .customFooter {
            height: 180px;
            padding-top: 6%;
            background: whitesmoke; }
        @media only screen and (max-width: 600px) {
            #content .customFooter {
                height: auto;
                text-align: center; } }
        #content .customFooter .footerImg img {
            width: 60px;
            opacity: .5; }
        #content .footerText {
            opacity: 0.4;
            color: #000000;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            line-height: 16px;
            text-align: left; }
        @media only screen and (max-width: 600px) {
            #content .footerText {
                text-align: center !important;
                padding-top: 10px;
                padding-bottom: 10px; } }
        #content .logoImg {
            padding-right: 20px; }
        #content .logoImg img {
            width: 25%;
            padding-top: 10%;
            opacity: .5; }
        #content .designerBtn {
            margin-top: 3%; }
        #content .designerBtn :hover {
            text-decoration: none; }
        #content .designerBtn a {
            border-radius: 4px;
            padding: 5% 0 5% 0;
            opacity: 0.5;
            color: #000000;
            font-family: Roboto;
            font-size: 16px;
            line-height: 19px;
            text-align: center; }
        #content .form {
            padding: 5%; }
        #content .no-border {
            border-top: 0;
            border-right: 0;
            border-left: 0; }

        .modal-body .clientForm .formLabelModal {
            color: #A6A9BE;
            font-family: Roboto;
            font-size: 14px;
            letter-spacing: 0.1px;
            line-height: 16px; }

        .customModal {
            background: red; }

        [id*="tickMark"] {
            color: white;
            background: green;
            font-size: small;
            font-weight: bolder;
            border-radius: 5px;
            padding: 2px 4px 1px 4px;
            margin-left: 10px;
            text-align: center; }

        .registerBody {
            margin-top: 30px; }

        .registerHeading {
            color: gray;
            font-weight: bolder;
            text-align: center;
            margin-top: 30%;
            padding-bottom: 10px; }

        .registerMainText {
            color: black;
            text-align: center;
            padding-bottom: 10px; }

        .infoBar {
            padding-bottom: 20px; }

        .paddingBottomTop {
            padding-bottom: 10px;
            padding-top: 10px; }

        .pageHeading {
            color: #697786;
            font-family: Roboto;
            font-size: 30px;
            font-weight: 300;
            line-height: 35px;
            text-align: center; }

        .pageSubHeading {
            color: #697786;
            font-family: Roboto;
            font-size: 16px;
            font-weight: bold;
            line-height: 19px;
            text-align: center;
            padding-top: 25px; }

        .pageSubHeading2 {
            color: #697786;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 300;
            line-height: 16px;
            text-align: center;
            padding-top: 12px; }

        .tabsArea {
            padding-top: 30px; }
        .tabsArea .tabText {
            opacity: 0.75;
            color: #1C4D75;
            font-family: Roboto;
            font-weight: bold;
            padding-top: 5px; }
        .tabsArea .tabCircle {
            background-color: whitesmoke;
            margin-bottom: 8%;
            max-width: 45px;
            padding: 12px 0px 8px 0px;
            border-radius: 50%; }
        .tabsArea .active .tabCircle {
            background-color: #919CA5; }

        .panel {
            padding: 35px;
            border: 2px whitesmoke solid;
            border-radius: 10px;
            margin-top: 30px; }
        @media only screen and (max-width: 600px) {
            .panel {
                padding: 2px; } }

        .nav-tabs {
            border-bottom: 0 !important; }

        .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
            color: #495057;
            background: linear-gradient(0deg, #FFFFFF 0%, #FCFCFC 100%) !important;
            border: 0 !important; }

        .panelHeading {
            color: #697786;
            font-family: Roboto;
            font-size: 3vh;
            font-weight: 300;
            line-height: 35px;
            padding-bottom: 12px; }

        .panelFormLabel {
            color: #A6A9BE;
            font-family: Roboto;
            font-size: 14px;
            letter-spacing: 0.1px;
            line-height: 16px;
            margin-top: 5px; }

        .panelFormInput {
            border: 1px solid #D5D8DE;
            border-radius: 4px;
            padding-top: 12px;
            padding-bottom: 12px; }

        .salaryText {
            color: green;
            font-family: Roboto;
            font-size: 14px;
            letter-spacing: 0.1px;
            line-height: 16px;
            font-weight: bold;
            padding-top: 5px; }

        .nextBtnStyle {
            margin-top: 50px;
            margin-bottom: 30px;
            border-radius: 10px; }

        .applyBtn {
            margin-top: 50px;
            margin-bottom: 30px;
            border-radius: 10px; }

        .carouselArrows {
            background-color: #544e4e !important;
            border-radius: 30%;
            width: 20px; }

        .carouselTabs {
            padding: 10px; }

        .greeting {
            color: #0290D8;
            font-family: Roboto;
            font-size: 25px;
            font-weight: 500;
            line-height: 29px;
            text-align: left; }

        .mailHeader {
            padding-top: 100px;
            padding-bottom: 50px; }

        .mailBody {
            background: white !important;
            padding: 50px; }

        .mailText {
            color: #697786;
            font-family: Roboto;
            font-size: 16px;
            line-height: 19px; }

    </style>
</head>
    <div class="mailHeader text-center">
        <img src="http://123workforce.magictimeapps.com/resumeApp/resources/views/customTheme/images/newResume/123wf_logo.png" width="15%">
    </div>
    <div class="container mailBody">
        @yield('content')
    </div>

    <div class="customFooter">
    <div class="row">
        <div class="col-md-4 offset-4">
            <div class="footerText text-center">
                <div class="footerImg">
                    <img src="http://123workforce.magictimeapps.com/resumeApp/resources/views/customTheme/images/newResume/logo.png" alt="logo">
                </div><br/>
                Please do not reply to this message.  |  Need help? Visit our <a href="http://123workforce.magictimeapps.com">FAQ</a><br/>
                © 2018 123Workforce | All Rights Reserved<br/><br/>
               <div style="padding-bottom: 20px;">
                   <a href="https://www.facebook.com/123workforce">
                       <img src="http://123workforce.magictimeapps.com/resumeApp/resources/views/customTheme/images/newResume/fb.png" alt="fb" width="25px">
                   </a>
                   <a href="https://www.instagram.com/123workforce/">
                       <img src="http://123workforce.magictimeapps.com/resumeApp/resources/views/customTheme/images/newResume/instagram.png" alt="insta" width="25px">
                   </a>
               </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="footerText text-right">

            </div>
        </div>
    </div>
</div>
</body>
</html>