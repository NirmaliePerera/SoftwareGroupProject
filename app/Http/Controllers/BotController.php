<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BotController extends Controller
{
    public function getResponse(Request $request)
    {
        $input = $request->input('text');
        $response = $this->generateResponse($input);
        return response()->json(['response' => $response]);
    }

    private function generateResponse($input)
    {
        $responses = [
            'hello' => 'Hi there! How can I help you today?',
            'bridal wear' => 'We have a wide range of bridal wear. What are you looking for specifically?',
            'bye' => 'Goodbye! Have a great day!',
            'wedding dress' => 'We offer various styles of wedding dresses, including ball gown, mermaid, and A-line. Do you have a specific style in mind?',
            'veil' => 'Our collection of veils includes cathedral, fingertip, and birdcage styles. Which one are you interested in?',
            'appointments' => 'You can schedule an appointment with one of our consultants. Would you like to book one now?',
            'price range' => 'Our bridal wear ranges from $500 to $5000. What is your budget?',
            'discount' => 'We currently have a 10% discount on selected items. Would you like to know more about these items?',
            'return policy' => 'Our return policy allows returns within 30 days with a receipt. Would you like more details?',
            'store hours' => 'We are open from Monday to Saturday, 10 AM to 7 PM. Are you planning to visit us soon?',
            'location' => 'We are located at 123 Bridal Lane, Wedding Town. Would you like directions?',
            'accessories' => 'We offer a variety of bridal accessories including tiaras, jewelry, and shoes. What are you looking for?',
            'fittings' => 'We offer fittings by appointment. Would you like to schedule one?',
            'custom dresses' => 'We do offer custom dress services. Can you tell me more about what you have in mind?',
            'alterations' => 'We provide alteration services to ensure your dress fits perfectly. Do you need an appointment?',
            'availability' => 'Most of our dresses are available in different sizes. Is there a specific dress you are interested in?',
            'reviews' => 'We have received great reviews from our customers. Would you like to read some?',
            'bridal party' => 'We also cater to the bridal party. Are you looking for dresses for bridesmaids, the mother of the bride, or flower girls?',
            'fabrics' => 'We offer dresses in various fabrics including lace, satin, and tulle. Do you have a preference?',
            'designer dresses' => 'We carry dresses from top designers like Vera Wang, Pronovias, and Monique Lhuillier. Do you have a favorite designer?',
            'rental' => 'We offer rental services for some dresses. Are you interested in renting a dress?',
            'payment options' => 'We accept all major credit cards, PayPal, and cash. Which payment method do you prefer?',
        ];
        

        foreach ($responses as $key => $value) {
            if (stripos($input, $key) !== false) {
                return $value;
            }
        }

        return "I'm sorry, I didn't understand that.";
    }
}
