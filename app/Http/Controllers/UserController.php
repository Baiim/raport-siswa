<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use Illuminate\Support\Facades\Hash; 

class UserController extends Controller
{

    // ...
    

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::query();
            return Datatables::of($users)
                ->addIndexColumn()
                ->addColumn('action', function ($user) {
                    // Generate the delete button and the level change dropdown (assuming it's based on the user's current level)
                    $actions = '';
                    if (Auth::user()->level === 0) { // Assuming the current user is the admin (level 0)
                        $actions .= '<div class="d-flex">';
                        $actions .= '<div class="mr-2">';
                        $actions .= '<form style="display:inline" action="' . route('user.destroy', $user->id) . '" method="POST">';
                        $actions .= method_field('delete') . csrf_field();
                        $actions .= '<button type="submit" class="btn btn-danger btn-user"><i class="fas fa-trash-alt"></i></button>';
                        $actions .= '</form>';
                        $actions .= '</div>';
    
                        $actions .= '<div>';
                        $actions .= '<form style="display:inline" action="' . route('user.change-level', $user->id) . '" method="POST">';
                        $actions .= method_field('PUT') . csrf_field();
                        $actions .= '<select name="level" class="form-control" onchange="this.form.submit()">';
                        $actions .= '<option value="0" ' . ($user->level === 0 ? 'selected' : '') . '>Admin</option>';
                        $actions .= '<option value="1" ' . ($user->level === 1 ? 'selected' : '') . '>Guru</option>';
                        $actions .= '<option value="2" ' . ($user->level === 2 ? 'selected' : '') . '>Siswa</option>';
                        $actions .= '</select>';
                        $actions .= '</form>';
                        $actions .= '</div>';
                        $actions .= '</div>';
                    } else {
                        // If the current user is not an admin, only display the "Hapus" button
                        $actions .= '<form style="display:inline" action="' . route('user.destroy', $user->id) . '" method="POST">';
                        $actions .= method_field('delete') . csrf_field();
                        $actions .= '<button type="submit" class="btn btn-danger btn-user">Hapus</button>';
                        $actions .= '</form>';
                    }
    
                    // Return the generated buttons
                    return $actions;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    
        return view('pages.admin.master.user.index');
    }
    public function destroy($id)
    {
        $item = User::findorFail($id);
        $item->delete();

        return redirect()->route('user');

    }

    public function changeLevel(Request $request, $id)
    {
        // Check if the request method is PUT (you can also use $request->method() === 'PUT')
        if ($request->isMethod('put')) {
            // Find the user based on the provided ID
            $user = User::find($id);
    
            // Ensure the user exists
            if (!$user) {
                return redirect()->back()->with('error', 'User not found.');
            }
    
            // Check if the current user is an admin (level 0)
            if (Auth::user()->level === 0) {
                // Validate the input data (you can customize the validation rules as needed)
                $request->validate([
                    'level' => 'required|in:0,1,2', // Valid levels are 0, 1, or 2
                ]);
    
                // Update the user's level
                $user->level = $request->input('level');
                $user->save();
    
                // Redirect back with a success message
                return redirect()->back()->with('success', 'User level updated successfully.');
            } else {
                // If the current user is not an admin, redirect back with an error message
                return redirect()->back()->with('error', 'You are not authorized to change the user\'s level.');
            }
        } else {
            // If the request method is not PUT, redirect back with an error message
            return redirect()->back()->with('error', 'Invalid request method.');
        }
    }
    public function updatePasswordView(){
        return view('pages.admin.master.user.updatePassword');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();
    
        // Validate the input data
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ], [
            'new_password.confirmed' => 'The new password and confirmation do not match.',
        ]);
    
        // Check if the current password matches the one in the database
        if (!Hash::check($request->input('current_password'), $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.'])->withInput();
        }
    
        // Update the user's password
        $user->password = Hash::make($request->input('new_password'));
    
        // Save the changes
        $user->save();
    
        // Logout the user
        Auth::logout();
    
        return redirect()->route('login')->with('success', 'Password updated successfully. Please log in again.');
    }
    
}
