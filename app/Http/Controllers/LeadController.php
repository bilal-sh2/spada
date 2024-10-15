<?php
namespace App\Http\Controllers;

use App\Services\ZohoService;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    protected $zohoService;

    public function __construct(ZohoService $zohoService)
    {
        $this->zohoService = $zohoService;
    }

    /**
     * Store a new lead.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate input data
        $validated = $request->validate([
            'Company' => 'required|string',
            'Last_Name' => 'required|string',
            'First_Name' => 'required|string',
            'Email' => 'required|email',
            'Phone' => 'required|string',
        ]);

        // Prepare data to send to Zoho CRM
        $data = [
            'Company' => $validated['Company'],
            'Last_Name' => $validated['Last_Name'],
            'First_Name' => $validated['First_Name'],
            'Email' => $validated['Email'],
            'Phone' => $validated['Phone'],
        ];

        // Call Zoho API to create a lead
        $response = $this->zohoService->createLead($data);

        // Check if the response indicates an error
        if (isset($response['code']) && $response['code'] != 200) {
            return redirect()->back()->withErrors(['error' => 'Failed to create lead: ' . $response['message']]);
        }

        // Return response (you can customize this to return a view or redirect)
        return redirect()->back()->with('success', 'Lead created successfully!');
    }
}
