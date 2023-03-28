@extends('frontend.components.container')
@section('dynamicdata')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    Edit Product Purchase
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

                    <form id="EditForm" action="{{ route('user.purchase.update', $purchase->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                        @include('frontend.components.alert')
                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-three-general" role="tabpanel" aria-labelledby="custom-tabs-three-general-tab">
                                    <div class="form-group">
                                    <label for="products_id">Product Name <span class="text-danger">*</span></label>
                                    <select name="products_id" id="product-dropdown" class="form-control">
                                        <option value="">--Select any Product--</option>
                                        @foreach($products as $key=>$product)
                                            <option value='{{$product->id}}' {{(($purchase->products_id==$product->id)? 'selected' : '')}}>{{$product->product_name }}</option>
                                        @endforeach
                                    </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="title">Batch No. </label>
                                        <input type="text" class="form-control" name="batch_no" placeholder="Enter Batch No." value="{{ $purchase->batch_no }}">
                                    </div>


                                    <div class="form-group">
                                    <label for="suppliers_id">Supplier Name <span class="text-danger">*</span></label>
                                    <select name="suppliers_id" id="supplier-dropdown" class="form-control">
                                        <option value="">--Select any category--</option>
                                        @foreach($suppliers as $key=>$supplier)
                                            <option value='{{$supplier->id}}' {{(($purchase->suppliers_id==$supplier->id)? 'selected' : '')}}>{{$supplier->suppliername }}</option>
                                        @endforeach
                                    </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Quantity </label>
                                        <input type="text" class="form-control" name="quantity" placeholder="Enter Quantity" value="{{ $purchase->quantity }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Price Per Unit </label>
                                        <input type="text" class="form-control" name="price_per_unit" placeholder="Enter Price Per Unit" value="{{ $purchase->price_per_unit }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Total Price  </label>
                                        <input type="text" class="form-control" name="total_price" placeholder="Enter Total Price" value="{{ $purchase->total_price }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Batch No. </label>
                                        <input type="text" class="form-control" name="batch_no" placeholder="Enter Batch No." value="{{ $purchase->batch_no }}">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="date">Posted Date</label>
                                        <input type="date" class="form-control" name="date" value="{{ $purchase->date }}">
                                    </div>

                                   

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control m-bot15" name="status">
                                            <option value="1" {{ ($purchase->status == 1) ? 'selected="selected"' : '' }}>Active</option>
                                            <option value="0" {{ ($purchase->status == 0) ? 'selected="selected"' : '' }}>Deactive</option>
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