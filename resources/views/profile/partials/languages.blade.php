<div class="row justify-content-end pb-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Języki obce</div>

            <div class="card-body">
                <ul class="list-unstyled">
                    @forelse($profile->languages as $language)
                        <li>
                            {{ $language->name }} - {{ $language->pivot->level }}

                        </li>
                    @empty
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
