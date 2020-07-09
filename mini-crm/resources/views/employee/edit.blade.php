@extends('employee.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Employee</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('employee.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('employee.update',$employee->id) }}" method="POST">
        @csrf
        @method('PUT')
		<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>First Name:</strong>
                <input type="text" name="first_name" value="{{ $employee->first_name }}" class="form-control" placeholder="First Name">
            </div>
        </div>
		 <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>last Name:</strong>
                <input type="text" name="last_name" value="{{ $employee->last_name }}" class="form-control" placeholder="Last Name">
            </div>
        </div>
		 <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" value="{{ $employee->email }}" class="form-control" placeholder="Last Name">
            </div>
        </div>
		 <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>phone:</strong>
                <input type="text" name="phone" value="{{ $employee->phone }}" class="form-control" placeholder="Last Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
			<label>Company</label>
                <select name="companies_id" class="form-control">
					<option>-choose-</option>
					@foreach ($company as $company)
						<option value="{{ $company->id }}" {{ $company->id == $employee->companies_id ? 'selected' : '' }}>{{ $company->name }}</option>
					@endforeach
				</select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
         
   
    </form>
@endsection