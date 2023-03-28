@extends('frontend.components.container')
@section('dynamicdata')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    Company List
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
                        <h3><a href="javascript:;" class="add-company-table btn btn-sm btn-primary">Add New &nbsp;<i class="fa fa-plus"></i></a></h3>
                        <table id="dataTable" class="table table-bordered table-striped show-search-bar">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Company Name</th>
                                    <th>Short Name</th>
                                    <th>created At</th>
                                    <th>updated At</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tablebody">
                                @foreach($companies as $company)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->shortname }}</td>
                                    <td>{{ $company->created_at }}</td>
                                    <td>{{ $company->updated_at }}</td>
                                    <td> @if($company->status == 1)
                                        <small class="label btn-sm  bg-green">Active</small>
                                        @else
                                        <small class="label btn-sm  bg-red">Deactive</small>
                                        @endif
                                    </td>
                                    
                                    <td>
                                        <a href="{{ route('user.company.edit',$company->id) }}" title="Edit company">
                                            <button type="button" class="btn btn-sm  bg-green btn-circle waves-effect waves-circle waves-float">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>&nbsp;

                                        <a href="javascript:;" title="Delete company" class="delete-company" id="{{ $company->id }}"><button class="btn btn-sm bg-red btn-circle waves-effect waves-circle waves-float"><i class="fa fa-trash"></i></button></a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SN</th>
                                    <th>Company Name</th>
                                    <th>Short Name</th>
                                    <th>created At</th>
                                    <th>updated At</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <!-- Add Form Start -->
                    <div class="modal fade" id="addcompanyForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="card-header">
                                    <h3 class="card-title" id="myModalLabel">Add Company</h3>
                                </div>
                             
                                <form class="form-horizontal" role="form" method="POST" action="{{ route('user.company.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="title">Company Name </label>
                                                <input type="text" name="name" class="form-control" placeholder="Enter Company Name" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="title"> Short Name </label>
                                                <input type="text" name="shortname" class="form-control" placeholder="Enter Short Name" />
                                            </div>
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
      $(document).on('click', '.add-company-table', function(e) {
        e.preventDefault();
        $('#addcompanyForm').modal('show');
      });
    });
  </script>

<script type="text/javascript">
    $(document).ready(function() {
        var oTable = $('.show-search-bar').dataTable();

        $('#tablebody').on('click', '.delete-company', function(e) {
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
                    url: "{{ url('/dashboard/company/') }}" + "/" + id,
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