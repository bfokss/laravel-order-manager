@extends('admin.dashboard')

@section('content')

<div class="row mt-5">
     &nbsp;
</div>

    <div class="card">
        <div class="card-header border-transparent">
            <h3 class="card-title">Registered users list</h3>
        
            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            </div>
        </div>
        <div class="card-body p-0">
        <div class="table-responsive table-hover table-striped">
            <table class="table m-0">
                <thead class="text-center">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Role</th>
                </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($data as $user)
                    <tr>
                        <td class="p-5"> {{ $user['id'] }} </td>
                        <td class="p-5"> {{ $user['name'] }} </td>
                        <td class="p-5"> {{ $user['email'] }} </td>
                        <td class="p-5"> {{ $user['role'] }} </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
        </div>
        <!-- /.card-footer -->
    </div>

        
    

@endsection