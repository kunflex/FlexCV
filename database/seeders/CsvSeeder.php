<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use League\Csv\Writer;

class CsvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the CSV file name
        $filename = 'CV_Dataset.csv';

        // Example data for the CSV file
        $data = [
            ['Name', 'Email', 'Phone'],
            ['John Doe', 'john@example.com', '123456789'],
            ['Jane Smith', 'jane@example.com', '987654321'],
        ];

        // Store the CSV file in the 'public/csv' directory
        $path = 'csv'; // Change the directory path as needed

        // Create a temporary file
        $tempFile = tempnam(sys_get_temp_dir(), 'csv');

        // Create a CSV writer instance
        $csv = Writer::createFromPath($tempFile, 'w+');

        // Insert the data into the CSV file
        $csv->insertAll($data);

        // Store the CSV file in the 'public/csv' directory
        Storage::disk('public')->put($path . '/' . $filename, file_get_contents($tempFile));

        // Remove the temporary file
        unlink($tempFile);

        $this->command->info('CSV file created and stored successfully.');
    }
}
