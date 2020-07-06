<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;


class SettingController extends Controller
{
    private $setting;
    
    public function __construct(Setting $setting) {
        $this->setting = $setting;
    }

    public function index()
    {
        $settings =  $this->setting->all();
        return view('settings.index',['settings' => $settings]);
    }

    public function create()
    {
        return view('settings.create');
    }

    public function show($id)
    {
        $settings = $this->setting->findOrFail($id);
        return view('settings.show',['settings' => $settings]);
    }

    public function edit($id)
    {
        $settings = $this->setting->findOrFail($id);
        return view('settings.create',['settings' => $settings]);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $validated = $request->validate([
            'company' => 'required|string',
            'issuer' => 'string|nullable',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address' => 'string|nullable',
            'email' => 'required|email',
            'website' => 'string',
            'telephone' => 'string|nullable',
            'phone' => 'string|nullable'
        ]);
        if (!$validated) {
            return redirect()->back()->withInput($request->all());
        }
        if ($files = $request->file('logo')) {
            $destinationPath = 'images/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            //$insert['image'] = "$profileImage";
         }
         $settings = Setting::create([
            'company' => $request->company,
            'issuer' => $request->issuer,
            'logo' => $profileImage,
            'address' => $request->address,
            'email' => $request->email,
            'website' => $request->website,
            'telephone' => $request->telephone,
            'phone' => $request->phone
         ]);
         if (!$settings) {
             return redirect()->back()->withInput($request->all());
         }
         return redirect()->route('settings.index');
    }

    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'company' => 'required|string',
            'issuer' => 'string|nullable',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address' => 'string|nullable',
            'email' => 'required|email',
            'website' => 'string',
            'telephone' => 'string|nullable',
            'phone' => 'string|nullable'
        ]);
        if (!$validated) {
            return redirect()->back()->withInput($request->all());
        }
        if ($files = $request->file('logo')) {
            $destinationPath = 'images/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            //$insert['image'] = "$profileImage";
         }
         $settings = $this->setting->findOrFail($id);
         $result = $settings->update([
            'company' => $request->company,
            'issuer' => $request->issuer,
            'logo' => $profileImage,
            'address' => $request->address,
            'email' => $request->email,
            'website' => $request->website,
            'telephone' => $request->telephone,
            'phone' => $request->phone
         ]);
         if (!$result) {
             return redirect()->back()->withInput($request->all());
         }
         return redirect()->route('settings.index');
    }
}
