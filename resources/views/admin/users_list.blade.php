@extends('admin.dashboard')

@section('content')

<div class="row mt-5">
     &nbsp;
</div>
    <h2> Registered users list </h2>
    <div class="card"> 
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