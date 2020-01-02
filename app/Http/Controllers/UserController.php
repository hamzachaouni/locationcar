<?php
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function index()
    {
        //$users = User::all();
        $users = DB::table('users')
                    ->where('id','!=', Auth::id())
                    ->whereNull('deleted_at')
                    ->get();
        return response()->json(
            [
                'status' => 'success',
                'users' => $users->toArray()
            ], 200);
        /*$users = User::all();
        return UserResource::collection($users);*/
    }
    public function show($id)
    {
        $user = User::find($id);
        return response()->json(
            [
                'status' => 'success',
                'user' => $user->toArray()
            ], 200);
        //return new UserResource($id);
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name'  => $request->name,
            'email'  => $request->email,
            'photo'  => time().'.'.$request->image->getClientOriginalExtension(),           
            'role'  => $request->role,       
            'password' => bcrypt($request->password)
        ]);

        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);
        
        return response()->json(['success'=>'You have successfully upload image.']);
    }

    public function update(Request $request, User $user)
    {
        $user->update([
            'name'  => $request->name,
            'photo'  => time().'.'.$request->image->getClientOriginalExtension(),
            'email'  => $request->email,
            'role'  => $request->role,       
            'password' => bcrypt($request->password)
        ]);

        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);
        

        return response('updated', 202);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response('deleted', 204);
    }
}