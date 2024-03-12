<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\OpenAI;
use Smalot\PdfParser\Parser;
use Aws\Textract\TextractClient;
use Google\Cloud\Language\V1\Entity\Type;
use Google\Cloud\Language\V1\LanguageServiceClient;
use Phpml\Classification\SVC;
use Phpml\SupportVectorMachine\Kernel;

class PDF_TO_TEXTController extends Controller
{
    public function showForm()
    {
        return view('admin.upload');
    }
    
    // public function processCv(Request $request)
    // {
    //     $request->validate([
    //         'cv' => 'required|mimes:pdf|max:2048', // PDF file validation
    //     ]);

    //     // Store the uploaded file
    //     $cvPath = $request->file('cv')->storeAs('cv', 'cv.pdf', 'public');

    //     // Get the absolute path to the stored PDF file
    //     $absolutePath = storage_path('app/public/' . $cvPath);

    //     // Create a Textract client
    //     $textractClient = new TextractClient([
    //         'region' => 'your-aws-region', // replace with your AWS region
    //         'version' => 'latest',
    //         'credentials' => [
    //             'key'    => 'your-aws-access-key',
    //             'secret' => 'your-aws-secret-key',
    //         ],
    //     ]);

    //     // Start the Textract job
    //     $result = $textractClient->startDocumentTextDetection([
    //         'DocumentLocation' => [
    //             'S3Object' => [
    //                 'Bucket' => 'your-s3-bucket',
    //                 'Name'   => 'path/to/' . 'cv.pdf',
    //             ],
    //         ],
    //     ]);

    //     // Wait for the job to complete
    //     $jobId = $result['JobId'];
    //     $textractClient->waitUntil('DocumentTextDetectionComplete', ['JobId' => $jobId]);

    //     // Get the results
    //     $result = $textractClient->getDocumentTextDetection(['JobId' => $jobId]);

    //     // Process the results as needed
    //     $textBlocks = $result['Blocks'];

    //     // Extract full name or other relevant information from $textBlocks
    //     // ...

    //     // You can then return or use the extracted information as needed
    //     return view('admin.converted_cv', compact('fullName'));
    // }


    public function AIpowered()
    {
        $yourApiKey ='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';
        
        // Create an instance of OpenAI client
        $client = \OpenAI::client($yourApiKey);

        // Make a request to the OpenAI GPT-4 API
        $result = $client->completions()->create([
            'model' => 'gpt-3.5-turbo', 
            'messages' => [
                ['role' => 'user', 'content' => 'Hello!'],
            ],
        ]);

        // Output the generated text
        echo $result['choices'][0]['text'];
    }



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

            // Classify the text
            $predictedLabel = $this->classifyText($text);

            return view('admin.converted_cv', compact('text', 'predictedLabel'));
        } catch (\Exception $e) {
            // Log the exception for further investigation
            \Log::error('Error processing PDF: ' . $e->getMessage());
            \Log::error($e->getTraceAsString());
        
            // Return a more informative error response
            return response()->json(['error' => 'An error occurred during PDF processing.']);
        }
    }

    public function classifyText($text)
    {
        // Load the pre-trained model (you need to train the model beforehand)
        $classifier = new SVC(Kernel::LINEAR);

        // Load your preprocessed data and labels
        list($samples, $labels) = $this->loadCSVData();

        // Train the classifier
        $classifier->train($samples, $labels);

        // Classify the text
        $predictedLabel = $classifier->predict([[$text]]); // Wrap $text in an array

        return $predictedLabel;
    }

    public function loadCSVData()
    {
        // Assume you have a CSV file named 'text_data.csv' in the 'storage/app' directory
        $csvFilePath = storage_path('app/public/csv/cv_additional_details.csv');

        // Load CSV data into an associative array
        $csvData = array_map('str_getcsv', file($csvFilePath));
        $csvHeaders = array_shift($csvData); // Remove headers from data

        // Extract samples and labels from CSV data
        $samples = [];
        $labels = [];

        foreach ($csvData as $row) {
            // Assuming 'text' is the first column and 'label' is the second column
            $samples[] = [$row[0]]; // Wrap the text in an array
            $labels[] = $row[1];     // Extract label
        }

        // Now $samples contains arrays of preprocessed text samples, and $labels contains corresponding labels/categories
        return [$samples, $labels];
    }


   
}
