<!DOCTYPE html>
<html>

<head>

</head>

<body>

    <script>
        var isLoggedIn = false;
        if (!isLoggedIn) {
            window.location.href = "/login";
        } else {
            window.location.href = "/home";
        }
    </script>
</body>

</html>
