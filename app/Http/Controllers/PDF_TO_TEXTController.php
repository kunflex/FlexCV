<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Smalot\PdfParser\Parser;
use Illuminate\Support\Facades\Log;
use OpenAI;

class PDF_TO_TEXTController extends Controller
{
    public function showForm()
    {
        return view('admin.upload');
    }

<<<<<<< HEAD
    public function processCv(Request $request)
    {
        $request->validate([
            'cv' => 'required|mimes:pdf|max:2048',
        ]);

        try {
            $cvPath = $request->file('cv')->storeAs('cv', 'cv.pdf', 'public');
            $absolutePath = $request->file('cv')->path();

            $parser = new Parser();
            $pdf = $parser->parseFile($absolutePath);
            $text = $pdf->getText();

            $filteredEducationalDetails = $this->filterEducationalDetails($text);
            $refereeDetails = $this->filterRefereeDetails($text);
            $filterInterests = $this->filterInterests($text);
            $personalDetails = $this->parsePersonalDetails($text);
            $profileSummary = $this->parseProfileSummary($text);

            return view('admin.converted_cv', compact(
                'text',
                'filteredEducationalDetails',
                'refereeDetails',
                'filterInterests',
                'personalDetails',
                'profileSummary'
            ));
        } catch (\Exception $e) {
            Log::error('Error processing PDF: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
=======


    public function processCv(Request $request)
    {
        $request->validate([
            'cv' => 'required|mimes:pdf|max:2048', // PDF file validation
        ]);

        try {
            // Store the uploaded file
            $cvPath = $request->file('cv')->storeAs('cv', 'cv.pdf', 'public');

            // Get the absolute path to the stored PDF file
            $absolutePath = $request->file('cv')->path();

            // Parse PDF file and build necessary objects
            $parser = new Parser();
            $pdf = $parser->parseFile($absolutePath);

            // Extract text from the PDF
            $text = $pdf->getText();

            // Filter the text to extract educational details
            $filteredEducationalDetails = $this->filterEducationalDetails($text);

            // Filter the text to extract referee information
            $refereeDetails = $this->filterRefereeDetails($text);

             // Filter the text to extract interest
            $filterInterests = $this->filterInterests($text);

             // Filter the text to extract personal details
            $personalDetails = $this->parsePersonalDetails($text);

            return view('admin.converted_cv', compact('text', 'filteredEducationalDetails', 'refereeDetails', 'filterInterests', 'personalDetails'));
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::error('Error processing PDF: ' . $e->getMessage());
            Log::error($e->getTraceAsString());

            // Return a more informative error response
>>>>>>> 0cd43fb34b4b876699950693d30d1e00ea7cf206
            return response()->json(['error' => 'An error occurred during PDF processing.']);
        }
    }

    private function filterEducationalDetails($text)
    {
<<<<<<< HEAD
        return $this->callOpenAI($text, 'Extract all educational background entries in JSON format with keys: start_date, end_date, institution, degree, courses.');
    }

    private function filterRefereeDetails($text)
    {
        return $this->callOpenAI($text, 'Extract all referee details in JSON format with keys: name, position, institution, tel.');
    }

    private function filterInterests($text)
    {
        return $this->callOpenAI($text, 'Extract all personal interests from the text as a JSON array of strings.');
    }

    private function parsePersonalDetails($text)
    {
        $result = $this->callOpenAI($text, 'Extract the personal details including: firstname, surname, othernames, address, date_of_birth, nationality, email, linkedin, residential_address, tel. Return ONLY JSON like this format:
        {
        "firstname": "John",
        "surname": "Doe",
        "othernames": "Kwame",
        "address": "123 Example Rd",
        "date_of_birth": "1990-01-01",
        "nationality": "Ghanaian",
        "email": "john@example.com",
        "linkedin": "https://linkedin.com/in/johndoe",
        "residential_address": "Accra, Ghana",
        "tel": "+233123456789"
        }');

        if (!is_array($result)) {
            $result = []; // fallback if JSON is not decoded correctly
        }

        return [
            'Firstname' => $result['firstname'] ?? 'N/A',
            'Surname' => $result['surname'] ?? 'N/A',
            'Othernames' => $result['othernames'] ?? 'N/A',
            'Address' => $result['address'] ?? 'N/A',
            'Date of Birth' => $result['date_of_birth'] ?? 'N/A',
            'Nationality' => $result['nationality'] ?? 'N/A',
            'Email' => $result['email'] ?? 'N/A',
            'LinkedIn' => $result['linkedin'] ?? 'N/A',
            'Residential Address' => $result['residential_address'] ?? 'N/A',
            'Telephone' => $result['tel'] ?? 'N/A',
        ];
    }


    private function parseProfileSummary($text)
    {
        $result = $this->callOpenAI($text, 'Extract the profile summary section only. Return it as: { "profile_summary": "..." }');
        return ['Profile Summary' => $result['profile_summary'] ?? 'N/A'];
    }

    private function callOpenAI($text, $instruction)
    {
        try {
            $client = OpenAI::client(config('services.openai.key'));

            $response = $client->chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a helpful assistant that extracts structured data from CV text.'],
                    ['role' => 'user', 'content' => $instruction . "\n\n" . $text],
                ],
                'temperature' => 0.2,
                'max_tokens' => 1000,
            ]);

            $content = $response['choices'][0]['message']['content'] ?? '';
            $result = json_decode($content, true);

            if ($result === null) {
                Log::warning('OpenAI returned invalid JSON: ' . $content);
                return [];
            }

            return $result;
        } catch (\Exception $e) {
            Log::error('OpenAI API error: ' . $e->getMessage());
            return [];
        }
    }
=======
        // Define pattern to match educational details
        // Updated to separately capture start and end dates
        $pattern = '/(\d{4})\s?–\s?(Present|\d{4})\s+(.+?)\s*\((.+?)\)\s*(.*)/s';

        // Perform the matching
        preg_match_all($pattern, $text, $matches, PREG_SET_ORDER);

        // Initialize an array to store filtered educational details
        $filteredDetails = [];

        // Iterate through matched patterns and extract details
        foreach ($matches as $match) {
            $detail = [
                'start_date' => $match[1],
                'end_date' => $match[2],
                'institution' => $match[3],
                'degree' => $match[4],
                'courses' => trim($match[5])
            ];
            $filteredDetails[] = $detail;
        }

        return $filteredDetails;
    }

    // private function filterEducationalDetails($text)
    // {
    //     // Prepare the prompt for ChatGPT
    //     $prompt = "Please extract the educational details from the following text and return them in a structured format with labels:\n\n" . $text;

    //     // Call OpenAI API to get the response
    //     $client = new OpenAI\Client('YOUR_API_KEY');
    //     $response = $client->completions()->create([
    //         'model' => 'gpt-3.5-turbo',
    //         'prompt' => $prompt,
    //         'max_tokens' => 500,
    //         'temperature' => 0.5,
    //     ]);

    //     // Parse the response to get the educational details
    //     $result = json_decode($response['choices'][0]['text'], true);

    //     // Format the result with labels
    //     $formattedDetails = [];
    //     if (is_array($result)) {
    //         foreach ($result as $detail) {
    //             $formattedDetails[] = [
    //                 'Start Date' => $detail['start_date'] ?? 'N/A',
    //                 'End Date' => $detail['end_date'] ?? 'N/A',
    //                 'Institution' => $detail['institution'] ?? 'N/A',
    //                 'Degree' => $detail['degree'] ?? 'N/A',
    //                 'Courses' => $detail['courses'] ?? 'N/A',
    //             ];
    //         }
    //     }

    //     return $formattedDetails;
    // }

    private function filterRefereeDetails($text)
    {
        // Define pattern to match referee details
        $pattern = '/(?<name>I{1,3}\. [^\n]+)\n\s+\((?<position>[^\n]+)\)\n\s+(?<institution>[^\n]+)\n\s+Tel:\s*(?<tel>[^\n]+)/';

        // Perform the matching
        preg_match_all($pattern, $text, $matches, PREG_SET_ORDER);

        // Initialize an array to store filtered referee details
        $refereeDetails = [];

        // Iterate through matched patterns and extract details
        foreach ($matches as $match) {
            $referee = [
                'name' => trim($match['name']),
                'position' => trim($match['position']),
                'institution' => trim($match['institution']),
                'tel' => trim($match['tel'])
            ];
            $refereeDetails[] = $referee;
        }

        return $refereeDetails;
    }

    // private function filterRefereeDetails($text)
    // {
    //     // Prepare the prompt for ChatGPT
    //     $prompt = "Please extract the referee details from the following text and return them in a structured format with labels:\n\n" . $text;

    //     // Call OpenAI API to get the response
    //     $client = new OpenAI\Client('YOUR_API_KEY');
    //     $response = $client->completions()->create([
    //         'model' => 'gpt-3.5-turbo',
    //         'prompt' => $prompt,
    //         'max_tokens' => 500,
    //         'temperature' => 0.5,
    //     ]);

    //     // Parse the response to get the referee details
    //     $result = json_decode($response['choices'][0]['text'], true);

    //     // Format the result with labels
    //     $formattedRefereeDetails = [];
    //     if (is_array($result)) {
    //         foreach ($result as $referee) {
    //             $formattedRefereeDetails[] = [
    //                 'Name' => $referee['name'] ?? 'N/A',
    //                 'Position' => $referee['position'] ?? 'N/A',
    //                 'Institution' => $referee['institution'] ?? 'N/A',
    //                 'Telephone' => $referee['tel'] ?? 'N/A',
    //             ];
    //         }
    //     }

    //     return $formattedRefereeDetails;
    // }

    private function filterInterests($text)
    {
        // Define pattern to match interests
        $pattern = '/INTERESTS\s*:\s*([\w\s,]+)(?=\n\n|\Z)/s';

        // Perform the matching
        preg_match($pattern, $text, $matches);

        // Initialize variable to store interests
        $interests = [];

        // Check if interests section is found
        if (isset($matches[1])) {
            // Extract interests
            $interestsText = trim($matches[1]);

            // Split interests by comma and/or newline
            $interests = preg_split('/[\s,]+/', $interestsText);

            // Remove empty values
            $interests = array_filter($interests);
        }

        return $interests;
    }

    // private function filterInterests($text)
    // {
    //     // Prepare the prompt for ChatGPT
    //     $prompt = "Please extract the interests from the following text and return them as a list with labels:\n\n" . $text;

    //     // Call OpenAI API to get the response
    //     $client = new OpenAI\Client('YOUR_API_KEY');
    //     $response = $client->completions()->create([
    //         'model' => 'gpt-3.5-turbo',
    //         'prompt' => $prompt,
    //         'max_tokens' => 150,
    //         'temperature' => 0.5,
    //     ]);

    //     // Parse the response to get the interests
    //     $result = json_decode($response['choices'][0]['text'], true);

    //     // Format the result with labels
    //     $formattedInterests = [];
    //     if (is_array($result)) {
    //         foreach ($result as $interest) {
    //             $formattedInterests[] = [
    //                 'Interest' => $interest ?? 'N/A',
    //             ];
    //         }
    //     }

    //     return $formattedInterests;
    // }

    private function parsePersonalDetails($text)
    {
        // Split the text into lines
        $lines = explode("\n", $text);

        // Initialize variables to store parsed details
        $personalDetails = [
            'firstname' => '',
            'surname' => '',
            'othernames' => '',
            'address' => '',
            'date_of_birth' => '',
            'nationality' => '',
            'email' => '',
            'linkedin' => '',
            'residential_address' => '',
            'tel' => ''
        ];

        // Define patterns for each type of personal detail
        $patterns = [
            'firstname' => '/^Firstname:\s*(.*)$/',
            'surname' => '/^Surname:\s*(.*)$/',
            'othernames' => '/^Othernames:\s*(.*)$/',
            'address' => '/^Address:\s*(.*)$/',
            'date_of_birth' => '/^Date of birth:\s*(.*)$/',
            'nationality' => '/^Nationality:\s*(.*)$/',
            'email' => '/^Email:\s*(.*)$/',
            'linkedin' => '/^LinkedIn:\s*(.*)$/',
            'residential_address' => '/^Residential Address:\s*(.*)$/',
            'tel' => '/^Tel:\s*(.*)$/'
        ];

        // Loop through each line to extract details
        foreach ($lines as $line) {
            // Loop through each pattern to find matches
            foreach ($patterns as $key => $pattern) {
                if (preg_match($pattern, $line, $matches)) {
                    $personalDetails[$key] = trim($matches[1]);
                    // Break the inner loop once a match is found
                    break;
                }
            }
        }

        // Optional: Perform error handling for missing details
        foreach ($personalDetails as $key => $value) {
            if (empty($value)) {
                // Handle missing details here, such as setting default values or logging errors
                // For simplicity, let's set missing details to "N/A"
                $personalDetails[$key] = "N/A";
            }
        }

        return $personalDetails;
    }

    // private function parsePersonalDetails($text)
    // {
    //     // Prepare the prompt for ChatGPT
    //     $prompt = "Please extract the personal details from the following text and return them in a structured format with labels:\n\n" . $text;

    //     // Call OpenAI API to get the response
    //     $client = new OpenAI\Client('YOUR_API_KEY');
    //     $response = $client->completions()->create([
    //         'model' => 'gpt-3.5-turbo',
    //         'prompt' => $prompt,
    //         'max_tokens' => 300,
    //         'temperature' => 0.5,
    //     ]);

    //     // Parse the response to get the personal details
    //     $result = json_decode($response['choices'][0]['text'], true);

    //     // Format the result with labels
    //     $formattedPersonalDetails = [];
    //     if (is_array($result)) {
    //         $formattedPersonalDetails = [
    //             'Firstname' => $result['firstname'] ?? 'N/A',
    //             'Surname' => $result['surname'] ?? 'N/A',
    //             'Othernames' => $result['othernames'] ?? 'N/A',
    //             'Address' => $result['address'] ?? 'N/A',
    //             'Date of Birth' => $result['date_of_birth'] ?? 'N/A',
    //             'Nationality' => $result['nationality'] ?? 'N/A',
    //             'Email' => $result['email'] ?? 'N/A',
    //             'LinkedIn' => $result['linkedin'] ?? 'N/A',
    //             'Residential Address' => $result['residential_address'] ?? 'N/A',
    //             'Telephone' => $result['tel'] ?? 'N/A',
    //         ];
    //     }

    //     return $formattedPersonalDetails;
    // }

    // private function parseProfileSummary($text)
    // {
    //     // Prepare the prompt for ChatGPT
    //     $prompt = "Please extract the profile summary from the following text and return it in a structured format with a label:\n\n" . $text;

    //     // Call OpenAI API to get the response
    //     $client = new OpenAI\Client('YOUR_API_KEY');
    //     $response = $client->completions()->create([
    //         'model' => 'gpt-3.5-turbo',
    //         'prompt' => $prompt,
    //         'max_tokens' => 150,
    //         'temperature' => 0.5,
    //     ]);

    //     // Parse the response to get the profile summary
    //     $result = json_decode($response['choices'][0]['text'], true);

    //     // Format the result with labels
    //     $formattedProfileSummary = [
    //         'Profile Summary' => $result['profile_summary'] ?? 'N/A',
    //     ];

    //     return $formattedProfileSummary;
    // }

>>>>>>> 0cd43fb34b4b876699950693d30d1e00ea7cf206
}
