<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\ContactEmail;
use App\Models\ContactUs;
use App\Models\Course;
use App\Models\Home;
use App\Models\PersonalConsultancy;
use App\Models\Setting;
use App\Models\StockAnalysis;
use App\Models\TermsAndCondition;
use App\Models\WhoAreWe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class FrontController extends Controller
{

    public $setting;

    public function __construct()
    {
        $this->setting = Setting::first();
    }
    public function test()
    {



        $home_pdf = Home::orderBy('created_at', 'DESC')->where('status', 1)->get();
        $who_are_we =  WhoAreWe::orderBy('created_at', 'DESC')->where('status', 1)->get();
        $personal_consultancy = PersonalConsultancy::orderBy('created_at', 'DESC')->where('status', 1)->get();
        $courses = Course::orderBy('created_at', 'DESC')->where('status', 1)->get();
        $stock_analysis = StockAnalysis::orderBy('created_at', 'DESC')->where('status', 1)->get();
        $contact_us = ContactUs::orderBy('created_at', 'DESC')->where('status', 1)->get();
        $terms_and_conditions = TermsAndCondition::orderBy('created_at', 'DESC')->where('status', 1)->get();


        $urlDow = "https://stock.hcapnepal.org";
        $ch2 = curl_init();
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch2, CURLOPT_URL, $urlDow);
        $response2 = curl_exec($ch2);
        $arr_result2 = json_decode($response2);
        $dow = str_replace('Futures', '', str_replace('Dow 30', '', $arr_result2->dow));
        $gold = str_replace('Gold', '', $arr_result2->gold);
        $nasdaq = str_replace('Futures', '', str_replace('Nasdaq', '', $arr_result2->nasdaq));


        $eu = "https://stock.hcapnepal.org/eurousd";
        $ch2 = curl_init();
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch2, CURLOPT_URL, $eu);
        $responseeusd = curl_exec($ch2);
        $arr_result = json_decode($responseeusd);
        $eusd = $arr_result->eurousd;

        $ft = "https://stock.hcapnepal.org/ftse";
        $ch2 = curl_init();
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch2, CURLOPT_URL, $ft);
        $responseft = curl_exec($ch2);
        $arr_result3 = json_decode($responseft);
        $ftse = $arr_result3->ftse;

        $bt = "https://stock.hcapnepal.org/btc";
        $ch2 = curl_init();
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch2, CURLOPT_URL, $bt);
        $responseft = curl_exec($ch2);
        $arr_result3 = json_decode($responseft);
        $btc = $arr_result3->btc;
        $pf = $arr_result3->pf;



        $setting = Setting::first();
        return view(
            'frontend.test',
            compact(
                'setting',
                'nasdaq',
                'dow',
                'btc',
                'pf',
                'ftse',
                'gold',
                'eusd',
                'home_pdf',
                'who_are_we',
                'personal_consultancy',
                'courses',
                'stock_analysis',
                'contact_us',
                'terms_and_conditions'
            )
        );
    }
    public function index()
    {




        // $bitcoin = bitcoin();


        // $eur_to_usd = usdToEuro();

        //  dd($eur_to_usd);


        // for gold


        $home_pdf = Home::orderBy('created_at', 'DESC')->where('status', 1)->get();
        $who_are_we =  WhoAreWe::orderBy('created_at', 'DESC')->where('status', 1)->get();
        $personal_consultancy = PersonalConsultancy::orderBy('created_at', 'DESC')->where('status', 1)->get();
        $courses = Course::orderBy('created_at', 'DESC')->where('status', 1)->get();
        $stock_analysis = StockAnalysis::orderBy('created_at', 'DESC')->where('status', 1)->get();
        $contact_us = ContactUs::orderBy('created_at', 'DESC')->where('status', 1)->get();
        $terms_and_conditions = TermsAndCondition::orderBy('created_at', 'DESC')->where('status', 1)->get();


        $urlDow = "https://stock.hcapnepal.org";
        $ch2 = curl_init();
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch2, CURLOPT_URL, $urlDow);
        $response2 = curl_exec($ch2);
        $arr_result2 = json_decode($response2);
        $dow = str_replace('Futures', '', str_replace('Dow 30', '', $arr_result2->dow));
        $gold = str_replace('Gold', '', $arr_result2->gold);
        $nasdaq = str_replace('Futures', '', str_replace('Nasdaq', '', $arr_result2->nasdaq));


        $eu = "https://stock.hcapnepal.org/eurousd";
        $ch2 = curl_init();
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch2, CURLOPT_URL, $eu);
        $responseeusd = curl_exec($ch2);
        $arr_result = json_decode($responseeusd);
        $eusd = $arr_result->eurousd;

        $ft = "https://stock.hcapnepal.org/ftse";
        $ch2 = curl_init();
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch2, CURLOPT_URL, $ft);
        $responseft = curl_exec($ch2);
        $arr_result3 = json_decode($responseft);
        $ftse = $arr_result3->ftse;

        $bt = "https://stock.hcapnepal.org/btc";
        $ch2 = curl_init();
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch2, CURLOPT_URL, $bt);
        $responseft = curl_exec($ch2);
        $arr_result3 = json_decode($responseft);
        $btc = $arr_result3->btc;
        $pf = $arr_result3->pf;



        $setting = Setting::first();
        return view(
            'frontend.index',
            compact(
                'setting',
                'nasdaq',
                'dow',
                'btc',
                'pf',
                'ftse',
                'gold',
                'eusd',
                'home_pdf',
                'who_are_we',
                'personal_consultancy',
                'courses',
                'stock_analysis',
                'contact_us',
                'terms_and_conditions'
            )
        );
    }


    public function sendEmail(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'message' => 'required'
        ];

        $request->validate($rules);


        Mail::to('Ah00161@yahoo.co.uk')->send(new ContactEmail($request));

        return response()->json(['200', 'email sent']);
        // return redirect()->back()->with('message','Your Email sent successfully!');
    }


    public function liveChat(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'message' => 'required'
        ];

        $request->validate($rules);


        Mail::to('Ah00161@yahoo.co.uk')->send(new ContactEmail($request));


        return response()->json(['200', 'live chat sent']);
    }
}
