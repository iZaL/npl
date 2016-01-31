@extends('admin.layouts.one_col')

@section('title')
    <h1>Educators</h1>
@endsection

@section('style')
    @parent
@endsection

@section('script')
    @parent
    <script>
        //Slide Info Function
        $(document).ready(function () {
            $(".select2").select2();
        });
    </script>
@endsection

@section('middle')
    <div class="panel panel-default">
        <div class="panel-heading">
            <b>{{ $educator->profile->np_code }}</b>
        </div>
        <div class="panel-body">
            <div class="mTop10">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Educators</th>
                        <th>In Active Subjects</th>
                        <th>Active Subjects</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="gradeU">
                        <td>
                            @if($educator->profile)
                                <a href="{{ action('Admin\EducatorController@show',$educator->id) }}">{{ ucfirst($educator->profile->firstname) }}</a>
                            @else
                                Unknown User
                            @endif
                            <br>
                            <small>
                                {{ $educator->answersCount ? 'Total '. $educator->answersCount .' Answers. ': ' 0 Answers.' }}
                            </small>
                        </td>
                        <td>
                            @if($inActiveSubjects = $educator->profile->inActiveSubjects)
                                {!! Form::open(['action'=>['Admin\EducatorController@activateSubjects',$educator->id], 'method'=>'post']) !!}

                                <input hidden="user_id" value="{{ $educator->id }}">
                                <select name="subjects[]" class="col-lg-12 select2 multiselect multiselect-inverse" multiple>
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}"
                                                @if(in_array($subject->id, $inActiveSubjects->modelKeys()))
                                                selected="selected"
                                                @endif
                                        >{{ $subject->name }}</option>

                                    @endforeach
                                </select>

                                <input type="submit" class="btn btn-success btn-sm" role="button" value="Activate">
                                {!! Form::close() !!}
                            @endif
                        </td>
                        <td>
                            @if($activeSubjects = $educator->profile->activeSubjects)
                                {!! Form::open(['action'=>['Admin\EducatorController@deActivateSubjects',$educator->id], 'method'=>'post']) !!}

                                <input hidden="user_id" value="{{ $educator->id }}">
                                <select name="subjects[]" class="col-lg-12 select2 multiselect multiselect-inverse" multiple>
                                    @foreach($activeSubjects as $subject)
                                        <option value="{{ $subject->id }}"
                                                @if(in_array($subject->id, $activeSubjects->modelKeys()))
                                                selected="selected"
                                                @endif
                                        >{{ $subject->name }}</option>

                                    @endforeach
                                </select>

                                <input type="submit" class="btn btn-info btn-sm btn-warning" role="button" value="Deactivate">
                                <br>
                                <small>Remove the subjects from the list <br> that you want to deactivate for Educator</small>
                                {!! Form::close() !!}
                            @endif
                        </td>

                        <td>
                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModalBox"
                                    data-link="{{action('Admin\EducatorController@destroy',$educator->id)}}">Remove
                                as Educator
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
            @include('admin.partials.delete-modal',['info' => 'This will only remove the User as Educator and delete all his answers.
             You can delete the user from Educators Page.','deleteText'=>'Remove as Educator'])
        </div>


    </div>
    <!-- /.panel -->

@endsection