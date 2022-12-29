@extends('backend.admin.index')
@section('content')
<div class="row justify-content-center">
    <div class="card">
        <div class="card-header">
            <p style="text-align: center;"> Time Extend/Decrement</p>
            

        </div>
        <form action="{{ url('extendsave') }}" method="post">
            @csrf
        <div class="form-group row justify-content-center py-4">
          
            @php
                $date=App\Models\Addition::where('id',$sortprofiles)->first();
            @endphp
               

            <div class="col-md-7 py-2">
                <label for="">Present Valid Time</label>
                 <input  class="form-control" value="{{ $date->to  }}" readonly>

                
            </div>


            <div class="col-md-7 py-2">
                <label for="">Extend Time</label>
                <input type="hidden" name="id" value="{{ $sortprofiles }}">
                <input type="date" class="form-control" name="change">

            </div>

        

    </div>

    <div class="row justify-content-center py-2">
        <button class="btn btn-primary">Change</button>

    </div>
</form>

</div>
@endsection