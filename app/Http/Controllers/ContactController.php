<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Contact;
use Auth;
use Mail;
use App\Mail\ContactMailable;
class ContactController extends Controller
{
    //
    public function showcontact()
    {
    	return view('pages.contact');
    }
    public function submitContact(ContactRequest $request)
    {


    	$contact=new Contact;
    	$contact->name=$request->name;
    	$contact->email=$request->email;
    	$contact->phone=$request->phone;
    	$contact->message=$request->message;
         if(Auth::check()):
         $contact->user_id=Auth::user()->id;
        endif;
        if ($contact->save()):
          Mail::to($request->email)->send(new ContactMailable($request));
          $data=array(
          'message'=>'Email has been successfully send, our team shortly contact you soon Thank You !',
            'alert'=>'alert alert-success');
              else:
      	$data=array(
          'message'=>'Something Went Wrong While Sening Email Try Later!',
          'alert'=>'alert alert-danger');
          endif;
         Session::put($data);
        return redirect()->back()->with('success',$success);
    }
}
