@extends('layouts.master')
@section('title')
  ANRV - Register
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-5 col-md-offset-2 panel_container">
      <div class="panel">
        <h2>Register new user</h2>
        <p>* required</p>

        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            
            @foreach($input_fields as $field)
              <div class="form-group">
                <label>
                  @if($field == 'password_confirmation')
                    Confirm Password *
                  @elseif($field == 'nick_name')
                    Nick Name *
                  @elseif($field == 'date')
                    Date of Birth *
                  @elseif($field == 'type_id')
                    Registration code (provide if needed)
                  @else
                    {{ucfirst($field)}} *
                  @endif
                </label>
                
                <!-- Add error class if error -->
                <div class="{{ $errors->has($field) ? 'error': '' }}">
                  @if($field == 'password_confirmation')
                    <input type="password" name="{{$field}}" value="{{ old($field) }}" class="form-control"/>
                  @else
                    <input type="{{$field == 'nick_name' || $field == 'type_id' ? 'text': $field}}" name="{{$field}}" value="{{ old($field) }}" class="form-control"/>
                  @endif
                </div>
                <small class="error_message form-text">{{ $errors->has($field) ? $errors->first($field) : ''}}</small>
              </div>
            @endforeach

            <button type="submit" class="btn full_width btn-secondary">Register</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
