@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						<!-- section -->
                        <div class="form-group row">
                            <label for="section" class="col-md-4 control-label">Section</label>
 
                            <div class="col-md-6" style="padding-top: 8px">
                                <input id="section-p" type="radio" name="section" value="製造部" required >
								<label for="section-p">製造部</label>/
                                <input id="section-t" type="radio" name="section" value="技術部">
								<label for="section-t">技術部</label>/
                                <input id="section-g" type="radio" name="section" value="総務部">
								<label for="section-g">総務部</label>

                                @if ($errors->has('section'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('section') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

						<!-- position -->
                        <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                            <label for="positon" class="col-md-4 control-label">Position</label>

                            <div class="col-md-6">
                                <input id="position-g" type="radio" name="position" value="0">
								<label for="position-g">一般</label>/
                                <input id="position-l" type="radio" name="position" value="1" required  >
								<label for="postition-l">リーダー</label>

                                @if ($errors->has('position'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						<!-- end -->

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
