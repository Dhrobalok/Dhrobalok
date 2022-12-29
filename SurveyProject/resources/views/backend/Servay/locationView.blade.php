

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>


     <a href="{{url('back')}}">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction()">
            <span aria-hidden="true">&times;</span>
        </button>
    </a>

        </div>
        <div class="modal-body">


            <div class="d-flex gap-5">
                <p><span style="font-weight: bold;">Latitude :</span> {{$map->lat}} <span style="font-weight: bold;">Logitude :</span> {{$map->lng}}</p>

             </div>



                @php
                  Mapper::map($map->lat, $map->lng);
               @endphp

                <div style="width:100%; height:240px;">

                       {!!  Mapper::render() !!}

                </div>
          ...
        </div>

      </div>
    </div>
</div>


