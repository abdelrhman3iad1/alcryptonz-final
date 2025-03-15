<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    
    
    public function create(){
        return view('Dashboard.Admin.create');
    }
    // Search function that returns JSON response
    public function search(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'email' => 'required|string|email|max:255',
        ]);
        // Search for users with similar email
        $users = User::where('email', 'LIKE', '%' . $validated['email'] . '%')//->where('id','!=',Auth::user()->id)
                    ->get();
        
        // Return JSON response
        return response()->json(['users' => $users]);
    }
    
    // Change user role function
    public function changeRole(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'role' => 'required|in:0,1',
        ]);
        
        try {
            // Find the user
            $user = User::findOrFail($validated['user_id']);
            
            // Change the role
            $user->role = $validated['role'];
            $user->save();
            
            // Return success response
            return response()->json([
                'success' => true,
                'message' => 'تم تغيير صلاحية المستخدم بنجاح'
            ]);
        } catch (\Exception $e) {
            // Return error response
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء تغيير صلاحية المستخدم'
            ], 500);
        }
    }
}