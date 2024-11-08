$(document).ready(function () {
    $('#sumb_message').on('click', function (e) {
        e.preventDefault();
        const emailField = document.getElementById('avsrContct_u_email');
        if (!avsr_form_contact.checkValidity()) {
            avsr_form_contact.reportValidity();
            return;
        }
        if (!isValidEmail(emailField.value)) {
            alert('Please provide a valid email address');
            return;
        }
        $('.contactMessage').css('display', 'block');
        $('#avsr_loading').text('Please wait..');
        $('#avsr_loading').css('display', 'inline-block');
        let formData = new FormData(document.getElementById('avsr_form_contact'));
        formData.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: 'POST',
            url: contactUsRoute,
            data: formData,
            contentType: false, // Required for FormData usage in jQuery AJAX
            processData: false, // Required for FormData usage in jQuery AJAX
            success: function (response) {
                if (response.status === 'success') {
                    $('#avsr_loading').text('');
                    $('#avsr_loading').css('display', 'none');
                    $('#contactMessage').text(response.message);
                    $('#contactMessage').css('background', '#cbffc6');
                    $('#contactMessage').css('color', '#1a8c27');
                    $('#contactMessage').css('display', 'inline-block');
                    avsr_form_contact.reset();
                }
            },
            error: async function (xhr) {
                $('#avsr_loading').text('');
                $('#avsr_loading').css('display', 'none');
                $('#contactMessage').text(response.message);
                $('#contactMessage').css('background', '#ffc6c6');
                $('#contactMessage').css('color', '#8c1a1a');
                $('#contactMessage').css('display', 'inline-block');
                await setTimeout(() => {
                    $('.contactMessage').css('display', 'none');
                    $('#contactMessage').css('display', 'none');
                }, 3000);
                console.log("Error submitting contact form:", xhr);
            },
            complete: async function (e) {

                await setTimeout(() => {
                    $('#avsr_loading').text('');
                    $('#avsr_loading').css('display', 'none');
                    $('.contactMessage').css('display', 'none');
                    $('#contactMessage').css('display', 'none');
                }, 3000);

            }
        });
    });
});

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}
