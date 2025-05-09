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
            return response()->json(['error' => 'An error occurred during PDF processing.']);
        }
    }

    private function filterEducationalDetails($text)
    {
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
        return $this->callOpenAI($text, 'Extract personal details including firstname, surname, othernames, address, date_of_birth, nationality, email, linkedin, residential_address, tel. Return as JSON.');
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
}
