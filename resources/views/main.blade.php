@extends('master.app')

@section('topscript')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@stop

@section('css')
    <style>
        .events {
            height: 25%;
            max-width: 100%;
        }

        .dashboardContainer {
            width: 100%;
        }

        .caption {
            display: inline-block;
        }
        .progress_container {
            width: 100px;
            display: inline-block;
        }

        .thumbnail {
            text-align: center;
            display: inline-block;
            width: 100%;
        }

        #containerWrapper {
            position: relative;
            min-height: 87vh;

        }
    </style>
@stop
@section('content')
    @include('navs.navbar')
    <div id="containerWrapper">

        <div class="container">
            <div class="eventsContainer">
                <div class="col-md-12">
                    <div class="events col-md-4">
                        <div class="thumbnail">
                            <i class="fa fa-money fa-6" style="font-size: 10em;"></i>
                            <br/>
                            {{--<div class="progress" style="width: 50%; margin: 0 auto;">--}}
                                {{--<div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">--}}
                                    {{--<span class="sr-only">40% Complete (success)</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="caption">
                                Current Sales is: 60% <i class="fa fa-line-chart"></i>
                                <br/>
                                <a href="#" style="display: inline-block;" data-toggle="modal" data-target=".test">Reported Incomes</a>
                            </div>
                        </div>
                    </div>
                    <div class="events col-md-4">
                        <div class="thumbnail">
                            <i class="fa fa-users" style="font-size: 10em;"></i>
                            <br/>
                            <div class="caption">
                                List of customers <i class="fa fa-list"></i>
                                <br/>
                                <a href="#" data-toggle="modal" data-target=".test">Check All Customers</a>
                            </div>
                        </div>
                    </div>
                    <div class="events col-md-4">
                        <div class="thumbnail">
                            <i class="fa fa-shopping-basket" style="font-size: 10em;"></i>
                            <br/>
                            <div class="caption">
                                Inventory Items <i class="fa fa-database"></i>
                                <br/>
                                <a href="#" data-toggle="modal" data-target=".test">Check Current & Remaining Stocks</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="g-recaptcha" data-sitekey="6LfSoyETAAAAAN5Se6t8PgTkSUPk7-4yufMV4bXp"></div>--}}
        </div>


        <div style="position: absolute; bottom: 0; right: 0">
            <textarea id="messageArea" id="" cols="29.5" rows="10" style="background-color: white; display: none;" disabled></textarea>
        </div>


    </div>



    <div style="position:fixed; height:50px; background-color: cadetblue; bottom:0; left:0; right:0; margin-bottom:0;">
        @include('navs.footer')
    </div>
    <modal-directive></modal-directive>
@stop




@section('script')
    {!! HTML::script('js/main.js') !!}
@stop