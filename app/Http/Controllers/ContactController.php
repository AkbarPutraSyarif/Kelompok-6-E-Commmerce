<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Log;


class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);
    
        Log::info('Validated Data:', $validatedData);
    
        try {
            Contact::create($validatedData);
            Log::info('Data saved successfully.');
        } catch (\Exception $e) {
            Log::error('Error saving data: ' . $e->getMessage());
        }
    
        return redirect()->back()->with('success_message', 'Pesan anda telah direkam');
    }
    
}

