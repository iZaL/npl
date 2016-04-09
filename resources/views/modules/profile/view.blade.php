@extends('layouts.one_col')


@section('style')
    @parent
    <style>
        .user-pic {
            font-size: 60px;
        }
        .table-user-information > tbody > tr {
            border-top: 1px solid rgb(221, 221, 221);
        }

        .table-user-information > tbody > tr:first-child {
            border-top: 0;
        }
        .table-user-information > tbody > tr > td {
            border-top: 0;
        }
    </style>
@endsection
@section('script')
    @parent
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
        $(document).on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            if ( $( "#deleteModal" ).length ) {
                var link = button.data('link') // Extract info from data-* attributes
                $("#deleteModal").attr("action", link);
            }
        });
    </script>
@endsection

@section('title')
    <h1>Profile</h1>
@endsection

@section('right')

@endsection

@section('middle')
    @include('admin.partials.delete-modal',['info' => 'Are you sure ?'])

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $user->firstname . ' ' . $user->lastname }}</h3>
        </div>
        <div class="panel-body">
            <div class="row">

                <div class="col-md-3 col-lg-3 " align="center">
                    <i class="img-circle img-responsive fa fa-user user-pic" style="font-size: 135px; color: #36B586;"></i>
                </div>

                <div class=" col-md-9 col-lg-9 ">
                    <table class="table table-user-information">
                        <tbody>
                        <tr>
                            <td>NP Code:</td>
                            <td>{{ $user->np_code }}</td>
                        </tr>
                        <tr>
                            <td>Type</td>
                            <td>{{ $userType }}</td>
                        </tr>
                        @if($isOwner)
                            <tr>
                                <td>Email</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td>Level</td>
                                <td>{{ $levels }}</td>
                            </tr>
                            <tr>
                                <td>Subjects</td>
                                <td>{{ $subjects }}</td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td>{{ $user->city }}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{ $user->address }}</td>
                            </tr>
                        @endif
                        <tr>
                            <td>Country</td>
                            <td>{{ ucfirst($user->country) }}</td>
                        </tr>
                        <tr>
                            <td>Member Since</td>
                            <td>{{ $user->created_at->format('d-m-Y') }}</td>
                        </tr>
                        </tbody>
                    </table>
                    @if($isOwner)
                        @if($isEducator)
                            <a href="{{ action('ProfileController@getAnswers',$user->id) }}" class="btn btn-primary btn-navy">View All Answers</a>
                        @elseif($isStudent)
                            <a href="{{ action('ProfileController@getQuestions',$user->id) }}" class="btn btn-primary btn-navy">View All Questions</a>
                        @else
                        @endif
                    @endif
                </div>
            </div>
        </div>
        @if($isOwner)
            <div class="panel-footer">
                <a data-toggle="tooltip" href="{{ action('ProfileController@edit',Auth::user()->id) }}" data-original-title="Edit Profile" type="button" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                <a href="#" data-link="{{ action('ProfileController@destroy',Auth::user()->id) }}" data-target="#deleteModalBox" data-original-title="Delete Account" data-toggle="modal" type="button" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a>
            </div>
        @endif

    </div>

@endsection