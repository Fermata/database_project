<?php
  include "system/header.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/images/favicon.ico">

    <title>Welcom to MARTA</title>

    <link href="/tools/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="/style/home.css" rel="stylesheet">

    <link rel="stylesheet" href="/tools/fontawesome/css/font-awesome.min.css">

    <script src="/tools/jquery/jquery.js"></script>
    <script src="/tools/bootstrap/js/bootstrap.min.js"></script>
    <?=@$customScriptsJS?>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.coms/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/home"><img class="logo" src="/images/navlogo.png"> 보성고 프로그래밍반</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav visible-xs">
            <li><a href="/home"><i class="fa fa-home"></i> 메인</a></li>
            <li><a href="/notice"><i class="fa fa-bullhorn"></i> 공지사항</a></li>
            <? if($_USER['active']){ ?>
            <li><a href="/attendance"><i class="fa fa-check-square-o"></i> 출결체크</a></li>
            <? } ?>
            <li><a href="/materials"><i class="fa fa-save"></i> 수업자료</a></li>
            <!--
            <li><a href="/freeboard"><i class="fa fa-pencil"></i> 자유게시판</a></li>
          -->
          </ul>
          <ul class="nav navbar-nav visible-xs">
            <li><a href="/codejam"><i class="fa fa-code"></i> 알고리즘 코드잼</a></li>
            <li><a href="/ranking"><i class="fa fa-trophy"></i> 랭킹</a></li>
            <? if($_USER['admin'] > 1){ ?>
              <li><a href="/admin-codejam"><i class="fa fa-edit"></i> 문제 관리</a></li>
            <? } ?>
          </ul>
          <ul class="nav navbar-nav visible-xs">
            <li><a href="/yearbook"><i class="fa fa-book"></i> 부원 주소록</a></li>
            <? if($_USER['admin']){ ?>
            <li><a href="/admin-class"><i class="fa fa-calendar"></i> 수업 관리</a></li>
            <li><a href="/admin-member"><i class="fa fa-group"></i> 부원 관리</a></li>
            <li><a href="/admin-notice"><i class="fa fa-bullhorn"></i> 공지사항 관리</a></li>
            <? } ?>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="/member/me"><i class="glyphicon glyphicon-user"></i> <?=$_USER['name']?></a></li>
            <li><a href="/logout"><i class="glyphicon glyphicon-off"></i> 로그아웃</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="/home"><i class="fa fa-home"></i> 메인</a></li>
            <li><a href="/notice"><i class="fa fa-bullhorn"></i> 공지사항</a></li>
            <? if($_USER['active']){ ?>
            <li><a href="/attendance"><i class="fa fa-check-square-o"></i> 출결체크</a></li>
            <? } ?>
            <li><a href="/materials"><i class="fa fa-save"></i> 수업자료</a></li>
            <!--
            <li><a href="/freeboard"><i class="fa fa-pencil"></i> 자유게시판</a></li>
          -->
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="/codejam"><i class="fa fa-code"></i> 알고리즘 코드잼</a></li>
            <li><a href="/ranking"><i class="fa fa-trophy"></i> 랭킹</a></li>
            <? if($_USER['admin'] > 1){ ?>
              <li><a href="/admin-codejam"><i class="fa fa-edit"></i> 문제 관리</a></li>
            <? } ?>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="/yearbook"><i class="fa fa-book"></i> 부원 주소록</a></li>
            <? if($_USER['admin']){ ?>
            <li><a href="/admin-class"><i class="fa fa-calendar"></i> 수업 관리</a></li>
            <li><a href="/admin-member"><i class="fa fa-group"></i> 부원 관리</a></li>
            <li><a href="/admin-notice"><i class="fa fa-bullhorn"></i> 공지사항 관리</a></li>
            <? } ?>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
