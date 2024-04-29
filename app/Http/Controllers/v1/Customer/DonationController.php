<?php

namespace App\Http\Controllers\v1\Customer;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Donor;
use App\Models\Honor;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DonationController extends Controller
{
    public function addDonation(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'honoree_first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'honoree_last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'mobile_no' => 'required|string',
                'address_line1'=>'required|string',
                'zip'=>'required|numeric',
                'city'=>'required|string',
                'country'=>'required|string',
                'state'=>'required|string',
                'subscription_to_news'=>'boolean',
                'text_updates'=>'boolean',
                'future_contact'=>'boolean',
                'dedicate'=>'boolean',
                'cover_fees'=>'boolean',
                'donation_type'=>'required|in:onetime,monthly',
                'amount'=>'required|numeric',
                'honor_type' => 'required|in:in honor of,in memory of',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            DB::beginTransaction();
            $newDonor = new Donor();
            $newDonor->first_name = $request->first_name;
            $newDonor->last_name = $request->last_name;
            $newDonor->email = $request->email;
            $newDonor->mobile_no = $request->mobile_no;
            $newDonor->address_line1 = $request->address_line1;
            $newDonor->address_line2 = $request->address_line2;
            $newDonor->zip = $request->zip;
            $newDonor->city = $request->city;
            $newDonor->state = $request->state;
            $newDonor->country = $request->country;
            $newDonor->gift_allocation = $request->gift_allocation;
            $newDonor->subscription_to_news = $request->subscription_to_news;
            $newDonor->text_updates = $request->text_updates;
            $newDonor->future_contact = $request->future_contact;
            $newDonor->dedicate = $request->dedicate;
            $newDonor->cover_fees = $request->cover_fees;
            $newDonor->save();

            $newDonation = new Donation();
            $newDonation->type = $request->donation_type;
            $newDonation->amount = $request->amount;
            $newDonation->donor_id = $newDonor->id;
            $newDonation->save();

            if($newDonor->dedicate == true)
            {
                $newHonor = new Honor();
                $newHonor->donor_id = $newDonor->id;
                $newHonor->type =  $request->honor_type;
                $newHonor->honoree_first_name =  $request->honoree_first_name;
                $newHonor->honoree_last_name =  $request->honoree_last_name;
                $newHonor->save();
            }
            
            DB::commit();
            $data = Donor::query()->where('id',$newDonor->id)->with(['donations','honors'])->get();
            return $this->sendResponse($data, 'Donation added successfully.', true);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getTrace(), 413);
        }
    }
}
