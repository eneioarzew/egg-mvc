<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once 'views/assets/shared/headers.php'; ?>
    <title>Egg MVC</title>
</head>
<body marginhorizontal>
    <h1>This is Egg MVC.</h1>
    <script>
        getResponse = function(url, callback) {
            request = new XMLHttpRequest()
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    callback(request.responseText);
                }
            }
            request.open('POST', url, true)
            request.send()
        }

        function displayFromAPI(response) {
            document.body.innerHTML = response
        }

        getResponse('http://localhost/egg-mvc/home/returninput/banana', displayFromAPI)
    </script>
</body>
</html>