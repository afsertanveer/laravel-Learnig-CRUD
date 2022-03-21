<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
        $url=url('/customer');
        $customer=new Customers();
        $title="Customer Registration";
        $data = compact('url','title','customer');
        return view('customer')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
                'country' => 'required',
                'state' => 'required',
                'address' => 'required',
                'dob' => 'required'

            ]
        );
        //insert query for laravel

        $customer = new Customers();
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->password=md5($request['password']);
        $customer->country= $request['country'];
        $customer->state = $request['state'];
        $customer->address = $request['address'];
        $customer->gender = $request['gender'];
        $customer->dob = $request['dob'];
        $customer->save();
        return redirect('/customer/view');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $search =$request['search'] ??"";
        if($search!=""){
            $customers= Customers::where('name','LIKE','%'.$search.'%')->orwhere('email','LIKE','%'.$search.'%')->get();
        }else{

            //$customers = Customers::get();
            $customers = Customers::paginate(15);
        }
        //print_r($customers);
        $data=compact('customers','search');
        return view('customer-view')->with($data);
    }

// for live search
    public function search(Request $request){

            if($request->ajax()){
                $search = $request->search;
                $customers= Customers::where('name','LIKE','%'.$search.'%')->
                orwhere('email','LIKE','%'.$search.'%')->get();

                $output='';
                if(count($customers)>0){

         $output ='
            <table class="table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
            </tr>
            </thead>
            <tbody>';

                foreach($customers as $row){
                    $output .='
                    <tr>
                    <td>'.$row->name.'</td>
                    <td>'.$row->email.'</td>
                    </tr>
                    ';
                }



         $output .= '
             </tbody>
            </table>';



    }
    else{

        $output .='No results';

    }

    return $output;

    }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $customer =Customers::find($id);
        if(is_null($customer)){
            return redirect('customer/view');
        }
        else{
            $url=('/customer/update')."/".$id;
            $title="Customer Update";
            $data= compact('customer','url','title');
            return view('customer')->with($data);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $customer = Customers::find($id);
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->country= $request['country'];
        $customer->state = $request['state'];
        $customer->address = $request['address'];
        $customer->gender = $request['gender'];
        $customer->dob = $request['dob'];
        $customer->save();
        return redirect('customer/view');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $customer= Customers::find($id);
        if(!is_null($customer)){
            $customer->delete();
        }
        return redirect('customer/view');

    }
    public function trash(){
        $customers=Customers::onlyTrashed()->get();
        $data = compact('customers');
        return view('customer-trash')->with($data);
    }
    public function restore($id){

        $customer=Customers::withTrashed()->find($id);
        if(!is_null($customer))
        {
            $customer->restore();
        }
        return redirect('customer/view');
    }
    public function forcedelete($id){

        $customer=Customers::withTrashed()->find($id);
        if(!is_null($customer))
        {
            $customer->forcedelete();
        }
        return redirect('customer/view');
    }

}
