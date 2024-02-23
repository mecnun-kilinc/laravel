@extends('catalog.layout')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-7 login">
        <h3>Login</h3>

                <form action="{{ route('authenticate') }}" method="post">
                    @csrf
                    <div class="mb-3 row">
                        <label for="email" class="col-md-12">Email Address</label>
                        <div class="col-md-12">
                          <input type="email" class="form-control input-lg @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-md-12">Password</label>
                        <div class="col-md-12">
                          <input type="password" class="form-control input-lg @error('password') is-invalid @enderror" id="password" name="password">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="col-md-4 offset-md-8 btn btn-primary btn-md" value="Login">
                    </div>
                </form>

    </div>
</div>

@endsection
