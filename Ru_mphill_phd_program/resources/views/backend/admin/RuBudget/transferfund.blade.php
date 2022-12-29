@extends('backend.admin.index')
@section('content')
@include('backend.admin.Rumaster.master')


{{-- <div class="container-fluid">
    <div class="card mb-2">
        <div class="card-header bg-white">
            {{-- <div class="row">
                {{-- <div class="col-md-6">
                    <a class="mr-4" href="{{ route('admin.voucher.credit.index') }}"
                        style="color:blue;font-weight:500;font-size:22px"><i
                            class="fa fa-arrow-circle-left mr-2"></i>Back</a>
                </div> 

            </div> 
        </div>
    </div> --}}
    <div class="card" id="create-tab">
        <div class="card-header bg-light">
            <div class="row">
                <div class="col-md-8">
                    <strong class="f-roboto mt-3">Transfer Fund</strong>
                </div>
                <div class="col-md-4 text-right">
                    <a href="#" id="preview">
                        </a>
                </div>
            </div>

        </div>
        @if (Session::has('msg'))
        <div class="alert alert-info">
            <p style="text-align: center;">
                {{ Session::get('msg') }}
            </p>
            
        </div>
        @endif
        <div class="card-body">
            <form action="{{ route('Fund.create') }}" method="POST">
                @csrf

                
                <?php $row_cnt = 0; ?>
                <div class="row">

                    <div class="col-md-2 form-group">
                        <label>From Account</label>
                    </div>
                    <div class="col-md-3 form-group">
                        <select name="fromid" id="" class="form-control" required>
                            @foreach ($ChartOfAccount as $account )
                                
                           
                        <option value="{{ $account->id }}">{{ $account->name }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 form-group">
                        <label>To Account</label>
                    </div>
                    <div class="col-md-5 form-group">
                        <select name="toid" id="" class="form-control" required>
                            @foreach ($ChartOfAccount as $account )
                                
                           
                        <option value="{{ $account->id }}">{{ $account->name }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">

                  
                </div>
                <div class="row">

                    <div class="col-md-2 form-group">
                        <label>Transfer Amount</label>
                    </div>
                    <div class="col-md-4 form-group">
                        <input type="number" class="form-control" name="amount" required>
                    </div>
                    
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label>Description</label>
                    </div>
                    <div class="col-md-5 form-group">
                        <textarea name="description" id="" cols="20" rows="2" class="form-control" required>
                              
                        </textarea>

                    </div>
                </div>

                <div class="row">

                     <div class="col-md-12 form-group text-right">
                        <a href="#" id="add_transaction"></a>
                    </div>
                </div>
                

                <div class="row justify-content-center">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-block f-100"
                            style="background-color:blue;color:white">Post</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
</div>


@endsection