<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Payment</title>
    <meta name="description" content="A demo of a payment on Stripe" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{ asset('css/stripe-element.css') }}" />
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="dark:bg-gray-900">

    <section class="bg-white dark:bg-gray-900 justify-center mt-10">
        <div class="py-8 px-4 mx-auto max-w-screen-md lg:py-16 lg:px-6">
            <div class="max-w-screen-lg text-gray-500 sm:text-lg dark:text-gray-400">

                <h2 class="mb-4 text-4xl tracking-tight font-bold text-gray-900 dark:text-white">Payment Integration with Stripe Elements, Laravel, and Tailwind CSS</h2>
                <p class="mb-4 font-medium">To test Stripe payment integration, use the test card number <span class="text-white font-medium">4242 4242 4242 4242</span> with any future expiry date and any 3-digit CVC. Submit the form to initiate a payment and check the status in your Stripe dashboard using your own API key and secret.</p>

                <!-- Display a payment form -->
                <div class="mt-12">

                    <!-- form start -->
                    <form id="payment-form">

                        <div id="payment-element">
                            <!--Stripe.js injects the Payment Element-->
                        </div>

                        <button id="submit" class="mt-10 w-full text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-5 me-2 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">
                            <svg id="spinner" aria-hidden="true" role="status" class="hidden mb-1 inline w-4 h-4 me-3 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB" />
                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor" />
                            </svg>
                            <span id="button-text">Pay now</span>
                        </button>

                        <!-- show success and error messgaes -->
                        <div id="payment-contaainer" class="hidden mt-5 flex items-center w-full max-w-screen-lg p-4 text-gray-500 rounded-lg shadow bg-gray-800" role="alert">
                            <div class="ms-3 text-sm font-normal" id="payment-message"></div>
                        </div>

                    </form>
                    <!-- form end -->

                </div>
            </div>
        </div>
    </section>

    <!-- include payment-js file -->
    @include('stripe-element.payment-js')

</body>

</html>