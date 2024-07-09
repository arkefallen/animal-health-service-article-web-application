<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\FeedbackCollectionResource;
use App\Http\Resources\FeedbackPostResource;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ApiFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $feedbacks = Feedback::all();
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'status' => false
            ], $th->getCode());
        }

        return new FeedbackCollectionResource($feedbacks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string',
            'comment' => 'required|string',
            'score' => 'required',
            'checkup_id' => 'required',
            'checkup_category' => 'required|string',
            'feedback_category' => 'required',
            'animal_category' => 'required|string'
        ]);

        try {
            $feedback = new Feedback;
            $feedback->username = $request->username;
            $feedback->comment = $request->comment;
            $feedback->score = $request->score;
            $feedback->checkup_id = $request->checkup_id;
            $feedback->checkup_category = $request->checkup_category;
            $feedback->feedback_category = $request->feedback_category;
            $feedback->animal_category = $request->animal_category;

            $feedback->save();
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'status' => false
            ], $th->getCode());
        }
        return new FeedbackPostResource($feedback);
    }

    
}
