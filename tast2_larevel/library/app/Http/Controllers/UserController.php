<?php
// app/Http/Controllers/UserController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Display the library system
    public function showForm()
    {
        $users = User::all();
        return view('home', compact('users'));
    }

    // submission
    public function handleAction(Request $request)
    {
        $operation = $request->input('operation');

        switch ($operation) {
            case 'add':
                // Add a new user
                User::create([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'role' => $request->input('role'),
                ]);
                break;

            case 'update':
                // Update an existing user
                $user = User::find($request->input('userid'));
                if ($user) {
                    $user->update([
                        'name' => $request->input('name'),
                        'email' => $request->input('email'),
                        'role' => $request->input('role'),
                    ]);
                }
                break;

            case 'delete':
                // Delete a user
                $user = User::find($request->input('userid'));
                if ($user) {
                    $user->delete();
                }
                break;

            case 'list':
                
                break;
        }

        // Fetch all users to display in the table
        $users = User::all();
        return view('home', compact('users'));
    }
}