@if($field == "description") 
  <textarea class="form-control" name = {{$field}}>{{ old($field) }}</textarea>
@else
  <input type="{{ $field == 'broadcast' ? 'date':'text' }}" name ={{$field}} class="form-control"  value="{{ old($field) }}">
@endif