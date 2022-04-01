<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ public_path('assets/css/bootstrap.min.css') }}" rel="stylesheet" >
    <link rel="stylesheet" href="{{public_path('invoice/assets/css/style2.css')}}">
    <title>3D Organs</title>
    <style>@page {
        margin: 0px 0px 0px 0px !important;
        padding: 0px 0px 0px 0px !important;
        width:960px;
        font-size:0.8rem;
    } 
    * { font-family: DejaVu Sans, sans-serif; }
 
    tbody tr:nth-child(odd){
  background-color: #e6e6e6;

  color: rgb(75, 74, 74);
}
    </style>
</head>

<body style="margin: 0px;size:a4; font-size:0.8rem">
    <img src="{{ public_path('invoice/assets/Quotation.png') }}" style="width:18%">
    <section style="margin-top: -100px;margin-left:60px">
        <div >
            <div class="" style="width:80%;display: table;">
                <div class="col-md-6"style=";display:table-cell">
                    <div class="heading" style="  font-size: 18px;">
                        <div style=""><span style="     color: #4d9bd2;
                            font-weight: 600;
                        }">3D+</span> <span style="color: #000">Innovative Solutions</span></div>
                        {{-- <p class="muted">شركة ثلاثة أبعاد والقيمة المضافة</p> --}}

                    </div>
                    <div>
                        <!-- <p>3Dplus.sa | Info@3Dplus.sa</p>
                    <p>Prince Abdulaziz Ibn Musaid </p>
                    <p>Ibn Jalawi St, St ،Riyadh 12231</p>
                    <p>00 (966) 555855519</p>
                    <p>CR 4030606386</p> -->
                        <p class="muted">3Dplus.sa | <u>Info@3Dplus.sa</u> <br> Prince Abdulaziz Ibn Musaid <br>
                            Ibn Jalawi St, St ,Riyadh 12231 <br>
                            00 (966) 555855519 <br>
                            CR 4030606386
                        </p>
                    </div>

                </div>
                <div class="col-md-6" style="display:table-cell">
                    <div class="side-logo">
                        <img src="{{public_path('invoice/assets/logo.png')}}" alt="">
                    </div>

                </div>

            </div>
            <div class=""style="width:100%;display: table;">
                <div class="col-md-4"style="display:table-cell">
                    <div class="heding">
                        <div style="     color: #4d9bd2;" >Bill To</div>
                    </div>
                    <div class="text">
                        <p>Shuttle <br>
                            00 (966) 551553442 <br>
                            3685 Riyadh Front, <br>
                            Airport Road, Building S12
                        </p>

                    </div>
                </div>
                <div class="col-md-4"style="display:table-cell">
                    <div class="heding">
                        <div style="     color: #4d9bd2;">Ship To</div>
                    </div>
                    <div class="text">
                        <p>{{$user->name}} <br>
                            Deliver in Person
                        </p>
                    </div>
                </div>
                <div class="col-md-4"style="display:table-cell">
                    <div class="heding">
                        <div style="     color: #4d9bd2;">Dates</div>
                    </div>
                    <div class="text">
                        <p>Quote: {{$invoice->date}} <br>
                            Valid for: {{$invoice->validtill}} days</p>

                    </div>
                </div>

            </div>

            <table class="table table-bordered table-striped" style="width: 700px;table-layout:fixed;">
                <thead>
                    <tr>
                        <th scope="col" style="width:50%">Description</th>
                        <th scope="col">Deliverable</th>
                        <th scope="col">Quantity</th>
                        <th scope="col" style="20%">Price/unit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="tbox1">
                            <label>Concept Design:</label>
                            <p class="muted"> Ideation: At this stage we will work closely with the
                                client develop the idea of the 3D model. <br>
                                Inspiration: At this stage we forces on the details
                                and the story that the 3D model tells. <br>
                                Sketch: At this stage we draft the first initial drawing
                                of the 3D model</p>
                        </td>
                        <td class=>3D Design</td>
                        <td>{{$invoice->qty_design}}</td>
                        <td>{{$invoice->price_design}} SR</td>
                    </tr>
                    <tr>

                        <td class="tbox1">
                            <label for="">Manufacturing:</label>
                            <p class="muted">3D CAD: At this stage we transform the 2D sketch to
                                3D digital model.
                                Materials: At this stage we choose the best materials
                                that fits the model. <br>
                                Technology: At this stage we choose the best
                                manufacturing method for the model. <br>
                                Dimensions: At this stage we choose the right
                                dimension for the model which is about 20cm X 12m
                                X 4.5cm once adjusted, the client will be advised.
                                Assembly: At this stage we assemble all the
                                manufactured parts to finalized the model.</p>
                        </td>
                        <td>3D Model</td>
                        <td>{{$invoice->qty_model}}</td>
                        <td> <span>{{$invoice->price_model}} SR</span>
                            <div class="">
                                <img src="{{public_path('invoice/assets/logo.png')}}" alt="">

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="4"></td>
                        <td colspan="2">Total</td>
                        @php
                        $total = ($invoice->price_model*$invoice->qty_model)+($invoice->price_design*$invoice->qty_design);
                        $totaltex = $total*($invoice->tax/100);
                        $t = $totaltex + $total;
                        @endphp
                        <td> {{$total}}SR</td>

                    </tr>
                    <tr>
                        <td colspan="2">VAT Rate</td>
                        <td>{{$invoice->tax}}%</td>

                    </tr>
                    <tr>
                        <td colspan="2">VAT Amount</td>
                        @php

                        @endphp
                        <td>{{$totaltex}} SR</td>
                    </tr>
                    <tr>

                        <td colspan="2">Total Quote</td>
                        <td class="total-amount"> {{$t}}SR</td>
                    </tr>
                </tbody>
            </table>

            <div style="display: table">
            <div class="terms" style="width:85%;display:table-cell">
                <div class="col-md-6 tc">
                    <div> Terms & Conditions </div>
                </div>
                <p class="muted">Payment due before delivery, The timeline starts from order confirmation by the customer, and it will
                    be
                    given an estimated day for delivery after design approval.
                    In the concept design phase, the client has the option to add minor modifications to the design
                    twice
                    and once approved no further modification is allowed.
                    These Revisions might impact the delivery date. We quality check every order for errors before it is
                    sent to the customer to assure we haven’t missed anything,
                    If your 3D Model arrives and you notice any quality issues, product errors, or order mistakes, let
                    us
                    know within 5 business days of delivery. Email Info@3dplus.sa to alert us of any issue. If it is our
                    fault, we will take full responsibility and will refund or replace your goods. The information
                    contained
                    or referred to in the
                    Quotation documents is confidential and must not be disclosed or released for any other use or
                    purpose.
                </p>

            </div>
            <div style="width: 10%;display:table-cell;padding-top:15px" >
                <img src="{{public_path('invoice/assets/Quotation2.png')}}" class="img-fluid"  alt="">
            </div>

        </div>
        </div>
    </section>



    {{-- <section class="footer-wrap" style="width: 90%">
        <footer>
            <div class="col-md-12">
                <img src="{{public_path('invoice/assets/Quotation2.png')}}" class="footer-img" alt="">
            </div>
        </footer> --}}

    </section>





    {{-- <script src="{{ public_path('assets/js/bootstrap/bootstrap.min.js') }}" ></script> --}}
    {{-- <script src="{{public_path('invoice/assets/js/jquery.min.js')}}"></script>
    <script>
        

    </script> --}}
</body>

</html>