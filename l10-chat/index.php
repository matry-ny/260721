<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <form class="mt-3" method="post" action="send-message.php">
            <div class="form-block mb-3">
                <label for="chat-username" class="form-label">Your Name</label>
                <input type="text"
                       name="username"
                       id="chat-username"
                       value="Dmytro"
                       class="form-control">
            </div>

            <div class="form-block mb-3">
                <label for="chat-comment" class="form-label">Comment</label>
                <textarea
                    name="comment"
                    id="chat-comment"
                    class="form-control"
                >Test Comment <?= random_int(0, 10000) ?></textarea>
            </div>

            <button type="submit" class="btn btn-success">Send</button>
        </form>
    </div>
</body>
</html>
