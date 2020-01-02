<?php
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class AuthController extends Controller
{
    public function register(Request $request)
    {
        $v = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password'  => 'required|min:3|confirmed',
        ]);
        if ($v->fails())
        {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }
        $user = new User;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json(['status' => 'success'], 200);
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if ($token = $this->guard()->attempt($credentials)) {
            return response()->json(['status' => 'success'], 200)->header('Authorization', $token);
        }
        return response()->json(['error' => 'login_error'], 401);
    }
    public function logout()
    {
        $this->guard()->logout();
        return response()->json([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200);
    }
    public function user(Request $request)
    {
        $user = User::find(Auth::id());
        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
    }

    public function userupdate(Request $request)
    {
        //return $request->image;
        //return $request->input('user.role');

        /*$user = User::findOrFail(Auth::id());
        return $user;
        $user->name = $request->input('user.name');
        //$user->photo = time().'.'.$request->image->getClientOriginalExtension();
        $user->email = $request->input('user.email');
        $user->role = $request->input('user.role');
        $user->password = bcrypt($request->input('user.password'));
        $user->save();*/
        
        /*$imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);*/

        /*return response('updated', 202);*/

        
        $user = User::findOrFail(Auth::id());
        $user->update([
            'name'  => $request->name,
            'photo'  => time().'.'.$request->image->getClientOriginalExtension(),
            'email'  => $request->email,
            'role'  => $request->role,       
            'password' => bcrypt($request->password)
        ]);

        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);
    }

    public function refresh()
    {
        if ($token = $this->guard()->refresh()) {
            return response()
                ->json(['status' => 'successs'], 200)
                ->header('Authorization', $token);
        }
        return response()->json(['error' => 'refresh_token_error'], 401);
    }
    private function guard()
    {
        return Auth::guard();
    }
}