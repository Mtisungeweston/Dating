<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Messages</title>
  <link rel="stylesheet" href="/css/message.css">
</head>
<body>
  <div class="messages-container">
    <div class="threads-list">
      <h2>Chats</h2>
      <div id="threads">
        <!-- Chat threads will be dynamically inserted here -->
      </div>
    </div>

    <div class="chat-window">
      <h2 id="chat-header">Chat with ...</h2>
      <div id="chat-messages" class="chat-messages">
        <!-- Chat messages will be dynamically inserted here -->
      </div>
      <div class="message-input">
        <input type="text" id="new-message" placeholder="Type your message...">
        <button id="send-message">Send</button>
      </div>
    </div>
  </div>
  <script src="scripts/Messages.js"></script>
</body>
</html>