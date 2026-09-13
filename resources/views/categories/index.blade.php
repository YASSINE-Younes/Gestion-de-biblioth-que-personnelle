<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <h1>Catgeories</h1>

    @if (count($categories) > 0)
        <table class="table">
            <th>
            <td>ID</td>
            <td>NAME</td>
            </th>




            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>

                </tr>
            @endforeach
        @else
            <p>Aucun Categories</p>


        </table>
    @endif


</body>

</html>
