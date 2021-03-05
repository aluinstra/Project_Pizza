    <h1></h1>

    <form action="/ingredients/{ingredient}" method="POST">
        @csrf
        <table>
            <tr>
                <th>Product</th>
                <th>Category</th>
                <th>Current stock</th>
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
                    <input type="text" name="last_order" value="{{ old('last_order')}}">
                    <!-- <input type="number" id="quantity" name="quantity" min="1" max="100" value="{{ old('quantity')}}"> -->


                    @if ($errors->has('last_order'))
                    <div class="error">{{ $errors->first('last_order') }}</div>
                    @endif
                </td>
            </tr>
        </table>
        <div id=tableButton>
            <button type="submit">submit</button>
        </div>
    </form>
    </body>