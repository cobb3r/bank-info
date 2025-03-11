<!DOCTYPE html>
<html>
    <head>
        <title>PHP Test</title>
	    <meta name="description" content="Test Website">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/b15a8855ee.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/project-root/public/assets/css/stylesheet.css">
    </head>
    <body class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
            <a class="navbar-brand ms-2" href="/project-root/public/">
                <img src="../public/assets/img/logo.png" alt="Logo" style="height: 5vh; width: 4vw;">
                <p style="display: inline;">Example Fintech Company</p> 
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/project-root/public/">Home</a>
                    </li>
                </ul>

                <ul class="nav navbar-nav ms-auto me-5">
                    <li class="nav-item">
                        <a class="nav-link" href="signup"><span class="fas fa-sign-in-alt"></span> Sign Up</a>
                     </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="fas fa-user"></span> Account</a>
                        <div class="dropdown-menu" style="background-color: rgb(122, 178, 211);">
                            <a class="dropdown-item" href="login">Sign In</a>
                            <a class="dropdown-item" href="edit">Edit Account</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="delete" style="color: red;">Delete Account</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
