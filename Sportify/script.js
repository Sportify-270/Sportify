const socket = io();

socket.on('initialMessages', (messages) => {
    const chatBox = document.getElementById('chat-box');
    messages.forEach((message) => {
        appendMessage(message);
    });
    chatBox.scrollTop = chatBox.scrollHeight;
});

socket.on('receiveMessage', (message) => {
    appendMessage(message);
    const chatBox = document.getElementById('chat-box');
    chatBox.scrollTop = chatBox.scrollHeight;
});

function sendMessage() {
    const input = document.getElementById('chat-input');
    const messageText = input.value.trim();

    if (messageText === '') return;

    const message = {
        sender: 'Client', // Replace with dynamic user info
        text: messageText,
        timestamp: new Date().toLocaleTimeString()
    };

    socket.emit('sendMessage', message);
    input.value = ''; // Clear the input
}

function appendMessage(message) {
    const chatBox = document.getElementById('chat-box');
    const messageElement = document.createElement('div');
    messageElement.classList.add('chat-message');

    const senderClass = message.sender === 'Coach' ? 'coach' : 'client';

    messageElement.innerHTML = `
        <span class="message-sender ${senderClass}">${message.sender}:</span>
        <span class="message-text">${message.text}</span>
        <span class="message-timestamp">${message.timestamp}</span>
    `;

    chatBox.appendChild(messageElement);
}

document.getElementById('chat-input').addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
        sendMessage();
    }
});
