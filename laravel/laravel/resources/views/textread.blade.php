<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>
  tinymce.init({
selector:'textarea',

branding:false ,
menubar:false,
toolbar:false,
 plugins: "link"

 
});

</script>

   <style type="text/css">

   	body{

      background:black;
   	}

   	textarea{

   		height: 500px;
   		width: 2100px;
   	}
  </style>
</head>
<body >
<a href="{{URL::to('/')}}"><button class="btn btn-">Back Home</button></a>
<br>
<br>
<br>
<br>
<textarea>
	@foreach($r as $d)
     {{$d->text}}
	@endforeach

</textarea>

</body>
</html>



