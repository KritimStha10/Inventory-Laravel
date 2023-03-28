@extends('frontend.components.container')
@section('dynamicdata')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    Edit Products
                </h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- ./row -->
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="card card-primary card-outline card-tabs">

                    <form id="EditForm" action="{{ route('user.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                        @include('frontend.components.alert')
                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-three-general" role="tabpanel" aria-labelledby="custom-tabs-three-general-tab">

                                    <div class="form-group">
                                        <label for="title">Product Name </label>
                                        <input type="text" class="form-control" name="product_name" placeholder="Enter Product Name" value="{{ $product->product_name }}">
                                    </div>

                                    <div class="form-group">
                                    <label for="cat_id">Category Name <span class="text-danger">*</span></label>
                                    <select name="cat_id" id="cat-dropdown" class="form-control">
                                        <option value="">--Select any category--</option>
                                        @foreach($categories as $key=>$category)
                                            <option value='{{$category->id}}' {{(($product->cat_id==$category->id)? 'selected' : '')}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    </div>

                                    <div class="form-group">
                                    <label for="com_id">Company Name <span class="text-danger">*</span></label>
                                    <select name="com_id" id="com-dropdown" class="form-control">
                                        <option value="">--Select any category--</option>
                                        @foreach($companies as $key=>$company)
                                            <option value='{{$company->id}}' {{(($product->com_id==$company->id)? 'selected' : '')}}>{{$company->name}}</option>
                                        @endforeach
                                    </select>
                                    </div>

                                    <div class="form-group">
                                    <label for="suppliers_id">Supplier Name <span class="text-danger">*</span></label>
                                    <select name="suppliers_id" id="cat-dropdown" class="form-control">
                                        <option value="">--Select any category--</option>
                                        @foreach($suppliers as $key=>$supplier)
                                            <option value='{{$supplier->id}}' {{(($product->suppliers_id==$supplier->id)? 'selected' : '')}}>{{$supplier->suppliername }}</option>
                                        @endforeach
                                    </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Quantity Available </label>
                                        <input type="text" class="form-control" name="quantity" placeholder="Enter Quantity Name" value="{{ $product->quantity }}">
                                    </div>



                                

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control m-bot15" name="status">
                                            <option value="1" {{ ($product->status == 1) ? 'selected="selected"' : '' }}>Active</option>
                                            <option value="0" {{ ($product->status == 0) ? 'selected="selected"' : '' }}>Deactive</option>
                                        </select>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <input type="hidden" name="_method" value="PUT">

                    </form>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection