namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller {
<?php
public function addUser(Request $request) {
    $validate_user = $request->validate([
    'email' => 'required'
    'password' => 'required'
    ]);

    $email = $request->input('email');
    $hashed_password = Hash:make($request->input('password'));
    $name = $request->input('name');
    $age = $request->input('age');

    $new_user = User:create([
        'email' => $email,
        'password' => $password,
        'name' => $name,
        'age' => $age
    ]);

    if ($new_user) {
        return response()->json(
            $new_user->name,
            $new_user->email
        );
        } else {
            abort(412);
        }
    }
}