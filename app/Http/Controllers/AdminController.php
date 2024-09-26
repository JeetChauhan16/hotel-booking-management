<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    

    public function index()
    {
        
        return view('admin.admin_login');
    }

    public function register()
    {
        return view('admin.admin_register');
    }


    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            return redirect()->route('dashboard')->with('success', 'Login successful!');
        }

        throw ValidationException::withMessages([
            'email' => ['The provided credentials do not match our records.'],
        ]);


    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Logged out successfully!');
    }

    public function dashboard(Request $request)
    {
        
        return view('admin.dashboard');
    }




    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        session()->flash('success', 'Registration successful!');
        return redirect()->route('admin');
    }

    public function users(Request $request)
    {
        
        return view('admin/user-list');
    }

    public function getUserData(Request $request)
    {
        $columns = ['id', 'name', 'email', 'created_at', 'updated_at'];

        $length = $request->input('length');
        $column = $request->input('column'); // Index
        $dir = $request->input('dir');
        $searchValue = $request->input('search');

        $query = User::select($columns)
            ->when($searchValue, function ($query, $searchValue) {
                return $query->where('name', 'like', '%' . $searchValue . '%')
                    ->orWhere('email', 'like', '%' . $searchValue . '%');
            });

        $total = $query->count();

        $users = $query->orderBy($columns[$column], $dir)
            ->offset($request->input('start'))
            ->limit($length)
            ->get();

        $data = [];
        foreach ($users as $user) {
            $data[] = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'created_at' => $user->created_at,
                'action' => "<a class='btn btn-info btn-sm' href='editUser?id=$user->id,'> Edit </a>
				<a class='btn btn-danger btn-sm'
				onclick=\"return confirm('Are you sure you want to delete this record?')\"
				 href='deletUser/$user->id'> Delete </a>"
            ];
        }

        return response()->json([
            'data' => $data,
            'draw' => $request->input('draw'),
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
        ]);
    }

    public function deletUser($id)
    {
        $user = User::find($id);
        if(!empty($user ))
        {
            $user->delete();
            return redirect()->route('users')->with('success', 'User deleted successfully.');
        }
        else{
            return redirect()->route('users')->with('error', 'User not found.');
        }
        
        // Return a redirect or a JSON response based on your needs
        
    }
}
