<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function user()
    {
        $user = Auth::user();
        return response()->json([
            'success' => true,
            'data' => $user,
            'message' => 'Profile retrieved successfully.',

        ], 200);
    }

    public function createProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required|date',
            'phone' => 'required',
            'weight' => 'required|numeric|regex:/^\d+(\.\d{1,3})?$/',
            'height' => 'required|numeric|regex:/^\d+(\.\d{1,3})?$/',
            'fitness_experience' => 'required',
            'difficulties' => 'required',
            'interests_id' => 'required'
        ]);
        $data = $request->all();

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed.',
                'data' =>  $validator->errors(),
            ], 422);
        } else {
            try {
                $user = Auth::user();

                $avatar = NULL;
                if ($request->hasFile('avatar')) {
                    $filename = time() . '.' . request()->avatar->getClientOriginalExtension();
                    $request->avatar->move(public_path('uploads/profile/'), $filename);
                    $avatar = '/uploads/profile/' . $filename;
                } else {
                    $avatar = '/uploads/profile/user-default.png';
                }


                $interest = $request->input('interests_id');

                $checkProfile = Profile::where('user_id', $user->id)->exists();
                if ($checkProfile) {
                    return $this->success($checkProfile, 'Profile already exist');
                } else {
                    $profile = Profile::create([
                        'first_name' => $data['first_name'],
                        'last_name' =>   $data['last_name'],
                        'about' => $data['about'],
                        'date_of_birth' => $data['date_of_birth'],
                        'phone' => $data['phone'],
                        'weight' => $data['weight'],
                        'weight_unit' => $data['weight_unit'],
                        'height' => $data['height'],
                        'height_unit' => $data['height_unit'],
                        'fitness_experience' => $data['fitness_experience'],
                        'difficulties' => $data['difficulties'],
                        'avatar' => $avatar,
                        'user_id' => $user->id,
                    ]);

                    foreach ($interest as $interestID) {
                        $findinterestID = interest::where("id", $interestID)->first();
                        userInterest::create([
                            'interest_id' => $findinterestID->id,
                            'profile_id' => $user->id,
                        ]);
                    }
                    return $this->success($profile, 'Profile has been created successfully.');
                }
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }

    public function editProfile(Request $request)
    {
        try {
            $user = Auth::user();
            $finduser = User::findOrFail($user->id);

            $editProfile = profile::where('user_id', $finduser->id)->first();

            if ($request->has('first_name')) {
                $editProfile->first_name = $request->first_name;
            }
            if ($request->has('last_name')) {
                $editProfile->last_name = $request->last_name;
            }
            if ($request->has('about')) {
                $editProfile->about = $request->about;
            }
            if ($request->has('date_of_birth')) {
                $editProfile->date_of_birth = $request->date_of_birth;
            }
            if ($request->has('phone')) {
                $editProfile->phone = $request->phone;
            }
            if ($request->has('weight')) {
                $editProfile->weight = $request->weight;
            }
            if ($request->has('weight_unit')) {
                $editProfile->weight_unit = $request->weight_unit;
            }
            if ($request->has('height')) {
                $editProfile->height = $request->height;
            }
            if ($request->has('height_unit')) {
                $editProfile->height_unit = $request->height_unit;
            }
            if ($request->has('fitness_experience')) {
                $editProfile->fitness_experience = $request->fitness_experience;
            }
            if ($request->has('difficulties')) {
                $editProfile->difficulties = $request->difficulties;
            }

            if ($request->has('interests_id')) {
                $interests = $request->input('interests_id');
                $existingInterests = userInterest::where('profile_id', $editProfile->id)->pluck('interest_id')->toArray();

                // Calculate interests to add and remove
                $interestsToAdd = array_diff($interests, $existingInterests);
                $interestsToRemove = array_diff($existingInterests, $interests);

                // Add new interests
                foreach ($interestsToAdd as $interestID) {
                    userInterest::create([
                        'interest_id' => $interestID,
                        'profile_id' => $editProfile->id,
                    ]);
                }

                // Remove interests that were deselected
                userInterest::where('profile_id', $editProfile->id)
                    ->whereIn('interest_id', $interestsToRemove)
                    ->delete();
            }

            if ($request->hasFile('avatar')) {
                $filename = time() . '.' . request()->avatar->getClientOriginalExtension();
                $request->avatar->move(public_path('uploads/profile/'), $filename);
                $editProfile->avatar = '/uploads/profile/' . $filename;
            }


            $editProfile->save();

            return response()->json([
                'success' => true,
                'message' => 'Profile has been updated successfully.',
                'data' => $editProfile,

            ], 200);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function profile()
    {
        $user = Auth::user();
        $profile = User::with(['profile.userinterest.interest'])->where('id', $user->id)->first();
        // return $this->success($profile, 'Profile Data Retrieved successfully.');
        return response()->json([
            'success' => true,
            'message' => 'Profile data retrieved successfully.',
            'data' => $profile,

        ], 200);
    }
}
