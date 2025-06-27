<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostReport;
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
        return redirect()->route('index')->with('message', 'Logout Successfully');
    }

    public function dashboard()
    {
        try {
            if (Auth::check()) {
                return view('Admin/dashboard/index');
            } else {
                return redirect()->route('index');
            }
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
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
