<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
     <!-- Include Dragula CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.min.css">
     <style>
        /* Custom styles for circular layout */
        #dragto {
            position: relative;
            width: 600px; /* Adjust the width as needed */
            height: 600px; /* Adjust the height as needed */
            background-color: #fcdddd;
            border-radius: 50%;
            overflow: hidden;
            margin: 20px;
        }

        .slot {
            position: absolute;
            /* width: 100px;
            height: 50px; */
            background-color: white;
            border: 2px solid gray;
            /* border-radius: 50%; */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .arrow {
            position: absolute;
            background-color: transparent;
            border: 2px solid #f15353;
            width: 2px;
        }

        #center-textbox {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 10px;
            border: 2px solid gray;
            border-radius: 10px;
        }
    </style>
    <!-- Include Dragula JavaScript -->
    
    <title>Drag and Drop</title>
    @viteReactRefresh
    @vite('resources/js/app.js')
    @vite('resources/css/styles.css')
</head>
<body>

    <!-- <nav>
      <ul class = "menu-left">
            <li><a href="/">HOME</a></li>&nbsp;
            <li >Drag and drop</li>
        </ul>
        <ul class = "menu-right">
            @ include('navbar');
        </ul>
    </nav>   -->
    
    <div id="dragDropComponent"></div>


    <div class="custom-container">
        <div class="tool-section">
            <div class="tool-title">
                <h1>Drag and Drop<span style= "color:#9e0d0d !important">.</span></h1>
                    <!-- <a href="/documentation#urlmapping" target = "_blank" class="how-to-use-link">
                        <i class="fas fa-arrow-right"> How to Use</i>
                    </a> -->
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Blank first column -->
            <div class="col-md-2"></div>
            <div id = "draggables" class="col-md-2">
            <div id="custom" class="container">
                <h3>Custom</h3>
                <div id="item1" class="draggable" data-category="custom">Recharge</div>
                <div id="item2" class="draggable" data-category="custom">Setup</div>
                <div id="item3" class="draggable" data-category="custom">XXXXX</div>
            </div>

            <div id="taxes" class="container">
                <h3>Taxes</h3>
                <div id="item4" class="draggable" data-category="taxes">TaxJar</div>
                <div id="item5" class="draggable" data-category="taxes">Avalara</div>
                <div id="item6" class="draggable" data-category="taxes">Quickbooks</div>
            </div>

            <div id="shipping" class="container">
                <h3>Shipping</h3>
                <div id="item7" class="draggable" data-category="shipping">ShipStation</div>
                <div id="item8" class="draggable" data-category="shipping">Sendcloud</div>
                <div id="item9" class="draggable" data-category="shipping">Shippo</div>
            </div>

            <div id="payment" class="container">
                <h3>Payment</h3>
                <div id="item10" class="draggable" data-category="payment">Square</div>
                <div id="item11" class="draggable" data-category="payment">Stripe</div>
                <div id="item12" class="draggable" data-category="payment">Clover</div>
            </div>
            </div>
            <div id="dragto" class="col-md-4">
                <!-- Container for dragging to -->
                <div id="dragtocontainer" class="container">
                    <!-- Draggable items in the second container -->
                     <!-- Slots and arrows -->
                    <div id="customslot" class="slot" style="top: 10%; left: 50%;">Custom</div>
                    <div class="arrow" style="height: 50%; top: 50%; left: 50%; transform: translateX(-50%);"></div>

                    <div id="taxesslot" class="slot" style="top: 50%; left: 80%;">Taxes</div>
                    <div class="arrow" style="height: 50%; top: 0; left: 50%; transform: translateX(-50%) rotate(180deg);"></div>

                    <div id="shippingslot" class="slot" style="top: 90%; left: 50%;">Shipping</div>
                    <div class="arrow" style="height: 50%; top: 27%; left: 50%; transform: translateX(-50%) rotate(90deg);"></div>

                    <div id="paymentslot" class="slot" style="top: 50%; left: 10%;">Payment</div>
                    <div class="arrow" style="height: 50%; top: 0; left: 50%; transform: translateX(-50%) rotate(180deg);"></div>

                    <!-- Center textbox -->
                    <div id="center-textbox">Center</div>
                </div>
            <!-- Blank last column
            <div class="col-md-2"></div> -->
        </div>
    </div>



   
    <!-- Include Dragula JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.min.js"></script>

    <script>
        // Initialize Dragula on the containers
        var custom = document.getElementById('custom');
        var taxes = document.getElementById('taxes');
        var shipping = document.getElementById('shipping');
        var payment = document.getElementById('payment');
        var dragto = document.getElementById('dragto');

        var customslot = document.getElementById('customslot');
        var taxesslot = document.getElementById('taxesslot');
        var shippingslot = document.getElementById('shippingslot');
        var paymentslot = document.getElementById('paymentslot');


    
        // Initialize Dragula for 'custom' containers
        var drakeCustom = dragula([custom, customslot]);

        // Initialize Dragula for 'taxes' containers
        var drakeTaxes = dragula([taxes, taxesslot]);

        // Initialize Dragula for 'shipping' containers
        var drakeShipping = dragula([shipping, shippingslot]);

        // Initialize Dragula for 'payment' containers
        var drakePayment = dragula([payment, paymentslot]);

        // Add event listeners for 'drag' and 'drop' events for each set
        drakeCustom.on('drag', handleDragAndDrop);
        drakeCustom.on('drop', handleDragAndDrop);

        drakeTaxes.on('drag', handleDragAndDrop);
        drakeTaxes.on('drop', handleDragAndDrop);

        drakeShipping.on('drag', handleDragAndDrop);
        drakeShipping.on('drop', handleDragAndDrop);

        drakePayment.on('drag', handleDragAndDrop);
        drakePayment.on('drop', handleDragAndDrop);

        // Object to store slot mappings
        var slotMapping = {
            customslot: 'custom',
            taxesslot: 'taxes',
            shippingslot: 'shipping',
            paymentslot: 'payment'
        };

        function handleDragAndDrop(el, target, source, sibling) {
            // Add custom styling when an item is being dragged
            el.classList.add('is-dragging');
            console.log(target.length);
            console.log(target.classList);
            // Not working yet
            // Allow dropping into the specified slots only if they are empty
            if (target.classList.contains('slot') && (target.length === 'undefined' || slotMapping[target.id] === el.dataset.category)) {
                console.log(target.children.length);
                // Remove custom styling when an item is dropped
                el.classList.remove('is-dragging');
                // Show an alert when an item is dropped
                alert('Item dropped into ' + target.id);
            }
        }
    
    </script>
</body>
</html>