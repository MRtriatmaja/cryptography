<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MD5 Hash</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<?php 
    $text = "";
    $valid = true;
    $hash = "";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $text = $_POST['text'];
        if (empty($_POST['text'])) {
        $valid = false;
        }

        if ($valid) {
            if(isset($_POST['text'], $_POST['hash'])){
            $text = $_POST['text'];
                                                        
            $hash = md5($text);
            }
        }
    }
?>

    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html">Implementasi Kriptografi</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="container">
            <div class="row page-titles mt-5">
                <h5>MD5 Hash</h5>
            </div>
            <div class="row mt-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">MD5 Hash</h5>
                        <form method="POST" action="">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="text" class="form-label">Text</label>
                                    <textarea name="text" id="text" rows="2" class="form-control" required><?php echo htmlspecialchars($text)?></textarea>
                                </div>
                            </div>
                            <button type="submit" name="hash" class="btn btn-primary mb-3">Hash</button>
                            <div class="row">
                                <div class="mb-3">
                                    <label for="hash" class="form-label">Hash</label>
                                    <textarea name="hash" id="hash" rows="2" class="form-control"><?php echo htmlspecialchars($hash)?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <?php /*
                                        $text = "";
                                        $valid = true;

                                        if ($_SERVER['REQUEST_METHOD'] == "POST") {
                                            $text = $_POST['text'];

                                            if (empty($_POST['text'])) {
                                                $valid = false;
                                            }

                                            if ($valid) {
                                                if(isset($_POST['text'], $_POST['hash'])){
                                                    $text = $_POST['text'];
                                                    
                                                    $hash = md5($text);
                                                }
                                            }
                                        }*/
                                    ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>
