<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;

use App\Notifications\Reviews;
use http\Exception;
use Image;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use jeremykenedy\LaravelRoles\Models\Role;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Notification;
use App\Notifications\Emailto;
use Twilio\Rest\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\Patient
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $users = User::all();
        $roles = Role::all()->sortBy('level');
        $patients = Patient::all();

        return view('home')->with([
            'users' => $users,
            'roles' => $roles,
            'patients' => $patients,

        ]);
    }

    public function store(Request $request)
    {

        $rules = [
            'name' => 'required|string|min:3|max:255|unique:patients',
            'email' => 'required|string|email|max:255|unique:patients',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:patients',
            'assisted_by' => 'required|string|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => 0,
                'message' => $validator->messages()
            ]);
        } else {
            $data = $request->input();
            $emailqr = $data['email'];
            $jsonData = json_encode($emailqr);

            $assistedPatientInfo = $data['assisted_by'];
            $assistedPatient = Patient::query()->where('name', '=', $assistedPatientInfo)->first();
            $assistedPatient->counter = $assistedPatient->counter + 1;
            $assistedPatient->save();

            $qrcode = QrCode::format('png')
                ->size(500)->errorCorrection('H')
                ->generate($jsonData);

            try {
                $patient = new Patient;
                $patient->name = $data['name'];
                $patient->email = $data['email'];
                $patient->phone = $data['phone'];
                $patient->assisted_by = $data['assisted_by'];
                $patient->notes = $data['notes'];
                $patient->active = '0';
                $patient->counter = '0';
                $patient->save();

                $filename = 'images/qr_image/' . $patient->id . '.png';
                $qrcode_file = fopen($filename, 'wb');
                fwrite($qrcode_file, $qrcode);
                fclose($qrcode_file);

                $patient->qr_link = $filename;
                $patient->save();

                return response()->json([
                    'success' => true,
                    'patient' => $patient,
                    'qr_code' => $qrcode,
                    'qr_link' => $filename
                ]);

            } catch (Exception $e) {

                return response()->json([
                    'success' => false,
                    'message' => $e->messages()
                ]);
            }
        }
    }

    public function emailqr(Request $request)
    {
  
    }

    public function sendCustomMessage(Request $request)
    {
 
    }

    private function sendMessage($message, $recipients, $filename)
    {

  
    }

    public function reviewSms(Request $request)
    {
  
    }

    private function reviewSmsMessage($message, $recipients)
    {

        $account_sid = env("TWILIO_SID", "AC57e1532b91b4ab80dec9017d57bbad77");
        $auth_token = env("TWILIO_AUTH_TOKEN", "80d7a0b3ec061a6da33a30ef6d47a40c");
        $twilio_number = env("TWILIO_NUMBER", "+17137151754");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipients,
            [
                'from' => $twilio_number,
                'body' => $message,
            ]
        );
    }

    public function reviewEamil(Request $request)
    {
     
    }

    public function did()
    {
        $calls = DB::table('cc_call')
            ->Join('cc_card', 'cc_card.id', '=', 'cc_call.card_id')
            ->select('starttime', 'stoptime', 'src', 'sessionbill', 'card_id', 'credit')
            ->get();
//            ->paginate(20);
        return view('pages.did_number')->with([
            'calls' => $calls
        ]);
    }

}

