<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    


    public function dashboard()
    {
        $this->authorize('isAdmin');

        $pendingReports = Report::where('status', 'pending')
            ->latest()
            ->get();

        $reviewedReports = Report::whereIn('status', ['reviewed', 'rejected', 'action_taken'])
            ->latest()
            ->take(20)
            ->get();

        $blockedUsersCount = User::where('is_blocked', true)->count();
        $totalReports = Report::count();

        return view('admin.dashboard', [
            'pendingReports' => $pendingReports,
            'reviewedReports' => $reviewedReports,
            'blockedUsersCount' => $blockedUsersCount,
            'totalReports' => $totalReports,
        ]);
    }

    


    public function viewReport(Report $report)
    {
        $this->authorize('isAdmin');

        return view('admin.report-detail', ['report' => $report]);
    }

    


    public function reviewReport(Request $request, Report $report)
    {
        $this->authorize('isAdmin');

        $validated = $request->validate([
            'status' => 'required|in:reviewed,rejected,action_taken',
            'admin_notes' => 'nullable|string|max:1000',
            'action' => 'required_if:status,action_taken|in:block,delete',
        ]);

        $report->update([
            'status' => $validated['status'],
            'admin_notes' => $validated['admin_notes'],
            'reviewed_by' => auth()->id(),
            'reviewed_at' => now(),
        ]);

        
        if ($validated['status'] === 'action_taken' && isset($validated['action'])) {
            if ($validated['action'] === 'block') {
                $report->reportedUser->update([
                    'is_blocked' => true,
                    'blocked_at' => now(),
                    'admin_message' => "Akun Anda telah diblokir karena: " . ($validated['admin_notes'] ?? 'Melanggar syarat dan ketentuan platform')
                ]);
                $message = 'User telah diblokir';
            } elseif ($validated['action'] === 'delete') {
                $report->reportedUser->update([
                    'admin_message' => "Akun Anda telah dihapus karena: " . ($validated['admin_notes'] ?? 'Melanggar syarat dan ketentuan platform')
                ]);
                $report->reportedUser->listings()->delete();
                $report->reportedUser->delete();
                $message = 'Akun user telah dihapus';
            }
        } else {
            $message = 'Laporan telah direview';
        }

        return redirect()->route('admin.dashboard')->with('success', $message);
    }

    


    public function blockedUsers()
    {
        $this->authorize('isAdmin');

        $blockedUsers = User::where('is_blocked', true)
            ->latest()
            ->paginate(15);

        return view('admin.blocked-users', ['blockedUsers' => $blockedUsers]);
    }

    


    public function unblockUser(User $user)
    {
        $this->authorize('isAdmin');

        $user->update([
            'is_blocked' => false,
            'admin_message' => null,
            'blocked_at' => null
        ]);

        return redirect()->back()->with('success', 'User telah dibuka blokirnya');
    }

    


    public function deleteUser(User $user)
    {
        $this->authorize('isAdmin');

        $username = $user->name;
        $user->listings()->delete();
        $user->delete();

        return redirect()->back()->with('success', "Akun {$username} telah dihapus");
    }

    


    protected function authorize($ability)
    {
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            abort(403, 'Hanya admin yang dapat mengakses fitur ini');
        }
    }
}
