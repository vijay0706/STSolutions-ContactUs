<?php


namespace avsr_sts\Contactus\Http\Controllers; 

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use avsr_sts\Contactus\Models\ContactUs;
use avsr_sts\Contactus\Mail\ContactMailable;
use Illuminate\Support\facades\Mail;

class ContactUsController extends Controller
{
    //

    public function index(){
        return view('contactus::contact');
    }

    public function send(Request $request)
        {
        Mail::to(config('conf_contact.send_email_to'))->send(new ContactMailable($request->message, $request->name,
        $request->email));

        $feeds = ContactUs::create($request->all());
        $message = $feeds->wasRecentlyCreated ? "Thank you for contacting us! We will get back to you shortly." : "Message not send";

        if ($request->ajax()) {
            return response()->json(['status' => 'success', 'message' => $message]);
        } 
    }


}
