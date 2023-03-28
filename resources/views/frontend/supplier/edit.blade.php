@extends('frontend.components.container')
@section('dynamicdata')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    Edit Supplier
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

                    <form id="EditForm" action="{{ route('user.supplier.update', $supplier->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                        @include('frontend.components.alert')
                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-three-general" role="tabpanel" aria-labelledby="custom-tabs-three-general-tab">

                                    <div class="form-group">
                                        <label for="title">Supplier Name </label>
                                        <input type="text" class="form-control" name="suppliername" placeholder="Enter Supplier Name" value="{{ $supplier->suppliername }}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="title">Address </label>
                                        <input type="text" class="form-control" name="address" placeholder="Enter Short Name" value="{{ $supplier->address }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Contact No. </label>
                                        <input type="text" class="form-control" name="number" placeholder="Enter Number" value="{{ $supplier->number }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Email </label>
                                        <input type="text" class="form-control" name="email" placeholder="Enter Email" value="{{ $supplier->email}}">
                                    </div>

                                  
                                   

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control m-bot15" name="status">
                                            <option value="1" {{ ($supplier->status == 1) ? 'selected="selected"' : '' }}>Active</option>
                                            <option value="0" {{ ($supplier->status == 0) ? 'selected="selected"' : '' }}>Deactive</option>
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