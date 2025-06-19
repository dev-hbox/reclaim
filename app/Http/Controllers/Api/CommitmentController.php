<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Commitment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommitmentController extends Controller
{
    public function myCommits()
    {
        $user = Auth::user();
        $commits = Commitment::where('user_id', $user->id)->get();
        return response()->json([
            'success' => true,
            'message' => 'Commitments retrieved successfully.',
            'data' => $commits,
        ], 200);
    }

    public function storeCommit(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'sometimes|required|string',
                'deadline' => 'sometimes|required|string',
                'description' => 'sometimes|required|string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed.',
                    'data' => $validator->errors(),
                ], 422);
            }

            $user = Auth::user();
            // Create commit
            $commit = Commitment::create([
                'title' => $request->title,
                'deadline' => $request->deadline,
                'description' => $request->description,
                'user_id' => $user->id,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Commitment has been created successfully.',
                'data' => $commit,

            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    public function updateCommit(Request $request)
    {
        // Validate the input data
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:commitments,id', // Ensure the commitment exists
            'title' => 'sometimes|required|string',
            'deadline' => 'sometimes|required|string',
            'description' => 'sometimes|required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed.',
                'data' => $validator->errors(),
            ], 422);
        }

        try {
            // Find the commitment by ID
            $commit = Commitment::findOrFail($request->id);

            // Check if the authenticated user is the owner of the commitment
            if ($commit->user_id !== Auth::id()) {
                return response()->json(['success' => false, 'message' => 'Unauthorized.'], 403);
            }

            // Update the commitment with the provided data
            $commit->update([
                'title' => $request->title ?? $commit->title,
                'deadline' => $request->deadline ?? $commit->deadline,
                'description' => $request->description ?? $commit->description,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Commitment has been updated successfully.',
                'data' => $commit,
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    public function deleteCommit(Request $request)
    {
        // Validate the input data
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:commitments,id', // Ensure the commitment exists
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed.',
                'data' => $validator->errors(),
            ], 422);
        }

        try {
            // Find the commitment by ID
            $commit = Commitment::findOrFail($request->id);

            // Check if the authenticated user is the owner of the commitment
            if ($commit->user_id !== Auth::id()) {
                return response()->json(['success' => false, 'message' => 'Unauthorized.'], 403);
            }

            // Delete the commitment
            $commit->delete();

            return response()->json([
                'success' => true,
                'message' => 'Commitment has been deleted successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    public function updateStatusCommit(Request $request)
    {
        // Validate the input data
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:commitments,id',
            'status' => 'required|in:inprogress,fulfilled',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed.',
                'data' => $validator->errors(),
            ], 422);
        }

        try {
            $commit = Commitment::findOrFail($request->id);
            if ($commit->user_id !== Auth::id()) {
                return response()->json(['success' => false, 'message' => 'Unauthorized.'], 403);
            }


            $commit->update([
                'status' => $request->status,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Commitment status has been updated successfully.',
                'data' => $commit,
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
}
