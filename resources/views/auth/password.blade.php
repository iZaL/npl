@extends('layouts.one_col')

@section('title')
	<h1 class="text-center">Reset Password</h1>
@endsection

@section('middle')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="col-md-4 control-label">E-Mail Address</label>
                    <div class="col-md-6">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Send Password Reset Link
                        </button>
                    </div>
                </div>
            </form>
		</div>
	</div>
</div>
@endsection
