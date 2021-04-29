<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Pizzas Index</h1>

    <table id='productTable'>
        <tr>
            @foreach ($tableHeads as $tableHead)
            <th>{{ $tableHead}}</th>
            @endforeach
        </tr>

        @foreach ($pizzas as $key => $pizza)
        <tr>
            <td>
                {{ $pizza->id }}
            </td>
            <td>
                {{ $pizza->name }}
            </td>
            <td>
                under construction
            </td>
            <td>
                <form action="{{ route('pizzas.edit', ['pizza' => $pizza->id]) }}" method='GET'>
                    <button class="btn" type='submit' data-toggle="buttons">Update &nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                </form>
            </td>
            <td>
                <form action="{{ route('pizzas.destroy', ['pizza' => $pizza->id]) }}" method='POST'>
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
            <td>{{ $usedUnits }} </td>
            <td></td>
            <td></td>
        </tr>
    </table>
</body>

</html>