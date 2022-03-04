<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/style/home.css">
    <script src="https://kit.fontawesome.com/b6a6a301c2.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Trains</title>
    <style>
        .toogle-Aside{
            display: none !important;
        }
        .toogle-Aside-mobile{
            display: block !important;
        }
        #attention-mobile{
            margin-top:100px !important;
            display: none !important;
        }
        @media screen and (max-width:800px) {
            aside{
                display:none !important;
                position:absolute;
                top: 58px !important;
                left:0px;
                width:100vw !important;
            }
            #content-h{
                width:100vw !important;
            }
            #attention-mobile{
                display: block !important;
            }
            #img-dash{
                display: none !important;
            }
            #hide{
                display: none !important;
            }
            #static-reser{
                width:220px !important;
            }
        }

    </style>
</head>
<body>


        <?php  date_default_timezone_set("Africa/Casablanca");  ?>

       <div class="container-fluid bg-light">
           <div class="row">
               <aside class="col-2" id="aside">
                        <?php require ( VIEWS.'dashboard/'.'inc/aside.php' );  ?>
               </aside>
               <div class="col-10" id="content-h">
                    <header class="col-12 bg-success" id="header">
                        <?php  require ( VIEWS.'dashboard/'.'inc/navbar.php');  ?>
                    </header>

                    <main class="col-12 bg-light border" id="main">