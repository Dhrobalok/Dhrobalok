<tr class = "text-center">
    <input type ="hidden" name = "cost_account_ids[]" value = "{{ $account -> id }}">
    <td>{{ $account -> general_code }}</td>
    <td>{{ $account -> name }}</td>
    <td>{{ $account -> description }}</td>
    <td>
        <a href = "#" onclick = "remove(this)" class = "btn btn-danger btn-sm"><i class = "fa fa-trash-alt"></i></a>
    </td>
</tr>