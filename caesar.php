<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kriptografi Caesar CIpher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

    <?php
    function Cipher($ch, $key)
    {
        if (!ctype_alpha($ch))
            return $ch;
    
        $offset = ord(ctype_upper($ch) ? 'A' : 'a');
        return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset);
    }
    
    function Encipher($input, $key)
    {
        $output = "";
    
        $inputArr = str_split($input);
        foreach ($inputArr as $ch)
            $output .= Cipher($ch, $key);
    
        return $output;
    }
    
    function Decipher($input, $key)
    {
        return Encipher($input, 26 - $key);
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
                <h5>Caesar Cipher</h5>
            </div>
            <div class="row mt-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Caesar Cipher</h5>
                        <form method="POST" action="">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="text" class="form-label">Text</label>
                                    <textarea name="text" id="text" rows="2" class="form-control"></textarea>
                                    </div>
                                <div class="mb-3">
                                    <label for="geser" class="form-label">Geser</label>
                                    <input type="number" name="geser" class="form-control"></textarea>
                                </div>
                            </div>
                            <button type="submit" name="encrypt" class="btn btn-primary mb-3">Encrypt</button>
                            <button type="submit" name="decrypt" class="btn btn-danger mb-3">Decrypt</button>
                            <hr>
                            <div class="row">
                                <div class="mb-3">
                                    <?php 
                                        if(isset($_POST['text'], $_POST['geser'], $_POST['encrypt'])){
                                            $text = $_POST['text'];
                                            $s = $_POST['geser']; 
                                            
                                            echo "Text asli : " . $text . '<br>';
                                            echo "Geser     : " . $s . '<br>';
                                            echo "Hasil     : " .Encipher($text, $s);
                                        } elseif(isset($_POST['text'], $_POST['geser'], $_POST['decrypt'])){
                                            $text = $_POST['text'];
                                            $s = $_POST['geser']; 
                                            
                                            echo "Text asli : " . $text . '<br>';
                                            echo "Geser     : " . $s . '<br>';
                                            echo "Hasil     : " .Decipher($text, $s);
                                        }
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
