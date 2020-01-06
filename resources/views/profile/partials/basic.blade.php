<div class="row justify-content-center pb-5">
    <div class="col pb-lg-0 ">
        <div class="card">
            <div class="card-header">Informacje podstawowe</div>

            <div class="card-body">
                <ul class="list-unstyled">
                    <li class="">{{ $profile->name }} {{ $profile->lastname }}</li>
                    <li class="">Tychy, śląskie, Polska</li>
                    <li class=""><small class="font-weight-bold">adres e-mail:</small> {{ $profile->user->email }}</li>
                    <li class=""><small class="font-weight-bold">github:</small> {{ $profile->url }}</li>
                    <li class=""><small class="font-weight-bold">numer telefonu:</small> {{ $profile->phone }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
