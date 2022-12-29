<tr>
    <td style="width:30%">
        <select class="form-control" name="coa_ids[]">
          @foreach($accounts as $account)
            <option value = "{{ $account -> id }}">{{ $account -> name }}</option>
          @endforeach
        </select>
    </td>
    <td style="width:35%">
        <textarea class="form-control" rows="1" name="descriptions[]" required></textarea>
    </td>
    @if($applyType)
    <td style="width:15%">
        <select class = "form-control" name = "types[]">
            <option value = "Debit">Debit</option>
            <option value = "Credit">Credit</option>
        </select>
    </td>
    @endif
    <td style="width:20%">
        <input type="number" class="form-control" step = "any" name="amounts[]" required>
    </td>
    <td>
        <a href="#" class="btn btn-danger" onclick = "remove(this)"><i class="fa fa-trash-alt"></i></a>
    </td>
</tr>