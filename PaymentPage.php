<!DOCTYPE html>
<html>
    <head>
        <title>Payment Page</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="PaymentPage.css">
        <link rel="stylesheet" href="header.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <?php
        include('header.php');
        ?>
        <p><span style="color:red;">Note</span> : Your payment will be processed by a third-party service - This warning may appear to let you know that the payment will be processed by a third-party payment processor and not directly by the merchant.</p>
        <div class="paymentrow">
            <div class="paymentcol-75">
                <div class="payment-container">
                <form action="/action_page.php">

                <div class="paymentrow">
                    <div class="paymentcol-50">
                        <h3>Billing Address</h3>
                            <label for="user_name"><i class="fa fa-user"></i> Full name</label>
                            <input type="text" id="fname" name="firstname" placeholder=" John M. Doe">
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" id="email" name="email" placeholder=" john@example.com">
                            <label for="adr"><i class="fa fa-home"></i> Address</label>
                            <input type="text" id="adr" name="address" placeholder=" 542 W. 15th">
                            <label for="city"><i class="fa fa-institution"></i> City</label>
                            <input type="text" id="city" name="city" placeholder=" New York">

                        <div class="paymentrow">
                            <div class="paymentcol-50">
                                <label for="state"> State</label>
                                <input type="text" id="state" name="state" placeholder=" NY">
                            </div>
                            <div class="paymentcol-50">
                                <label for="zip"> Zip</label>
                                <input type="text" id="zip" name="zip" placeholder=" 10001">
                            </div>
                        </div>
                    </div>

                    <div class="paymentcol-50">
                        <h3>Payment</h3>
                            <label for="fname"> Accepted Cards</label>
                        <div class="icon-container">
                            <i class="fa-brands fa-cc-visa fa-xl" style="color:white;"></i>
                            <i class="fa-brands fa-cc-mastercard fa-xl" style="color:red;"></i>

                        </div>
                            <label for="cname">Name on Card</label>
                            <input type="text" id="cname" name="cardname" placeholder=" John More Doe ">
                            <label for="ccnum">Credit card number</label>
                            <input type="text" id="ccnum" name="cardnumber" placeholder=" 1111-2222-3333-4444 ">
                            <label for="expmonth">Exp Month</label>
                            <input type="text" id="expmonth" name="expmonth" placeholder=" September ">
                    </div>

                    <div class="paymentrow">
                        <div class="paymentcol-50">
                            <label for="expyear">Exp Year</label>
                            <input type="text" id="expyear" name="expyear" placeholder=" 2018 ">
                        </div>
                        <div class="paymentcol-50">
                            <label for="cvv">CVV</label>
                            <input type="text" id="cvv" name="cvv" placeholder=" 352 ">
                        </div>
                    </div>

                        <input type="submit" value="Continue to checkout" class="paymentsummit">


                </div>
            </form>
                </div>
            </div>
        <div class="paymentcol-25">
            <div class="paymentcontainer">
                <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4>
                <p><a href="#">Product 1</a> <span class="price">$15</span></p>
                <p><a href="#">Product 2</a> <span class="price">$5</span></p>
                <p><a href="#">Product 3</a> <span class="price">$8</span></p>
                <p><a href="#">Product 4</a> <span class="price">$2</span></p>
                <hr>
                <p>Total <span class="price" style="color:black"><b>$30</b></span></p>
            </div>
        </div>
    </div>

        <?php
        include('footer.php');
        ?>


    </body>
</html>