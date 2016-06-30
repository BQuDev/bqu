@extends('layouts.main')

@section('title', '| Appraisals | Create')



@section('content')

    <div class='fb-main'></div>

@endsection

@section('post_css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {{ Html::style('css/vendor.css') }}
    {{ Html::style('css/formbuilder.css') }}
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            background-color: #444;
            font-family: sans-serif;
        }
        .fb-main {
            background-color: #fff;
            border-radius: 5px;
            min-height: 600px;
        }
        input[type=text] {
            height: 26px;
            margin-bottom: 3px;
        }
        select {
            margin-bottom: 5px;
            font-size: 40px;
        }
    </style>
@endsection
@section('post_js')
    {{ Html::script('scripts/vendor.js') }}
    {{ Html::script('scripts/formbuilder.js') }}
    <script>
        $(function(){

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: '{!! Request::segment(2).'/ajax' !!}',
                type: 'GET',
                data: {_token: CSRF_TOKEN},
                dataType: 'JSON',
                success: function (data) {

                    fb = new Formbuilder({
                        selector: '.fb-main',
                        autoSave: false,
                        bootstrapData: data
                    });
                    fb.on('save', function(payload){
                        //console.log(payload);
                        $.ajax({
                            url: '{!! Request::segment(2) !!}',
                            type: 'POST',
                            data: {_token: CSRF_TOKEN, form: payload},
                            dataType: 'JSON',
                            success: function (data) {
                                console.log(data);
                            }
                        });
                    })
                }
            });




        });
    </script>

@endsection