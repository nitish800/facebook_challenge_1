<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class='container'>
    <div class='row'>
        <div class='col-sm-10 col-sm-offset-1'>
            <div class='well'>
                <form action="post_to_profile.php" method="POST">
                    <div class='row'>
                        <div class='col-sm-4'>
                            <div class='form-group'>
                                <label for='fname'>Facebook App ID</label>
                                <input type='text' name='app_id' class='form-control' />
                            </div>
                            <div class='form-group'>
                                <label for='lname'>Facebook App Secret</label>
                                <input type='text' name='app_sec' class='form-control' />
                            </div>
                            <div class='form-group'>
                                <label for='email'>Access token</label>
                                <input type='text' name='app_token' class='form-control' />
                            </div>
                             </div>
                        <div class='col-sm-8'>
                            <div class='form-group'>
                                <label for='message'>Message</label>
                                <textarea class='form-control' name='message' rows='10'></textarea>
                            </div>
                            <div class='text-right'>
                                <input type='submit' class='btn btn-primary' value='Submit' />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<style>
body{padding-top:40px;}
</style>
</body>
</html>