@extends('layouts.app')

@php

    // SDK de Mercado Pago
    //require __DIR__ .  '/vendor/autoload.php';
    require base_path('/vendor/autoload.php');
    // Agrega credenciales
    MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));
    //$payment_methods = MercadoPago::get("/v1/payment_methods");

    // Crea un objeto de preferencia
    $preference = new MercadoPago\Preference();
    $shipments = new MercadoPago\Shipments();


    $envio = floatval($order->shipping_cost);
    //dd($envio);
    $shipments->cost = $envio;
    $shipments->mode = "not_specified";

    $preference->shipments = $shipments;

    // Crea un ítem en la preferencia
    /*$item = new MercadoPago\Item();
    $item->title = 'Mi producto';
    $item->quantity = 1;
    $item->unit_price = 75;*/

    foreach($items as $articulo){

        $item = new MercadoPago\Item();
        $item->title = $articulo->name;
        $item->quantity = $articulo->qty;
        $item->unit_price = $articulo->price;
        $articulos[] =$item;
    }
    $preference->back_urls = array(
        //"success"=>"https://www.tu-sitio/success",
        "success"=> route('orders.pay', $order),
        "failure"=>"https://www.tu-sitio/success",
        "pending"=>"https://www.tu-sitio/success"
    );
    $preference->auto_return = "approved";


    $preference->items = $articulos;
    $preference->save();


@endphp
@section('content')

    <div class="container ">

        <div id="smart-button-container">
            <div style="text-align: center;">
                <div id="paypal-button-container"></div>
            </div>
        </div>
        <div class="row">

            <div class="col-7">
                <div class="card card-body rounded-lg shadow-lg mb-3">
                    <p class="text-uppercase">
                        Número de orden {{$order->id}}
                    </p>
                </div>
                <div class="card card-body rounded-lg shadow-lg mb-6 ml-3 mb-3">

                    <div class="row ml-3">
                        <div class="col-5 mx-2 px-2">
                            <h5 class="font-weight-bold text-uppercase">Envío</h5>
                            <p class="mx-lg-auto gap-3">Los productos seran enviados a :</p>
                            <p class="mx-lg-auto gap-3">{{$order->direccion}}</p>
                            <p>{{$order->departamento->nombre}} - {{$order->ciudad->nombre}} - {{$order->barrio->nombre}}</p>

                        </div>
                        <div class="col-5">
                            <h5 class="font-weight-bold text-uppercase">Contacto</h5>
                            <p class="mx-lg-auto gap-3">La persona que recibe : {{$order->contacto}}</p>
                            <p class="mx-lg-auto gap-3">Telefono: {{$order->telefono}}</p>
                        </div>

                    </div>
                </div>

                <div class="card card-body rounded-lg shadow-lg mb-6">
                    <div class="row ml-3" style="margin-left: 2%; margin-right: 2%">
                        <h5 class="font-weight-bold text-uppercase">Resumen</h5>
                        <table class="table ml-3">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>

                                </tr>

                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td><div class="flex-column">
                                                <img  style="width: 50px; height: 50px;" src="{{$item->options->imagen_url}}" alt="">
                                                <article><h5>{{$item->name}}</h5></article>
                                            </div>
                                        </td>
                                        <td class="align-items-center">{{$item->price}}</td>
                                        <td class="align-items-center">{{$item->qty}}</td>
                                        <td class="align-items-center">{{$item->price * $item->qty}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>





            <div class=" col-5">
                <div class="card card-body rounded-lg shadow-lg mb-3 flex-fill">
                    <div >
                        <div class="row mb-3">
                            <div class="col-9">
                                <img style="width: 500px" src="{{secure_asset('img/pagoCredito.png')}}" class="d-inline-flex"/>
                            </div>
                            <div class="col-3 align-items-right">
                                <h5>Subtotal: {{$order->total -$order->shipping_cost}}</h5>
                                <h5>Envio: {{$order->shipping_cost}}</h5>
                                <h5>Pago: {{$order->total}}</h5>
{{--                                <div class="cho-container">--}}
{{--                                                            <button class="btn btn-success">Pagar</button>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>




                </div>


            </div>

        </div>
    </div>



@endsection

{{--<script src="https://www.paypal.com/sdk/js?client-id={{config('services.paypal.client_id')}}"></script>--}}
<script src="https://www.paypal.com/sdk/js?client-id={{config('services.paypal.client_id')}}components=buttons,marks,messages="></script>
<script src="https://sdk.mercadopago.com/js/v2"></script>


{{--     SDK MercadoPago.js V2--}}

{{--<script>--}}
{{--    paypal.Buttons({--}}
{{--        // Sets up the transaction when a payment button is clicked--}}
{{--        createOrder: (data, actions) => {--}}
{{--            return actions.order.create({--}}
{{--                purchase_units: [{--}}
{{--                    amount: {--}}
{{--                        value: '0.01' // Can also reference a variable or function--}}
{{--                    }--}}
{{--                }]--}}
{{--            });--}}
{{--        },--}}
{{--        // Finalize the transaction after payer approval--}}
{{--        onApprove: (data, actions) => {--}}
{{--            return actions.order.capture().then(function(orderData) {--}}
{{--                // Successful capture! For dev/demo purposes:--}}
{{--                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));--}}
{{--                const transaction = orderData.purchase_units[0].payments.captures[0];--}}
{{--                alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);--}}
{{--                // When ready to go live, remove the alert and show a success message within this page. For example:--}}
{{--                // const element = document.getElementById('paypal-button-container');--}}
{{--                // element.innerHTML = '<h3>Thank you for your payment!</h3>';--}}
{{--                // Or go to another URL:  actions.redirect('thank_you.html');--}}
{{--            });--}}
{{--        }--}}
{{--    }).render('#paypal-button-container');--}}
{{--</script>--}}
<script>
    function init() {

        // Agrega credenciales de SDK
        const mp = new MercadoPago("{{config('services.mercadopago.key')}}", {
            locale: "es-CO",
        });

        // Inicializa el checkout
        mp.checkout({
            preference: {
                id: '{{$preference->id}}',
            },
            render: {
                container: ".cho-container", // Indica el nombre de la clase donde se mostrará el botón de pago
                label: "Pagar2", // Cambia el texto del botón de pago (opcional)
            },
        });
    }
</script>



<script type="application/javascript" src="https://www.paypal.com/sdk/js?client-id={{config('services.paypal.client_id')}}&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
<script type="application/javascript">
    let buttons;
    let hasRendered = false;

    function renderButtons() {
        if (buttons && buttons.close && hasRendered) {
            buttons.close();
            hasRendered = false;
        }
        alert("hola");
        buttons = window.paypal.Buttons();
        buttons.render('#container-element').then(() => {
            hasRendered = true;
        });
    }
    renderButtons();
    function initPayPalButton() {


        paypal.Buttons({
            style: {
                shape: 'rect',
                color: 'gold',
                layout: 'vertical',
                label: 'paypal',

            },

            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{"amount":{"currency_code":"USD","value":1}}]
                });
            },

            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {

                    // Full available details
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                    // Show a success message within this page, e.g.
                    const element = document.getElementById('paypal-button-container');
                    element.innerHTML = '';
                    element.innerHTML = '<h3>Thank you for your payment!</h3>';

                    // Or go to another URL:  actions.redirect('thank_you.html');

                });
            },

            onError: function(err) {
                console.log(err);
            }
        }).render('#paypal-button-container');
    }
    initPayPalButton();

</script>
