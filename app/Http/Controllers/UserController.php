<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
  public function showHome(){
    return view('welcome');
  }
 
  public function postSignUp(Request $request)
  {
$this->validate($request,[
  'email' => 'required|email|unique:users',
  'fname' => 'required|max:120',
  'password' => 'required|min:4'
]);

 $email= $request->input('email');
$fname= $request->input('fname');
$password= bcrypt($request->input('password'));

$user = new User();
$user->email=$email;
$user->fname=$fname;
$user->password =$password;

$user->save();
Auth::login($user);
return redirect()->route('dashboard');

  }
  public function postSignIn(Request $request)
  {
    $this->validate($request,[
      'email' => 'required',
      'password' => 'required'
    ]);
    $credentials = $request->only('email','password');
    if( Auth::attempt($credentials))
    {
      return redirect()->route('dashboard');

    }
    else{
      return redirect()->back();
    }
  }
  public function getLogOut()
  {
    Auth::logout();
    return redirect()->route('home');

  }
public function getAccount()
{
  return view('account', ['user' => Auth::user()]);
}

public function postSaveAccount(Request $request)
    {
        $this->validate($request, [
           'fname' => 'required|max:120'
        ]);

        $user = Auth::user();
        $old_name = $user->fname;
        $user->fname = $request['fname'];
        $user->update();
        $file = $request->file('image');
        $filename = $request['fname'] . '-' . $user->id . '.jpg';
        $old_filename = $old_name . '-' . $user->id . '.jpg';
        $update = false;
        if (Storage::disk('local')->has($old_filename)) {
            $old_file = Storage::disk('local')->get($old_filename);
            Storage::disk('local')->put($filename, $old_file);
            $update = true;
        }
        if ($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }
        if ($update && $old_filename !== $filename) {
            Storage::delete($old_filename);
        }
        return redirect()->route('account');
    }

    public function getUserImage($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }

}
?>