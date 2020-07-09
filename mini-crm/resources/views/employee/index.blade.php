@extends('employee.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Employees</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('employee.create') }}"> Add New Employee</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Company</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($employee as $emp)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $emp->first_name. $emp->last_name }}</td>
            <td>{{ $emp->email }}</td>
            <td>{{ $emp->phone }}</td>
            <td>{{ $emp->companies_id }}</td>
            <td>
                <form action="{{ route('employee.destroy',$emp->id) }}" method="POST">
   
                  
    
                    <a class="btn btn-primary" href="{{ route('employee.edit',$emp->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    #{!! $employee->links() !!}
      
@endsection