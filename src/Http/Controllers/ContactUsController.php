<?php


namespace Sts\Contactus\Http\Controllers; 

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sts\Contactus\Models\ContactUs;
use Sts\Contactus\Mail\ContactMailable;
use Illuminate\Support\facades\Mail;

class ContactUsController extends Controller
{
    //

    public function index(){
        return view('contactus::contact');
    }

    public function send(Request $request){

        Mail::to(config('conf_contact.send_email_to'))->send(new ContactMailable($request->message, $request->name, $request->email));

        ContactUs::create($request->all());
        
        return redirect(route('contactus'));
    }

}