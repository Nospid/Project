@extends('master')
@section('content')
    @include('message')
    <h2 class="h5 text-uppercase mb-4 text-dark" style="margin-left: 130px">Billing details</h2>
    <div class="row mx-3">
        <div class="col-lg-8">
            <form action="{{ route('order.store') }}" method="post" onsubmit="checkout(event)">
                @csrf
                <div class="row gy-3"style="margin-left: 100px">
                    <div class="col-lg-6">
                        <label class="form-label text-sm text-uppercase" for="firstName">First name </label>
                        <input class="form-control form-control-lg" type="text" id="firstName"
                            name="person_name"placeholder="Enter your first name" value="{{ auth()->user()->name }}">
                    </div>

                    <div class="col-lg-6">
                        <label class="form-label text-sm text-uppercase" for="email">Email address </label>
                        <input class="form-control form-control-lg" type="email" name="email" id="email"
                            placeholder="e.g. Jason@example.com"value="{{ auth()->user()->email }}">
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label text-sm text-uppercase" for="phone">Phone number </label>
                        <input class="form-control form-control-lg" type="text" name="phone" id="phone"
                            placeholder="e.g. +977 982528690" value="{{ auth()->user()->phone }}">
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label text-sm text-uppercase">Address </label>
                        <input class="form-control form-control-lg" type="text" name="shipping_address" id="address"
                            placeholder="Your company name" value="{{ auth()->user()->address }}">
                    </div>
                    <div class="col-lg-12">
                        <label class="form-label text-sm text-uppercase" for="company">Payment Method</label>
                        <div class="mt-2">
                            <label class="inline-flex items-center">

                                <select name="payment_method" onchange="paymentMethod(this.value)" id="paymentMethodSelect">
                                    <option value="">--Select Payment Method--</option>
                                    <option value="COD">Cash on Deleviry</option>
                                    <option value="khalti">Khalti Payment </option>
                                </select>

                            </label>


                        </div>
                    </div>

                    <div class="col-lg-12 form-group ">
                        <button id="payment-button"
                            class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded"
                            style="margin-bottom: 3rem; ">Place Order</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- ORDER SUMMARY-->

    </div>
    <script>
        function checkout(event) {
            event.preventDefault();
            var form = event.target;
            if($("#paymentMethodSelect").val() == "COD"){
              form.submit();
              return false;
            }
            var config = {
                // replace the publicKey with yours
                "publicKey": "test_public_key_e1de1fecb7bd4baf9c0c57ad20e42f47",
                "productIdentity": "1234567890",
                "productName": "Dragon",
                "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
                "paymentPreference": [
                    "KHALTI",
                    "EBANKING",
                    "MOBILE_BANKING",
                    "CONNECT_IPS",
                    "SCT",
                ],
                "eventHandler": {
                  onSuccess(payload) {
                        // hit merchant api for initiating verfication
                        console.log(payload);
                        if (payload.idx) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                }
                            });

                            $.ajax({
                                method: 'post',
                                url: "{{ route('khaltiverify') }}",
                                data: payload,
                                success: function(response) {
                                    console.log(response);
                                    console.log("Verified Payment");
                                    form.submit();
                                },
                                error:(error) => console.log(error)
                            })
                        }
                    },
                    onError(error) {
                        console.log(error);
                    },
                    onClose() {
                        console.log('widget is closing');
                    }
                }
            };

            var checkout = new KhaltiCheckout(config);
            // minimum transaction amount must be 10, i.e 1000 in paisa.
            checkout.show({
                amount: ({{ $originalCartTotal * 100 }}) >= 20000 ? 19999 : {{ $originalCartTotal * 100 }}
            });

        }
    </script>
@endsection
