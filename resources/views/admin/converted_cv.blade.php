<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extracted CV</title>
<<<<<<< HEAD
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
=======
</head>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
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
>>>>>>> 0cd43fb34b4b876699950693d30d1e00ea7cf206

<body>
    <div>
        <h1>Your Curriculum Vitae</h1>
        <pre>{{ $text }}</pre>
    </div>

    <ul>
<<<<<<< HEAD
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
=======
        <li>Name: {{ $personalDetails['firstname'] }} {{ $personalDetails['othernames'] }}
            {{ $personalDetails['surname'] }}</li>
        <li>Address: {{ $personalDetails['address'] }}</li>
        <li>Date of birth: {{ $personalDetails['date_of_birth'] }}</li>
        <li>Nationality: {{ $personalDetails['nationality'] }}</li>
        <li>Email: {{ $personalDetails['email'] }}</li>
        <li>LinkedIn: {{ $personalDetails['linkedin'] }}</li>
        <li>Residential Address: {{ $personalDetails['residential_address'] }}</li>
        <li>Tel: {{ $personalDetails['tel'] }}</li>
    </ul>



    @if (!empty($filteredEducationalDetails) && count($filteredEducationalDetails) > 0)
>>>>>>> 0cd43fb34b4b876699950693d30d1e00ea7cf206
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
<<<<<<< HEAD
                        <td>{{ $detail['start_date'] ?? 'N/A' }}</td>
                        <td>{{ $detail['end_date'] ?? 'N/A' }}</td>
                        <td>{{ $detail['institution'] ?? 'N/A' }}</td>
                        <td>{{ $detail['degree'] ?? 'N/A' }}</td>
                        <td>{{ $detail['courses'] ?? 'N/A' }}</td>
=======
                        <td>{{ $detail['start_date'] }}</td>
                        <td>{{ $detail['end_date'] }}</td>
                        <td>{{ $detail['institution'] }}</td>
                        <td>{{ $detail['degree'] }}</td>
                        <td>{{ $detail['courses'] }}</td>
>>>>>>> 0cd43fb34b4b876699950693d30d1e00ea7cf206
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No educational details found.</p>
    @endif

<<<<<<< HEAD
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
=======

    @if (!empty($filterInterests))
        <table>
            <thead>
                <tr>
                    <th>$Interests</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($filterInterests as $Interests)
                    <tr>
                        <td>{{ $Interests['interest'] }}</td>
>>>>>>> 0cd43fb34b4b876699950693d30d1e00ea7cf206
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
<<<<<<< HEAD
        <p>No interests found.</p>
    @endif

    @if (!empty($refereeDetails))
        <h2>Referees</h2>
=======
        <p>No Interests found.</p>
    @endif

    @if (!empty($refereeDetails))
>>>>>>> 0cd43fb34b4b876699950693d30d1e00ea7cf206
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
<<<<<<< HEAD
                        <td>{{ $reference['name'] ?? 'N/A' }}</td>
                        <td>{{ $reference['position'] ?? 'N/A' }}</td>
                        <td>{{ $reference['institution'] ?? 'N/A' }}</td>
                        <td>{{ $reference['tel'] ?? 'N/A' }}</td>
=======
                        <td>{{ $reference['name'] }}</td>
                        <td>{{ $reference['position'] }}</td>
                        <td>{{ $reference['institution'] }}</td>
                        <td>{{ $reference['tel'] }}</td>
>>>>>>> 0cd43fb34b4b876699950693d30d1e00ea7cf206
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No referee details found.</p>
    @endif

<<<<<<< HEAD
    <a href="{{ url('upload-resume') }}">Upload another resume</a>
=======

    <a href="{{ url('upload-resume') }}">upload</a>
>>>>>>> 0cd43fb34b4b876699950693d30d1e00ea7cf206
</body>

</html>
