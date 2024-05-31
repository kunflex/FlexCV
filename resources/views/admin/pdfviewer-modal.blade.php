<!-- resources/views/applicants/preview.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Applicant Preview</title>
    <style>
        .preview-container {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .preview-header {
            color: #333;
        }

        .preview-content {
            background-color: #f9f9f9;
            padding: 10px;
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <div class="preview-container">
        <h1 class="preview-header">Applicant ID: {{ $id }}</h1>
        <div class="preview-content">
            <h2>Applicant Letter:</h2>
            <p>{{ $data->applicant_letter }}</p>
            <div style="height: 650px; width: 100%;">
                <iframe src="/public/storage/applicants/letter/{{$data->applicant_letter}}" type="application/pdf" height="650px" width="70%"></iframe>
            </div>

        </div>
        <div class="preview-content">
            <h2>Applicant CV:</h2>
            <p>{{ $data->applicant_cv }}</p>
            <div style="height: 650px; width: 100%;">
                <iframe src="/public/storage/applicants/cv/{{$data->applicant_cv}}" type="application/pdf" height="650px" width="70%"></iframe>
            </div>
        </div>
    </div>
</body>

</html>

</script>
