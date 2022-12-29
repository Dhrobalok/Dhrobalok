<!DOCTYPE html>

<html>



<head>

   



    <style type="text/css">

    @page {

        size: 8.5in 11in;

    }



   

    body {

			font-family: 'FreeSerif', sans-serif;

		}



      





    .container {

        width: 100%;

        padding-top: 35px;

    }



    .table {

        width: 100%;

        border-collapse: collapse;

    }



    .table thead tr th,

    .table tbody tr td {

        border: 1px solid #000;

        padding: 2px;

        text-align: center;

        font-size: 10.5pt;

    }



    .footer {

        padding-top: 40px;

        width: 100%;

    }



    .footer tr {

        text-align:left;

        width: 25%;

        font-size: 10.5pt;

        font-weight: bold;

    }



    .heading p {

        text-align: center;

        margin-bottom: 0;

    }



    .heading h5 {

        text-align: center;

        margin-top: 0;

        padding-top: 0;

    }



    p {

        font-size: 10pt;

    }



    .left {

        text-align: left;

        float: left;

        clear: none;

        width: 50%;

    }



    .right {

        text-align: right;

        float: right;

        clear: none;

        width: 50%;

    }



    .inline {

        clear: both;

        display: inline-block;

        overflow: hidden;

        white-space: nowrap;

    }

    .text-normal

    {

        font-weight:normal;

    }



      

    ul li

    {

        background: transparent;

        list-style: none;

        display: inline-block;

        border: 1px solid black;

       

       float: left;

        text-align: center;

        width: 20%;

        box-sizing: border-box

    }



    .custom-table td{

        border: 1px solid;

        text-align: center

    }



    .gtc-table td{

        border: 1px solid;

        text-align: center

    }

 



   



   

    </style>

</head>



<body>

    <div class="container">

       





             <P style="text-align:center;line-height:15px;font-size:20px;">চালান ফরম </P>



           

            <P style="margin-left:85%;line-height:15px;font-size:20px;">ধারা-৫৩-E</P>

            

            



                





           <table class="custom-table" style="width: 100%;border-collapse:collapse">

               <tr>

                 <td style="width: 50%;border:0px !important"></td>

                   <td>১ম(মুল)কপি</td>

                   <td>২য় কপি</td>

                   <td>৩য় কপি</td>

                   <td>৪র্থ কপি</td>

                   

                   

               </tr>

           </table>



           <P style="margin-left:20%;line-height:15px;font-size:15px;">চালান নং----------------------------------------- তারিখ ঃ</P>

           <br>

           <p style="margin-left:20%;line-height:25px;font-size:18px;">বাংলাদেশ ব্যাংক /সোনালী ব্যাংকের দিনাজপুর জেলার  ফুলবাড়ী 

            শাখায় টাকা জমা দেয়ার চালান

            </p>



            

            <table class="custom-table" style="width: 100%;border-collapse:collapse">

                

                <tr>

                  <td style="border:0px;">কোড নং</td> 

                  <td style="width:2%;border:0px !important"></td>



                

                   <td>১</td>

                  

                  <td style="width: 8%;border:0px !important"></td>

                    <td>১</td>

                    <td>১</td>

                    <td>৪</td>

                    <td>১</td>

                    <td style="width:5%;border:0px !important"></td>

                    <td>০</td>

                    <td>০</td>

                    <td>৬</td>

                    <td>৫</td>

                    <td style="width:5%;border:0px !important"></td>

                    <td>০</td>

                    <td>১</td>

                    <td>০</td>

                    <td>১</td>

                    

                    

                </tr>

            </table>



                 

           <br>

           <br>



           <p style="text-align:center;line-height:25px;font-size:18px;">জমা প্রদানকারী কর্তৃক পূরণ করিতে হইবে  

            </p>







        <table class="gtc-table" style="width: 100%;border-collapse:collapse">





            <thead>



            

            

                

              <tr>

                



                <td scope="col">যে ব্যাক্তি/প্রতিষ্টানের পক্ষ হইতে টাকা প্রদত্ত হইল তাহার নাম

                </td>



                <td>ভ্যাট</td>

                <td>আয় কর</td>





                







              </tr>





            </thead>



            <tbody>

                @php

                    $incometax=0;

                    $vat=0;

                @endphp



              

                @foreach ($company as $value )

                    

                

                <tr>

                    @php

                        $comission=App\Models\BulkOrder::where('id',$value->agreement_id)->first();

                    @endphp



                    @php

                      $vender=App\Models\Vendor::where('id',$comission->vender_id)->first();

                    @endphp

                   

                    

                    <td>

                        {{$vender->name}}



                    </td>



                    <td>

                        {{ $value->vat }}



                        @php

                            $vat=$value->vat+$vat;

                        @endphp



                    </td>



                    <td>

                        {{ $value->incometax }}



                        @php

                        $incometax=$value->incometax+$incometax;

                    @endphp

                    </td>

                    





                </tr>



           

            

            <br>



            @endforeach

           




                                   <tr class = "text-center">
                                        <td></td>
                                        <br>
                                        <td>
                                        <p>মোট ভ্যাট =<strong>{{ $vat }}</strong> </p>
                                        </td>
                                        <td>
                                        <p style="font-size:15px;">মোট আয়কর =</p>
                                        <strong>{{ $incometax }}</strong>
                                        </td>
                                    </tr>
            </tbody>


        
        </table>
        

         






        





    </div>

</body>



</html>

