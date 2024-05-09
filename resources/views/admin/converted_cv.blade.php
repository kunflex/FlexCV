<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extracted CV</title>
</head>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
</style>
<body>
    <div>
        <h1>Your Curriculum Vitae</h1>
        <pre>{{ $text }}</pre>
    </div>

    <ul>
        <li>Name: {{ $personalDetails['firstname'] }} {{ $personalDetails['othernames'] }} {{ $personalDetails['surname'] }}</li>
        <li>Address: {{ $personalDetails['address'] }}</li>
        <li>Date of birth: {{ $personalDetails['date_of_birth'] }}</li>
        <li>Nationality: {{ $personalDetails['nationality'] }}</li>
        <li>Email: {{ $personalDetails['email'] }}</li>
        <li>LinkedIn: {{ $personalDetails['linkedin'] }}</li>
        <li>Residential Address: {{ $personalDetails['residential_address'] }}</li>
        <li>Tel: {{ $personalDetails['tel'] }}</li>
    </ul>
    


    @if(!empty($filteredEducationalDetails) && count($filteredEducationalDetails) > 0)
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
                @foreach($filteredEducationalDetails as $detail)
                    <tr>
                        <td>{{ $detail['start_date'] }}</td>
                        <td>{{ $detail['end_date'] }}</td>
                        <td>{{ $detail['institution'] }}</td>
                        <td>{{ $detail['degree'] }}</td>
                        <td>{{ $detail['courses'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No educational details found.</p>
    @endif


    @if(!empty($filterInterests))
    <table>
        <thead>
            <tr>
                <th>$Interests</th>
            </tr>
        </thead>
        <tbody>
            @foreach($filterInterests as $Interests)
                <tr>
                    <td>{{ $Interests['interest'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No Interests found.</p>
@endif

    @if(!empty($refereeDetails))
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
            @foreach($refereeDetails as $reference)
                <tr>
                    <td>{{ $reference['name'] }}</td>
                    <td>{{ $reference['position'] }}</td>
                    <td>{{ $reference['institution'] }}</td>
                    <td>{{ $reference['tel'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No referee details found.</p>
@endif


    <a href="{{url('upload-resume')}}">upload</a>
</body>
</html>