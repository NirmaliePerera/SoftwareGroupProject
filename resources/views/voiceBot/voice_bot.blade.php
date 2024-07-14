<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voice Bot</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f3e5f5; /* light purple background */
            color: #ffffff; /* white text */
        }
        #chat {
            border: 1px solid #d1c4e9; /* light purple border */
            padding: 10px;
            width: 50%;
            height: 100px;
            overflow-y: scroll;
            margin-bottom: 20px;
            background-color: #ffffff; /* white background for chat area */
            color: #000000; /* black text */
        }
        .user {
            text-align: right;
            margin: 5px 0;
            background-color: #b39ddb; /* purple background for user messages */
            padding: 5px;
            border-radius: 5px;
            color: #ffffff; /* white text for user messages */
        }
        .bot {
            text-align: left;
            margin: 5px 0;
            background-color: #9575cd; /* darker purple background for bot messages */
            padding: 5px;
            border-radius: 5px;
            color: #ffffff; /* white text for bot messages */
        }
        #inputBox {
            width: calc(50% - 40px);
            margin-right: 10px;
            padding: 5px;
            border: 1px solid #d1c4e9; /* light purple border */
            background-color: #ffffff; /* white background */
            color: #000000; /* black text */
        }
        #microphone {
            cursor: pointer;
            font-size: 20px;
            padding: 5px;
            color: #9575cd; /* purple color */
        }
        #sendButton {
            background-color: #9575cd; /* purple background */
            color: #ffffff; /* white text */
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        #sendButton:disabled {
            background-color: #d1c4e9; /* light purple background when disabled */
        }
    </style>
    <script src="https://code.responsivevoice.org/responsivevoice.js?key=YOUR_KEY"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h1 style="color: #9575cd;">Ask Your Question</h1> <!-- Purple color for heading -->
    <div id="chat"></div>
    <div>
        <input type="text" id="inputBox" readonly placeholder="Your voice input will appear here...">
        <span id="microphone">&#127908;</span>
        <button id="sendButton" disabled>Send</button>
    </div>
    <p id="response"></p>

    <script>
        function startRecognition() {
            var recognition = new webkitSpeechRecognition();
            recognition.lang = 'en-US';
            recognition.onresult = function(event) {
                var transcript = event.results[0][0].transcript;
                document.getElementById('inputBox').value = transcript;
                addMessage('You: ' + transcript, 'user');
                document.getElementById('sendButton').disabled = false;
                getBotResponse(transcript);
            };
            recognition.start();
        }

        document.getElementById('microphone').addEventListener('click', startRecognition);

        function getBotResponse(userInput) {
            fetch('/voice-bot-response', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ text: userInput })
            }).then(response => response.json())
              .then(data => {
                  addMessage('Bot: ' + data.response, 'bot');
                  responsiveVoice.speak(data.response);
              });
        }

        function addMessage(message, sender) {
            let chat = document.getElementById('chat');
            let messageElement = document.createElement('div');
            messageElement.className = sender;
            messageElement.innerText = message;
            chat.appendChild(messageElement);
            chat.scrollTop = chat.scrollHeight;
        }
    </script>
</body>
</html>
