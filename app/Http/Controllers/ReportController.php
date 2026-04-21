<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use App\Models\ReportImage;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    


    public function create($user_id)
    {
        $user = User::findOrFail($user_id);
        
        
        if (auth()->id() === $user_id) {
            return redirect()->back()->with('error', 'Anda tidak dapat melaporkan diri sendiri');
        }

        return view('report.create', ['reportedUser' => $user]);
    }

    


    public function store(Request $request)
    {
        $validated = $request->validate([
            'reported_user_id' => 'required|integer|exists:users,id|different:reporter_id',
            'reason' => 'required|in:harassment,spam,inappropriate_content,fraud,other',
            'description' => 'nullable|string|max:1000',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:5120', 
        ], [
            'reported_user_id.different' => 'Anda tidak dapat melaporkan diri sendiri',
            'reported_user_id.exists' => 'User yang dilaporkan tidak ditemukan',
            'images.*.image' => 'File harus berupa gambar',
            'images.*.mimes' => 'Format gambar harus: jpeg, png, jpg, atau gif',
            'images.*.max' => 'Ukuran gambar tidak boleh lebih dari 5MB',
        ]);

        $validated['reporter_id'] = auth()->id();

        
        $existingReport = Report::where('reporter_id', auth()->id())
            ->where('reported_user_id', $validated['reported_user_id'])
            ->where('status', 'pending')
            ->first();

        if ($existingReport) {
            return redirect()->back()->with('error', 'Anda sudah melaporkan user ini dengan status pending');
        }

        
        $report = Report::create($validated);

        
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('reports', 'public');
                ReportImage::create([
                    'report_id' => $report->id,
                    'image_path' => $path,
                ]);
            }
        }

        
        $listingId = $request->query('listing');
        if ($listingId) {
            return redirect()->route('listing.show', ['listing' => $listingId])->with('success', 'Laporan telah dikirim ke admin. Terima kasih atas laporan Anda!');
        }

        return redirect()->back()->with('success', 'Laporan telah dikirim ke admin. Terima kasih!');
    }

    


    public function show(Report $report)
    {
        
        if (auth()->id() !== $report->reporter_id && 
            auth()->id() !== $report->reported_user_id && 
            !auth()->user()->isAdmin()) {
            abort(403);
        }

        return view('report.show', ['report' => $report]);
    }
}
