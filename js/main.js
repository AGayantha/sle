document.getElementById("check").addEventListener("change", function () {
    var myDiv = document.getElementById("myDiv");
    myDiv.style.display = this.checked ? "none" : "block";
});

function addComments(id, name) {
    document.getElementById('commentModal').style.display = 'flex';
    document.getElementById('image_id').value = id;
    document.getElementById('image_name').value = name;

    var chatBox = document.querySelector('.chat-box');
    chatBox.innerHTML = '';

    $.ajax({
        url: 'get_chat_message.php', // The PHP file that will process the request
        type: 'GET',
        data: {
            key1: id, // Send the id as 'key1'
            key2: name // Send the name as 'key2'
        },
        dataType: 'json', // Ensure the response is treated as JSON
        success: function(response) {
            console.log('Response:', response); // Check the structure in the console

            if (response.status === 'success' && Array.isArray(response.data)) {

                // Loop through the messages and append them to the chat-box
                response.data.forEach(function(message) {
                    var chatMessage = document.createElement('div');
                    chatMessage.classList.add('chat-message');

                    // Check if the message is from the user (adjust condition as necessary)
                    if (message.username === name) {
                        chatMessage.classList.add('user');
                    }

                    // Create the username span and message content
                    var usernameSpan = document.createElement('span');
                    usernameSpan.classList.add('username');
                    usernameSpan.textContent = message.username;

                    var messageText = document.createElement('span');
                    messageText.textContent = message.message;

                    // Append username and message text to the chat message div
                    chatMessage.appendChild(usernameSpan);
                    chatMessage.appendChild(messageText);

                    // Append the chat message to the chat box
                    chatBox.appendChild(chatMessage);
                });
            } else {
                console.log('Error: response.data is not an array', response);
            }
        },
        error: function(xhr, status, error) {
            console.log('Error:', error); // Handle any errors
        }
    });

}

$(document).ready(function() {
    $('#chatForm').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        // Collect form data
        var message = $('#message').val();
        var image_id = $('#image_id').val();
        var image_name = $('#image_name').val();

        // Check if message is empty before sending
        if (message.trim() === '') {
            alert('Please enter a message!');
            return;
        }

        // Send the data via AJAX
        $.ajax({
            url: './add_chat_messages.php',
            type: 'POST',
            data: {
                message: message,
                image_id: image_id,
                image_name: image_name
            },
            success: function(response) {
                console.log('Message sent successfully:', response);
                $('#message').val(''); 
                addComments(image_id, image_name);

            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
});
