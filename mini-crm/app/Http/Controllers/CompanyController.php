<?php
    
    namespace App\Http\Controllers;
    
    use App\Company;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Session;
    class CompanyController extends Controller
    {
        /**
            * Display a listing of the resource.
            *
            * @return \Illuminate\Http\Response
        */
        public function index(){
            if(Auth::check()) {
                $company = Company::latest()->paginate(10);
                
                return view('company.index',compact('company'))
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
                return view('company.create');
            }
            return redirect::to("/")->withSuccess('Oopps! You do not have access');
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
                'name' => 'required',
                'email' => 'required',
                'logo' => 'required',
                ]);
                
                $imageName = time().'.'.$request->logo;  
                $request->logo->move(public_path('images'), $imageName);
                Company::create($request->all());
                
                return redirect()->route('company.index')
                ->with('success','company created successfully.');
            }
            return redirect::to("/")->withSuccess('Oopps! You do not have access');
        }
        
        /**
            * Display the specified resource.
            *
            * @param  \App\Product  $product
            * @return \Illuminate\Http\Response
        */
        public function show(Company $company){
            if(Auth::check()) {
                return view('company.show',compact('company'));
            }
            return redirect::to("/")->withSuccess('Oopps! You do not have access');
        }
        
        /**
            * Show the form for editing the specified resource.
            *
            * @param  \App\Product  $product
            * @return \Illuminate\Http\Response
        */
        public function edit(Company $company){
            if(Auth::check()) {
                return view('company.edit',compact('company'));
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
        public function update(Request $request, Company $company){
            if(Auth::check()) {
            $request->validate([
            'name' => 'required',
            'email' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            
            $imageName = time().'.'.$request->logo;  
            $request->logo->move(public_path('images'), $imageName);
            
            $company->update($request->all());
            
            return redirect()->route('company.index')
            ->with('success','company updated successfully');
            }
            return redirect::to("/")->withSuccess('Oopps! You do not have access');
        }
        
        /**
            * Remove the specified resource from storage.
            *
            * @param  \App\Product  $product
            * @return \Illuminate\Http\Response
        */
        public function destroy(Company $company){
            if(Auth::check()) {
                $company->delete();
                
                return redirect()->route('company.index')
                ->with('success','company deleted successfully');
            }
            return redirect::to("/")->withSuccess('Oopps! You do not have access');
        }
    }
