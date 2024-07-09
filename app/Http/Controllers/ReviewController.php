<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $feedbacks = Feedback::all();
        $userEmail = Auth::user()->email;
        $userName = Auth::user()->name;

        return view('layouts/review/review', compact('feedbacks','userEmail', 'userName'));
    }

    public function show(string $review_id)
    {
        $review = Feedback::find($review_id);

        return view('layouts/review/detail', compact('review'));
    }

    public function edit(string $review_id)
    {
        $review = Feedback::find($review_id);

        return view('layouts/review/edit', compact('review'));
    }

    public function update(Request $request, string $review_id)
    {
        try {
            $review = Feedback::find($review_id);
            $review->update($request->all());
        } catch (\Throwable $th) {
            return redirect('review.edit')->with('failed_update_review',$th->getMessage());
        }
    
        return redirect('/reviews')->with('success_update_review','Review berhasil diperbarui');
    }

    public function destroy(string $review_id)
    {
        try {
            Feedback::destroy($review_id);
        } catch (\Throwable $th) {
            return redirect('reviews')->with('failed_delete_review',$th->getMessage());
        }
    
        return redirect('reviews')->with('success_delete_review','Review berhasil dihapus');
    }
}