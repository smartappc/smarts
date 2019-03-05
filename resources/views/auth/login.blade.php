@extends('layouts.log')

@section('content')
<div class="container">
      <div class="row">
        <div class="col-md-12 login">
            <div class="panel panel-default">
                <div class="panel-heading">تسجيل الدخول</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">اسم المستخدم </label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">كلمة المرور</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group hidden-xs hidden-lg hidden-md hidden-sm">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> <span>تذكر ني</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4 log-btn">
                                <button type="submit" class="btn btn-primary">
                                    دخول
                                </button>

                                <a class="btn btn-link  hidden-xs hidden-lg hidden-md hidden-sm" href="{{ route('password.request') }}">
                                   نسيت كلمة المرور ؟
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
         </div>
      </div>
</div>
@endsection
