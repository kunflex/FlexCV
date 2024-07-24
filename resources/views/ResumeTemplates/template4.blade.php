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
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            border:15px solid {{$colorCode}};
        }

        .head {
            text-align: center;
            margin-top: 20px;
        }

        .head h1 {
            color: {{$colorCode}};
            display: inline-block;
            font-size: 28px;
            margin: 0;
        }

        .section {
            margin: 20px 0;
        }

        .section h2 {
            background-color: {{$colorCode}};
            color: #fff;
            padding: 6px;
            margin: 0;
            font-size: 18px;
        }

        .section p,
        .section span,
        .section ul {
            font-size: 14px;
            margin: 10px 20px;
            line-height: 1.6;
        }

        .section ul {
            list-style-type: disc;
            padding-left: 20px;
        }

        .section .details {
            margin-bottom: 10px;
        }

        .section .details span {
            display: inline-block;
            margin-right: 20px;
        }

        .references ul {
            list-style-type: none;
            padding-left: 0;
        }

        .references ul li {
            margin-bottom: 10px;
        }

        .references .reference-details span {
            display: block;
            margin-top: 5px;
        }

        body {
            margin: 0px;
            padding: 20px;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <div class="head">
        <h1>Kelvin Boateng Sefa</h1><br>
        <div class="details" style="display:inline-flex; gap:20px;">
            <span>Location: Ghana, Accra</span>
            <span>Tel: (+233593958236)</span>
            <span>Email:example@gmail.com</span>
        </div>
    </div>

    <!-- Profile -->
    <div class="section">
        <h2>Profile</h2>
        <p>
            Describe your Profile.
            What hobbies, activities, or subjects are you passionate about?
            Feel free to share a bit about what makes you excited and engaged
            in your free time or professional life.
        </p>
    </div>
    <!-- End Profile -->

    <!-- Education -->
    <div class="section">
        <h2>Educational Background</h2>
        <div class="details">
            <span>Start date - End date</span>
            <span>Program of Study | Institution</span>
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
            <span>Start date - End date</span>
            <span>Job Title | Company</span>
        </div>
        <p>
            <b>Responsibilities</b>
        <ul>
            <li>Describe your responsibilities and achievements</li>
            <li>Describe your responsibilities and achievements</li>
            <li>Describe your responsibilities and achievements</li>
            <li>Describe your responsibilities and achievements</li>
        </ul>
        </p>
    </div>
    <!-- End Work Experience -->

    <!-- Interest -->
    <div class="section">
        <h2>Interest</h2>
        <p>
            Describe your interests.
            What hobbies, activities, or subjects are you passionate about?
            Feel free to share a bit about what makes you excited and engaged
            in your free time or professional life.
        </p>
    </div>
    <!-- End Interest -->

    <!-- References -->
    <div class="section references">
        <h2>References</h2>
        <ul>
            <li>
                <span>Reference 1</span>
                <div class="reference-details">
                    <span>Position</span>
                    <span>Company</span>
                    <span>Email: example@example.com</span>
                    <span>Tel: (123) 456-7890</span>
                </div>
            </li>
            <li>
                <span>Reference 2</span>
                <div class="reference-details">
                    <span>Position</span>
                    <span>Company</span>
                    <span>Email: example@example.com</span>
                    <span>Tel: (123) 456-7890</span>
                </div>
            </li>
        </ul>
    </div>
    <!-- End References -->
</body>

</html>
