@extends('admin-layout')

@section('title', 'Admindashboard | Upload new Testimonials')

@section('styles')
    <style>
        .header {
            user-select: none;
        }

        .header a {
            text-decoration: none;
            color: black;
        }

        h3 {
            text-align: center;
        }

        .ols-blue {
            background-color: darkblue;
            color: white;
            border-style: none;
            padding: 6px;
            border-radius: 6px;
        }

        .ols-red {
            background-color: darkred;
            color: white;
            border-style: none;
            padding: 6px;
            border-radius: 6px;
        }

        .cont {
            width: auto;
            height: auto;
            display: flex;
            gap: 30px;
        }

        .cont1 {
            width: 100%;
            height: auto;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
        }

        .cont2 {
            width: auto;
            height: auto;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 8px;
        }

        .cont2 img {
            width: 400px;
            height: 400px;
            -webkit-user-drag: none;
        }

        .cont1 div {
            margin-bottom: 10px;
        }

        .cont1 div input {
            width: 100%;
            height: 50px;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        textarea {
            width: 100%;
            height: auto;
            min-height: 150px;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline-color: #0095FF;
        }

        button {
            width: 100%;
            height: 50px;
            padding: 10px;
            margin-top: 6px;
            background-color: #0095FF;
            border-radius: 8px;
            border-style: none;
            color: white;
            font-size: 18px;
        }

        button:hover {
            opacity: 0.8;
        }

        .cls {
            width: 100%;
            height: 50px;
            border: 1px solid #ddd;
            border-radius: 8px;
            display: inline-flex;
            gap: 20px;
        }

        .cls .dls {
            width: 50px;
            height: 50px;
            float: inline-end;
            padding: 10px;
            font: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            border-bottom-right-radius: 8px;
            border-top-right-radius: 8px;
            background-color: #0095FF;
            user-select: none;
            cursor: pointer;
        }

        .cls .sp-div {
            width: 100%;
            padding: 10px;
        }
    </style>
@endsection

@section('content')
    <div>
        <div class="header">
            <a href="{{ url('admin') }}">
                {{ __('AdminDashboard') }}
            </a>/
            <a href="{{ url('testimonials') }}">
                {{ __('Testimonials') }}
            </a>/Upload Testimonials
        </div><br>

        <h3>Upload Testimonial</h3><br>
        <div style="background-color: #fff;border-radius:8px;padding:20px;">
            <div class="cont">
                <div class="cont1">
                    <form action="{{url('send/testimonials')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="name">Name</label>
                            <input type="text" name="name">
                        </div>
                        <div>
                            <label for="profile">Profile</label>
                            <div class="cls">
                                <div class="sp-div" id="file-name"></div>
                                <input type="file" id="profile" name="profile" hidden onchange="uploadfile()">
                                <div class="dls" onclick="triggerFileUpload()">
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
                        <div>
                            <label for="description">Description</label>
                            <textarea type="text" name="description"></textarea>
                        </div>
                        <button type="submit">Submit</button>
                    </form>
                </div>

                <div class="cont2">
                    <img id="preview-image" src="{{ asset('assets/img/cv.png') }}" alt="Image Preview" srcset="">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function triggerFileUpload() {
            document.getElementById('profile').click();
        }

        function uploadfile() {
            const upload = document.getElementById('profile');
            const fileNameDisplay = document.getElementById('file-name');
            const previewImage = document.getElementById('preview-image');

            // Display the selected file name in the "file-name" div
            fileNameDisplay.textContent = upload.files.length > 0 ? upload.files[0].name : '';

            // Display the image preview
            const file = upload.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
