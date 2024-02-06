@extends('layout.site')

@section('content')
    <h1>Избранное</h1>
    
    @if (count($products))
        <table class="table table-bordered">
            <tr>
                <th>№</th>
                <th>Наименование</th>
                <th>Цена</th>
            </tr>
            @foreach($products as $product)
                @php
                    $itemPrice = $product->price;
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <a href="{{ route('catalog.product', [$product->slug]) }}">{{ $product->name }}</a>
                    </td>
                    <td>{{ number_format($itemPrice, 2, '.', '') }}</td>
                </tr>
            @endforeach
        </table>
    @else
        <p>Товаров нет</p>
    @endif
@endsection