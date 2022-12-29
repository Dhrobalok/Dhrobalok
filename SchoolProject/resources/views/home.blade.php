

@php
    $status=Auth::user()->status;
    $id=Auth::user()->id;

    session()->put('user_id',$id);
@endphp





 @if ( $status==1)


            @php
            $alluser=App\Models\User::select('year')->where('status',1)->distinct()->get();
                        if($alluser!='[]')
                        {
                            foreach($alluser as $key=>$user)
                            {
                                $year[$key]=$user->year;

                                $alluser=App\Models\User::where('year',$user->year)
                                ->where('status',1)
                                ->get();
                                $number[$key]=count($alluser);


                            }

                        }

                        else
                        {

                                $year[]=0;
                                $number[]=0;



                        }



            @endphp


@include('backend.Dashboard.Dashboard',compact('year','number'))


@elseif ($status==2)



            @php
                $alluser=App\Models\User::select('year')->where('status',1)->distinct()->get();
                                if($alluser!='[]')
                                {
                                    foreach($alluser as $key=>$user)
                                    {
                                        $year[$key]=$user->year;

                                        $alluser=App\Models\User::where('year',$user->year)
                                        ->where('status',1)
                                        ->get();
                                        $number[$key]=count($alluser);


                                    }

                                }

                                else
                                {

                                        $year[]=0;
                                        $number[]=0;



                                }

            @endphp


@include('backend.Dashboard.AdminDashboard',compact('year','number'))


 @elseif ($status==4)


        @php
        $alluser=App\Models\User::select('year')->where('status',1)->distinct()->get();
                    if($alluser!='[]')
                    {
                        foreach($alluser as $key=>$user)
                        {
                            $year[$key]=$user->year;

                            $alluser=App\Models\User::where('year',$user->year)
                            ->where('status',1)
                            ->get();
                            $number[$key]=count($alluser);


                        }

                    }

                    else
                    {

                            $year[]=0;
                            $number[]=0;



                    }

        @endphp

     @include('backend.Dashboard.AdminDashboard',compact('year','number'))


     @else

        <h4 class="text-center">You have no permission</h4>


@endif
