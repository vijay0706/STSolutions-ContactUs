 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Port Manager</title>
        <meta content="" name="keywords">
        <meta content="" name="description">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="imgs/client_logo.png" sizes="32x32">

        <!-- Icon Font Stylesheet -->
        <!-- Favicon -->
        {{-- <link href="img/favicon.ico" rel="icon"> --}}
         
        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet"> 

            <!-- Icon Font Stylesheet -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
            <script src="https://kit.fontawesome.com/0983007157.js" crossorigin="anonymous"></script>
    

        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> <!-- Dont delete--> 

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        {{-- <script src="//code.jquery.com/jquery-1.12.4.min.js"></script> --}}
        <script src="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.js"></script>
        <link href="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.css" rel="stylesheet"> 
 </head>
 <body>
    <section class="container" style="min-height: 50vh">
    <div class="row d-flex justify-content-center align-items-center m-4">
        <div class="col-md-10">
            @if($message)
                <div class="alert alert-success card p-4 text-center">
                    <h4 class="font-weight-light">Thank you for contacting us!</h4>
                    <hr>
                    <p>We will get back to you shortly.</p>
                    <hr>
                    <a href="{{ route(config('conf_contact.home_route')) }}" class="mt-3">Back to Home</a>
                </div>
            @endif
        </div>
    </div>
</section>
 </body>
 </html>

 
