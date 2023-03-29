<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;


class UserController extends Controller
{   
    public function account(){
        $user = User::where('id', auth()->user()->id)->with(['purchases'])->first();

        return view('users.dashboard', [
            'user' => $user,
        ]);
    }

    public function updateUser(Request $request){
        $response = [];
        if($request->has('password')){
            $validator = Validator::make($request->all(), [
                'password' => [
                    'required'
                ],
    
                'password_new' => [
                    'required', Password::min(8)->numbers(), 'max:18', 'confirmed'
                ],
            ],
            
            [
                'password_new.required' => 'A new password is required.',
            ]);

            $user = User::find(auth()->user()->id);
            if ($validator->fails()) {
                $response['status'] = 'error';
                $response['errors'] = $validator->errors();
                return response()->json($response); 
            }
            if(!Hash::check($request->password, $user->password)){
                $response['pwd_check'] = 'fail';
                $response['message'] = 'Current password is incorrect!';
                return response()->json($response); 
            } else{

                User::where('id', $user->id)->update([
                    'password' => Hash::make($request->password_new),
                ]);

                $response['status'] = 'success';
                $response['message'] = 'Your password has been updated!';
                return response()->json($response); 


            }
            
        } else{
            $validator = Validator::make($request->all(), [
                'name' => [
                    'required'
                ],
    
                'email' => [
                    'required', 'email', 'unique:users,email, ' . auth()->user()->id
                ],
    
                'address_1' => [
                    'required'
                ],
    
                'address_2' => [
                    'required'
                ],
    
                'address_postcode' => [
                    'required', 'postal_code:GB,US,FR,DE,BE,ES,AU,NZ,CA'
                ],
    
                'country' => [
                    'required'
                ],
    
                'phone' => [
                    'phone:GB,US,FR,DE,BE,ES,AU,NZ,CA', 'numeric'
                ],
    
            ],
            
            [
                'address_postcode' => 'Please enter a valid postcode.',
                'phone' => 'Please enter a valid phone number!'
            ]);
    
            if(!isset($request->date_of_birth)){
                $request['date_of_birth'] = null;
            }
    
            if(!isset($request->gender)){
                $request['gender'] = null;
            }
    
            if(!isset($request->phone)){
                $request['phone'] = null;
            }
    
            if ($validator->fails()) {
                $response['status'] = 'error';
                $response['errors'] = $validator->errors();
                return response()->json($response); 
            }
    
            User::where('id', auth()->user()->id)->update($request->except('_method'));
            $response['status'] = 'success';
            $response['message'] = 'Your information has been updated!';
            return response()->json($response); 
        }
    }
}
