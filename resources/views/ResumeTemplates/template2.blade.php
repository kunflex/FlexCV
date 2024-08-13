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
            border-bottom: 2px solid {{ $colorCode }};
            display: inline-block;
        }

        .section {
            margin-bottom: 10px;
        }

        .section h2 {
            color: {{ $colorCode }};
            margin: 0 0 2px 0;
            font-size: 18px;
            border-bottom: 1px solid #e0e0e0;
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
    @forelse ($cvPersonalDetails as  $cvPersonalDetails)
        <div>
            <div class="header">
                <h1>Curriculum Vitae</h1>
            </div>

            <!-- Personal details -->
            <div class="section">
                <h2>Personal Details</h2>
                <div class="details">
                    <span>{{ $cvPersonalDetails->firstname }} {{ $cvPersonalDetails->othername }}
                        {{ $cvPersonalDetails->lastname }}</span>
                    <span>{{ $cvPersonalDetails->country }}, {{ $cvPersonalDetails->city_town }}</span>
                    <span>Tel: {{ $cvPersonalDetails->phone_number }}</span>
                    <span>Email: {{ $cvPersonalDetails->email }}</span>
                </div>
            </div>
            <!-- End Personal details -->

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
                                {{ \Carbon\Carbon::parse($cvEducation->end_date)->format('m/Y') }}
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

        </div>
    @empty
        <div class="header">
            <h1>Curriculum Vitae</h1>
        </div>

        <div class="section">
            <h2>Personal Details</h2>
            <div class="details">
                <span style="display: inline-flex; gap:10px;">
                    <div id="preview_firstname"></div> <div id="preview_othernames"></div> <div id="preview_lastname"></div>
                </span><br>
                <span id="preview_DOB"></span>
                <span style="display: inline-flex;gap:10px;">
                    <div id="preview_country"></div>
                <div id="preview_city_town"></div></span>
                <span id="preview_postal_address"></span>
                <span id="preview_phone"></span>
                <span id="preview_email"></span>
            </div>
        </div>
        
        
        <!-- Profile -->
        <div class="section">
            <h2>Profile</h2>
            <p>
                brief description about yourself
            </p>
        </div>
        <!-- End Profile -->

        <!-- Profile -->
        <div class="section">
            <h2>Skiils</h2>
            <p>
                brief description about your acquired skills
            </p>
        </div>
        <!-- End Profile -->

        <!-- Education -->
        <div class="section">
            <h2>Educational Background</h2>
            <div class="details">
                <span>2018 - 2021
                </span>
                <span>Accra | <b>Accra Institute of Technology</b></span>
                <span>Higher National Diploma (HND) Financial Accounting</span>
            </div>
            <p>
                <b>Course Outline</b>
            <ul>
                <li>List your courses</li>
                <li>List your courses</li>
                <li>List your courses</li>
                <li>List your courses</li>
            </ul>
            </p>
        </div>
        <!-- End Education -->

        <!-- Work Experience -->
        <div class="section">
            <h2>Work Experience</h2>
            <div class="details">
                <span>2022 - Current
                </span>
                <span>Sales Representative | <b>MTN Ghana</b></span>
            </div>
            <p>
                <b>Responsibilities</b>
            <ul>
                <li>task performed during your stay in the company</li>
                <li>task performed during your stay in the company</li>
                <li>task performed during your stay in the company</li>
            </ul>
            </p>
        </div>
        <!-- End Work Experience -->

        <!-- Interest -->
        <div class="section">
            <h2>Interest</h2>
            <p>
                brief description about your interest
            </p>
        </div>
        <!-- End Interest -->

        <!-- References -->
        <div class="section references">
            <h2>References</h2>
            <ul>
                <li style="list-style-type: lower-roman">
                    <span>Frank Adjei</span>
                    <div class="reference-details">
                        <span>Managing Director</span>
                        <span> Flexcotech Limited</span>
                        <span> frankadjei@yahoo.com</span>
                        <span>Tel: 0248513678</span>
                    </div>
                </li>
                <li style="list-style-type: lower-roman">
                    <span>Maxwell Bruce</span>
                    <div class="reference-details">
                        <span>Data Analyst</span>
                        <span> Wortech Limited</span>
                        <span> maxbruce@gmail.com</span>
                        <span>Tel: 0538513678</span>
                    </div>
                </li>
            </ul>
        </div>
        <!-- End References -->
    @endforelse
</body>
<script>
    // Get references to the preview divs
    const preview_firstname = document.getElementById('preview_firstname');
    const preview_lastname = document.getElementById('preview_lastname');
    const preview_othernames = document.getElementById('preview_othernames');
    const preview_country = document.getElementById('preview_country');
    const preview_city_town = document.getElementById('preview_city_town');
    const preview_email = document.getElementById('preview_email');
    const preview_phone = document.getElementById('preview_phone');
    const preview_postal_address = document.getElementById('preview_postal_address');
    const preview_DOB = document.getElementById('preview_DOB');

    // Function to update previews based on session storage
    function updatePreviews() {
        const storedFirstname = sessionStorage.getItem('firstname');
        const storedLastname = sessionStorage.getItem('lastname');
        const storedOthernames = sessionStorage.getItem('othernames');
        const storedCountry = sessionStorage.getItem('country');
        const storedCity_town = sessionStorage.getItem('city_town');
        const storedEmail = sessionStorage.getItem('email');
        const storedPhone = sessionStorage.getItem('phone');
        const storedPostal_address = sessionStorage.getItem('postal_address');
        const storedDOB = sessionStorage.getItem('DOB');

        preview_firstname.innerText = storedFirstname ? storedFirstname : "Firstname"; // Fallback message
        preview_lastname.innerText = storedLastname ? storedLastname : "Lastname"; // Fallback message
        preview_othernames.innerText = storedOthernames ? storedOthernames : "Othernames"; // Fallback message
        preview_country.innerText = storedCountry ? storedCountry : "Country"; // Fallback message
        preview_city_town.innerText = storedCity_town ? storedCity_town : "City/Town"; // Fallback message
        preview_email.innerText = storedEmail ? storedEmail : "example@gmail.com"; // Fallback message
        preview_phone.innerText = storedPhone ? storedPhone : "0593958236"; // Fallback message
        preview_postal_address.innerText = storedPostal_address ? storedPostal_address : "Postal Address"; // Fallback message
        preview_DOB.innerText = storedDOB ? storedDOB : "Date of Birth"; // Fallback message
    }

    // Call the function to update previews on page load
    updatePreviews();

    // Update previews if session storage changes
    window.addEventListener('storage', updatePreviews);
</script>
</html>
