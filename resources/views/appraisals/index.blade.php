@extends('layouts.main')

@section('title', '| Appraisals')



@section('content')
    <div class="table-scrollable">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>
                    #
                </th>
                <th>
                   Appraisal Name
                </th>
                <th>
                    Created By
                </th>
                <th>
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
                @foreach($appraisals as $appraisal)
                    <tr>
                    <td>
                        #
                    </td>
                    <td>
                        {!! $appraisal->name !!}
                    </td>
                    <td>
                        Pending
                    </td>
                    <td>
                        <a href="{!! url('appraisals/'.$appraisal->id) !!}" class="btn default btn-xs black">
                            <i class="fa fa-trash-o"></i> Show </a>
                    </td></tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection