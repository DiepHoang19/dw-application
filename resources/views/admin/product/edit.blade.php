@extends('admin.layout.master')
@section('content')
    <div class="nk-content">
        <div class="container">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head">
                        <div class="nk-block-head-between flex-wrap gap g-2">
                            <div class="nk-block-head-content">
                                <h2 class="nk-block-title">Edit Product</h1>
                                    <nav>
                                        <ol class="breadcrumb breadcrumb-arrow mb-0">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item"><a href="#">ecommerce</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Edit
                                                Product</li>
                                        </ol>
                                    </nav>
                            </div>
                            <div class="nk-block-head-content">
                                <ul class="d-flex">
                                    <li><a href="{{ route('furniture.index') }}"
                                            class="btn btn-primary btn-md d-md-none"><em
                                                class="icon ni ni-eye"></em><span>View</span></a></li>
                                    <li><a href="{{ route('furniture.index') }}"
                                            class="btn btn-primary d-none d-md-inline-flex"><em
                                                class="icon ni ni-eye"></em><span>List Products</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block">
                        <form method="POST" action="{{ route('furniture.update', ['id' => $furniture->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row g-gs">
                                <div class="col-xxl-9">
                                    <div class="gap gy-4">
                                        <div class="gap-col">
                                            <div class="card card-gutter-md">
                                                <div class="card-body">
                                                    <div class="row g-gs">
                                                        <div class="col-lg-12">
                                                            <div class="form-group"><label for="name"
                                                                    class="form-label">Product Name</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control"
                                                                        id="name" placeholder="Product Name"
                                                                        value="{{ $furniture->name }}" name="name">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="form-group"><label for="baseprice"
                                                                    class="form-label">Price</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control"
                                                                        id="baseprice" placeholder="Product price"
                                                                        value="{{ $furniture->price }}" name="price">
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-6">
                                                            <div class="form-group"><label for="product_code"
                                                                    class="form-label">Code</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control"
                                                                        name="product_code"
                                                                        value="{{ $furniture->product_code }}"
                                                                        id="product_code" placeholder="Product code">

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Thumbnail</label>
                                                <div class="form-control-wrap">
                                                    <div class="image-upload-wrap d-flex flex-column align-items-center">
                                                        <div style="width: 500px">
                                                            <img id="image-result"
                                                                style="max-width: 100%; object-fit: contain;">
                                                        </div>
                                                        <div class="pt-3">
                                                            <input value="{{ $furniture->avatar }}" class="upload-image"
                                                                data-target="image-result" name="avatar" id="change-avatar"
                                                                type="file" accept=".png,.jpg,.jpeg" hidden>
                                                            <label for="change-avatar"
                                                                class="btn btn-md btn-primary">Upload</label>
                                                        </div>
                                                    </div>
                                                    @error('avatar')
                                                        <div class="alert alert-danger mt-1 mb-1">
                                                            {{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-note mt-3">
                                                    Set the product thumbnail image. Only *.png, *.jpg and
                                                    *.jpeg image files are accepted.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gap-col">
                                            <ul class="d-flex align-items-center gap g-3">
                                                <li><button type="submit" class="btn btn-primary">Save
                                                        Changes</button></li>
                                                <li><a href="{{ route('furniture.index') }}" class="btn border-0">Cancel</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
