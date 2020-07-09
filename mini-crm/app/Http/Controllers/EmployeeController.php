<?php
    
    namespace App\Http\Controllers;
    
    use App\Employee;
    use Illuminate\Http\Request;
    use DB;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Session;
    class EmployeeController extends Controller
    {
        /**
            * Display a listing of the resource.
            *
            * @return \Illuminate\Http\Response
        */
        public function index(){
            if(Auth::check()) {
                $employee = Employee::latest()->paginate(10);
                
                return view('employee.index',compact('employee'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
            }
            return redirect::to("/")->withSuccess('Oopps! You do not have access');
        }
        
        /**
            * Show the form for creating a new resource.
            *
            * @return \Illuminate\Http\Response
        */
        public function create(){
            if(Auth::check()) {
                $company = DB::table('companies')->get();
                return view('employee.create')->with('company', $company);
            }
            return redirect::to("/")->withSuccess('Oopps! You do not have access');
            //return view('employee.create',compact('company'));
        }
        
        /**
            * Store a newly created resource in storage.
            *
            * @param  \Illuminate\Http\Request  $request
            * @return \Illuminate\Http\Response
        */
        public function store(Request $request){
            if(Auth::check()) {
                $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'companies_id' => 'required',
                'email' => 'required',
                'phone' => 'required',
                ]);
                
                Employee::create($request->all());
                
                return redirect()->route('employee.index')
                ->with('success','Product created successfully.');
            } 
            return redirect::to("/")->withSuccess('Oopps! You do not have access');
        }
        
        /**
            * Display the specified resource.
            *
            * @param  \App\Product  $product
            * @return \Illuminate\Http\Response
        */
        public function show(Employee $employee){
            return view('employee.show',compact('employee'));
        }
        
        /**
            * Show the form for editing the specified resource.
            *
            * @param  \App\Product  $product
            * @return \Illuminate\Http\Response
        */
        public function edit(Employee $employee){
            
            if(Auth::check()) {
                $company = DB::table('companies')->get();
                //return view('employee.edit')->with(['company', $company],'employee');
                return view('employee.edit',compact(['company', $company],'employee'));
            }
            
            return redirect::to("/")->withSuccess('Oopps! You do not have access');
            
            
        }
        
        /**
            * Update the specified resource in storage.
            *
            * @param  \Illuminate\Http\Request  $request
            * @param  \App\Product  $product
            * @return \Illuminate\Http\Response
        */
        public function update(Request $request, Employee $employee){
            if(Auth::check()) {
                $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'companies_id' => 'required',
                'email' => 'required',
                'phone' => 'required',
                ]);
                
                $employee->update($request->all());
                
                return redirect()->route('employee.index')
                ->with('success','employee updated successfully');
            } 
            return redirect::to("/")->withSuccess('Oopps! You do not have access');
        }
        
        /**
            * Remove the specified resource from storage.
            *
            * @param  \App\Product  $product
            * @return \Illuminate\Http\Response
        */
        public function destroy(Employee $employee){
            if(Auth::check()) {
                $employee->delete();
                
                return redirect()->route('employee.index')
                ->with('success','employee deleted successfully');
            }
            return redirect::to("/")->withSuccess('Oopps! You do not have access');
        }
    }
