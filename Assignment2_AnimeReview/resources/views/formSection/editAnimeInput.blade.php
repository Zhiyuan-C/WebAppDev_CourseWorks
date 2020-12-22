@if($field == "description") 
  <textarea class="form-control" name = {{$field}}>{{ count($errors) > 0 ? old($field) : $anime->$field }}</textarea>
@elseif($field == 'site_name')
  <input type="text" name ={{$field}} class="form-control"  value="{{ count($errors) > 0 ? old($field) : $anime->official_site_name }}">
@else
  <input type="{{ $field == 'broadcast' ? 'date':'text' }}" name ={{$field}} class="form-control"  value="{{ count($errors) > 0 ? old($field) : $anime->$field }}">
@endif