

<div class="col-md-8 border shadow p-4">




    <table>

        <thead>


            <tr>

                @foreach ($employees as $value)




                <th>{{$value->name}}</th>




                @endforeach
            </tr>

        </thead>



        <tbody>

            @php
                $totalItemId=count($surveid);
                $i=1;
            @endphp

            @foreach ($surveid as $allsurve)
          <tr>





                @php
                   $surveInform=App\Models\Surve::where('surve_id',$allsurve->surve_id)->get();

                @endphp

                @foreach ($surveInform as $inform)

                <th>{{$inform->value}}</th>

    

                @endforeach







            </tr>

            @endforeach


        </tbody>




    </table>




 </div>

