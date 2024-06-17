<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feedbacks = Feedback::all();
        $userEmail = Auth::user()->email;

        return view('layouts/review/review', compact('feedbacks','userEmail'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $review_id)
    {
        $review = Feedback::find($review_id);

        return view('layouts/review/detail', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $review_id)
    {
        $review = Feedback::find($review_id);

        return view('layouts/review/edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $review_id)
    {
        DB::beginTransaction();

        try {
            $review = Feedback::find($review_id);
            $review->update($request->all());
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect('review.edit')->with('failed_update_review',$th->getMessage());
        }

        DB::commit();
    
        return redirect('/reviews')->with('success_update_review','Review berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $review_id)
    {
        DB::beginTransaction();
        try {
            Feedback::destroy($review_id);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect('reviews')->with('failed_delete_review',$th->getMessage());
        }

        DB::commit();
    
        return redirect('reviews')->with('success_delete_review','Review berhasil dihapus');
    }
}
