<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use AfricasTalking\SDK\AfricasTalking;

class SmsController extends Controller
{
    public function index()
    {
        $username   = "sandbox";
        $apiKey     = "5e61f28060c523fc09428e3cc73e09289132c2037edf7e17c1fffcd28cae672d";

        // Initialize the SDK
        $AT         = new AfricasTalking($username, $apiKey);

        // Get the SMS service
        $sms        = $AT->sms();

        // Set the numbers you want to send to in international format
        $recipients = "+254715153806,+254713631616";

        // Set your message
        $message    = "I'm a lumberjack and its ok, I sleep all night and I work all day";

        // Set your shortCode or senderId
        $from       = "M-MONEY";

        try {
            // Thats it, hit send and we'll take care of the rest
            $result = $sms->send([
                'to'      => $recipients,
                'message' => $message,
                'from'    => $from
            ]);

            print_r($result);
        } catch (\Throwable $th) {
            //throw $th;
            echo "Error: " . $th->getMessage();
        }
    }
}
