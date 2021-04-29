<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1></h1>

    <form action="/ingredients/{ingredient}" method="POST">
        @csrf
        <table>
            <tr>
                <th>Product</th>
                <th>Category</th>
                <th>Stock</th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="ingredient" value="{{$ingredient->ingredient}}">

                    @if ($errors->has('ingredient'))
                    <div class="error">{{ $errors->first('ingredient') }}</div>
                    @endif
                </td>
                <td>
                    <select name="category_id" id="category">
                        @foreach($categories as $key => $category)
                        <!-- <option value="{{ $category->id }}">{{ $category->category }}</option> -->
                        <option value="{{ $key+1 }}" {{ ( $ingredient->category->category == $category->category) ? 'selected' : ' '}}> {{ $category->category }}</option>

                        @endforeach
                    </select>

                    @if ($errors->has('category_id'))
                    <div class="error">{{ $errors->first('category_id') }}</div>
                    @endif
                </td>
                <td>
                    <!-- <input type="text" name="stock" value="{{ old('stock')}}"> -->
                    <input type="text" name="stock" value="{{ $ingredient->stock }}">


                    @if ($errors->has('stock'))
                    <div class="error">{{ $errors->first('stock') }}</div>
                    @endif
                </td>
            </tr>
        </table>
        <div id=tableButton>
            <button type="submit">submit</button>
        </div>
    </form>

</body>

</html>