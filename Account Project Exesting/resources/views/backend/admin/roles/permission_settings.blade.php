@extends('backend.admin.index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header bg-info f-100 text-white">
                    <b>{{ $role  -> name }}</b>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>

                                <th>Section Name</th>
                                <th>Options</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($modules as $module)
                            <tr>


                                <td><b>{{ $module -> name }}</b></td>
                                @php
                                $permission_name = strtolower(explode(' ',$module -> name)[0]);
                                //dd($role->hasPermissionTo('view'.' '.$permission_name ));
                                @endphp
                                <td>
                                    @if($role->hasPermissionTo('view'.' '.$permission_name ))
                                
                                    <label class="checkbox-inline px-2 f-color"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="view {{ $permission_name}}" checked> View</label>
                                    @else
                                    <label class="checkbox-inline px-2 f-color"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="view {{ $permission_name}}"> View</label>
                                    @endif
                                    @if($role->hasPermissionTo('create'.' '.$permission_name ))
                                    <label class="checkbox-inline px-2 f-color"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="create {{ $permission_name}}" checked> Create</label>
                                    @else
                                    <label class="checkbox-inline px-2 f-color"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="create {{ $permission_name}}"> Create</label>
                                    @endif
                                    @if($role->hasPermissionTo('edit'.' '.$permission_name ))
                                    <label class="checkbox-inline px-2 f-color"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="edit {{ $permission_name}}" checked> Edit</label>
                                    @else
                                    <label class="checkbox-inline px-2 f-color"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="edit {{ $permission_name}}"> Edit</label>
                                    @endif

                                    @if($role->hasPermissionTo('delete'.' '.$permission_name ))

                                    <label class="checkbox-inline f-color px-2"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="delete {{ $permission_name}}" checked> Delete</label>
                                    @else
                                    <label class="checkbox-inline f-color px-2"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="delete {{ $permission_name}}"> Delete</label>
                                    @endif
                                   <!-- Employee aprove and report start -->
                                    @if( $module -> id == 9 )
                                    
                                    @if($role->hasPermissionTo('report'.' '.$permission_name ))

                                    <label class="checkbox-inline f-color px-2"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="report {{ $permission_name}}" checked> Report</label>
                                    @else
                                    <label class="checkbox-inline f-color px-2"><input type="checkbox"
                                        class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                        value="report {{ $permission_name}}"> Report</label>
                                   
                                    @endif

                                    {{-- <label class="checkbox-inline f-color px-2"><input type="checkbox" 
                                        class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                        value="aprove {{ $permission_name}}"> Aprove</label>
                                        --}}
                                    
                                    
                                    @if($role->hasPermissionTo('aprove'.' '.$permission_name )) 
                                    <label class="checkbox-inline f-color px-2"><input type="checkbox"
                                        class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                        value="aprove {{ $permission_name}}" checked> Aprove</label>
                                    
                                     @else 
                                    <label class="checkbox-inline f-color px-2"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="aprove {{ $permission_name}}"> Aprove</label>
                                    @endif

                                    @endif
                                    

                                    <!-- Employee aprove and report end -->

                                    @if($module -> id == 3 || $module -> id == 8 )
                                    @if($role->hasPermissionTo('report'.' '.$permission_name ))

                                    <label class="checkbox-inline f-color px-2"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="report {{ $permission_name}}" checked> Report</label>
                                    @else
                                    <label class="checkbox-inline f-color px-2"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="report {{ $permission_name}}"> Report</label>
                                    @endif

                                    @endif
                                    @if($module -> id == 6)
                                    @if($role->hasPermissionTo('approve'.' '.$permission_name ))
                                    <label class="checkbox-inline px-2 f-color"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="approve {{ $permission_name}}" checked> Approve</label>
                                    @else
                                    <label class="checkbox-inline px-2 f-color"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="approve {{ $permission_name}}"> Approve</label>
                                    @endif
                                    @if($role->hasPermissionTo('approve_setup'.' '.$permission_name ))
                                    <label class="checkbox-inline f-color px-2"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="approve_setup {{ $permission_name}}" checked> Approver Setup</label>
                                    @else
                                    <label class="checkbox-inline f-color px-2"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="approve_setup {{ $permission_name}}"> Approver Setup</label>
                                    @endif
                                    @if($role->hasPermissionTo('generate'.' '.$permission_name ))
                                    <label class="checkbox-inline f-color px-2"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="generate {{ $permission_name}}" checked> Generate</label>
                                    @else
                                    <label class="checkbox-inline f-color px-2"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="generate {{ $permission_name}}"> Generate</label>
                                    @endif
                                    @endif
                                    @if($module -> id == 7)
                                    @if($role->hasPermissionTo('generate'.' '.$permission_name ))
                                    <label class="checkbox-inline f-color px-2"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="generate {{ $permission_name}}" checked> Generate</label>
                                    @else
                                    <label class="checkbox-inline f-color px-2"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="generate {{ $permission_name}}"> Generate</label>
                                    @endif
                                    @endif
                                    @if($module -> id == 8)
                                    @if($role->hasPermissionTo('process'.' '.$permission_name ))
                                    <label class="checkbox-inline f-color"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="process {{ $permission_name}}" checked> Process</label>
                                    @else
                                    <label class="checkbox-inline f-color"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="process {{ $permission_name}}"> Process</label>
                                    @endif
                                    @endif
                                    @if($module -> id == 10)
                                    @if($role->hasPermissionTo('salary_config'.' '.$permission_name ))
                                    <label class="checkbox-inline f-color px-2"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="salary_config {{ $permission_name}}" checked> Salary Config</label>
                                    @else
                                    <label class="checkbox-inline f-color px-2"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="salary_config {{ $permission_name}}"> Salary Config</label>
                                    @endif
                                    @if($role->hasPermissionTo('bonus_config'.' '.$permission_name ))
                                    <label class="checkbox-inline f-color px-2"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="bonus_config {{ $permission_name}}" checked> Bonus Config</label>
                                    @else
                                    <label class="checkbox-inline f-color px-2"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="bonus_config {{ $permission_name}}"> Bonus Config</label>
                                    @endif
                                    @if($role->hasPermissionTo('generate'.' '.$permission_name ))
                                    <label class="checkbox-inline f-color px-2"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="generate {{ $permission_name}}" checked> Generate</label>
                                    @else
                                    <label class="checkbox-inline f-color px-2"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="generate {{ $permission_name}}"> Generate</label>
                                    @endif
                                    @if($role->hasPermissionTo('download'.' '.$permission_name ))
                                    <label class="checkbox-inline f-color px-2"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="download {{ $permission_name}}" checked> Download</label>
                                    @else
                                    <label class="checkbox-inline f-color px-2"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="download {{ $permission_name}}"> Download</label>
                                    @endif
                                    @endif
                                    @if($module -> id == 11)
                                    @if($role->hasPermissionTo('approve'.' '.$permission_name ))
                                    <label class="checkbox-inline px-2 f-color"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="approve {{ $permission_name}}" checked> Approve</label>
                                    @else
                                    <label class="checkbox-inline px-2 f-color"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="approve {{ $permission_name}}"> Approve</label>
                                    @endif
                                    @if($role->hasPermissionTo('approve_setup'.' '.$permission_name ))
                                    <label class="checkbox-inline f-color px-2"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="approve_setup {{ $permission_name}}" checked> Approver Setup</label>
                                    @else
                                    <label class="checkbox-inline f-color px-2"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="approve_setup {{ $permission_name}}"> Approver Setup</label>
                                    @endif
                                    @endif
                                    @if($module -> id == 13)
                                    @if($role->hasPermissionTo('approve'.' '.$permission_name ))
                                    <label class="checkbox-inline px-2 f-color"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="approve {{ $permission_name}}" checked> Approve</label>
                                    @else
                                    <label class="checkbox-inline px-2 f-color"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="approve {{ $permission_name}}"> Approve</label>
                                    @endif
                                    @if($role->hasPermissionTo('approve_setup'.' '.$permission_name ))
                                    <label class="checkbox-inline f-color px-2"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="approve_setup {{ $permission_name}}" checked> Approver Setup</label>
                                    @else
                                    <label class="checkbox-inline f-color px-2"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="approve_setup {{ $permission_name}}"> Approver Setup</label>
                                    @endif
                                    @if($role->hasPermissionTo('account_setup'.' '.$permission_name ))
                                    <label class="checkbox-inline px-2 f-color"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="account_setup {{ $permission_name}}" checked> Account Setup</label>
                                    @else
                                    <label class="checkbox-inline px-2 f-color"><input type="checkbox"
                                            class="larger-checkbox" name="options[{{ $module -> id }}][]"
                                            value="account_setup {{ $permission_name}}"> Account Setup</label>
                                    @endif

                                    @endif
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="row text-right">
                        <div class="col-lg-6"></div>
                        <div class="col-lg-6">
                            <button class="btn btn-primary f-100" onclick="update_permissions();">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('css')
<style>
input.larger-checkbox {
    transform: scale(1.5);
    margin-right: 5px;
    -moz-border-radius: 100%;
    -webkit-border-radius: 100%;
    border-radius: 100%;

    background: #f6f6f6;
    background: -moz-radial-gradient(#f6f6f6, #dfdfdf);
    background: -webkit-radial-gradient(#f6f6f6, #dfdfdf);
    background: -ms-radial-gradient(#f6f6f6, #dfdfdf);
    background: -o-radial-gradient(#f6f6f6, #dfdfdf);
    background: radial-gradient(#f6f6f6, #dfdfdf);
}

.f-color {
    font-size: 16px;
    color: black;
}
</style>
@endpush
@push('js')
<script>
function update_permissions() {

    var permissions = [];
    for (var index = 1; index <= 15; index++) {

        var values = document.getElementsByName('options[' + index + '][]');
        for (var i = 0; i < values.length; i++) {
            if (values[i].checked == true) {
                permissions.push(values[i].value);
            }
        }
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': "{{ csrf_token() }}"
        }
    });

    $.ajax({
        url: "{{ route('update-permissions') }}",
        type: "post",
        data: {
            permissions: permissions,
            role_id: {{$role -> id}}
        },
        success: function(response) {
            $.notify('Permission settings updated successfully', 'success');
        }
    });

}
</script>
@endpush