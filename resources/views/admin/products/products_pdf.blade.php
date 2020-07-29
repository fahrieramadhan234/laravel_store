<!DOCTYPE html>
<html>

<head>
    <title>Product Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Product Name</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($products as $p)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{$p->product_name}}</td>
                <td>{{$p->brands->brand_name}}</td>
                <td>{{$p->categories->category_name}}</td>
                <td>Rp. {{number_format($p->product_price)}}</td>
                <td>
                    @if ($p->product_stock >= 11)
                    <span class="badge bg-soft-success text-success">In Stock</span>
                    @elseif ($p->product_stock > 0 && $p->product_stock <= 10) <span
                        class="badge bg-soft-warning text-warning">Limited</span>
                        @else
                        <span class="badge bg-soft-danger text-danger">Out of
                            Stock</span>
                        @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>