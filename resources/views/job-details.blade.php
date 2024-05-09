<x-app-layout>
    <x-slot name="header">
        <h3>
            {{ __('Job Description') }}
        </h3>
    </x-slot>


    <div class="flow-color">
        <div>
            <div class="description-content">
                <!-- ===Title=== -->
                <div class="job-display">
                    <div class="job-list">
                        <!-- =====Job Info======= -->
                        <div class="display-top">
                            <div class="icon-shape">M</div>
                            <div class="job-info">
                                <b>Marketing Manager</b>
                                <p>
                                    We're hiring a Marketing Manager at TechGen Innovations Inc.
                                    to drive marketing strategies and boost our brand. We need a
                                    creative and data-driven professional with a proven track
                                    record in B2B technology marketing.
                                </p>
                            </div>
                        </div>
                        <!-- ========End Job Info======== -->

                        <!-- ======Contact Info===== -->
                        <div class="display-down">
                            <div class="display-contact">
                                <div class="icon-dsc">
                                    <svg width="20px" height="20px" viewBox="0 0 36 36" version="1.1"
                                        preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>briefcase-solid</title>
                                        <path
                                            d="M30,18A4.06,4.06,0,0,0,34,14V6H24V4.43A2.44,2.44,0,0,0,21.55,2h-7.1A2.44,2.44,0,0,0,12,4.43V6H2v8A4.06,4.06,0,0,0,6.05,18h4V15.92h2v5.7a1,1,0,1,1-2,0V20.06H6.06A6.06,6.06,0,0,1,2,18.49v9.45a2,2,0,0,0,2,2H32a2,2,0,0,0,2-2V18.49a6,6,0,0,1-4.06,1.57H28V18ZM14,4.43A.45.45,0,0,1,14.45,4h7.1a.45.45,0,0,1,.45.43V6H14ZM26,21.62a1,1,0,1,1-2,0V20.06H14V18H24V15.92h2Z"
                                            class="clr-i-solid clr-i-solid-path-1"></path>
                                        <rect x="0" y="0" width="36" height="36" fill-opacity="0" />
                                    </svg>
                                </div>
                                <div class="dsc-details">Full - Time</div>
                            </div><br>
                            <div class="display-contact">
                                <div class="icon-dsc">
                                    <svg width="20px" height="20px" viewBox="0 0 50 50"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path
                                            d="M8 2L8 6L4 6L4 48L15 48L15 39L19 39L19 48L30 48L30 6L26 6L26 2 Z M 10 10L12 10L12 12L10 12 Z M 14 10L16 10L16 12L14 12 Z M 18 10L20 10L20 12L18 12 Z M 22 10L24 10L24 12L22 12 Z M 32 14L32 18L34 18L34 20L32 20L32 22L34 22L34 24L32 24L32 26L34 26L34 28L32 28L32 30L34 30L34 32L32 32L32 34L34 34L34 36L32 36L32 38L34 38L34 40L32 40L32 42L34 42L34 44L32 44L32 48L46 48L46 14 Z M 10 15L12 15L12 19L10 19 Z M 14 15L16 15L16 19L14 19 Z M 18 15L20 15L20 19L18 19 Z M 22 15L24 15L24 19L22 19 Z M 36 18L38 18L38 20L36 20 Z M 40 18L42 18L42 20L40 20 Z M 10 21L12 21L12 25L10 25 Z M 14 21L16 21L16 25L14 25 Z M 18 21L20 21L20 25L18 25 Z M 22 21L24 21L24 25L22 25 Z M 36 22L38 22L38 24L36 24 Z M 40 22L42 22L42 24L40 24 Z M 36 26L38 26L38 28L36 28 Z M 40 26L42 26L42 28L40 28 Z M 10 27L12 27L12 31L10 31 Z M 14 27L16 27L16 31L14 31 Z M 18 27L20 27L20 31L18 31 Z M 22 27L24 27L24 31L22 31 Z M 36 30L38 30L38 32L36 32 Z M 40 30L42 30L42 32L40 32 Z M 10 33L12 33L12 37L10 37 Z M 14 33L16 33L16 37L14 37 Z M 18 33L20 33L20 37L18 37 Z M 22 33L24 33L24 37L22 37 Z M 36 34L38 34L38 36L36 36 Z M 40 34L42 34L42 36L40 36 Z M 36 38L38 38L38 40L36 40 Z M 40 38L42 38L42 40L40 40 Z M 10 39L12 39L12 44L10 44 Z M 22 39L24 39L24 44L22 44 Z M 36 42L38 42L38 44L36 44 Z M 40 42L42 42L42 44L40 44Z" />
                                    </svg>
                                </div>
                                <div class="dsc-details">TechGen Innovations Inc</div>
                            </div><br>
                            <div class="display-contact">
                                <div class="icon-dsc"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                        height="20" viewBox="0 0 512 512">
                                        <circle cx="256" cy="192" r="32" />
                                        <path
                                            d="M256,32C167.78,32,96,100.65,96,185c0,40.17,18.31,93.59,54.42,158.78,29,52.34,62.55,99.67,80,123.22a31.75,31.75,0,0,0,51.22,0c17.42-23.55,51-70.88,80-123.22C397.69,278.61,416,225.19,416,185,416,100.65,344.22,32,256,32Zm0,224a64,64,0,1,1,64-64A64.07,64.07,0,0,1,256,256Z" />
                                    </svg></div>
                                <div class="dsc-details">Silicon Valley, CA</div>
                            </div><br>
                            <div class="display-contact">
                                <div class="icon-dsc"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                        height="20" viewBox="0 0 512 512">
                                        <path
                                            d="M424,80H88a56.06,56.06,0,0,0-56,56V376a56.06,56.06,0,0,0,56,56H424a56.06,56.06,0,0,0,56-56V136A56.06,56.06,0,0,0,424,80Zm-14.18,92.63-144,112a16,16,0,0,1-19.64,0l-144-112a16,16,0,1,1,19.64-25.26L256,251.73,390.18,147.37a16,16,0,0,1,19.64,25.26Z" />
                                    </svg></div>
                                <div class="dsc-details">hr@techgeninnovations.com</div>
                            </div><br>
                            <div class="display-contact">
                                <div class="icon-dsc">
                                    <svg height="20px" width="20px" version="1.1" id="_x32_"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        viewBox="0 0 512 512" xml:space="preserve">
                                        <style type="text/css">

                                        </style>
                                        <g>
                                            <path class="st0" d="M474.68,99.477c-37.944-24.523-131.54-58.702-218.692-57.316c-87.16-1.386-180.73,32.785-218.666,57.316
                                                    c-39.161,23.988-47.5,55.064-25.033,79.34c6.86,9.682,13.592,19.423,20.188,29.241c5.806,8.543,16.975,11.858,26.92,8.288
                                                    c19.772-7.14,39.84-13.201,60.122-18.173c10.286-2.516,17.655-11.578,17.613-21.973c-0.076-7.506-0.102-15.029-0.076-22.552
                                                    c0.008-9.528,7.098-18.215,17.459-20.91c-0.263-0.442,58.813-15.862,101.475-14.968c42.662-0.901,101.739,14.526,101.475,14.96
                                                    c10.37,2.703,17.476,11.39,17.476,20.918c0.026,7.523,0.009,15.038-0.068,22.552c-0.05,10.395,7.311,19.448,17.596,21.964
                                                    c20.282,4.981,40.342,11.033,60.114,18.174c9.962,3.587,21.122,0.255,26.928-8.288c6.605-9.809,13.345-19.558,20.205-29.232
                                                    C522.187,154.541,513.824,123.472,474.68,99.477z" />
                                            <path class="st0" d="M416.552,240.605c-10.038-3.069-20.162-5.891-30.32-8.381c-22.169-5.424-37.587-24.932-37.478-47.448
                                                    c0.069-6.273,0.085-12.444,0.076-18.607l-11.024-2.898c-17.416-4.029-51.205-10.718-78.15-10.718h-7.31
                                                    c-27.031,0-60.861,6.706-78.253,10.736l-0.016,0.043l-10.923,2.847c-0.009,6.18,0.017,12.325,0.085,18.462
                                                    c0.093,22.661-15.334,42.178-37.52,47.6c-10.124,2.482-20.23,5.296-30.269,8.356l-9.996,29.088L40.572,365.43v52.633
                                                    c0,28.62,23.197,51.817,51.817,51.817H256h163.612c28.62,0,51.817-23.196,51.817-51.817V365.43l-44.881-95.746L416.552,240.605z
                                                    M337.717,368.099v40.861h-40.852v-40.861H337.717z M337.717,312.185v40.86h-40.852v-40.86H337.717z M296.865,297.123v-40.852
                                                    h40.852v40.852H296.865z M276.431,368.099v40.861H235.57v-40.861H276.431z M276.431,312.185v40.86H235.57v-40.86H276.431z
                                                    M235.57,297.123v-40.852h40.861v40.852H235.57z M215.14,368.099v40.861h-40.856v-40.861H215.14z M215.14,312.185v40.86h-40.856
                                                    v-40.86H215.14z M174.284,297.123v-40.852h40.856v40.852H174.284z" />
                                        </g>
                                    </svg>
                                </div>
                                <div class="dsc-details">0593958236</div>
                            </div><br>
                            <div class="display-contact">
                                <div class="icon-dsc">
                                    <svg height="20px" width="20px" version="1.1" id="Capa_1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        viewBox="0 0 489.038 489.038" xml:space="preserve">
                                        <g>
                                            <path
                                                d="M302.7,152.181c-32.3-18.6-84.5-18.7-116.6,0c-32.1,18.6-31.9,48.9,0.4,67.5s84.5,18.6,116.5,0
                                                    C335.2,200.981,335,170.781,302.7,152.181z M287.9,181.481c-2.8,0.9-5.5,1.8-8.4,2.6c-1.7,0.5-2.7,0.6-3.5,0.2
                                                    c-0.4-0.2-0.8-0.7-1.1-1.3c-1.9-3-4.7-5.6-8.6-7.8c-0.4-0.3-0.9-0.5-1.4-0.8c-1.2-0.6-2.5-1.2-4-1.5c-5.4-1.2-10.1,0.8-9.4,4.1
                                                    c0.3,1.7,1.2,3.3,2.3,4.9c1.9,2.7,4,5.4,5.4,8.2c4.5,9-5.3,17.8-20.9,18.7c-5.7,0.3-11-0.4-16-2c-2.2-0.7-3.8-0.7-5.5,0.4
                                                    c-1.6,1-3.4,2-5.1,3c-1.5,0.9-3.1,0.9-4.7,0c-1.1-0.6-2.2-1.2-3.3-1.8c-0.8-0.4-1.5-0.9-2.3-1.4c-1.6-0.9-1.4-1.9,0.2-2.9
                                                    c1.2-0.7,2.5-1.5,3.7-2.2c2.8-1.6,2.8-1.8,0.5-3.6c-2.9-2.3-5.5-4.7-7.1-7.4c-1.3-2.1-0.9-2.6,2.3-3.7c2.5-0.8,4.9-1.6,7.4-2.4
                                                    c1.8-0.6,2.8-0.7,3.6-0.3c0.4,0.3,0.8,0.7,1.1,1.4c1.7,3,4.3,5.8,7.7,8.3c0.6,0.4,1.2,0.8,1.8,1.2c1.8,1.1,3.9,1.9,6.4,2.5
                                                    c6.1,1.4,11.8-1.1,11.1-4.9c-0.2-1.3-0.9-2.5-1.7-3.8c-2.1-3.1-4.8-6.1-6.3-9.4c-2.3-5.3-1.3-10.2,6.2-14
                                                    c8.4-4.3,17.8-4.6,27.7-1.9c4.1,1.1,4.1,1.1,7.2-0.7c1.1-0.6,2.1-1.2,3.2-1.8c2.4-1.3,3.2-1.3,5.6,0c0.3,0.1,0.5,0.3,0.7,0.4
                                                    c0.5,0.3,1,0.6,1.4,0.9c5,2.9,5,2.9,0.1,5.8c-3.5,2-3.5,2.1-0.6,4.4c2.3,1.8,4.1,3.8,5.5,5.8
                                                    C290.2,180.081,289.8,180.881,287.9,181.481z M486,215.481l-293.4-169.3c-4-2.3-10.6-2.3-14.6,0L3.2,147.781c-4,2.3-4,6.1,0,8.5
                                                    l293.3,169.3c4.1,2.4,10.6,2.3,14.6,0l174.9-101.6C490,221.681,490.1,217.881,486,215.481z M333.1,286.481c-1.6-1.6-3.6-3-5.9-4.3
                                                    c-14.9-8.6-39-8.6-53.9,0c-1.1,0.7-2.1,1.3-3.1,2.1l-197.6-114.2c1.9-0.8,3.7-1.6,5.4-2.6c14.8-8.6,14.7-22.6-0.2-31.2
                                                    c-1.6-0.9-3.4-1.8-5.2-2.5l81.5-47.3c1.3,1,2.7,2.1,4.3,3c14.9,8.6,39.1,8.6,53.9,0c1.7-1,3.2-2,4.4-3.1l198.2,114.5
                                                    c-2.6,0.9-5.1,2-7.3,3.3c-14.8,8.6-14.7,22.6,0.2,31.2c2.3,1.3,4.9,2.4,7.6,3.4L333.1,286.481z M357,243.281l-12.9,7.5
                                                    c-2,1.1-5.2,1.2-7.2,0l-22.7-13.1c-2-1.2-2-3,0-4.2l12.9-7.5c2-1.1,5.2-1.2,7.2,0l22.7,13.1C359,240.281,359,242.181,357,243.281z
                                                    M175,138.181l-12.9,7.5c-2,1.1-5.2,1.2-7.2,0l-22.7-13.1c-2-1.2-2-3,0-4.2l12.9-7.5c2-1.1,5.2-1.2,7.2,0l22.7,13.1
                                                    C177,135.181,177,137.081,175,138.181z M466.2,267.581l22.8,13.2l-183.3,106.5l-6-3.4l-16.9-9.7L0,210.581l22.6-13.1l282.9,163.4
                                                    L466.2,267.581z M465.8,325.281l22.8,13.2L306,444.581l-5.9-3.4l-16.9-9.7L0,267.581l22.6-13.1l283.3,163.8L465.8,325.281z" />
                                        </g>
                                    </svg>
                                </div>
                                <div class="dsc-details">GHS2000 - GHS3000 monthly</div>
                            </div><br>
                        </div>
                        <!-- =======End Contact Info====== -->
                    </div>
                </div>
            </div>

            <div class="content-bx">
                <div><b>Key Responsibilities:</b></div>
                <ul>
                    <li class="bullets-bx">
                        <b>Strategic Planning:</b>
                        Develop and implement strategic marketing plans to achieve company
                        objectives, collaborating closely with cross-functional teams.
                    </li>
                    <li class="bullets-bx">
                        <b>Campaign Management:</b>
                        Oversee end-to-end execution of marketing campaigns, including content
                        creation, design, and distribution across various channels.
                    </li>
                    <li class="bullets-bx">
                        <b>Brand Development:</b>
                        Work to enhance and maintain the TechGen brand, ensuring consistency in
                        messaging and visual identity across all platforms.
                    </li>
                    <li class="bullets-bx">
                        <b>Market Research:</b>
                        Conduct market research to identify trends, competitor activities, and
                        opportunities for innovation. Use insights to inform marketing strategies.
                    </li>
                    <li class="bullets-bx">
                        <b>Digital Marketing:</b>
                        Lead digital marketing initiatives, including SEO, SEM, email marketing, and
                        social media campaigns. Monitor and analyze performance metrics.
                    </li>
                    <li class="bullets-bx">
                        <b>Event Coordination:</b>
                        Plan and execute corporate events, trade shows, and conferences to enhance brand
                        visibility and generate leads.
                    </li>
                    <li class="bullets-bx">
                        <b>Collaboration:</b>
                        Work closely with the sales team to align marketing efforts with sales goals and
                        provide support through targeted campaigns.
                    </li>
                    <li class="bullets-bx">
                        <b>Budget Management:</b>
                        Responsible for the marketing budget, ensuring efficient allocation of resources
                        and achieving maximum ROI.
                    </li>
                </ul>
            </div><br>

            <div class="content-bx">
                <div><b>Qualifications:</b></div>
                <ul>
                    <li class="bullets">Bachelor's degree in Marketing, Business, or related field. Master's degree is a
                        plus.</li>
                    <li class="bullets">Minimum of 5 years of experience in B2B technology marketing, with a focus on
                        campaign management and digital marketing.</li>
                    <li class="bullets">Proven success in developing and implementing strategic marketing plans that
                        contributed to business growth.</li>
                    <li class="bullets">Strong analytical skills with the ability to interpret data and make data-driven
                        decisions.</li>
                    <li class="bullets">Excellent written and verbal communication skills.</li>
                </ul>
            </div><br>

            <div class="content-bx">
                <div><b>How to Apply:</b></div>
                <p>
                    Interested candidates should submit their resume, cover letter,
                    and a portfolio showcasing successful marketing campaigns to
                    hr@techgeninnovations.com. Please include "Marketing Manager
                    Application - [Your Name]" in the subject line.
                </p>
            </div><br>

            <div class="content-bx">
                <div><b>Application Deadline:</b></div>
                <p>
                    All applications must be received by [Insert Deadline].
                    Only shortlisted candidates will be contacted for interviews.
                    TechGen Innovations Inc. is an equal opportunity employer.
                    We encourage candidates from diverse backgrounds to apply.
                </p>
            </div><br><br>

            <div class="form-bx">
                <form action="{{ route('job-application') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-box">
                        <label for=""><b>
                                <svg fill="#000000" width="20px" height="20px" viewBox="0 0 32 32" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <title>attachment</title>
                                    <path
                                        d="M23.061 13.441c0 0 1.172-0.891 0.281-1.782-0.893-0.891-1.76 0.259-1.76 0.259l-6.969 6.97c0 0-2.103 2.711-3.696 1.070s1.070-3.696 1.070-3.696l9.759-9.76c0 0 2.744-3.023 5.322-0.445 2.578 2.579-0.453 5.329-0.453 5.329l-13.213 13.214c0 0-4.228 4.884-8.143 0.969s1.016-8.095 1.016-8.095l10.034-10.034c0 0 1.125-0.938 0.281-1.782s-1.781 0.281-1.781 0.281l-11.51 11.511c0 0-4.345 4.767 0.508 9.618 4.853 4.853 9.619 0.509 9.619 0.509l15.822-15.823c0 0 3.164-3.493-0.609-7.268s-7.268-0.609-7.268-0.609l-11.61 11.611c0 0-3.49 2.834-0.325 5.998s5.951-0.372 5.951-0.372l7.674-7.673z">
                                    </path>
                                </svg> Cover Letter:</b>
                        </label><br>
                        <div class="input">
                            <div class="file-name" id="file-name"></div>
                            <div>
                                <div class="btn-upload" onclick="uploadletter()">
                                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="white"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M18.22 20.75H5.78C5.43322 20.7359 5.09262 20.6535 4.77771 20.5075C4.4628 20.3616 4.17975 20.155 3.94476 19.8996C3.70977 19.6442 3.52745 19.3449 3.40824 19.019C3.28903 18.693 3.23525 18.3468 3.25 18V15C3.25 14.8011 3.32902 14.6103 3.46967 14.4697C3.61033 14.329 3.80109 14.25 4 14.25C4.19892 14.25 4.38968 14.329 4.53033 14.4697C4.67099 14.6103 4.75 14.8011 4.75 15V18C4.72419 18.2969 4.81365 18.5924 4.99984 18.8251C5.18602 19.0579 5.45465 19.21 5.75 19.25H18.22C18.5154 19.21 18.784 19.0579 18.9702 18.8251C19.1564 18.5924 19.2458 18.2969 19.22 18V15C19.22 14.8011 19.299 14.6103 19.4397 14.4697C19.5803 14.329 19.7711 14.25 19.97 14.25C20.1689 14.25 20.3597 14.329 20.5003 14.4697C20.641 14.6103 20.72 14.8011 20.72 15V18C20.75 18.6954 20.5041 19.3744 20.0359 19.8894C19.5677 20.4045 18.9151 20.7137 18.22 20.75Z" />
                                        <path
                                            d="M16 8.74995C15.9015 8.75042 15.8038 8.7312 15.7128 8.69342C15.6218 8.65564 15.5392 8.60006 15.47 8.52995L12 5.05995L8.53 8.52995C8.38782 8.66243 8.19978 8.73455 8.00548 8.73113C7.81118 8.7277 7.62579 8.64898 7.48838 8.51157C7.35096 8.37416 7.27225 8.18877 7.26882 7.99447C7.2654 7.80017 7.33752 7.61213 7.47 7.46995L11.47 3.46995C11.6106 3.3295 11.8012 3.25061 12 3.25061C12.1987 3.25061 12.3894 3.3295 12.53 3.46995L16.53 7.46995C16.6705 7.61058 16.7493 7.8012 16.7493 7.99995C16.7493 8.1987 16.6705 8.38932 16.53 8.52995C16.4608 8.60006 16.3782 8.65564 16.2872 8.69342C16.1962 8.7312 16.0985 8.75042 16 8.74995Z" />
                                        <path
                                            d="M12 15.75C11.8019 15.7474 11.6126 15.6676 11.4725 15.5275C11.3324 15.3874 11.2526 15.1981 11.25 15V4C11.25 3.80109 11.329 3.61032 11.4697 3.46967C11.6103 3.32902 11.8011 3.25 12 3.25C12.1989 3.25 12.3897 3.32902 12.5303 3.46967C12.671 3.61032 12.75 3.80109 12.75 4V15C12.7474 15.1981 12.6676 15.3874 12.5275 15.5275C12.3874 15.6676 12.1981 15.7474 12 15.75Z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <input class="input-file" type="file" name="letter" id="letter" accept=".pdf"
                            required>
                    </div>

                    <div class="input-box">
                        <label for=""><b>
                                <svg fill="#000000" width="20px" height="20px" viewBox="0 0 32 32"
                                    version="1.1" xmlns="http://www.w3.org/2000/svg">
                                    <title>attachment</title>
                                    <path
                                        d="M23.061 13.441c0 0 1.172-0.891 0.281-1.782-0.893-0.891-1.76 0.259-1.76 0.259l-6.969 6.97c0 0-2.103 2.711-3.696 1.070s1.070-3.696 1.070-3.696l9.759-9.76c0 0 2.744-3.023 5.322-0.445 2.578 2.579-0.453 5.329-0.453 5.329l-13.213 13.214c0 0-4.228 4.884-8.143 0.969s1.016-8.095 1.016-8.095l10.034-10.034c0 0 1.125-0.938 0.281-1.782s-1.781 0.281-1.781 0.281l-11.51 11.511c0 0-4.345 4.767 0.508 9.618 4.853 4.853 9.619 0.509 9.619 0.509l15.822-15.823c0 0 3.164-3.493-0.609-7.268s-7.268-0.609-7.268-0.609l-11.61 11.611c0 0-3.49 2.834-0.325 5.998s5.951-0.372 5.951-0.372l7.674-7.673z">
                                    </path>
                                </svg> Curriculum Vitae:</b>
                        </label><br>
                        <div class="input">
                            <div class="file-name" id="file-name-2"></div>
                            <div>
                                <div class="btn-upload" onclick="uploadcv()">
                                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="white"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M18.22 20.75H5.78C5.43322 20.7359 5.09262 20.6535 4.77771 20.5075C4.4628 20.3616 4.17975 20.155 3.94476 19.8996C3.70977 19.6442 3.52745 19.3449 3.40824 19.019C3.28903 18.693 3.23525 18.3468 3.25 18V15C3.25 14.8011 3.32902 14.6103 3.46967 14.4697C3.61033 14.329 3.80109 14.25 4 14.25C4.19892 14.25 4.38968 14.329 4.53033 14.4697C4.67099 14.6103 4.75 14.8011 4.75 15V18C4.72419 18.2969 4.81365 18.5924 4.99984 18.8251C5.18602 19.0579 5.45465 19.21 5.75 19.25H18.22C18.5154 19.21 18.784 19.0579 18.9702 18.8251C19.1564 18.5924 19.2458 18.2969 19.22 18V15C19.22 14.8011 19.299 14.6103 19.4397 14.4697C19.5803 14.329 19.7711 14.25 19.97 14.25C20.1689 14.25 20.3597 14.329 20.5003 14.4697C20.641 14.6103 20.72 14.8011 20.72 15V18C20.75 18.6954 20.5041 19.3744 20.0359 19.8894C19.5677 20.4045 18.9151 20.7137 18.22 20.75Z" />
                                        <path
                                            d="M16 8.74995C15.9015 8.75042 15.8038 8.7312 15.7128 8.69342C15.6218 8.65564 15.5392 8.60006 15.47 8.52995L12 5.05995L8.53 8.52995C8.38782 8.66243 8.19978 8.73455 8.00548 8.73113C7.81118 8.7277 7.62579 8.64898 7.48838 8.51157C7.35096 8.37416 7.27225 8.18877 7.26882 7.99447C7.2654 7.80017 7.33752 7.61213 7.47 7.46995L11.47 3.46995C11.6106 3.3295 11.8012 3.25061 12 3.25061C12.1987 3.25061 12.3894 3.3295 12.53 3.46995L16.53 7.46995C16.6705 7.61058 16.7493 7.8012 16.7493 7.99995C16.7493 8.1987 16.6705 8.38932 16.53 8.52995C16.4608 8.60006 16.3782 8.65564 16.2872 8.69342C16.1962 8.7312 16.0985 8.75042 16 8.74995Z" />
                                        <path
                                            d="M12 15.75C11.8019 15.7474 11.6126 15.6676 11.4725 15.5275C11.3324 15.3874 11.2526 15.1981 11.25 15V4C11.25 3.80109 11.329 3.61032 11.4697 3.46967C11.6103 3.32902 11.8011 3.25 12 3.25C12.1989 3.25 12.3897 3.32902 12.5303 3.46967C12.671 3.61032 12.75 3.80109 12.75 4V15C12.7474 15.1981 12.6676 15.3874 12.5275 15.5275C12.3874 15.6676 12.1981 15.7474 12 15.75Z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <input class="input-file" type="file" name="cv" accept=".pdf" id="cv"
                            required>
                    </div>

                    <div class="input-box" style="display:inline-flex;gap:10px;">
                        <div>
                            <input type="checkbox" name="checkbox" id="checkbox" onclick="approved()"
                                style="height:16px;width:16px;margin-top:0px" required>
                        </div>
                        <div style="color:darkgray;font-family:georgia;" class="approved-color">
                            <span>I agree with all the terms and conditions</span>
                        </div>
                    </div>
                    <div class="input-box">
                        <button class="btn-12"><b>Click To Apply</b></button>
                    </div>
                </form>
            </div><br><br>

            <div class="NB-bx">
                <b>INSTRUCTIONS ON SUCCESSFUL APPLICATION</b>
            </div>
            <div class="NB-content">
                <ul>
                    <li class="bullets">Applicants should know that only successful applicants would receive an email
                    </li>
                    <li class="bullets">Applicants are requested to submit a resume and cover letter in PDF format via
                        the online application portal</li>
                    <li class="bullets">Please ensure all application materials, including a comprehensive CV and a
                        brief statement of interest, are submitted by the specified deadline</li>
                    <li class="bullets">Kindly note that only complete applications, including a resume, cover letter,
                        and two professional references, will be considered</li>
                    <li class="bullets">Ensure your application package includes a resume, a cover letter outlining
                        your suitability for the role, and any relevant certifications or portfolio links</li>
                    <li class="bullets">All applicants must provide contact information for two professional references
                        along with their resume and cover letter</li>
                    <li class="bullets">Please adhere to the specified word limit when submitting your responses to the
                        supplemental questions in the online application form</li>
                    <li class="bullets">Applicants are encouraged to carefully review the job description and tailor
                        their cover letter to highlight how their skills align with the outlined requirements</li>
                </ul>
            </div>
            <br><br>
        </div>
</x-app-layout>
<script>
    function approved() {
        const approved = document.getElementById('checkbox');
        const app = document.querySelector('.approved-color');
        if (approved.checked) {
            app.style.color = "#0095FF";
        } else {
            app.style.color = "darkgray";
        }
    }

    function uploadletter() {
        const upload = document.getElementById('letter');
        const fileNameDisplay = document.getElementById('file-name');

        // Add an event listener to detect changes in the file input
        upload.addEventListener('change', function() {
            // Display the selected file name in the "file-name" div
            fileNameDisplay.textContent = upload.files.length > 0 ? upload.files[0].name : '';
        });

        // Trigger a click on the file input to open the file dialog
        upload.click();
    }


    function uploadcv() {
        const upload = document.getElementById('cv');
        const fileNameDisplay = document.getElementById('file-name-2');

        // Add an event listener to detect changes in the file input
        upload.addEventListener('change', function() {
            // Display the selected file name in the "file-name" div
            fileNameDisplay.textContent = upload.files.length > 0 ? upload.files[0].name : '';
        });

        // Trigger a click on the file input to open the file dialog
        upload.click();
    }
</script>
<style>
    body {
        background-image: url('assets/img/study-group-learning-library (1).jpg');
        background-position: center;
        background-size: cover;
    }

    .flow-color {
        width: 100%;
        height: auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
    }

    .job-info {
        width: 100%;
        height: auto;
    }

    .input-file {
        display: none;
        visibility: hidden;
    }

    .dsc-details {
        font-family: 'Times New Roman';
        font-size: 18px;
    }

    .NB-bx {
        width: 60%;
        background-color: #0095FF;
        color: white;
        padding: 10px;
        text-align: center;
        font-family: arial;
        font-size: 18px;
    }

    .NB-content {
        width: 60%;
        border: 1px solid #ddd;
        padding-right: 10px;
        padding-left: 10px;
        padding-bottom: 10px;
    }

    .content-bx {
        width: 60%;
        height: auto;
    }

    p {
        width: auto;
        height: auto;
        padding-top: 6px;
        padding-bottom: 6px;
        font-size: 18px;
        font-family: 'Times New Roman';
    }

    .bullets {
        width: auto;
        height: auto;
        padding-top: 6px;
        padding-bottom: 6px;
        list-style: disc;
        margin-left: 20px;
        font-size: 18px;
        font-family: 'Times New Roman';
    }

    .bullets-bx {
        width: auto;
        height: auto;
        padding-top: 6px;
        padding-bottom: 6px;
        list-style: numbers;
        margin-left: 20px;
        font-size: 18px;
        font-family: 'Times New Roman';
    }

    .form-bx {
        width: 60%;
        height: auto;
        padding: 20px;
        font-family: arial;
        border: 1px solid #ddd;
        border-radius: 8px;
    }

    .input-box {
        width: auto;
        height: auto;
        margin-bottom: 20px;
    }

    label {
        width: auto;
        height: auto;
        padding: 10px;
        font-size: 16px;
    }

    .file-name {
        width: 100%;
        max-height: 40px;
        padding: 10px;
        font-family: georgia;
    }

    .btn-upload {
        width: auto;
        height: 40px;
        padding: 6px;
        color: white;
        border-style: none;
        background-color: #0095FF;
        user-select: none;
        cursor: pointer;
    }

    input {
        outline-color: #0095FF;
        user-select: none;
        cursor: pointer;
    }

    .input {
        width: 100%;
        height: auto;
        font-size: 16px;
        border-radius: 6px;
        margin-top: 8px;
        border: 1px solid #ddd;
        display: inline-flex;
        gap: 30px;
    }

    .dv-btn h3 {
        margin-top: -6px;
    }

    .dv-btn {
        width: auto;
        height: 50px;
        background: linear-gradient(to bottom, #0FFF, #0095FF);
        color: white;
        padding: 20px;
        font-size: 16px;
        border-style: none;
        border-top-right-radius: 50px;
        border-bottom-right-radius: 50px;
    }

    .dv-input {
        outline-color: #0FFF;
        width: 70%;
        height: 50px;
        padding: 20px;
        font-size: 16px;
        border-top-left-radius: 50px;
        border-bottom-left-radius: 50px;
        border: 1px solid #ddd;
    }

    .btn-12 {
        width: auto;
        height: auto;
        padding: 10px;
        color: white;
        background: linear-gradient(to bottom, #0FFF, #0095FF);
        border-style: none;
        border-radius: 6px;
        font-size: 16px;
        box-shadow: 1px 2px 2px #0095FF;
    }

    .job-display {
        width: 60%;
        height: auto;
    }

    .display-down {
        width: auto;
        height: auto;
        display: block;
    }

    .display-contact {
        width: auto;
        height: auto;
        display: inline-flex;
        gap: 15px;
        margin-top: 10px;
    }

    .icon-dsc svg {
        fill: #0095FF;
    }

    .icon-dsc {
        width: auto;
        height: auto;
        border-radius: 50%;
        border-style: none;
        color: white;
        margin-left: 10px;
    }

    .job-info b {
        font-size: 20px;
        font-family: georgia;
        color: #0095FF;
    }

    .job-info p {
        font-size: 16px;
    }

    .display-top {
        width: auto;
        height: auto;
        display: inline-flex;
        gap: 15px;
    }

    .icon-shape {
        width: auto;
        height: auto;
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(to bottom, #0FFF, #0095FF);
        font-size: 30px;
        color: white;
        padding: 10px;
        text-align: center;
    }

    .description-content {
        width: 100%;
        height: auto;
        margin-bottom: 20px;
    }
</style>
