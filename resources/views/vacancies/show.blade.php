@extends('layout')

@section('head')
    <link href="{{ asset('../css/vacancy_page.css') }}" rel="stylesheet" type="text/css">

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

        function parallax() {
            var prlx_lyr_1 = document.getElementById('prlx_lyr_1');
            var prlx_lyr_2 = document.getElementById('prlx_lyr_2');
            prlx_lyr_1.style.top = -(window.pageYOffset / 4) + 'px';
            prlx_lyr_2.style.top = -(window.pageYOffset / 8) + 'px';
        }

        window.addEventListener("scroll", parallax, false);
    </script>
    <div id="prlx_lyr_1"></div>
    <div id="prlx_lyr_2"></div>
    <div id="content_layer">
        <div class="layer">
            <nav class="row">
                <div class="col-8">
                    <div class="vacName">
                        {{$vacancy -> name}}
                    </div>
                </div>

                @if($vacancy->salary)
                    <div class="col-4">
                        <div class="salery">
                            {{$vacancy -> salary."₴"}}
                        </div>

                    </div>
                @else
                    <div class="col-4">
                        <div class="saleryEmpty">
                            <nav class="row">
                                {{"зарплата договорная"}}
                            </nav>
                        </div>
                    </div>
                @endif

            </nav>
            <div class="branchName">{{$vacancy -> branch}}</div>

            <nav class="row" id="companyRow">
                <div class="col-8">
                    <nav class="row">
                        <div class="companyName">
                            <a class="f-text-dark-bluegray f-visited-enable text-secondary"
                               href="/company/{{$vacancy->companyId()}}">{{$vacancy -> companyName}}
                            </a>
                        </div>
                        <div class="cityName">&nbsp{{$vacancy -> city}}</div>

                    </nav>
                </div>
                <div class="col-4">
                    <img class="companyImg" src="{{$vacancy->company->logo}}">
                </div>

            </nav>

            <div>
                {!! $vacancy -> description !!}
            </div>

            <div class="col-12">
                <div class="data">дата публикации: {{$vacancy ->date}}</div>
            </div>
        </div>
    </div>
@endsection

