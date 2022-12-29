

<div class="col-md-8 border shadow p-4">




    <table>

        <thead>


            <tr>

                @foreach ($survey as $value)



                @php
                    $questionName=App\Models\question::where('id',$value->q_id)->first();
                @endphp
                <th>{{$questionName->name}}</th>




                @endforeach
            </tr>

        </thead>



        <tbody>




          <tr>



            @foreach ($survey as $allsurve)

                <th>{{$allsurve->value}}</th>



                @endforeach







            </tr>




        </tbody>




    </table>




 </div>

