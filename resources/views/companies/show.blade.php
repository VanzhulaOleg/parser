@extends('layout')


@section('head')
    <link href="{{ asset('../css/company_page.css') }}" rel="stylesheet" type="text/css">
@endsection


@section('content')
    <button class="btnBack" id="btnBack"><</button>
    <script>
        var btnBack = document.getElementById("btnBack");
        btnBack.onclick = function () {
            backFunction()
        };

        function backFunction() {
            javascript:history.go(-1)
        }
    </script>
    <div class="layer">
        <nav class="row">
            <div class="col-8">
                <div class="companyName">
                    {{$companyInfo -> name}}
                </div>
            </div>
            @if($companyInfo->logo)
                <div class="col-4">
                    <div class="companyLogo">
                        <img class="companyImg" src="{{$companyInfo -> logo}}">
                    </div>

                </div>
            @else
                <div class="col-4">
                    <div class="companyLogoEmpty">
                        <nav class="row">
                            {{"logo: null"}}
                        </nav>
                    </div>
                </div>
            @endif
        </nav>


        <nav class="row">
            <div class="col-8">
                <nav class="row">
                    <div class="companySite">
                        <a target="_blank" href="{{$companyInfo -> site}}">{{$companyInfo -> site}}</a>
                    </div>
                </nav>
            </div>
            <div class="col-4">
                {{--<div class="data">дата публикации: {{$companyInfo -> description}}</div>--}}
            </div>
        </nav>


        <div class="description">
            {!! $companyInfo -> description !!}
        </div>
    </div>
@endsection
