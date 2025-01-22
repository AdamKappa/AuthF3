<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{@BASE}}/src/pages/welcome/welcome.css">
</head>
<body>
    <div class="exit-container">
        <form method="post" action="{{@BASE}}/logout">
            <button type="submit" class="btn btn-secondary">Logout</button>
        </form>
    </div>
    <check if="{{ @message }}">
        <div class="alert alert-success">{{ @message }}</div>
    </check>
    <div class="welcome-container">
        <p>Welcome {{ @username }}. You are an {{ @accessLevel }}.</p>
        <p><a href="{{@BASE}}/editpage">Go to edit page</a></p>
    </div>
</body>
</html>