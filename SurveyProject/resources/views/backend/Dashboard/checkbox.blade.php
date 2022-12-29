
<form action="{{url('checkbox')}}" method="post">
  @csrf
  <input type="text" name="question[]" placeholder="Enter your Question" class="form-control" />
  <textarea name="name[]" id="input1"  cols="30" rows="10" placeholder="Please Multiple Choises Seperate with (,)"></textarea>


  <input type="text" name="question[]" placeholder="Enter your Question" class="form-control" />
  <textarea name="name[]" id="input1"  cols="30" rows="10" placeholder="Please Multiple Choises Seperate with (,)"></textarea>
  {{-- <input type="text" name="name"> --}}
  {{-- <span>Please Multiple Choises Seperate with (,)</span> --}}

    <button>submit</button>


</form>
