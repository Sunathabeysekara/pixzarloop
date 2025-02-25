<?php
// app/Http/Controllers/AuthController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('index');
    }

    // Handle the login form submission
    public function handleLogin(Request $request)
    {
        $request->validate([
            'userid' => 'required|string',
            'password' => 'required|string',
        ]);

        $userid = $request->input('userid');
        $password = $request->input('password');

        // Query the database
        $admin = DB::table('admins')
            ->where('id', $userid)
            ->where('password', $password)
            ->first();

        if ($admin) {
            // Redirect to the home page after successful login
            return redirect()->route('home');
        } else {
            return back()->withErrors(['error' => 'Wrong ID or password'])->withInput();
        }
    }
}