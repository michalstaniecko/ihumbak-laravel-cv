<div class="row justify-content-end pb-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dodatkowe informacje</div>

            <div class="card-body">
                <h5>Zainteresowania:</h5>
                <ul class="list-unstyled">
                    @forelse($profile->user->interests as $interest)
                        <li>
                            {{ $interest->interest }}

                        </li>
                    @empty
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
