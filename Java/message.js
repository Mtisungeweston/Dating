// Sample Data: Simulating a list of chat threads (replace with API call to get real threads and messages)
const chatThreads = [
    { id: 1, name: 'Alice', lastMessage: 'Hey, how are you?', lastMessageTime: '10:15 AM' },
    { id: 2, name: 'Bob', lastMessage: 'Let\'s catch up soon!', lastMessageTime: '9:30 AM' },
    { id: 3, name: 'Charlie', lastMessage: 'What\'s the plan for tomorrow?', lastMessageTime: 'Yesterday' }
  ];
  
  const messagesData = {
    1: [
      { sender: 'Alice', text: 'Hey, how are you?', time: '10:15 AM' },
      { sender: 'You', text: 'I\'m good, thanks! How about you?', time: '10:20 AM' }
    ],
    2: [
      { sender: 'Bob', text: 'Let\'s catch up soon!', time: '9:30 AM' },
      { sender: 'You', text: 'Sure, we should plan something!', time: '9:35 AM' }
    ],
    3: [
      { sender: 'Charlie', text: 'What\'s the plan for tomorrow?', time: 'Yesterday' },
      { sender: 'You', text: 'I\'m free in the afternoon.', time: 'Yesterday' }
    ]
  };
  
  // Select DOM elements
  const threadsContainer = document.getElementById('threads');
  const chatMessagesContainer = document.getElementById('chat-messages');
  const chatHeader = document.getElementById('chat-header');
  const sendMessageButton = document.getElementById('send-message');
  const newMessageInput = document.getElementById('new-message');
  
  // Fetch and display threads
  function displayThreads() {
    chatThreads.forEach(thread => {
      const threadElement = document.createElement('div');
      threadElement.classList.add('thread');
      threadElement.innerHTML = `
        <div class="thread-info">
          <h3>${thread.name}</h3>
          <p class="last-message">${thread.lastMessage}</p>
          <span class="last-message-time">${thread.lastMessageTime}</span>
        </div>
      `;
      threadElement.addEventListener('click', () => openChatThread(thread.id));
      threadsContainer.appendChild(threadElement);
    });
  }
  
  // Open a specific chat thread
  function openChatThread(threadId) {
    // Set the chat header to the thread's name
    const thread = chatThreads.find(t => t.id === threadId);
    chatHeader.textContent = `Chat with ${thread.name}`;
  
    // Display the chat messages for the selected thread
    chatMessagesContainer.innerHTML = '';
    const messages = messagesData[threadId];
    messages.forEach(message => {
      const messageElement = document.createElement('div');
      messageElement.classList.add(message.sender === 'You' ? 'message-you' : 'message-other');
      messageElement.innerHTML = `
        <p><strong>${message.sender}:</strong> ${message.text}</p>
        <span class="message-time">${message.time}</span>
      `;
      chatMessagesContainer.appendChild(messageElement);
    });
  }
  
  // Send a new message
  sendMessageButton.addEventListener('click', () => {
    const newMessage = newMessageInput.value.trim();
    if (newMessage) {
      const currentThreadId = getActiveThreadId();
      if (currentThreadId) {
        // Add the new message to the messages data (simulate sending a message)
        const newMessageObject = { sender: 'You', text: newMessage, time: new Date().toLocaleTimeString() };
        messagesData[currentThreadId].push(newMessageObject);
  
        // Display the new message
        openChatThread(currentThreadId);  // Reopen the thread to display the new message
  
        // Clear the input field
        newMessageInput.value = '';
      }
    }
  });
  
  // Get the ID of the currently active chat thread
  function getActiveThreadId() {
    const activeThread = chatHeader.textContent.replace('Chat with ', '');
    const thread = chatThreads.find(t => t.name === activeThread);
    return thread ? thread.id : null;
  }
  
  // Initialize the page by displaying chat threads
  displayThreads();
  