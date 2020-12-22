<!-- 
Current file have 5 variables from route:
1. $title
2. $categories
3. $action
4. $action_path
5. $input_fields
-->

@extends('layouts.master')
@section('title')
  {{$title}}
@endsection

@section('content')

  <!-- Invalid input alert -->
  @if(Session('error'))
    <div class="alert alert-danger" role="alert">
      {{Session('error')}}
    </div>
  @endif
  
  <form method="post" action="{{ $action_path }}" enctype="multipart/form-data">
    {{csrf_field()}}
    @if($action == 'edit')
      <input type="hidden" name="bookid" value="{{ $book->id }}">
    @endif
    <!--upload cover-->
    <div class="form-group">
      <label>Upload an image for the book cover</label>
      <input type="file" name="cover" class="form-control-file">
    </div>
    <!-- Input field -->
    @foreach($input_fields as $field)
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">{{ucfirst($field)}}</label>
        <!-- Add empty class if empty -->
        <div class="col-sm-10 no_padding {{ is_null(Session('check')[$field]) ? Session('empty'): '' }}">  
          @if($field == "description") 
            <textarea class="form-control" name = {{$field}}>{{ is_null(Session('check')[$field]) ? "": Session('check')[$field] }}{{ $action=='edit' && !Session('error') ? $book->$field:"" }}</textarea>
          @else
            <input type="{{ $field == 'published' ? 'date':'text' }}" name ={{$field}} class="form-control"  value="{{ is_null(Session('check')[$field]) ? '':Session('check')[$field] }}{{ $action=='edit' && !Session('error') ? $book->$field:'' }}">
          @endif
        </div>
      </div>
    @endforeach
    <!-- Category selection -->
    <div class="form-group row">
      <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Category</label>
      <div class="col-sm-10 no_padding">
        <select class="form-control" name="category">
          @foreach($categories as $category)
            <option value="{{$category}}" {{Session('check')['category'] == $category ? "selected":""}}{{ $action=='edit' && $book->category == $category ? "selected":"" }}>{{$category}}</option>
          @endforeach
        </select>
      </div>
    </div>
    
    <button type="submit" class="btn  full_width {{$action == 'edit' ? 'btn-info' : 'btn-secondary'}}">{{ ucfirst($action) }} Book</button>
    
  </form>
@endsection