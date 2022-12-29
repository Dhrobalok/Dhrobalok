@foreach($r as $d)
 
      <embed src="{{ asset('uploads/file/' . $d->file) }}" style="height: 60px;width: 60px;">download</embed>



      @endforeach


      <body style="background: black;">
      	
     <a href="{{URL::to('/')}}"><button>gggrrgr</button></a>

      </body>

