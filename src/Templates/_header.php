<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>05 - Dynamic Blog</title>
    <link rel="stylesheet" href="./dist/css/kube.css">
    <link rel="stylesheet" href="./css/main.css">
    
</head>
<body>

<header id="top" data-component="sticky">
    <div id="top-logo">
        <a href="/">Blog</a>
    </div>
        <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
        
        <nav id="top-login">
            <h4>Welcome back, <?php echo $_SESSION['first_name'] ?></h4>
            <a href="/add" class="button primary">Submit new post!</a>
            <a href="/logout" class="button">Log out</a>
        </nav>
        <?php else: ?>
        <nav id="top-login">
                <a href="/login" class="button outline">Login</a>
                <a href="/signup" class="button">Sign up!</a>
        </nav>
        <?php endif; ?>
    </nav>
</header>