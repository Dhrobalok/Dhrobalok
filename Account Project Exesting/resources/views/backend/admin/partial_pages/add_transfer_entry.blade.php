<tr class="text-center">
    <td>
        <select class="form-control" name="transfer_from[]">
            @foreach($accounts as $account)
            <option value="{{ $account -> id }}">{{ $account -> name }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <select class="form-control" name="transfer_to[]">
            @foreach($accounts as $account)
            <option value="{{ $account -> id }}">{{ $account -> name }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <input type = "text" class = "form-control" name = "descriptions[]" required>
    </td>
    <td>
        <input type = "number" step = ".000001" class = "form-control" name = "amounts[]">
    </td>
    <td>
        <a href = "#" class = "btn btn-danger" onclick = "remove(this)"><i class = "fa fa-trash-alt"></i></a>
    </td>
</tr>