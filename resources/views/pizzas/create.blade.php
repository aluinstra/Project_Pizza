<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>

<body>
    <h1>Add new pizza to menu</h1>

    <form action="/pizzas" method="POST">
        @csrf
        title
        <input type="text" name="name" value="{{ old('name')}}">
        @if ($errors->has('title'))
        <div class="error">{{ $errors->first('title') }}</div>
        @endif

        <table id='ingredients_selection'>
            <tr>
                <th>Ingredient</th>
                <th>Category</th>
                <th>Units</th>
            </tr>
            <tr id='recipeTableRow'>
                <td>
                    <select name="ingredient_id[]" class="ingredients">
                        <option value="0">Select Product</option>
                    </select>
                </td>
                </td>
                <td class="categoryRow">
                    <select name="category_id[]" class="category">
                        <option value="0">Select Category</option>
                        @foreach($categories as $key => $category)
                        <option value="{{ $key + 1}}">{{ $category->category }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="units[]" id="units">
                        @for ($x = 1; $x <= 8; $x++) <option value="{{ $x }}">{{ $x }}</option>
                            @endfor
                    </select>
                </td>
            </tr>
            <tr id='addRowButton'>
                <td>
                    <button class="btn" type="button">&nbsp;<i class="fa fa-plus" aria-hidden="true"></i></button>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit">Submit</button>
                </td>
            </tr>
        </table>


        <script src='/js/app.js'></script>

</body>

</html>