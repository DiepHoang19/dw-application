@extends('admin.layout.master')

@section('content')
    <h2>Thùng rác sản phẩm</h2>

    @foreach ($furnitures as $item)
        <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
            <p><strong>{{ $item->name }}</strong> ({{ $item->product_code }})</p>
            <p>Giá: {{ $item->price }}</p>

            <form method="POST" action="{{ route('furniture.restore', $item->id) }}" style="display:inline;">
                @csrf
                @method('PUT')
                <button type="submit">Khôi phục</button>
            </form>

            <form method="POST" action="{{ route('furniture.forceDelete', $item->id) }}" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Xóa vĩnh viễn?')">Xóa vĩnh viễn</button>
            </form>
        </div>
    @endforeach
@endsection
