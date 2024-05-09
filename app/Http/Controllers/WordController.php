<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Shared\Html;
use Illuminate\Support\Facades\Log;

class WordController extends Controller
{
    public function convertHtmlToWord()
    {
        // Load the Blade view with the passed data
        $view = view('ResumeTemplates.template3');

        // Get the rendered HTML content from the view
        $renderedHtml = $view->render();

        // Log or output the HTML content for debugging
        Log::info($renderedHtml);

        // Create a PhpWord object
        $phpWord = new PhpWord();

        // Add a section
        $section = $phpWord->addSection();

        libxml_use_internal_errors(true);

        // Add HTML content to the section
        if (Html::addHtml($section, $renderedHtml)) {
            // Log XML errors immediately after adding HTML
            $errors = libxml_get_errors();
            Log::info($errors);

            libxml_clear_errors();
        } else {
            Log::error('Failed to add HTML content to PhpWord section.');
        }

        // Save the document
        $filename = 'cv.docx';
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($filename);

        // Return the converted document or perform other actions
        return response()->download($filename)->deleteFileAfterSend(true);
    }
}
