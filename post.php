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
            <form action="comments.php" method="POST">
            <div class='form-group'>
                <label for='fname'>Facebook Group ID</label>
                <input type='text' name='group_id' class='form-control' />
           </div>
           <div class='text-left'>
                    <input type='submit' class='btn btn-primary' value='Submit' />
            </div>
            </form>

        </div>

    </div>

</div>

<style>
body{padding-top:40px;}
</style>
</body>
</html>