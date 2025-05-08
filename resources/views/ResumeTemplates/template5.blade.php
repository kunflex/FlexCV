<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional CV Template</title>
    <style>
        @page {
            size: A4;
            margin: 20mm;
        }

        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .control-body {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
        }

        .box-layer1 {
            width: 30%;
            padding: 20px;
            background-color: #0095ff;
            color: #fff;
            box-sizing: border-box;
        }

        .box-layer1 img {
            display: block;
            border: 6px solid #fff;
            width: 150px;
            height: 150px;
            margin: 20px auto;
            border-radius: 50%;
        }

        .box-layer2 {
            width: 70%;
            padding: 20px;
            box-sizing: border-box;
        }

        .box-layer2 .head h1 {
            margin: 0;
            font-size: 32px;
            color: #0095ff;
        }

        .section1 {
            margin-bottom: 20px;
        }

        .section1 h2 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #0095ff;
            border-bottom: 2px solid #0095ff;
            padding-bottom: 5px;
        }

        .section1 p,
        .section1 ul {
            font-size: 14px;
            margin: 0;
            padding-left: 20px;
            line-height: 1.5;
        }

        .section1 ul {
            list-style-type: disc;
        }

        .section1-mk {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .mk-span {
            font-weight: bold;
        }

        .mk-ul {
            padding-left: 20px;
        }

        .mk-ul li {
            margin-bottom: 10px;
        }

        .nk-span {
            display: block;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="control-body">
        <div class="box-layer1">
            <div>
                <img src="" alt="Profile Picture">
            </div>
            <div>
                <!-- Personal details -->
                <div class="section1">
                    <h2>Personal Details</h2>
                </div>
                <!-- End Personal details -->
            </div>
        </div>

        <div class="box-layer2">
            <div class="head">
                <h1>Darko Vibes</h1>
            </div>
            <!-- Profile -->
            <div class="section1">
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
            <div class="section1">
                <h2>Educational Background</h2>
                <div class="section1-mk">
                    <span class="mk-span">Start date - End date</span>
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
            <div class="section1">
                <h2>Work Experience</h2>
                <div class="section1-mk">
                    <span class="mk-span">Start date - End date</span>
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
            <div class="section1">
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
            <div class="section1">
                <h2>References</h2>
                <ul class="mk-ul">
                    <li>
                        <span>Reference 1</span><br>
                        <span class="nk-span">Position</span><br>
                        <span class="nk-span">Company</span><br>
                        <span class="nk-span">Email:</span><br>
                        <span class="nk-span">Tel:</span><br>
                    </li><br>
                    <li>
                        <span>Reference 2</span><br>
                        <span class="nk-span">Position</span><br>
                        <span class="nk-span">Company</span><br>
                        <span class="nk-span">Email:</span><br>
                        <span class="nk-span">Tel:</span><br>
                    </li>
                    <br>
                    <li>
                        <span>Reference 2</span><br>
                        <span class="nk-span">Position</span><br>
                        <span class="nk-span">Company</span><br>
                        <span class="nk-span">Email:</span><br>
                        <span class="nk-span">Tel:</span><br>
                    </li>
                </ul>
            </div>
            <!-- End References -->
        </div>
    </div>
</body>

</html>
