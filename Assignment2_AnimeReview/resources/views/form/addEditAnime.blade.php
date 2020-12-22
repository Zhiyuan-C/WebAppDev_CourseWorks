@extends('layouts.master')
@section('title')
  {{$title}}
@endsection

@section('content')

  <!-- Invalid input alert -->
  @if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
      Unable to {{$action}} this Anime
    </div>
  @endif
  
  <form method="post" action="{{ secure_url($action_path) }}">
    {{csrf_field()}}
    
    @if($action == 'edit')
      {{ method_field('PUT') }}
      <input type="hidden" name="anime_id" value="{{ $anime->id }}">
    @endif
    
    <!-- Input field -->
    @foreach($input_fields as $field)
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">{{ucfirst(str_replace("_", " ", $field))}}</label>
        <div class="col-sm-10 no_padding">
          <div class="{{ $errors->has($field) ? 'error': '' }}">  
            @if($action=='add')
              @include('formSection.addAnimeInput')
            @else
              @include('formSection.editAnimeInput')
            @endif
          </div>
          <div class="error_message">{{ $errors->has($field) ? $errors->first($field) : ''}}</div>  
        </div>
      </div>
    @endforeach
    
    <!-- Studio selection -->
    <div class="form-group row">
      <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Studio</label>
      <div class="col-sm-10 no_padding">
        <select class="form-control" name="studio">
          @foreach($studios as $studio)
            @if($action=='add')
              <option value="{{$studio->id}}" {{ $studio->name == old('studio') ? 'selected':'' }}>{{$studio->name}}</option>
            @else
              @include('formSection.editAnimeSelectInput')
            @endif
          @endforeach
        </select>
      </div>
    </div>
    
    <button type="submit" class="btn full_width {{$action == 'edit' ? 'btn-info' : 'btn-secondary'}}">{{ ucfirst($action) }} Anime</button>
    
  </form>
@endsection