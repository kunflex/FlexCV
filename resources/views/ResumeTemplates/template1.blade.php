<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional CV Template</title>
    <style>
        @page {
            size: A4;
            margin: 10mm;
        }

        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            color: #000;
            margin: 0;
            padding: 20px;
            line-height: 1.6;
            background-color: #fff;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            font-family: 'Helvetica Neue', Arial, sans-serif;
        }

        .header h1 {
            font-size: 24px;
            margin: 0;
            color: {{ $colorCode }};
            display: inline-block;
        }

        .section {
            margin-bottom: 10px;
        }

        .section h2 {
            color: {{ $colorCode }};
            margin: 0 0 0px 0;
            font-size: 18px;
        }

        .section p,
        .section span,
        .section ul {
            font-size: 14px;
            margin: 0;
            padding: 0;
        }

        .section ul {
            list-style-type: disc;
            padding-left: 20px;
        }

        .details span {
            display: block;
            margin-bottom: 5px;
        }

        .details span b {
            color: #333;
        }

        .references ul {
            list-style-type: none;
            padding-left: 0;
        }

        .references ul li {
            margin-bottom: 10px;
        }

        .reference-details span {
            display: block;
            margin-top: 5px;
        }

        .section p {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div>
        @forelse ($cvPersonalDetails as  $cvPersonalDetails)

            <div class="header">
                <h1>{{ $cvPersonalDetails->firstname }} {{ $cvPersonalDetails->othername }}
                    {{ $cvPersonalDetails->lastname }}</h1><br>
                <div class="details">
                    <span>{{ $cvPersonalDetails->country }}, {{ $cvPersonalDetails->city_town }}</span>
                    <span>Tel: {{ $cvPersonalDetails->phone_number }}</span>
                    <span>{{ $cvPersonalDetails->email }}</span>
                </div>
            </div>

            @if (!empty($cvPersonalDetails->summary))
                <!-- Profile -->
                <div class="section">
                    <h2>Profile</h2>
                    <p>
                        {!! $cvPersonalDetails->summary !!}
                    </p>
                </div>
                <!-- End Profile -->
            @else
            @endif

            @if (!empty($cvPersonalDetails->skills))
                <!-- Profile -->
                <div class="section">
                    <h2>Skills</h2>
                    <p>
                        {{ $cvPersonalDetails->skills }}
                    </p>
                </div>
                <!-- End Profile -->
            @else
            @endif


            <!-- Education -->
            <div class="section">
                <h2>Educational Background</h2>
                @forelse ($cvEducation as $cvEducation)
                    <div class="details">
                        <span>{{ \Carbon\Carbon::parse($cvEducation->start_date)->format('m/Y') }} -
                            @if (empty($cvEducation->end_date))
                                Current
                            @else
                            {{ \Carbon\Carbon::parse($cvEducation->start_date)->format('m/Y') }}
                            @endif
                        </span>
                        <span>{{ $cvEducation->certification }} {{ $cvEducation->field_of_study }}</span>
                        <span>{{ $cvEducation->location }} | <b>{{ $cvEducation->institution }}</b></span>
                    </div>

                    @if (!empty($cvEducation->course))
                        <p>
                            <b>Course Outline</b>
                        <ul>
                            <li>List your courses</li>
                            <li>List your courses</li>
                            <li>List your courses</li>
                            <li>List your courses</li>
                        </ul>
                        </p>
                    @else
                    @endif

                @empty
                @endforelse
            </div>
            <!-- End Education -->

            <!-- Work Experience -->
            <div class="section">
                <h2>Work Experience</h2>
                @forelse ($cvExperience as $cvExperience)
                    <div class="details">
                        <span>{{ \Carbon\Carbon::parse($cvExperience->start_date)->format('m/Y') }} -
                            @if (empty($cvExperience->end_date))
                                Current
                            @else
                            {{ \Carbon\Carbon::parse($cvExperience->end_date)->format('m/Y') }}
                            @endif
                        </span>
                        <span>{{ $cvExperience->job_title }} | <b>{{ $cvExperience->company }}</b></span>
                    </div>

                    @if (empty($cvExperience->responsibilities))
                    @else
                        <p>
                            <b>Responsibilities</b>
                        <ul>
                            {!! $cvExperience->responsibilities !!}
                        </ul>
                        </p>
                    @endif

                @empty
                @endforelse

            </div>
            <!-- End Work Experience -->

            @forelse($cvAdditionalDetails as  $cvAdditionalDetails)
                <!-- Interest -->
                <div class="section">
                    <h2>Interest</h2>
                    <p>
                        {{ $cvAdditionalDetails->other_details }}
                    </p>
                </div>
                <!-- End Interest -->
            @empty
            @endforelse


            <!-- References -->
            <div class="section references">
                <h2>References</h2>
                <ul style="padding-left:20px;">
                    @forelse($cvReference as $cvReference)
                        <li style="list-style-type: lower-roman">
                            <span>{{ $cvReference->fullname }}</span>
                            <div class="reference-details">
                                <span>{{ $cvReference->position }}</span>
                                <span> {{ $cvReference->company }}</span>
                                <span> {{ $cvReference->email }}</span>
                                <span>Tel: {{ $cvReference->telephone }}</span>
                            </div>
                        </li>
                    @empty
                    @endforelse
                </ul>
            </div>
            <!-- End References -->


        @empty
        @endforelse
    </div>
</body>

</html>
