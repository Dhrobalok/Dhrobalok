<tr class="text-center">

    <td>

        <select class="form-control" name="due_types[]">
            <option value="{{ $type }}" hidden selected>{{ $type }}</option>
            <option value="Percentage">Percentage</option>
            <option value="Fixed">Fixed</option>
        </select>
    </td>
    <td>
        <input type="number" class="form-control" name="amounts[]" step="any" value="{{ $amount }}">
    </td>
    <td>
        <input type="number" class="form-control" name="days_array[]" step="1" value="{{ $days }}">
    </td>
    <td>
        <select class="form-control" name="options_array[]">
            <option value="{{ $option }}" selected hidden>{{ $option }}</option>
            <option value="days after the invoice date">days after the invoice date</option>
            <option value="days after the end of the invoice month">days after the end of the invoice month</option>
        </select>
    </td>
    <td>
        <a onclick="remove_rule(this)" class="btn btn-danger text-white"><i class="fa fa-trash-alt"></i></a>
    </td>
</tr>