
<option value = "0">All</option>
@foreach($options as $option)
   <option value = "{{ $option -> id }}">{{ $option -> name  }}</option>
@endforeach