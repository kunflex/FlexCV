<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Bot | FlexCV website</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .chat-head {
            width: 100%;
            height: 50px;
            padding: 8px;
            background-color: #0095ff;
            display: flex;
            align-items: center;
            padding-left:20px;
            position: relative;
        }

        .chat-head h2 {
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            user-select: none;
        }

        .chat-body {
            width: 100%;
            height: calc(110vh - 150px);
            padding: 8px;
            position: fixed;
            background-color: whitesmoke;
            overflow-y: auto;
            scroll-behavior: auto;
        }

        .agent,
        .customer {
            width: calc(100% - 160px);
            padding: 8px;
            background-color: white;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .agent {
            float: left;
            background-color: lightyellow;
        }

        .customer {
            float: right;
            background-color: #fff;
        }

        .cys-container {
            width: 100%;
            height: 60px;
            background-color: #fff;
            display: flex;
            align-items: center;
            padding: 0 8px;
            position: fixed;
            bottom: 0;
            left: 0;
            border-top: 1px solid #ddd;
        }

        .cys-container div {
            width: 100%;
            display: flex;
            gap: 8px;
        }

        .cys-container div input {
            width: 100%;
            font-size: 16px;
            outline: none;
            height: 50px;
            padding: 10px;
            border: none;
            background-color: whitesmoke;
            border-radius: 6px;
        }

        .cys-container button {
            font-size: 16px;
            font-weight: bold;
            padding: 10px;
            border: none;
            background-color: #0095ff;
            color: white;
            border-radius: 6px;
            cursor: pointer;
        }

        .box {
            word-wrap: break-word;
        }

        .chat-form div span {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="chat-head">
        <h2>FlexChat bot</h2>
    </div>
    <div class="chat-body" id="chat-body">
        <div class="agent">
            <div class="box">
                Hello!
            </div>
        </div>
        {{-- content display for each chat --}}
    </div>
    <div class="cys-container">
        <form id="chat-form">
            @csrf
            <div>
                <input type="file" name="attachment" id="attachment" hidden>
                <span onclick="addfile()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#0095ff" width="30px" height="30px"
                        style="margin-top: 6px;" viewBox="0 0 24 24" id="attachment-2" data-name="Flat Color"
                        class="icon flat-color">
                        <path id="primary"
                            d="M12,22a7,7,0,0,1-7-7V10a1,1,0,0,1,2,0v5a5,5,0,0,0,10,0V7a3,3,0,0,0-6,0v8a1,1,0,0,0,2,0V7a1,1,0,0,1,2,0v8a3,3,0,0,1-6,0V7A5,5,0,0,1,19,7v8A7,7,0,0,1,12,22Z" />
                    </svg>
                </span>
                <input type="text" name="chat-content" id="input" placeholder="Message FlexChat bot">
                <button id="button-submit">OK</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const chatForm = document.getElementById('chat-form');
            chatForm.addEventListener('submit', function(event) {
                event.preventDefault();
                const input = document.getElementById('input');
                const value = input.value.trim();
                if (value !== '') {
                    const contentBox = document.getElementById('chat-body');
                    contentBox.innerHTML += `
                        <div class="customer">
                            <div class="box">
                                ${value}
                            </div>
                        </div>
                    `;

                    fetch('send', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content')
                            },
                            body: JSON.stringify({
                                input: value
                            })
                        })
                        .then(response => response.text())
                        .then(data => {
                            contentBox.innerHTML += `
                                <div class="agent">
                                    <div class="box">
                                        ${data}
                                    </div>
                                </div>
                            `;
                            input.value = '';
                            contentBox.scrollTop = contentBox.scrollHeight;
                        })
                        .catch(error => console.error('Error:', error));
                }
            });
        });

        function addfile(){
            var loadfile= document.getElementById('attachment');
            loadfile.click();
        }
    </script>
</body>

</html>
