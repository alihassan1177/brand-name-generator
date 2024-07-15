<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ChatGPTController extends Controller
{
    function index(Request $request)
    {

        $prompt = $request->prompt;
        $is_romantic = $request->is_romantic == true ? ", make brand name romantic" : ""; 
        $is_funny = $request->is_funny == true ? ", make brand name funny" : ""; 
        $is_serious = $request->is_serious == true ? ", make brand name serious" : ""; 

        $query = "Give me exact 10 brand names for my $prompt company $is_romantic $is_funny $is_serious and make them comma separated and dont add any text or number other than the names.";

        $response = Http::withHeaders([
            "Content-type" => "application/json",
            "Authorization" => "Bearer " . env("OPEN_API_KEY")
        ])->post("https://api.openai.com/v1/chat/completions", [
            "model" => "gpt-3.5-turbo",
            "messages" => [
                [
                    "role" => "system", 
                    "content" => "You are a brand name generator"
                ],
                [
                    "role" => "user", 
                    "content" => $query
                ],
            ],
        ]);

        // dd(json_decode($response->body()));
        $data = json_decode($response->body());
        $choice = $data->choices[0];
        $content = $choice->message->content;
        $content = str_replace("\n", ",", $content);
        $brands = explode(",", $content);

        $result = [];
        foreach ($brands as $brand) {
            $brand = trim($brand);
            if ($brand != "") {
                $result[] = $brand;
            }
        }

        $status = true;
        if (count($result) == 0) {
            $status = false;
        }

        return response()->json(["data" => $result, "total_names" => count($result), "status" => $status, "prompt" => $query]);
    }
}
