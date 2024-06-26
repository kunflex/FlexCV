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
        :root {
            --primary-font: 'Helvetica Neue', Arial, sans-serif;
            --secondary-font: 'Helvetica Neue', Arial, sans-serif;
            --background-color: #fff;
            --text-color:#000000;
            --header-color: #00A8FF;
            --border-color: #e0e0e0;
        }
        body {
            font-family: var(--primary-font);
            color: var(--text-color);
            margin: 0;
            padding: 20px;
            line-height: 1.6;
            background-color:var(--background-color);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            font-family: var(--secondary-font);
        }

        .header h1 {
            font-size: 24px;
            margin: 0;
            color: var(--header-color);
            display: inline-block;
        }

        .section {
            margin-bottom: 10px;
        }

        .section h2 {
            color: var(--header-color);
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
        <div class="header">
            <h1>Kelvin Boateng Sefa</h1>
            <div class="details">
                <span>Location: Ghana, Accra</span>
                <span>Tel: (+233593958236)</span>
                <span>Email:example@gmail.com</span>
            </div>
        </div>


        <!-- Profile -->
        <div class="section">
            <h2>Profile</h2>
            <p>
                Describe your profile. What hobbies, activities, or subjects are you passionate about?
                Feel free to share a bit about what makes you excited and engaged in your free time or professional life.
            </p>
        </div>
        <!-- End Profile -->

        <!-- Education -->
        <div class="section">
            <h2>Educational Background</h2>
            <div class="details">
                <span><b>Start date - End date:</b><br> Program of Study | Institution</span>
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
                <span><b>Start date - End date:</b><br> Job Title | Company</span>
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

        <!-- Interests -->
        <div class="section">
            <h2>Interests</h2>
            <p>
                Describe your interests. What hobbies, activities, or subjects are you passionate about?
                Feel free to share a bit about what makes you excited and engaged in your free time or professional life.
            </p>
        </div>
        <!-- End Interests -->

        <!-- References -->
        <div class="section references">
            <h2>References</h2>
            <ul>
                <li>
                    <span><b>Reference 1:</b></span>
                    <div class="reference-details">
                        <span><b>Position:</b> Position Name</span>
                        <span><b>Company:</b> Company Name</span>
                        <span><b>Email:</b> example@example.com</span>
                        <span><b>Tel:</b> (123) 456-7890</span>
                    </div>
                </li>
                <li>
                    <span><b>Reference 2:</b></span>
                    <div class="reference-details">
                        <span><b>Position:</b> Position Name</span>
                        <span><b>Company:</b> Company Name</span>
                        <span><b>Email:</b> example@example.com</span>
                        <span><b>Tel:</b> (123) 456-7890</span>
                    </div>
                </li>
            </ul>
        </div>
        <!-- End References -->
    </div>
</body>

</html>
