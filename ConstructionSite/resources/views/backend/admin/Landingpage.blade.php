
<!DOCTYPE html>
<html lang="en">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css"> <!-- thats important for animation effects -->
    <link href="https://fonts.googleapis.com/css?family=Arbutus" rel="stylesheet"> <!-- Demo -->
    <title>Document</title>


    <style>
        /* Demo */
body
{
    font-family: 'sans-serif';
    background-image:url('images/background.jpg');
    height: 20px;
}

/* Header settings */
header {
  height:50%; /* you can change that height to 100%, please get sure youre Header is ready */
  background-attachment:fixed;
  background-size:cover;
  background-position:left;
  background-repeat:no-repeat;

  background-blend-mode:screen; /* you can remove that, if you do that delet the "linear-gradient(to right, black 0%, white 100%)," */
}

@media (max-width:767px){
  header {
  background-attachment:inherit;
}
}

 .row
{
    margin-top:40vh; /* Handle the row */
}

@media (max-width:767px){
    header .row
{
    margin-top:30vh; /* Handle the row on mobile */
}
}

header h1
{
    font-family: 'Arbutus', cursive;
    text-align:center;
    font-size:61px;
    color:#F8CA4D;
    text-shadow:0px 0px 4px #222;
}

@media (max-width:767px){
    header h1
{
    font-size:41px;
}
}

header p
{
    text-align:center;
    font-size:21px;
}

header .btn-link
{
    border:1px solid #2F3440;
    margin-top:20px;
    font-size:21px;
    letter-spacing:1px;
    color:#2F3440;
    text-shadow:0px 0px 1px #222;
    box-shadow:0px 0px 1px #000;
}

header .btn-link:hover
{
    text-decoration:none;
    color:#eee;
    border:1px solid #eee;
    transition:all 0.7s;
    text-shadow:0px 0px 3px #000;
}


/* Custom navbar settings */
.navbar-default {
  background-color:#3F5666;
  border-color:#2F3440;
  border-bottom:1px solidÂ #00c9c0;
  border-radius:0px;
}

.navbar-default .navbar-nav > li > a {
  color:#fff;
  letter-spacing:1px;
  font-weight:500;
}

.navbar-default .navbar-brand {
  color:#ffffff;
  letter-spacing:1px;
}

.navbar-default .navbar-brand:hover {
  color:#eee;
  transition:all 0.7s;
}

.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus {
  color:#eee;
  background-color:#2F3440;
  transition:all 0.7s;
  font-size:21px;
}

.navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
  color:#eee;
  background-color:#2F3440;
  transition:all 0.7s;
  font-size:15px;
}

    </style>
</head>
<body>



    <header>
        <nav class="navbar navbar-default navbar-fixed-top" data-aos="fade-down" data-aos-duration="2600" data-aos-once="true" >
             <div class="container-fluid">
                 <div class="navbar-header"><a class="navbar-brand navbar-link" href="#">Dize Design AOS-Header v.2</a>
                     <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                 </div>
                 <div class="collapse navbar-collapse" id="navcol-1">
                     <ul class="nav navbar-nav navbar-right">
                         <li role="presentation"><a href="#">Home </a></li>
                         <li role="presentation"><a href="#">Project </a></li>
                         <li role="presentation"><a href="#">About Us</a></li>
                         <li role="presentation"><a href="#">Contact </a></li>
                     </ul>
                 </div>
             </div>
         </nav>
        </header>


         <div class="container">
             <div class="row">

                 <div class="col-md-12" data-aos="fade-right" data-aos-duration="2600" data-aos-once="true" >
                    <center>
                        <a class="btn btn-link" target="blank" href="" style="background-color: #F8CA4D;">
                            <span style="color:rgb(225, 223, 223); font-size:17px; font-family:initial;">VIEW PROJECT</span>
                        </a>

                    </center>


                 </div>

                 <div class="card" style="color: #eee;">

                       <div class="card-header">fjhgfssf</div>

                      <div class="card-body">


                      </div>

                 </div>


             </div>
         </div>




 <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script> <!-- Important for animation -->

 <script>

$(document).ready(function(){
	AOS.init({ disable: 'mobile' });
});

 </script>

</body>
</html>


