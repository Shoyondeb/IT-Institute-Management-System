<?php
// app/Http/Controllers/Admin/UserController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of users.
     */
    public function index(Request $request)
    {
        $query = User::orderBy('created_at', 'asc');

        // Search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Role filter
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        $users = $query->paginate(10)->withQueryString();

        return Inertia::render('Admin/Users/Index', [
            'users' => $users, // Pass the entire paginator object
            'currentUser' => auth()->id(),
            'filters' => $request->only(['search', 'role'])
        ]);
    }

    /**
     * Update the specified user's role.
     */
    public function update(Request $request, User $user)
    {
        // Prevent admins from changing their own role
        if (auth()->id() === $user->id) {
            return back()->with('error', 'You cannot change your own role.');
        }

        $validated = $request->validate([
            'role' => ['required', Rule::in(['admin', 'student'])],
        ]);

        $user->update($validated);

        return back()->with('success', 'User role updated successfully.');
    }
}
