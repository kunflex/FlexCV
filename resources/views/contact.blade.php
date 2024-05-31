<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Contact Us') }}
        </h2>
    </x-slot>

    <style>
        .bg-cvs {
            width: auto;
            height: auto;
            display: flex;
            gap: 30px;
        }

        .cvs-1 {
            width: 50%;
            height: 300px;
            border-radius: 20px;
            background-color: #fff;
            padding: 30px;
        }

        .cvs-1 div {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .cvs-1 button {
            width: 150px;
            height: auto;
            padding: 20px;
            background-color: #0095ff;
            color: #fff;
            font-size: 16px;
            border-radius: 30px;
            border-style: none;
            font-weight: bold;
        }

        .cvs-1 h1 {
            text-align: center;
        }

        .cvs-2 {
            width: 100%;
            height: auto;
            border-radius: 20px;
            background-color: #fff;
            padding: 30px;
            display: block;
            justify-content: center;
            align-items: center;
            font-size: 18px;
        }

        .cvs-2 button {
            width: 150px;
            height: auto;
            padding: 20px;
            background-color: #0095ff;
            color: #fff;
            font-size: 16px;
            border-radius: 30px;
            border-style: none;
            font-weight: bold;
        }

        .cvs-2 h1 {
            text-align: center;
        }

        .cvs-2 a {
            user-select: none;
            cursor: pointer;
        }

        .cvs-2 input {
            width: 100%;
            height: 50px;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ddd;
            outline-color: #0095ff;
            margin-top: 10px;
            font-size: 16px;
        }

        .cvs-2 div {
            margin-bottom: 10px;
        }

        .cvs-2 select {
            width: 100%;
            height: 50px;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ddd;
            outline-color: #0095ff;
            font-size: 16px;
            margin-top: 10px;
        }

        .cvs-2 option {
            padding: 10px;
            font-size: 16px;
        }

        .cvs-2 textarea {
            width: 100%;
            height: auto;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ddd;
            outline-color: #0095ff;
            margin-top: 10px;
        }

        .cvs-2 h2 {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }

        .cvs-1 img {
            width: 110px;
            height: 110px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto;
            -webkit-user-drag: none;
        }
    </style>

    <div>
        <div class="bg-cvs">
            <div class="cvs-1">
                <h1>Connect with Us</h1><br>

                <img src="{{ asset('assets/img/chat_icon_Light.png') }}" alt=""><br>
                <div>
                    <a href="{{url('chat-us')}}"><button type="submit">Live Chat</button></a>
                </div>
            </div>
            <div class="cvs-2">
                <h2>Contact us through email</h2>
                <br>
                <form action="" method="post">
                    <div>
                        <label for="">Fullname</label>
                        <input type="text" name="fullname" placeholder="Vincent Tetteh">
                    </div>

                    <div>
                        <label for="">Email</label>
                        <input type="email" name="email" placeholder="example@gmail.com">
                    </div>

                    <div>
                        <label for="">How did you hear about us</label>
                        <select name="advertisement" id="">
                            <option value="">Choose from the options</option>
                            <option value="Through recommendation">Through recommendation</option>
                            <option value="Through online adds display">Through online adds display</option>
                            <option value="Friends and family">Friends and family</option>
                            <option value="Through social media">Through social media</option>
                        </select>
                    </div>

                    <div>
                        <label for="">Description</label>
                        <textarea name="description" id="" cols="30" rows="10"></textarea>
                    </div>

                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

    
</x-app-layout>

