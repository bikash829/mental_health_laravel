<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */


    public function edit(Request $request,User $user)
    {
        return match ($request->data) {
            'basic_info' => redirect()->route('patient.edit_basic_info'),
            'address_info' => redirect()->route('patient.edit_address'),
            default => redirect()->back(),
        };


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $user = Auth::user();
//        dd($user->address()->updateOrCreate([],$request->all()));

        switch ($request->form) {
            case 'basic_info':
                $request->validate([
                    'first_name' => 'required',
                    'last_name' => 'required',
                ]);

                if($user->update($request->all())){
                    return redirect(route('patient.profile'));
                }else{
                    return redirect(route('error404'));
                }

            case 'address':
                $request->validate([
                    'address' => 'required',
                    'zip_code' => 'required',
                    'city' => 'required',
                    'state' => 'required',
                    'user_id' => 'required'
                ]);
                if($user->address()->updateOrCreate([],$request->all())){
                    return redirect(route('patient.profile'));
                }else{
                    return redirect(route('error404'));
                }
                break;
            case 'imageUpload':
//                $validated =  $request->validate([
//                                    'profile_picture' => 'required|image'|'size:2048',
//                                ]);
                $file = $request->file('profile_picture');
                $fileName = time().'.'.$file->extension();
                $fileLocation = 'images/uploads/pp';
                $file->move(public_path($fileLocation), $fileName);
                if(
                    $user->update([
                        'pp_name' => $fileName,
                        'pp_location' => $fileLocation,
                    ])
                ){
                    return redirect(route('patient.profile'));
                }else{
                    return redirect(route('error404'));
                }
                break;




//                dd($file->extension());
//                $hash_name = $file->hashName();
//                $file_extension = $file->getClientOriginalExtension();
//                $original_file_name = $file->getClientOriginalName();
//                dd($file->getClientOriginalName());
                break;
//            case 'contact_info':
//
//                break;
//            case 'medical_info':
//                continue;
//                break;

            default:
                return redirect(route('error404'));
                break;
        }





        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }


}
