<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Athlete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AthletesExport;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->where('status', 'pending')->get();
        $totalUsers = $this->user->count();
        $pendingUsers = $this->user->where('status', 'pending')->count();

        return view('admin.dashboard', compact('users', 'totalUsers', 'pendingUsers'));
    }

    public function updateStatus(Request $request, $userId)
    {
        $user = $this->user->findOrFail($userId);

        $action = last(explode('/', $request->url()));

        if (!in_array($action, ['approve', 'reject'])) {
            return Redirect::back()->withErrors(['error' => 'Invalid action.']);
        }

        $status = $action == 'approve' ? 'approved' : 'rejected';

        $user->status = $status;
        $user->save();

        return Redirect::to('/admin/dashboard')->with('success', 'User status updated successfully.');
    }

    public function indexUser()
    {
        $users = $this->user->all();
        return view('admin.users.index', compact('users'));
    }

    public function destroyUser($userId)
    {
        $user = $this->user->findOrFail($userId);
        $user->delete();

        return Redirect::to('/admin/users')->with('success', 'User deleted successfully.');
    }

    public function editUser($userId)
    {
        $user = $this->user->findOrFail($userId);
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, $userId)
    {
        $user = $this->user->findOrFail($userId);

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();

        if ($request->password) {
            $validatedData['password'] = Hash::make($request->password);
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);

        return Redirect::to('/admin/users')->with('success', 'User updated successfully.');
    }

    public function createUser()
    {
        return view('admin.users.create');
    }

    public function storeUser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['status'] = $request->status;

        User::create($validatedData);

        return Redirect::to('/admin/users')->with('success', 'User baru telah ditambahkan!');
    }

    public function athletes()
    {
        $athletesByUser = Athlete::with('user')
            ->get()
            ->groupBy('user_id');

        return view('admin.athletes.index', compact('athletesByUser'));
    }

    public function export()
    {
        $athletes = Athlete::all();

        return Excel::download(new AthletesExport($athletes), 'athletes.xlsx');
    }

    public function exportByUser($userId)
    {
        $user = User::findOrFail($userId);
        $userName = $user->name;
        $athletes = Athlete::whereHas('user', function ($query) use ($userId) {
            $query->where('id', $userId);
        })->get();
        
        $userName = preg_replace('/[^a-zA-Z0-9_\-]/', '_', strtolower($userName));
        $filename = "athletes-{$userName}.xlsx";

        return Excel::download(new AthletesExport($athletes), $filename);
    }


}