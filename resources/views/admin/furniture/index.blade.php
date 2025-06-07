@extends('admin.layout.master')
@section('content')
    <div class="nk-block-head">
        <div class="nk-block-head-between flex-wrap gap g-2">
            <div class="nk-block-head-content">
                <h2 class="nk-block-title">Furniture</h1>
                    <nav>
                        <ol class="breadcrumb breadcrumb-arrow mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">ecommerce</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Furniture
                            </li>
                        </ol>
                    </nav>
            </div>
            <div class="nk-block-head-content">
                <ul class="d-flex">
                    <li><a href="{{ route('furniture.create') }}" class="btn btn-primary d-none d-md-inline-flex"><em
                                class="icon ni ni-plus"></em><span>Add</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="nk-block">
        @if (Session::has('message'))
            <div class="alert alert-success mt-1 mb-1">
                {!! \Session::get('message') !!}
            </div>
        @endif

        <div class="card">
            <div class="col-lg-3">
                <form method="GET" action="{{ route('furniture.index') }}" id="search-input" class="form-search"
                    style="margin:20px">
                    <input name="search" placeholder="Search by name" class="form-control"
                        value="{{ request()->get('search') }}" />
                </form>
            </div>
            <table class="datatable-init table" data-nk-container="table-responsive">
                <thead class="table-light">
                    <tr>
                        <th class="tb-col"><span class="overline-title">id</span></th>
                        <th class="tb-col"><span class="overline-title">name</span></th>
                        <th class="tb-col"><span class="overline-title">avatar</span></th>
                        <th class="tb-col tb-col-md"><span class="overline-title">price</span></th>
                        <th class="tb-col tb-col-md"><span class="overline-title">code</span></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($furniture as $product)
                        <tr>
                            <td class="tb-col tb-col-check">
                                <div class="form-check">
                                    <p>
                                        {{ number_format($product->id) }}
                                    </p>
                                </div>
                            </td>
                            <td class="tb-col">
                                <div class="media-group">

                                    <div class="media-text">
                                        <a href="{{ route('furniture.edit', ['id' => $product->id]) }}"
                                            class="title">{{ $product->name }}</a>
                                    </div>
                                </div>
                            </td>
                            <td class="tb-col">
                                <div class="media-group">
                                    <div class="media media-md media-middle">
                                        <img src="{{ asset('storage/' . $product->avatar) }}" alt="product">
                                    </div>
                                </div>
                            </td>

                            <td class="tb-col tb-col-md"><span> {{ number_format($product->price) }} </span></td>
                            <td class="tb-col tb-col-md"><span> {{ $product->product_code }} </span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#limit-select').change(function(e) {
                e.preventDefault();
                $('#limit-form').submit();
            })

            $('#search-input').change(function(e) {
                e.preventDefault();
                $('#form-submit').submit();
            })
        })


        @if (Session::has('message'))
            Toastify({
                text: "{{ Session::get('message') }}",
                duration: 2000,
                destination: "#",
                newWindow: true,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                },
                onClick: function() {} // Callback after click
            }).showToast();
        @endif
    </script>
@endpush
