<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::all();
        return view('customers.list', compact('customers'));
    }

    public function create(){
        return view('customers.create');
    }

    public function store(Request $request){
        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->dob = $request->input('dob');
        $customer->save();

        Session::flash('success', 'Tao moi khach hang thanh cong');

        return redirect()->route('customers.index');
    }

    public function update(Request $request,$id){
        $customer = Customer::findOrFail($id);
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->dob = $request->input('dob');
        $customer->save();

        Session::flash('success','Cap nhat khach hang thanh cong');

        return redirect()->route('customers.index');
    }

    public function destroy($id){
        $customer = Customer::findOrFail($id);
        $customer->delete();

        Session::flash('success','xoa khach hang thanh cong');

        return redirect()->route('customers.index');
    }

}
