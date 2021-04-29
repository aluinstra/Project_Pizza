@foreach ($pizzas as $key => $pizza)
<tr>
    <td>
        {{ $pizza->id }}
    </td>
    <td>
        {{ $pizza->name }}
    </td>
    <td>
        <form action="{{ route('pizzas.edit', ['pizza' => $pizza->id]) }}" method='GET'>
            <input type="checkbox" name="orderCheckBox[]" value="{{$pizza->id}}">
        </form>
    </td>
</tr>
@endforeach