<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Commitment;
use App\Services\ResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommitmentController extends Controller
{
    public function myCommits()
    {
        $user = Auth::user();
        $commits = Commitment::where('user_id', $user->id)->get();
        ResponseService::successResponse(
            'Commitments retrieved successfully.',
            $commits
        );
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
                ResponseService::validationError($validator->errors()->first());
            }

            $user = Auth::user();
            // Create commit
            $commit = Commitment::create([
                'title' => $request->title,
                'deadline' => $request->deadline,
                'description' => $request->description,
                'user_id' => $user->id,
            ]);

            ResponseService::successResponse(
                'Commitment has been created successfully.',
                $commit
            );
        } catch (\Exception $e) {
            ResponseService::errorResponse('Something went wrong while creating the commitment.', null, 500, $e);
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
            ResponseService::validationError($validator->errors()->first());
        }

        try {
            // Find the commitment by ID
            $commit = Commitment::findOrFail($request->id);

            // Check if the authenticated user is the owner of the commitment
            if ($commit->user_id !== Auth::id()) {
                ResponseService::errorResponse('Unauthorized.', null, 403);
            }

            // Update the commitment with the provided data
            $commit->update([
                'title' => $request->title ?? $commit->title,
                'deadline' => $request->deadline ?? $commit->deadline,
                'description' => $request->description ?? $commit->description,
            ]);

            ResponseService::successResponse(
                'Commitment has been updated successfully.',
                $commit
            );
        } catch (\Exception $e) {
            ResponseService::errorResponse('Something went wrong while updating the commitment.', null, 500, $e);
        }
    }

    public function deleteCommit(Request $request)
    {
        // Validate the input data
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:commitments,id', // Ensure the commitment exists
        ]);

        if ($validator->fails()) {
            ResponseService::validationError($validator->errors()->first());
        }

        try {
            // Find the commitment by ID
            $commit = Commitment::findOrFail($request->id);

            // Check if the authenticated user is the owner of the commitment
            if ($commit->user_id !== Auth::id()) {
                ResponseService::errorResponse('Unauthorized.', null, 403);
            }

            // Delete the commitment
            $commit->delete();

            ResponseService::successResponse('Commitment has been deleted successfully.');
        } catch (\Exception $e) {
            ResponseService::errorResponse('Something went wrong while deleting the commitment.', null, 500, $e);
        }
    }

    public function updateStatusCommit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:commitments,id',
            'status' => 'required|in:inprogress,fulfilled',
        ]);

        if ($validator->fails()) {
            ResponseService::validationError($validator->errors()->first());
        }

        try {
            $userID = Auth::user()->id;
            $commit = Commitment::findOrFail($request->id);

            if ($commit->user_id != $userID) {
                ResponseService::errorResponse('Unauthorized.', null, 403);
            }

            $commit->update([
                'status' => $request->status,
            ]);

            ResponseService::successResponse(
                'Commitment status has been updated successfully',
                $commit
            );
        } catch (\Exception $e) {
            ResponseService::errorResponse('Something went wrong while updating the status.', null, 500, $e);
        }
    }
}
