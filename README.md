

## Jumga MarketPlace

Jumga is an online market place developed and still in development for the flutterwave dev challenge 2021
The live version url is [flutterwavechallenge.xyz](https://flutterwavechallenge.xyz)
## Table of Contents

* [Setup](#Setup)
* [Testing Data](#Testing)
* [How it works](#How-it-works)
  * [Registration](#Registration)
  * [Store](#Store-and-Product-Registration)
  * [Dispatcher](#Dispatcher)
  * [Payment and Calculations](#Payments-and-calculations)
  * [Challenges encountered](#Configuration-parameters)

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Setup

The jumga platform is built with Laravel which is extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.


## How it works

# Registration
Customers can register with the registration link in the home page in order to be able to 
checkout, make payments, etc

### Store Registration
Jumga as a platform owner has created an avenue for merchants to setup their stores online and start
selling after paying a small token for approval. The process involved are

* The merchant registers, after registration, the merchant is redirected to
 payment approval page from where he will pay his approval fee. The controller method
  for payment approval is located at    ``` app/Http/Controllers/Merchant/SetupController.php```


### Dispatch Riders
* After the payment,a dispatch rider is assigned to merchant automatically. The platform
 owner is responsible for adding riders(which also creates the subaccount for their
 earnings) to the platform. The merchant can visit ```/merchant/account``` to create account, We will use the information provided
to create a subaccount for the merchant to receive his earnings.

* The merchant can add products which will now be visible to the users of the platform. Users can
now pay with the payment option of their choice and checkout.


### Payment calculation
Based on the fact that this is a multi shop, a customer can pick different items from 
different shops and and pay the total, we have to find a way to sort the shops and get the
total amount due for a merchant and his dispatch rider.
The price for delivery per item is ```120``` . After calculating the total amount for a particular 
merchant you can now get the amount due for the dispatch rider assigned to him. 

After getting these details and the account ID of the merchant and dispatch rider, it is passed
as a flat amount to the sub account array and everyone gets his pay immediately.
The logic for payments located at    ``` app/Http/Controllers/CartController.php```


### Challenge encountered
Integrating the flutterwave standard checkout was quite straight forward but working other payment method API was 
somewhat difficult for me, I hoped the docs should have provided some more info to make the integration easier.

Due to the fact that the payment will be completed by a third party, I guess I should run
the verification function immediately to know if the transaction was successful.
 
 After calling the mpesa charge endpoint, I though a modal will come out and then the customer will choose the mpesa
  method but nothing happened, I just recieved a response that the charge was initiated successfully.
  so i decide to run a my payment verification function but for some
reason after verifying an mpesa transaction, i can't navigate to another page and the page I'm
currently on becomes blank. It's quiet confusing.

I'd love to replicate this error maybe after the challenge or learn where I'm getting it wrong.
The doc wasn't very helpful for me in this regard.

I couldn't build this the way I wanted to due to time and some unexpected blockages. More of these type
of challenges will be great. It is very encouraging.
