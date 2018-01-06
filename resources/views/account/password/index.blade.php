@extends('account.layouts.default')

@section('account.content')
    <div class="panel panel-default">
        <div class="panel-body">
            <form action="{{ route('account.password.store') }}" method="post">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('password_current') ? ' has-error' : '' }}">
                    <label for="password_current" class="control-label">Current Password</label>
                    <input type="password" name="password_current" id="password_current" class="form-control">
                    @if($errors->has('password_current'))
                        <span class="help-block">
                            {{ $errors->first('password_current') }}
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">New Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                    @if($errors->has('password'))
                        <span class="help-block">
                            {{ $errors->first('password') }}
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="password_confirmation" class="control-label">New Password again</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    @if($errors->has('password_confirmation'))
                        <span class="help-block">
                            {{ $errors->first('password_confirmation') }}
                        </span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Change Password</button>

            </form>
        </div>
    </div>
@endsection
