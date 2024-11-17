<div id="commentModal" class="modal" style="z-index: 1000;">
    <div class="modal-content">
        <!-- Close button inside modal -->
        <span class="close-modal" onclick="document.getElementById('commentModal').style.display='none'">&times;</span>

        <h3>Comments</h3>
        <div class="chat-box">
            <!-- Chat messages will go here -->
        </div>

        <!-- Add a new comment area -->
        <form action="./add_chat_messages.php" method="post" id="chatForm">
            <div class="add-comment">
                <textarea rows="3" name="message" id="message" placeholder="Type your message..."></textarea>
                <input type="hidden" name="image_id" id="image_id">
                <input type="hidden" name="image_name" id="image_name">
                <button type="submit">Send</button>
            </div>
        </form>
    </div>
</div>