<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kriptografi Vigenere Cipher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

    <?php
    // function to encrypt the text given
    function encrypt($pswd, $text)
    {
        // change key to lowercase for simplicity
        $pswd = strtolower($pswd);
        
        // intialize variables
        $code = "";
        $ki = 0;
        $kl = strlen($pswd);
        $length = strlen($text);
        
        // iterate over each line in text
        for ($i = 0; $i < $length; $i++)
        {
            // if the letter is alpha, encrypt it
            if (ctype_alpha($text[$i]))
            {
                // uppercase
                if (ctype_upper($text[$i]))
                {
                    $text[$i] = chr(((ord($pswd[$ki]) - ord("a") + ord($text[$i]) - ord("A")) % 26) + ord("A"));
                }
                
                // lowercase
                else
                {
                    $text[$i] = chr(((ord($pswd[$ki]) - ord("a") + ord($text[$i]) - ord("a")) % 26) + ord("a"));
                }
                
                // update the index of key
                $ki++;
                if ($ki >= $kl)
                {
                    $ki = 0;
                }
            }
        }
        
        // return the encrypted code
        return $text;
    }
    
    // function to decrypt the text given
    function decrypt($pswd, $text)
    {
        // change key to lowercase for simplicity
        $pswd = strtolower($pswd);
        
        // intialize variables
        $code = "";
        $ki = 0;
        $kl = strlen($pswd);
        $length = strlen($text);
        
        // iterate over each line in text
        for ($i = 0; $i < $length; $i++)
        {
            // if the letter is alpha, decrypt it
            if (ctype_alpha($text[$i]))
            {
                // uppercase
                if (ctype_upper($text[$i]))
                {
                    $x = (ord($text[$i]) - ord("A")) - (ord($pswd[$ki]) - ord("a"));
                    
                    if ($x < 0)
                    {
                        $x += 26;
                    }
                    
                    $x = $x + ord("A");
                    
                    $text[$i] = chr($x);
                }
                
                // lowercase
                else
                {
                    $x = (ord($text[$i]) - ord("a")) - (ord($pswd[$ki]) - ord("a"));
                    
                    if ($x < 0)
                    {
                        $x += 26;
                    }
                    
                    $x = $x + ord("a");
                    
                    $text[$i] = chr($x);
                }
                
                // update the index of key
                $ki++;
                if ($ki >= $kl)
                {
                    $ki = 0;
                }
            }
        }
        
        // return the decrypted text
        return $text;
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
                <h5>Vigenere Cipher</h5>
            </div>
            <div class="row mt-3">
            <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Vigenere Cipher</h5>
                        <form method="POST" action="">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="text" class="form-label">Text</label>
                                    <textarea name="text" id="text" rows="2" class="form-control"></textarea>
                                    </div>
                                <div class="mb-3">
                                    <label for="key" class="form-label">Key</label>
                                    <input type="text" name="key" class="form-control"></textarea>
                                </div>
                            </div>
                            <button type="submit" name="encrypt" class="btn btn-primary mb-3">Encrypt</button>
                            <button type="submit" name="decrypt" class="btn btn-danger mb-3">Decrypt</button>
                            <hr>
                            <div class="row">
                                <div class="mb-3">
                                    <?php 
                                        if(isset($_POST['text'], $_POST['key'], $_POST['encrypt'])){
                                            $text = $_POST['text'];
                                            $key = $_POST['key'];                                            
                                            $cipherText = encrypt($key, $text);
                                            
                                            echo "Text asli : " . $text . '<br>';
                                            echo "key     : " . $key . '<br>';
                                            echo "Hasil     : " . $cipherText . "<br>";
                                        }
                                        if(isset($_POST['text'], $_POST['key'], $_POST['decrypt'])){
                                            $text = $_POST['text'];
                                            $key = $_POST['key'];                                            
                                            $cipherText = decrypt($key, $text);
                                            
                                            echo "Text asli : " . $text . '<br>';
                                            echo "key     : " . $key . '<br>';
                                            echo "Hasil     : " . $cipherText . "<br>";
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