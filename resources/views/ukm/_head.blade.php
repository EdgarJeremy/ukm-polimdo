<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=no" name="viewport" />
    <meta content="Semantic-UI-Forest, collection of design, themes and templates for Semantic-UI." name="description" />
    <meta content="Semantic-UI, Theme, Design, Template" name="keywords" />
    <meta content="PPType" name="author" />
    <meta content="#ffffff" name="theme-color" />
    <meta content="{{URL::to('/')}}" name="base_url">
    <title>{{$ukm->name}} | Politeknik Negeri Manado</title>
    <link href="{{asset('/dist/semantic-ui/semantic.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/css/default.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/css/pandoc-code-highlight.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('/css/ukm.css')}}" />
    <link rel="stylesheet" href="{{asset('/dist/treant.js/Treant.css')}}" />
    <link rel="icon" href="{{asset('/images/logos/'.$ukm->logo)}}" />
    <script src="{{asset('/dist/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/dist/semantic-ui/semantic.min.js')}}"></script>
    <script src="{{asset('/dist/treant.js/vendor/raphael.js')}}"></script>
    <script src="{{asset('/dist/treant.js/Treant.js')}}"></script>
    <script>
        window.baseURL = document.head.querySelector('meta[name="base_url"]').content;
    </script>
</head>

<body>