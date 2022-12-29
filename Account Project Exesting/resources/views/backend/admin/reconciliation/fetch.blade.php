@extends('backend.admin.index')

@section('content')
<!-- Page Content -->
<div class="content">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Dynamic Table Full -->
    <a href="{{ route('admin.reconciliation.query') }}" class="btn btn-primary">Back</a>
    

       <div class="block-content block-content-full"><strong>Reconciliation Report of {{$query_coa->name}} from {{$start_date}} to {{$end_date}}</strong>

        <form id="form_reconciliate">
            @csrf
            <div class="block-content block-content-full">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th class="d-none d-sm-table-cell text-center">Date</th>
                            <th class="d-none d-sm-table-cell text-center" colspan=3>Bank</th>
                            <th class="d-none d-sm-table-cell text-center" colspan=3>Software</th>
                            <th>
                        </tr>
                        <tr>
                            <th class="d-none d-sm-table-cell text-center">Date</th>
                            <th class="d-none d-sm-table-cell text-center">COA</th>
                            <th class="d-none d-sm-table-cell text-center">Debit</th>
                            <th class="d-none d-sm-table-cell text-center">Credit</th>
                            <th class="d-none d-sm-table-cell text-center">COA</th>
                            <th class="d-none d-sm-table-cell text-center">Debit</th>
                            <th class="d-none d-sm-table-cell text-center">Credit</th>
                            <th class="d-none d-sm-table-cell text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- </tbody>
                </table> -->
                    @foreach($data as $entry)
                    <tr>
                        <td class="text-center">{{ substr($entry['date'], 0, 10) }}</td>
                        @if($entry['type'] == "bank" || $entry['type'] == "reconciliated")
                        <td class="text-center">{{ $entry['coa'] }}</td>
                        <td class="text-center">{{ $entry['debit'] }}</td>
                        <td class="text-center">{{ $entry['credit'] }}</td>
                        @else
                        <td></td><td></td><td></td>
                        @endif
                        @if($entry['type'] == "ledger" || $entry['type'] == "reconciliated")
                        <td class="text-center">{{ $entry['coa'] }}</td>
                        <td class="text-center">{{ $entry['debit'] }}</td>
                        <td class="text-center">{{ $entry['credit'] }}</td>
                        @else
                        <td></td><td></td><td></td>
                        @endif
                        @if($entry['type'] == "reconciliated")
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-sm btn-outline-primary bank" value="#" style="border-radius:5px 5px 5px 5px">Reconciliated</button>
                            </div>
                        </td>
                        @else
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-sm btn-outline-primary {{$entry['type']}}" value="{{$entry['id']}}" style="border-radius:5px 5px 5px 5px">Reconciliate</button>
                            </div>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
        </div>
    </div>
    </div>

</div>
<!-- END Page Content -->

@endsection
@push('js')
<script>
$(document).ready(function(){
    $("#transaction_coa_id").select2({

    ajax: {
        url: "{{ route('get-accounts') }}",
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function(params) {
            return {
                searchTerm: params.term,
                '_token': "{{  csrf_token() }}"
            };
        },
        processResults: function(response) {
            return {
                results: response
            };
        },
        cache: true
    }
    });
    $(".bank").click(function (e) {
        e.preventDefault();
        var id = jQuery(this).val();
        jQuery(this).prop('disabled', true);
        jQuery(this).html('Reconciliated');
        $.ajaxSetup({
            headers:
            {
                'X-CSRF-Token' : "{{ csrf_token() }}"
            }
        });
        $.ajax({
        url: "{{ route('admin.reconciliate') }}",
        type: "post",
        datatype: "json",
        data: {
            type: 2,
            id: id
        },
        success: function(response) {
            console.log("BANK");
        }
    })
});
    $(".ledger").click(function (e) {
        e.preventDefault();
        var id = jQuery(this).val();
        jQuery(this).prop('disabled', true);
        jQuery(this).html('Reconciliated');
        $.ajaxSetup({
            headers:
            {
                'X-CSRF-Token' : "{{ csrf_token() }}"
            }
        });
        $.ajax({
        url: "{{ route('admin.reconciliate') }}",
        type: "post",
        data: {
            type: 1,
            id: id
        },
        success: function(response) {
            console.log("BANK");
            // jQuery(this).html('Reconciliated');
            // this.disabled = true;
            // $('#cost_code_edit').val(response[1]);
            // $('#description_edit').val(response[2]);
            // $('#selected_cost').html(response[3]);
            // $('#item_id').val(response[4]);
        }
    });
});
    });
</script>
@endpush