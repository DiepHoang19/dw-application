@extends('admin.layout.master')
@section('content')
    <a href="{{ route('product.create') }}">Create Product</a>
    <table>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        {{-- @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td><a href="{{ route('product.edit', ['id' => $product->id]) }}" class="btn-edit">Edit</a>
                </td>
                <td><a href="{{ route('product.trash', ['id' => $product->id]) }}" class="btn-delete">Delete</a></td>
            </tr>
        @endforeach --}}
    </table>
@endsection
