<table id='productTable'>
    <tr>
        @foreach ($tableHeads as $tableHead)
        <th>{{ $tableHead}}</th>
        @endforeach
    </tr>


    @foreach ($ingredients as $key => $ingredient)
    <tr>
        <td>
            {{ $ingredient->id }}
        </td>
        <td>
            {{ $ingredient->ingredient }}
        </td>
        <td>
            {{ $ingredient->category }}
        </td>
        <td>
            {{ $ingredient->last_order }}
        </td>
        <td>
            {{ $ingredient->stock }}
        </td>
        <td>
            {{ $ingredient->used }}
        </td>
        <td>
            <form action="{{ route('ingredients.edit', ['ingredient' => $ingredient->id]) }}" method='GET'>
                <button class="btn" type='submit' data-toggle="buttons">Update &nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
            </form>
        </td>
        <td>
            <form action="{{ route('ingredients.destroy', ['ingredient' => $ingredient->id]) }}" method='POST'>
                @csrf
                @method ('DELETE')
                <button class="btn" type='submit' data-toggle="buttons">Delete &nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
            </form>
        </td>
    </tr>
    @endforeach
    <tr>
        <td>Totaal</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td> {{ $usedUnits }} </td>
        <td></td>
    </tr>
</table>