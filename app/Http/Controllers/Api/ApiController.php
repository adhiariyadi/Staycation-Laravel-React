<?php

namespace App\Http\Controllers\Api;

use App\Bank;
use App\Item;
use App\Booking;
use App\Activity;
use App\Category;
use App\Feature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Member;

class ApiController extends Controller
{
    public function landingPage()
    {
        $treveler = Booking::count();
        $treasure = Activity::count();
        $city = Item::orderBy('city')->get();
        $city = $city->groupBy('city')->count();
        $data['hero'] = array(
            'trevelers' => $treveler,
            'treasures' => $treasure,
            'cities' => $city,
        );
        $data['mostPicked'] = Item::orderBy('sum_booking', 'desc')->limit(5)->get();
        $category = Category::all();
        foreach ($category as $val) {
            $data['category'][] = array(
                'name' => $val->name,
                'itemId' => Item::where('category_id', $val->id)->orderBy('sum_booking', 'desc')->limit(4)->get(),
            );
        }
        for ($i = 0; $i < count($data['category']); $i++) {
            for ($x = 0; $x < count($data['category'][$i]['itemId']); $x++) {
                $item = Item::find($data['category'][$i]['itemId'][$x]->id);
                $item->popular = 0;
                $item->save();
                if ($data['category'][$i]['itemId'][0] === $data['category'][$i]['itemId'][$x]) {
                    $item->popular = 1;
                    $item->save();
                }
            }
        }
        $data['testimonial'] = array(
            'id' => 1,
            'image' => "images/testimonial-landing-page.jpg",
            'name' => "Happy Family",
            'rate' => 4.55,
            'content' => "What a great trip with my family and I should try again next time soon ...",
            'familyName' => "Angga",
            'familyOccupation' => "Product Designer",
        );
        return response()->json($data);
    }

    public function detailPage($id)
    {
        $data = Item::find($id);
        $data['featureId'] = Feature::where('item_id', $data->id)->get();
        $data['activityId'] = Activity::where('item_id', $data->id)->get();
        $data['testimonial'] = array(
            'id' => 1,
            'image' => "images/testimonial-detail-page.jpg",
            'name' => "Happy Family",
            'rate' => 3.85,
            'content' => "What a great trip with my family and I should try again next time soon ...",
            'familyName' => "Angga",
            'familyOccupation' => "Product Designer",
        );
        return response()->json($data);
    }

    public function checkout(Request $request)
    {
        if (!$request->has('image')) {
            return response(['message' => "Image not found!"], 404);
        }

        if (
            $request->itemId == "" ||
            $request->duration == "" ||
            $request->bookingStartDate == "" ||
            $request->bookingEndDate == "" ||
            $request->firstName == "" ||
            $request->lastName == "" ||
            $request->email == "" ||
            $request->phoneNumber == "" ||
            $request->accountHolder == "" ||
            $request->bankFrom == ""
        ) {
            return response(['message' => "Lengkapi semua field!"], 404);
        }

        $item = Item::find($request->itemId);
        if (!$item) {
            return response(['message' => "Item not found!"], 404);
        }
        $item->sum_booking += 1;
        $item->save();

        $total = $item->price * $request->duration;
        $invoice = 1000000 + rand(1, 9000000);

        $member = Member::create([
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'email' => $request->email,
            'phone' => $request->phoneNumber
        ]);

        $image = $request->image;
        $namaImage = $image->getClientOriginalName();
        $foto = explode('.', $namaImage);
        $foto = end($foto);
        $newImage = date('siHdmY') . '.' . $foto;
        $image->move('images/bukti/', $newImage);

        $booking = Booking::create([
            'invoice' => $invoice,
            'start_date' => $request->bookingStartDate,
            'end_date' => $request->bookingEndDate,
            'total' => $total += $total * 0.1,
            'item_id' => $request->itemId,
            'duration' => $request->duration,
            'member_id' => $member->id,
            'proofPayment' => 'images/bukti/' . $newImage,
            'bank_from' => $request->bankFrom,
            'account_holder' => $request->accountHolder
        ]);

        return response(['message' => "Success Booking!", 'booking' => $booking], 200);
    }
}
