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

    <!-- <form action="/orders" method="POST">
        @csrf -->
    <table id='productTable'>
        <thead>
            <tr>
                @foreach ($tableHeads as $tableHead)
                <th>{{ $tableHead}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody id='pizzaContainer'>

            @include('users.pizzaOverview')

        </tbody>
    </table>
    <div id=tableButton>
        <button type="submit">submit</button>
    </div>
    <!-- </form> -->



    <table id='ingredients_selection'>

        <body>

            <tr>
                <th>Category</th>
                <th>Ingredient</th>
            </tr>
            <tr id='recipeTableRow'>
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
                    <select name="ingredient_id[]" class="ingredients">
                        <option value="0">Select Product</option>
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
                    <button type="btn" id="checkButton">check</button>
                </td>
            </tr>

        </body>
    </table>

    <script src='/js/app.js'></script>


</body>

</html>