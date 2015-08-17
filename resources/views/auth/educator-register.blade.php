@extends('layouts.one_col')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-8">
                <h2 class="blockhead">Student Registeration</h2>

                <div class="blockpara">
                    <form class="form-horizontal" role="form" method="POST" action="{{ action('Auth\AuthController@postEducatorRegistration') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <input name="firstname_en" id="firstname_en" type="text" class="form-control"
                               placeholder="&nbsp;First Name" style="padding:0 0 0 0 !important;" value="{{ old('firstname_en') }}"/>

                        <input name="lastname_en" id="lastname_en" type="text" class="form-control"
                               placeholder="&nbsp;Last Name"
                               style="padding:0 0 0 0 !important;" value="{{ old('lastname_en') }}"/>

                    <textarea name="address_en" id="address_en" placeholder=" Address" class="form-control"
                              style="padding:0 0 0 0 !important; width: 620px; height: 113px;" value="{{ old('address_en') }}"></textarea>

                        <input name="city_en" id="city_en" type="text" class="form-control" placeholder="&nbsp;City"
                               style="padding:0 0 0 0 !important;" value="{{ old('city_en') }}"/>

                        <input name="country_en" id="country_en" type="text" class="form-control"
                               placeholder="&nbsp;Country"
                               style="padding:0 0 0 0 !important;" value="{{ old('country_en') }}"/>


                        <select class="form-control" name="levels[]" id="levels" multiple>
                            <option value="" disabled="">Please select level</option>
                            @foreach($levels as $level)
                                <option value="{{ $level->id }}"
                                        >{{ $level->name }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" placeholder="subjects" name="subjects[]" id="subjects">
                            <option value="" disabled="">Please select Subject</option>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}" >{{ $subject->name }}</option>
                            @endforeach
                        </select>

                        <input name="email" id="email" type="text" class="form-control" placeholder="&nbsp;Email"
                               style="padding:0 0 0 0 !important;" autocomplete="off" value="{{ old('email') }}"/>
                        <span id="userresult"></span>
                        <input name="password" id="password" type="password" class="form-control"
                               placeholder="&nbsp;Password" style="padding:0 0 0 0 !important;" value="{{ old('password') }}"/>

                        <input name="password_confirmation" id="password_confirmation" type="password" class="form-control"
                               placeholder="&nbsp;Confirm Password" style="padding:0 0 0 0 !important;"/>

                        <input type= "submit" class="blueButton" value="Register"
                               style="margin:12px 0 0 237px !important;"/>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
