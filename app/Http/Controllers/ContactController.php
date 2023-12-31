<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Contacts;

class ContactController extends Controller
{
    //
    public function index(Request $request)
    {
        $contacts = Contacts::where('user_id', Auth::id())
        ->latest()
        ->paginate(5);

        $query = $request->input('q');
        
        if ($query) {
            $contacts = Contacts::where('user_id', Auth::id())
            ->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'like', "%$query%")
                             ->orWhere('email', 'like', "%$query%")
                             ->orWhere('phone', 'like', "%$query%")
                             ->orWhere('address', 'like', "%$query%");
            })->latest()->paginate(5);
        
        }

        return view('contacts/index',compact('contacts', 'request'));
    }

    public function create()
    {
        return view('contacts/create');
    }

    public function store(Request $request)
    {

        $save_contact = Contacts::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'user_id' => $request->user_id
        ]);

        return redirect('contacts/')->with('success',$save_contact->name.' has been successfully added.');
    }

    public function edit($id)
    {
        $contact = Contacts::find($id);

        return view('contacts/edit',compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $update_contact = Contacts::find($id);
        $update_contact -> name = $request->name;
        $update_contact -> email = $request->email;
        $update_contact -> phone = $request->phone;
        $update_contact -> address = $request->address;

        $update_contact -> save();

        return redirect('contacts/')->with('success',$update_contact->name.' has been successfully updated.');

    }

    public function show($id)
    {
        $contact = Contacts::find($id);

        return view('contacts/show',compact('contact'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $approve_contact = Contacts::find($id);
        $approve_contact -> delete();

        return redirect('contacts')->with('success','Contact has been successfully deleted.');
    }
}
