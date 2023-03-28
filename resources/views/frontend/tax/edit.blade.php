@extends('frontend.components.container')
@section('dynamicdata')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    Edit Tax
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

                    <form id="EditForm" action="{{ route('user.tax.update', $tax->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                        @include('frontend.components.alert')
                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-three-general" role="tabpanel" aria-labelledby="custom-tabs-three-general-tab">

                                    <div class="form-group">
                                        <label for="title">Tax Name </label>
                                        <input type="text" class="form-control" name="tax_name" placeholder="Enter Tax Name" value="{{ $tax->tax_name}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Percentage </label>
                                        <input type="text" class="form-control" name="percent" placeholder="Enter Percentage" value="{{ $tax->percent}}">
                                    </div>

                                   

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control m-bot15" name="status">
                                            <option value="1" {{ ($tax->status == 1) ? 'selected="selected"' : '' }}>Active</option>
                                            <option value="0" {{ ($tax->status == 0) ? 'selected="selected"' : '' }}>Deactive</option>
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