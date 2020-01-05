<div class="row justify-content-center pb-5">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Informacje podstawowe</div>

            <div class="card-body">
                <ul class="list-unstyled">
                    <li class="">{{ $profile->name }} {{ $profile->lastname }}</li>
                    <li class="">Tychy, śląskie, Polska</li>
                    <li class="">Data urodzenia: {{ date('d.m.Y', strtotime($profile->date_of_birth)) }}</li>
                    <li class="">Adres e-mail: {{ $profile->user->email }}</li>
                    <li class="">Adres www: {{ $profile->url }}</li>
                    <li class="">Numer telefonu: {{ $profile->phone }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">O mnie</div>

            <div class="card-body">
                <div>
                    <p>

                        {!! nl2br($profile->description) !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
