@extends('layout')
@section('head')
    <link href="{{ asset('css/vacancies_page.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')
    <div id="prlx_lyr_1"></div>
    <div id="content_layer">
        <nav class="row header">
            <div class="total">всего: {{ $vacancies->total()}} </div>
            <nav class="countPage">
                <nav class="row">
                    <div>Показывать по: ( {{$vacancies->count()}} )</div>

                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">

                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="/{{$pagCount=10}}" data-value="10">10 объявлений</a>
                            <a class="dropdown-item" href="/{{$pagCount=25}}" data-value="25">25 объявлений</a>
                            <a class="dropdown-item" href="/{{$pagCount=50}}" data-value="50">50 объявлений</a>
                        </div>
                    </div>
                </nav>
            </nav>
        </nav>
        <div class="list-group">
            @foreach ($vacancies as $db_vac)
                <div class="layer">
                    <nav class="row" id="bottomRow">
                        <div class="col-8">
                            <div class="vacName">
                                <a href="/vacancy/{{$db_vac->id}}">{{$db_vac -> name}} </a>
                            </div>
                        </div>
                        <div class="col-2">
                            <div>
                                <img class="companyImg" src="{{$db_vac->companyLogo()}}">
                            </div>
                        </div>
                        @if($db_vac->salary)
                            <div class="col-2">
                                <div class="salery text-secondary">
                                    {{$db_vac -> salary."₴"}}
                                </div>
                            </div>
                        @else
                            <div class="col-2">
                                <div class="saleryEmpty text-secondary">
                                    {{"Дог"}}
                                </div>
                            </div>
                        @endif
                    </nav>
                    <div class="branchName">{{$db_vac -> branch}}</div>

                    <nav class="row">
                        <div class="col-8">
                            <nav class="row">
                                <div class="companyName">
                                    <a class="f-text-dark-bluegray f-visited-enable text-secondary"
                                       href="/company/{{$db_vac->companyId()}}">{{$db_vac->companyName}}
                                    </a>
                                </div>

                                <div class="cityName">&nbsp{{$db_vac -> city}}</div>
                            </nav>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-2">
                            <div class="data">{{$db_vac -> date}}</div>
                        </div>
                    </nav>


                    <div class="description">
                        {!! substr(strip_tags($db_vac -> description , ''), 0, 350) . '...' !!}
                    </div>
                    <div class="line"></div>
                </div>

            @endforeach

            <button class="btn_style" id="myBtnTop" title="Go to top">^</button>
            <script>
                // When the user scrolls down 700px from the top of the document, show the button
                window.onscroll = function () {
                    scrollFunction()
                };
                var myBtnTop = document.getElementById("myBtnTop");
                myBtnTop.onclick = function () {
                    topFunction()
                };

                function scrollFunction() {
                    if (document.body.scrollTop > 700 || document.documentElement.scrollTop > 700) {
                        myBtnTop.style.display = "block";
                    } else {
                        myBtnTop.style.display = "none";
                    }

                }

                // When the user clicks on the button, scroll to the top of the page
                function topFunction() {
                    document.body.scrollTop = 0; // For Safari
                    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
                }

                function parallax() {
                    var prlx_lyr_1 = document.getElementById('prlx_lyr_1');
                    prlx_lyr_1.style.top = -(window.pageYOffset / 4) + 'px';
                }

                window.addEventListener("scroll", parallax, false);
            </script>

        </div>

        <nav class="paginat">{{$vacancies->links()}}</nav>
    </div>
@endsection

