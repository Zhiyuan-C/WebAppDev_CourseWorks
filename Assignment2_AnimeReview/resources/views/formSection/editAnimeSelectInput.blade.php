@if(count($errors) > 0)
  <option value="{{$studio->id}}" {{ $studio->name == old('studio') ? 'selected':'' }}>{{$studio->name}}</option>
@else
  <option value="{{$studio->id}}" {{ $studio->name == $anime->studio ? "selected":"" }}>{{$studio->name}}</option>
@endif

