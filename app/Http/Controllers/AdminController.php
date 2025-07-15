<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostReport;
use App\Models\User;
use App\Services\ResponseService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('dashboard')->with('message', 'Admin Login Successfully');
            } else {
                Auth::logout();
                return back()->with(['error' => 'Only admin can login.']);
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('message', 'Logout Successfully');
    }

    public function dashboard()
    {
        try {
            if (Auth::check()) {
                return view('dashboard/index');
            } else {
                return redirect()->route('index');
            }
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function profile()
    {
        try {
            if (Auth::check()) {
                $user = Auth::user();
                if ($user->role === 'admin') {

                    $profile = User::where('id', $user->id)->first();

                    return view('dashboard/profile', compact('profile'));
                }
            } else {
                return redirect()->route('index');
            }
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }


    public function users()
    {
        $users = User::with('profile')
            ->where('role', '!=', 'admin')
            ->paginate(10);
        return view('dashboard.users.index', compact('users'));
    }

    public function userDetail($id)
    {
        $user = User::with([
            'profile',
            'saveLessons.lesson',
            'panicLogs',
            'progress'
        ])
            ->where('role', '!=', 'admin')
            ->where('id', $id)
            ->firstOrFail();

        $commitments = $user->commitments()
            ->latest()
            ->paginate(6); // Adjust the per-page limit

        $lessons = $user->saveLessons()
            ->with('lesson')
            ->paginate(6);

        $panicLogs = $user->panicLogs()
            ->paginate(6);


        return view('dashboard.users.user-detail', compact('user', 'commitments', 'lessons', 'panicLogs'));
    }


    public function toggleUserStatus($id)
    {
        $user = User::with('profile')->find($id);

        if (!$user) {
            return redirect()->back()->with('danger', 'User not found.');
        }

        // Toggle the status
        if ($user->status == 1) {
            $user->status = 0;
            $message = 'Account Suspended Successfully.';
            $alertType = 'danger';
        } else {
            $user->status = 1;
            $message = 'Account Activated Successfully.';
            $alertType = 'success';
        }

        $user->save();

        return redirect()->back()->with($alertType, $message);
    }


    public function handlePostReport(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'report_id' => 'required|exists:post_reports,id',
            'status' => 'required|in:approved,rejected'
        ]);

        if ($validator->fails()) {
            return ResponseService::validationError($validator->errors()->first());
        }

        $report = PostReport::findOrFail($request->report_id);
        $report->status = $request->status;
        $report->save();

        if ($report->status === 'approved') {
            Post::where('id', $report->post_id)->delete();
        }

        return ResponseService::successResponse("Report status updated to {$report->status}.");
    }
}
