// popup.js

document.addEventListener('DOMContentLoaded', function () {
    var itemAddedMessage = "<?php echo !empty($_SESSION['item_added_message']) ? $_SESSION['item_added_message'] : ''; ?>";

    // Check if the popup message exists in the session
    var itemAddedMessage = "<?php echo isset($_SESSION['item_added_message']) ? $_SESSION['item_added_message'] : ''; ?>";

    if (itemAddedMessage) {
        // Display the popup message
        showPopup(itemAddedMessage);

        // Clear the session variable using AJAX
        clearMessage();
    }
});

function showPopup(message) {
    var popup = document.createElement('div');
    popup.className = 'popup-container';
    popup.textContent = message;
    document.body.appendChild(popup);

    setTimeout(function () {
        // Hide the popup after 3 seconds
        popup.classList.add('show-popup');
        setTimeout(function () {
            popup.classList.remove('show-popup');
            document.body.removeChild(popup);
        }, 3000);
    }, 100);
}

function clearMessage() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'clear_message.php', true);
    xhr.send();
}
