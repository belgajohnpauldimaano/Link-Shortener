<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Link;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function url_shortener (Request $request)
    {
        $rules = [
                'url' => 'required|url'
            ];
        // validation checking of existence and valid url
        $Validator = \Validator::make($request->all(), $rules);
    
        // check if input is invalid
        if ($Validator->fails())
        {
            return response()->json(['errCode' => 1, 'generalMessage' => 'Invalid input.', 'errors' => $Validator->getMessageBag()]);
        }

        // cheking for exisiting link to the database
        $Link = Link::where('actual_link', $request->url)->first();

        if ($Link) // existing link
        {
            // return the link that was saved on the database
        $shortened_link = url($Link->shortened_link);
            return response()->json(['errCode' => 0, 'generalMessage' => 'Successfully shortened.', 'shortened_url' => $shortened_link]);
        }
        
        // generate random code
        $url_code = str_random(6);
        // generate url with url shortened code
        $shortened_link = url($url_code);

        // create new shortened url
        $Link = new Link();
        $Link->actual_link = $request->url;
        $Link->shortened_link = $url_code;
        $Link->save();
        
        // return the newly created shortened url
        return response()->json(['errCode' => 0, 'generalMessage' => 'Successfully shortened.', 'shortened_url' => $shortened_link]);
    }

    public function redirect_shortened_url ($url_code)
    {
        $Link = Link::where('shortened_link', $url_code)->first();
        return redirect($Link->actual_link);
    }
}
