@extends('share')

@section('content')
<style>
body {
    background-color: #000000;
}

.card {
    border-color: none;
    border-radius: 10px;
}

.card-title {
    font-weight: bold;
}

.btn-outline-light {
      --brand:#bf00ff;   /* purple used for borders/brand */
    border-color: var(--brand);
      --brand:#3300ff;   /* purple used for borders/brand */
    color: ;
}
</style>
    <div class="container text-center py-5">
        <h1>Select Your Plan</h1>
        <p>No hidden fees, equipment rentals, or installation appointments.</p>
        <div class="row justify-content-center mt-4">
            <div class="col-md-3 card mx-2 bg-secondary">
                <div class="card-body">
                    <h5 class="card-title">FREE PLAN</h5>
                    <h3>Free.</h3>
                    <button class="btn btn-outline-light" onclick="selectPlan('Free Plan')">Choose Plan</button>
                    <ul class="mt-3">
                        <li>✓ Get unlimited access to thousands of shows and movies with limited ads</li>
                        <li>✓ Watch on your favorite devices</li>
                        <li>✓ Switch plans or cancel anytime</li>
                        <li>✓ Download from thousands of titles to watch offline</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 card mx-2 bg-secondary">
                <div class="card-body">
                    <h5 class="card-title">DIAMOND PLAN</h5>
                    <h3>$9.99 per Month.</h3>
                    <button class="btn btn-outline-light" onclick="selectPlan('Diamond Plan')">Choose Plan</button>
                    <ul class="mt-3">
                        <li>✓ Get unlimited access to thousands of shows and movies with limited ads</li>
                        <li>✓ Watch on your favorite devices</li>
                        <li>✓ Switch plans or cancel anytime</li>
                        <li>✓ Download from thousands of titles to watch offline</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 card mx-2 bg-secondary">
                <div class="card-body">
                    <h5 class="card-title">PLATINUM PLAN</h5>
                    <h3>$39.99 every 2 Months.</h3>
                    <button class="btn btn-outline-light" onclick="selectPlan('Platinum Plan')">Choose Plan</button>
                    <ul class="mt-3">
                        <li>✓ Get unlimited access to thousands of shows and movies with limited ads</li>
                        <li>✓ Watch on your favorite devices</li>
                        <li>✓ Switch plans or cancel anytime</li>
                        <li>✓ Download from thousands of titles to watch offline</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        function selectPlan(plan) {
            alert(`You have selected the ${plan}`);
        }
    </script>


@endsection
