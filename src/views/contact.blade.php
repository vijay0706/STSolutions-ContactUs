<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Form</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
 
        
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px; /* Adjust as needed */
        }
        .form-container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            color: darkslategray;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            position: relative;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .btn-holder {
            text-align: center;
        }
        /* Optional: Additional custom styling */
        .form-control {
            border-radius: 4px;
        }
        .btn {
            border-radius: 4px;
        }
        .contactMessage{
            color: green;
            position: absolute;
            width: 95%;
            height: 95%;
            padding: 1.5em 1em;
            padding-top: 1.5em;
            background: #ffffffa8;
            text-align: center;
            padding-top: 20%;
            margin: 0 auto;
        }
        .contactMessage span{
            text-align: center;
            padding: 1.5em 1em;
            background: #ceffc4;
            animation: wiggle 0.5s ease-in-out infinite;
            box-shadow: 0 0px 12px 0 #a6aca5;
        }
        @keyframes wiggle {
            0%, 100% {
                transform: rotate(-1deg);
            }
            50% {
                transform: rotate(1deg);
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="contactMessage" style="display:none;">
            <span id="contactMessage" style="display: none" ></span>
        </div> 
        <h1 class="text-center mb-4">Contact Us</h1>
        <form  method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            </div>
            <div class="btn-holder">
                <button type="button" id="sumb_message" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary ml-2">Reset</button>
            </div>
        </form>
    </div>

</body>
    <!-- Bootstrap JS (Optional, for Bootstrap features like dropdowns, modals, etc.) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script> 
        $(document).ready(function () {
            $('#sumb_message').on('click', function (e) {
                e.preventDefault(); // Prevent form from submitting the default way
                $('.contactMessage').css('display', 'block');
                $.ajax({
                    type: 'POST',
                    url: '{{ route("contactus") }}', // Make sure this matches your route
                    data: {
                        name: $('#name').val(),
                        email: $('#email').val(),
                        message: $('#message').val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        if (response.status === 'success') {
                            
                            
                            $('#contactMessage').text(response.message);
                            
                            $('form')[0].reset(); // Reset form after successful submission
                        }
                    },
                    error: function (xhr) {
                        console.log("Error submitting contact form:", xhr);
                    },
                    complete: async function(e){
                        // Set a timeout to hide the message after 3 seconds
                        $('#contactMessage').css('display', 'inline-block');
                        await setTimeout(() => {  
                            $('.contactMessage').css('display', 'none');
                            $('#contactMessage').css('display', 'none');
                        }, 3000);
                        
                    }
                });
            });
        });  
    </script>
</html>
