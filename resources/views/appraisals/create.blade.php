@extends('layouts.main')

@section('title', '| Appraisals | Create')



@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-gift"></i>Form Sample
            </div>
            <div class="tools">

                <a href="javascript:;" class="remove" data-original-title="" title="">
                </a>
            </div>
        </div>
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
                {!! Form::open(array('url' => '/appraisals', 'method' => 'post', 'class'=>'form-horizontal form-bordered form-row-stripped')) !!}
                <div class="form-body">
                    <div class="form-group">
                        {!! Form::label('name', null, ['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-9">
                            {!! Form::text('Name', null , ['placeholder' => 'Name','class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn green"><i class="fa fa-check"></i> Submit</button>
                            <button type="button" class="btn default">Cancel</button>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
            <!-- END FORM-->
        </div>
    </div>
@endsection