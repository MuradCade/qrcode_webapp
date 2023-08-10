<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Home</title>
</head>
<body style="overflow-x:hidden;">
<nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <a class="navbar-brand text-white ft-bold" href="view/menu.php"><img src="img/logo.png" alt="website logo" class="img"></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item ml-2">
              <a class="nav-link" href='view/menu.php' id="order"><img src="img/cart-shopping-solid.svg" alt="orders" width="22" style="color:#0b5ed7 !important"></a>
            </li>
            <li class="nav-item ml-2">
              <a class="nav-link  text-primarys" aria-current="page" href="view/login.php" style="font-weight:600;">Login</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>

    <script src="../js/qrcode.js"></script>
    <div style="text-align: center;  
          display:flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
        ">

        <div id="reader" style="width: 500px;"></div>
        <div id="show" style="display: none;">
            <h4>Scanned Result</h4>
            <p style="color: blue;" id="result"></p>
        </div>
    </div>
    <script>
        const html5Qrcode = new Html5Qrcode('reader');
        const qrCodeSuccessCallback = (decodedText, decodedResult)=>{
            if(decodedText){
                document.getElementById('show').style.display = 'none';
                document.getElementById('result').textContent = decodedText;
                html5Qrcode.stop();
                // get the current url 
                let url =  new URL(decodedText);
                
                // clean url and stich the wanted url
                let cleanedurl = url.host+url.pathname+url.search;
                <?php
                session_start();
                $_SESSION["scanned"] = true;
                ?>
                // after the qrcode scanner approved redirect user to menu
                window.location.href = 'http://'+cleanedurl;
            }
        }
        const config = {fps:10, qrbox:{width:250, height:250}}
        html5Qrcode.start({facingMode:"environment"}, config,qrCodeSuccessCallback );
    </script>
        <script src="js/bootstrap.bundle.js"></script>

    <!-- <script src=""></script> -->
</body>
</html>