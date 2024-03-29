@extends('backend.layout')

@section('content')
    <div class="container-fluid">

        @include('backend.default.alert')

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Authorities</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Authorities</h6>
                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">Add New</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name and Surname</th>
                                <th>Email</th>
                                <th>Date of registration</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name and Surname</th>
                                <th>Email</th>
                                <th>Date of registration</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach (App\Models\Admins::get() as $admin)
                                <tr>
                                    <td>{{ $admin->name_surname }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->created_at }}</td>
                                    <td>
                                        <button class="btn btn-info btn-sm btnEdit"
                                            data-id="{{ $admin->id }}">Edit</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ base_url('admin/add-new-admin') }}" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" required class="form-control" placeholder="Email" name="email">
                        </div>

                        <div class="form-group">
                            <label>Name and Surname</label>
                            <input type="text" required class="form-control" placeholder="Name and Surname"
                                name="name_surname">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" required class="form-control" placeholder="Password" name="password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ base_url('admin/update-admin') }}" method="POST" id="editForm">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" required class="form-control" placeholder="Email" name="email">
                        </div>

                        <div class="form-group">
                            <label>Name and Surname</label>
                            <input type="text" required class="form-control" placeholder="Name and Surname"
                                name="name_surname">
                        </div>

                        <div class="form-group">
                            <label>
                                <input type="checkbox"  id="passwordChange">
                                Change Password
                            </label>
                        </div>

                        <div class="form-group password-change-group">
                            <label>Password</label>
                            <input type="password" required class="form-control" placeholder="Password"
                                name="password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $('.btnEdit').on('click', function() {
            const id = $(this).data('id')

            $.get("{{ base_url('api/getAdminById/') }}" + id, function(response) {
                if (response.status) {
                    $('#editModal').modal('show');
                    $('#editForm').find('[name="id"]').val(id);

                    $('#editForm').find('[name="email"]').val(response.data.email);
                    $('#editForm').find('[name="name_surname"]').val(response.data.name_surname);

                    $('#editForm').find('[name="password"]').prop( "disabled", true ).prop( "required", false );
                    $('.password-change-group').hide();

                    $('#passwordChange').on('change' , function() {
                        if ($(this).is(':checked')) {
                            $('.password-change-group').show();
                            $('#editForm').find('[name="password"]').prop( "disabled", false ).prop( "required", true );
                        }
                        else {
                            $('.password-change-group').hide();
                            $('#editForm').find('[name="password"]').prop( "disabled", true ).prop( "required", false );
                        }
                    })
                } else {
                    alert(response.message);
                }
            });
        });
    </script>
@endpush
