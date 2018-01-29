const chat = document.getElementById('chat');

function appendMessage() {
	const message = document.getElementsByClassName('message')[0];
  const newMessage = message.cloneNode(true);
  chat.appendChild(newMessage);
}

function getMessages() {
	// Prior to getting your chat.
  shouldScroll = chat.scrollTop + chat.clientHeight === chat.scrollHeight;
  /*
   * Get your chat, we'll just simulate it by appending a new one syncronously.
   */
  appendMessage();
  // After getting your chat.
  if (!shouldScroll) {
    scrollToBottom();
  }
}

function scrollToBottom() {
  chat.scrollTop = chat.scrollHeight;
}

scrollToBottom();

setInterval(getMessages, 100);
