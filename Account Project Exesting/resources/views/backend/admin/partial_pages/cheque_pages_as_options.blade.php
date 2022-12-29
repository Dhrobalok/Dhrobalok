@if(!$pages)
  <option value = "0">No pages available</option>
@else
@foreach($pages as $page)
@if($page -> status == 1)
<option value="{{ $page -> id }}">{{ $page ->  page_number }}
</option>
@endif
@endforeach
@endif