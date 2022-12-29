

@foreach($w as $d)
   <img src="{{ asset('uploads/file/' . $d->image) }}" alt="Logo" height="675px;" width="575;">

{{$d->image}}

@endforeach







