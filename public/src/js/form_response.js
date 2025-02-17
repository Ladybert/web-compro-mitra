$(document).ready(function() {
    $(document).on('click', '[data-message-box]', function() {
        $('#modalMessage').removeClass('hidden');

        let deleteUrlId = $(this).data('urlmessageid');
        let name = $(this).data('name');
        let email = $(this).data('email');
        let service = $(this).data('service');
        let message = $(this).data('message');
        let time = $(this).data('date');

        $('#deleteMessageFromModal').attr('action', deleteUrlId);
        $('#nameMessage').text(name);
        $('#emailMessage').text(email);
        $('#serviceMessage').text(service);
        $('#dateMessage').text(time);

        let cleanedMessage = message.trim().replace(/\s+/g, ' ');
        $('#fillMessage').html(cleanedMessage.replace(/\n/g, '<br>'));
    });

    $(document).on('click', '[data-close-modal]', function() {
        $('#modalMessage').addClass('hidden');

        $('#nameMessage').text('');
        $('#emailMessage').text('');
        $('#serviceMessage').text('');
        $('#dateMessage').text('');
        $('#fillMessage').html('');
    });
});

$(document).ready(function() {
    $('#resetBtn').on('click', function(){
        $('#emailLogin').val('');
        $('#passwordLogin').val('');
    });
});
