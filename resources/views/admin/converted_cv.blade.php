<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extracted CV</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div>
        <h1>Your Curriculum Vitae</h1>
        <pre>{{ $text }}</pre>
    </div>

    <ul>
        <li>Name: {{ $personalDetails['firstname'] ?? 'N/A' }} {{ $personalDetails['othernames'] ?? '' }} {{ $personalDetails['surname'] ?? '' }}</li>
        <li>Address: {{ $personalDetails['address'] ?? 'N/A' }}</li>
        <li>Date of Birth: {{ $personalDetails['date_of_birth'] ?? 'N/A' }}</li>
        <li>Nationality: {{ $personalDetails['nationality'] ?? 'N/A' }}</li>
        <li>Email: {{ $personalDetails['email'] ?? 'N/A' }}</li>
        <li>LinkedIn: {{ $personalDetails['linkedin'] ?? 'N/A' }}</li>
        <li>Residential Address: {{ $personalDetails['residential_address'] ?? 'N/A' }}</li>
        <li>Tel: {{ $personalDetails['tel'] ?? 'N/A' }}</li>
    </ul>

    @if (!empty($filteredEducationalDetails))
        <h2>Educational Details</h2>
        <table>
            <thead>
                <tr>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Institution</th>
                    <th>Degree</th>
                    <th>Courses</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($filteredEducationalDetails as $detail)
                    <tr>
                        <td>{{ $detail['start_date'] ?? 'N/A' }}</td>
                        <td>{{ $detail['end_date'] ?? 'N/A' }}</td>
                        <td>{{ $detail['institution'] ?? 'N/A' }}</td>
                        <td>{{ $detail['degree'] ?? 'N/A' }}</td>
                        <td>{{ $detail['courses'] ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No educational details found.</p>
    @endif

    @if (!empty($filterInterests))
        <h2>Interests</h2>
        <table>
            <thead>
                <tr>
                    <th>Interest</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($filterInterests as $interest)
                    <tr>
                        <td>{{ $interest['interest'] ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No interests found.</p>
    @endif

    @if (!empty($refereeDetails))
        <h2>Referees</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Institution</th>
                    <th>Tel</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($refereeDetails as $reference)
                    <tr>
                        <td>{{ $reference['name'] ?? 'N/A' }}</td>
                        <td>{{ $reference['position'] ?? 'N/A' }}</td>
                        <td>{{ $reference['institution'] ?? 'N/A' }}</td>
                        <td>{{ $reference['tel'] ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No referee details found.</p>
    @endif

    <a href="{{ url('upload-resume') }}">Upload another resume</a>
</body>

</html>
