@extends('backend.admin.index')
@section('content')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<div class="container-fluid px-0">
    <div class="card mb-2">
            <div class="card-header bg-white">
               <div class="row">
                   <div class="col-md-6">
                     <a class = "mr-4" href = "{{ route('admin.voucher.debit.index') }}" style = "color:blue;font-weight:500;font-size:22px"><i class = "fa fa-arrow-circle-left mr-2"></i>Back</a>
                   </div>

               </div>
            </div>
        </div>
    <div class="card" id="create-tab">
        <div class="card-header bg-light">
            <div class="row">
                <div class="col-md-8">
                    <strong class="f-roboto mt-3">Advance Voucher</strong>
                </div>

                <br>
               <div>

                @if($errors->any())
                <h4>{{$errors->first()}}</h4>
                @endif
               </div>
            </div>

        </div>
        <div class="card-body">

         <form action="{{ route('advancevoucher.store') }}" method="post">
            @csrf

                <div class="row form-group">
                    <div class="col-md-2">
                        <label>Name </label>
                    </div>



                    <div class="col-md-10">

                        <select  class = "form-control" name = "id" >

                            @foreach($level_id as $level_id_employee)
                            @php
                            $employ = App\Models\Employee::where('user_id',$level_id_employee->level_id)->first();
                            @endphp

                            <option value={{ $employ -> id}}>{{$employ -> name }}</option>
                            @endforeach

                        </select>
                    </div>

                </div>


                <?php $row_cnt = 0; ?>
                <div class="row">

                    <div class="col-md-2 form-group">
                        <label>Voucher Date</label>
                    </div>
                    <div class="col-md-3 form-group">
                        <input type="text" id="voucher_date" name="voucher_date"
                            class="js-flatpickr form-control bg-white" placeholder="Voucher Date" required>
                        <small>
                            @if($errors->has('voucher_date'))
                            <h5>{{ $errors -> first('voucher_date') }}</h5>
                            @endif
                        </small>
                    </div>

                </div>

                <input type="hidden" name="status" value="7">



                <div class="row">

                    <div class="col-md-2 form-group">
                        <label>Account_Name</label>
                    </div>
                    <div class="col-md-3 form-group">

                        <select class = "form-control" name = "budget_id" id = "voucher_for">
                            @foreach($level_id as $budget_id)

                            @php
                                $chartn=App\Models\ChartOfAccount::where('id',$budget_id->name)->first();
                            @endphp
                           <option value={{$budget_id->id}}>{{$chartn->name }}</option>
                            @endforeach

                        </select>

                    </div>

                </div>


                <div class="container">
                    <div class="block-header block-header-default">
                        <h3 align="right">Budget Description</h3>

                    </div>



                        <table class="table table-bordered" id="dynamicTable">
                            <tr>
                                <th>Account</th>
                                <th>Description</th>
                                <th>Amount</th>

                            </tr>
                            <tr>
                                <td>
                                    
                               
                                <select class = "form-control" name = "name[]" id = "voucher_for">
                                    
                                    @foreach($chartall as $chartid)

        
                                    
                                   <option value={{ $chartid->id }}>{{ $chartid->name }}</option>
                                    @endforeach
        
                                </select>
                            </td>
                             


                                <td><input type="text" name="description[]" class="form-control" placeholder="Description" required></td>

                                <td> <input type="text" class="form-control" id="cost" name="cost[]" required></td>
                                <td><button type="button" name="add" id="add" class="btn btn-success">Add&nbspMore</button></td>
                            </tr>
                        </table>

                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>

                <script type="text/javascript">

                    var i = 0;

                    $("#add").click(function(){

                        ++i;

                        $("#dynamicTable").append('<tr><td><select class = "form-control" name = "name[]" id = "voucher_for"> @foreach($chartall as $chartid)<option value={{$chartid->id}}>{{$chartid->name }}</option> @endforeach</select></td><td><input type="text" name="description[]" class="js-flatpickr form-control bg-white" placeholder="Description" required></td><td><input type="text" class="form-control" id="cost" name="cost[]" required></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
                    });

                    $(document).on('click', '.remove-tr', function(){
                         $(this).parents('tr').remove();
                    });

                </script>


@endsection

