@include('categorymenu');
<center>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
        .columns {
            margin-bottom: 100px;
            float: left;
            width: 33.3%;
            padding: 8px;

        }

        .price {
            width: 80%;
            list-style-type: none;
            border: 1px solid #eee;
            margin: 0;
            padding: 0;
            -webkit-transition: 0.3s;
            transition: 0.3s;
        }

        .price:hover {
            box-shadow: 0 8px 12px 0 rgba(0.9, 0.9, 0.9, 0.9)
        }

        .price .header {
            background-color: #111;
            color: white;
            font-size: 25px;
        }

        .price li {
            border-bottom: 1px solid #eee;
            padding: 20px;
            text-align: center;
        }

        .price .grey {
            background-color: #eee;
            font-size: 20px;
        }

        .button {
            background-color: #04AA6D;
            border: none;
            color: white;
            padding: 10px 25px;
            text-align: center;
            text-decoration: none;
            font-size: 18px;
        }

        @media only screen and (max-width: 600px) {
            .columns {
                width: 80%;
            }
        }
        </style>
    </head>

    <body>

        <h2 style="text-align:center">Subscription Pack</h2>
        <hr style='border-color:red;width:90%'>

        @foreach($plan as $pl)
        <div class="columns">
            <ul class="price">
                @if($pl->plan == 'Pro')
                <li class="header" style='background-color:#04AA6D'>{{$pl->plan}}</li>
                @else
                <li class="header">{{$pl->plan}}</li>
                @endif
                <li class="grey">{{$pl->price}} &#8377; / {{$pl->days}} days</li>
                <li>10GB Storage</li>
                <li>10 Emails</li>
                <li>10 Domains</li>
                <li>1GB Bandwidth</li>
                <li class="grey"><a href="#" class="button">Subscribe</a></li>
            </ul>
        </div>
        @endforeach
    </body>
    @include('footer');