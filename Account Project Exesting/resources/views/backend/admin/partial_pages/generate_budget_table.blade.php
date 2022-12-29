@foreach($accounts as $account)
<tr class="text-center">
    <td>{{ $account -> name }}</td>
    <input type = "hidden" name = "coa_ids[]" value = "{{ $account -> id }}">
    <td>{{ $account -> account_category -> category_name  }}</td>
    <td>
        <input type="text" class="form-control text-center" value="0" name = "max_usable_amount[]">
    </td>
    <td>
        <select class="form-control" name = "budget_type[]">
            <option value="Fixed">Fixed</option>
            <option value="Variable">Variable</option>
        </select>
    </td>
</tr>
@endforeach