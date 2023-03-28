@extends('frontend.components.container')
@section('dynamicdata')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    Product Purchase List
                </h1>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            @include('frontend.components.alert')
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-body">
                        <h3><a href="javascript:;" class="add-purchase-table btn btn-sm btn-primary">Add New &nbsp;<i class="fa fa-plus"></i></a></h3>
                        <table id="dataTable" class="table table-bordered table-striped show-search-bar">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Product Name</th>
                                    <th>Batch No.</th>
                                    <th>Suppliers Name</th>
                                    <th>Quantity </th>
                                    <th>Price Per Unit</th>
                                    <th>Total Price</th>
                                    <th>Purchase Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tablebody">
                                @foreach($purchases as $purchase)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $purchase->product->product_name }}</td>
                                    <td>{{ $purchase->batch_no }}</td>
                                    <td>{{ $purchase->supplier->suppliername }}</td>
                                    <td>{{ $purchase->quantity }}</td>
                                    <td>{{ $purchase->price_per_unit }}</td>
                                    <td>{{ $purchase->total_price }}</td>
                                    <td>{{ date('j F, Y', strtotime($purchase->date)) }}</td>
                                    <td> @if($purchase->status == 1)
                                        <small class="label btn-sm  bg-green">Active</small>
                                        @else
                                        <small class="label btn-sm  bg-red">Deactive</small>
                                        @endif
                                    </td>
                                    
                                    <td>
                                        <a href="{{ route('user.purchase.edit',$purchase->id) }}" title="Edit purchase">
                                            <button type="button" class="btn btn-sm  bg-green btn-circle waves-effect waves-circle waves-float">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>&nbsp;

                                        <a href="javascript:;" title="Delete purchase" class="delete-purchase" id="{{ $purchase->id }}"><button class="btn btn-sm bg-red btn-circle waves-effect waves-circle waves-float"><i class="fa fa-trash"></i></button></a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SN</th>
                                    <th>Product Name</th>
                                    <th>Batch No.</th>
                                    <th>Suppliers Name</th>
                                    <th>Quantity </th>
                                    <th>Price Per Unit</th>
                                    <th>Total Price</th>
                                    <th>Purchase Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <!-- Add Form Start -->
                    <div class="modal fade" id="addpurchaseForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="card-header">
                                    <h3 class="card-title" id="myModalLabel">Add Purchase</h3>
                                </div>
                             
                                <form class="form-horizontal" role="form" method="POST" action="{{ route('user.purchase.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    
                                        <div class="form-group">
                                        <label for="products_id">Product Name<span class="text-danger">*</span></label>
                                        <select name="products_id" id="product-dropdown" class="form-control">
                                        <option value="">--Select any Product--</option>
                                        @foreach($products as $key=>$product)
                                            <option value='{{$product->id}}'>{{$product->product_name}}</option>
                                        @endforeach
                                        </select>
                                        </div>


                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="title">Batch No. </label>
                                                <input type="text" name="batch_no" class="form-control" placeholder="Enter Batch No." />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                        <label for="suppliers_id">Supplier Name <span class="text-danger">*</span></label>
                                        <select name="suppliers_id" id="supplier-dropdown" class="form-control">
                                        <option value="">--Select any supplier--</option>
                                        @foreach($suppliers as $key=>$supplier)
                                            <option value='{{$supplier->id}}'>{{$supplier->suppliername }}</option>
                                        @endforeach
                                        </select>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="title">Quantity </label>
                                                <input type="text" name="quantity" class="form-control" placeholder="Enter Quantity" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="title">Price Per Unit</label>
                                                <input type="text" name="price_per_unit" class="form-control" placeholder="Enter price per unit" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="title">Total Price </label>
                                                <input type="text" name="total_price" class="form-control" placeholder="Enter Total Price" />
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3">
                                        <label for="date">Purchase Date</label>
                                        <input type="date" class="form-control" name="date">
                                        </div>

                                     
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control m-bot15" name="status">
                                                <option value="1">Active</option>
                                                <option value="0">Deactive</option>
                                            </select>
                                        </div>
                                    </div>

                                   

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary waves-effect">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Add Form -->

                </div>

            </div>
        </div>
    </div>
    </div>
</section>
@endsection

@section('footer_js')

<script type="text/javascript">
    $(document).ready(function() {
      $(document).on('click', '.add-purchase-table', function(e) {
        e.preventDefault();
        $('#addpurchaseForm').modal('show');
      });
    });
  </script>

<script type="text/javascript">
    $(document).ready(function() {
        var oTable = $('.show-search-bar').dataTable();

        $('#tablebody').on('click', '.delete-purchase', function(e) {
            e.preventDefault();
            $object = $(this);
            var id = $object.attr('id');
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'red',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }, function() {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}",
                    },
                    type: "DELETE",
                    url: "{{ url('/dashboard/purchase/') }}" + "/" + id,
                    dataType: 'json',
                    success: function(response) {
                        var nRow = $($object).parents('tr')[0];
                        oTable.fnDeleteRow(nRow);
                        swal('success', response.message, 'success');
                    },
                    error: function(e) {
                        swal('Oops...', 'Something went wrong!', 'error');
                    }
                });
            });
        });
    });
</script>
@endsection