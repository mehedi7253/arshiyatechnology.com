@extends('admin.layouts.app')
    @section('content')
        <div class="card">
            <div class="card-header">
                <div class="h3">
                    {{ $page }}
                    <a href="{{ route('admin.products.index')}}" type="button" class="btn btn-outline-info btn-secondary btn-sm float-right">
                        <em class="far fa-plus p-1"> </em> Manage Product
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="name">Product Name <sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Product Name" value="{{ $product->name }}">
                            @error('name')<span class="invalid-feedback" role="alert"><label style="color: red">{{ $message }}</label></span>@enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="slug">Product Url <sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" placeholder="Enter Product Url" value="{{ $product->slug }}">
                            @error('slug')<span class="invalid-feedback" role="alert"><label style="color: red">{{ $message }}</label></span>@enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="sku">Product Sku <sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control @error('sku') is-invalid @enderror" id="sku" name="sku"  placeholder="Enter Product Sku" value="{{ $product->sku }}">
                            @error('sku')<span class="invalid-feedback" role="alert"><label style="color: red">{{ $message }}</label></span>@enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="category_id">Category <sup class="text-danger">*</sup></label>
                            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id[]" id="category_id">
                                <option disabled selected>--Select Category--</option>
                                @foreach ($categories as $mainCategory)
                                    <optgroup label="{{ $mainCategory->category_name }}">
                                        @foreach ($mainCategory->childCategories as $childCategory)
                                            <option value="{{ $childCategory->id }}"
                                                @if ($product->categories->contains($childCategory->id)) selected @endif>
                                                {{ $childCategory->category_name }}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                            @error('category_id')<span class="invalid-feedback" role="alert"><label style="color: red">{{ $message }}</label></span>@enderror

                        </div>
                        {{-- <div class="col-md-6 form-group">
                            <label for="colors">Colors <sup class="text-danger">*</sup></label>
                            <input class="form-control" type="text" data-role="tagsinput" name="colors">
                        </div> --}}
                        <div class="col-md-6 form-group">
                            <label for="regular_price">Regular Price <sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control @error('regular_price') is-invalid @enderror" id="regular_price" name="regular_price" placeholder="Enter Product Price" value="{{ $product->regular_price }}">
                            @error('regular_price')<span class="invalid-feedback" role="alert"><label style="color: red">{{ $message }}</label></span>@enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="discount_price">Discount Price</label>
                            <input type="text" class="form-control" id="discount_price" name="discount_price" placeholder="Enter Product Price" value="{{ $product->discount_price }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="image">Gallery Image</label>
                            <input name="gallery[]" id="inputMultiple" type="file" class="form-control @error('gallery') is-invalid @enderror"   multiple accept="image/*">
                            @error('gallery')<span class="invalid-feedback" role="alert"><label style="color: red">{{ $message }}</label></span>@enderror
                        </div>
                        <div class="col-md-5 form-group">
                            <label for="thumbnail">Thumbnail <sup class="text-danger">*</sup></label>
                            <input name="thumbnail" id="inputGroupFile04" type="file" class="form-control @error('thumbnail') is-invalid @enderror" accept="image/*">
                        </div>
                        <div class="col-md-1 form-group mt-5">
                            <img id="inputGroupFileshow" src="{{ $product->thumbnail }}" alt="" class="img-thumbnail">
                        </div>
                        <div class="col-md-12">
                            <div class="row mb-3">
                                @foreach (json_decode($product->gallery) as $key => $gallery)
                                    <div class="float-left img-show col-md-2 col-sm-12"  style="border: 1px solid black">
                                        <img src="{{ asset($gallery) }}" alt="" style="width: 100px; 50px">
                                        <a href="{{ route('admin.products.gallery.delete', [$product->id, $key]) }}" class="delete-icon"><i class="fas fa-trash text-danger"></i></a>
                                    </div>
                                @endforeach
                                <div class="mx-2 img-show" id="multipleImageShow"></div>
                            </div>
                        </div>
                        <div class="col-md-3 form-group">
                            <div class="menu-configs">
                                <h4>Feature</h4>
                                <label class="control-label">
                                    <input name="is_featured" type="checkbox" value="1"  {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}> Active
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3 form-group">
                            <div class="menu-configs">
                                <h4>Offers</h4>
                                <label class="control-label">
                                    <input name="is_offers" type="checkbox" value="1"  {{ old('is_offers', $product->is_offers) ? 'checked' : '' }}> Active
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3 form-group">
                            <div class="menu-configs">
                                <h4>Stock Status</h4>
                                <label class="control-label">
                                    <input name="is_stock" type="checkbox" value="1" {{ old('is_stock', $product->is_stock) ? 'checked' : '' }}> In Stock
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3 form-group">
                            <div class="menu-configs">
                                <h4>Status</h4>
                                <label class="control-label">
                                    <input name="is_active" type="checkbox" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }}> Active
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="colors">Meta Tag </label>
                            <input class="form-control" type="text" data-role="tagsinput" name="tags"  placeholder="Enter Meta Tag" value="{{ $product->tags }}">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="description">Description <sup class="text-danger">*</sup></label>
                            <textarea name="description" id="description" class="text-control @error('description') is-invalid @enderror" placeholder="Enter Description">{{ $product->description }}</textarea>
                            @error('description')<span class="invalid-feedback" role="alert"><label style="color: red">{{ $message }}</label></span>@enderror
                        </div>
                        <div class="col-md-3 form-group">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection

    @push('style')
    <style>
        .bootstrap-tagsinput .tag {
        margin-right: 2px;
        color: #ffffff;
        background: #57c3cd;
        padding: 3px 7px;
        border-radius: 3px;
    }

    .bootstrap-tagsinput {
        width: 100%;
    }
    </style>
    @endpush
    @push('scripts')
        <script>
            $(".select2").select2();
             $(document).ready(function() {
                $('#description').summernote({
                    placeholder: 'Enter Short Description',
                    tabsize: 2,
                    height: 200
                });

            });

            document.getElementById('name').addEventListener('input', createUrl);
            function createUrl() {
                const title = document.getElementById('name').value.toLowerCase().trim();
                const slug = title.replace(/\s+/g, '-').replace(/[^\w-]/g, '');
                document.getElementById('slug').value = slug;
            }

             // Live Image Preview
            $(document).ready(function() {
                $('#inputGroupFile04').change(function() {
                    let file_url = URL.createObjectURL(event.target.files[0]);
                    $('#inputGroupFileshow').attr('src', file_url);
                });
            });

            // Live Multiple Image Preview
            $(document).ready(function() {
                $('#inputMultiple').change(function() {
                    $('#multipleImageShow').empty();
                    let total_file = document.getElementById("inputMultiple").files.length;
                    for (let i = 0; i < total_file; i++) {
                        $('#multipleImageShow').append(
                            "<img style=''width=100px'' class='mx-2 my-4 img-thumbnail' src='" + URL
                            .createObjectURL(event
                                .target.files[
                                    i]) + "'>");
                    }
                });
            });
        </script>
    @endpush
