<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Str;

class UserController extends Controller
{
    use AuthenticatesUsers;



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
        $request->validate([
            'doc_title' => ['required','integer'],
            'first_name' => ['required','string','max:20'],
            'last_name' => ['required','string','max:20'],
            'marital_status' => ['integer','max:3'],
            'gender'=>['required','max:10'],
            'phone_code' =>['max:6',],
            'phone'=>['max:20',],
            'additional_phone_code' =>['max:6',],
            'additional_phone'=>['max:20',],
            'date_of_birth'=> ['required','date',],
            'identity_type' => ['required','integer','max:3'],
            'identity_no' => ['required','max:20'],
            'identity_proof_file' => ['required','mimes:jpeg,jpg,png,pdf','max:2048'],
            'license_attachment_file' => ['required','mimes:jpeg,jpg,png,pdf','max:2048'],
//            'identity_location' => ['required',],
            'religion' => ['string','max:10'],
        ]);

        $user = Auth::user();


        if($request->file('identity_proof_file')){
            $file = $request->file('identity_proof_file');
            $fileName = Str::uuid().'.'.$file->extension();
            $fileLocation = 'uploads/important_documents/doctor_license';
            $file->move(public_path($fileLocation), $fileName);

            // merging info into request
            $request->merge(['identity_proof' => $fileName]);
            $request->merge(['identity_location' => $fileLocation]);
        }

        if($request->file('license_attachment_file')){
            $file = $request->file('license_attachment_file');
            $fileName = Str::uuid().'.'.$file->extension();
            $fileLocation = 'uploads/important_documents/doctor_license';
            $file->move(public_path($fileLocation), $fileName);

            // merging info into request
            $request->merge(['license_attachment' => $fileName]);
            $request->merge(['license_attachment_location' => $fileLocation]);
        }


        $user->update($request->all());
        $user->address()->updateOrCreate([],$request->all());
        $user->expert()->updateOrCreate([],$request->all());

        return response()->json(['message' => 'Data updated successfully']);

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
        $user = Auth::user();
//        dd($user->address()->updateOrCreate([],$request->all()));

        switch ($request->form) {
            case 'basic_info':
                $request->validate([
                    'first_name' => ['required','string','max:50'],
                    'last_name' => ['required','string','max:50'],
                ]);

                if($user->update($request->all())){
                    return redirect(route('patient.profile'));
                }else{
                    return redirect(route('error404'));
                }

            case 'address':
                $request->validate([
                    'address' => ['required','string','max:100'],
                    'zip_code' => ['required','string','max:20'],
                    'city' => ['required','string','max:50'],
                    'state' => ['required','string','max:50'],
                    'user_id' => ['required','max:20']
                ]);
                if($user->address()->updateOrCreate([],$request->all())){
                    return redirect(route('patient.profile'));
                }else{
                    return redirect(route('error404'));
                }
                break;
            case 'imageUpload':

                $request->validate([
                    'profile_picture' => ['required','image','mimes:jpeg,png,gif','max:2048'],
                ]);

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
                    if($user->hasRole('Admin')){
                        return redirect(route('admin.profile'));
                    }elseif($user->hasRole('Doctor')){
                        return redirect(route('doctor.profile'));
                    }elseif($user->hasRole('Counselor')){
                        return redirect(route('counselor.profile'));
                    }elseif($user->hasRole('Patient')){
                        return redirect(route('patient.profile'));
                    }else{
                        return redirect(route('error404'));
                    }

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

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }


}
