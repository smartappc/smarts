


@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                        <form class="form-horizontal" method="POST" action="{{ route('SetPassword.update', $user->id) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value = "put">

                            <div class="form-group">
                                <label for="new-password-confirm" class="col-md-4 control-label">اكتب  كلمة المرور الجديدة </label>

                                <div class="col-md-6">
                                    <input id="new-password-confirm" type="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div style="text-align: left;" class="col-md-6">
                                    <button  type="submit" class="btn btn-primary">
                                       <span style="font-weight: bold">اعادة تعين كلمة المرور</span>
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
