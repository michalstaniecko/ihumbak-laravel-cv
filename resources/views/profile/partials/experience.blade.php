<div class="row justify-content-end pb-5">
    <div class="col">
        <div class="card">

            <div class="card-header">Doświadczenie zawodowe</div>
            <div class="card-body">
                <div>

                    <div class="h5">
                        Projekty komercyjne
                    </div>
                    <div class="">
                        <ul class="list-unstyled">
                            @forelse($profile->user->jobs as $job)
                                <li class="pb-3">
                                    <div>

                                        <strong>{{ $job->name }}</strong> - od {{ __(date('F', strtotime($job->start))) }} {{ __(date('Y', strtotime($job->start)))}}
                                    </div>
                                    <div><small><strong>Stanowisko:</strong> {{ $job->position }}</small></div>
                                    <ul class="">
                                        @forelse($job->projects as $project)
                                            <li>
                                                <div>

                                                    <strong>{{ $project->name }}</strong> - {{ $project->description }}
                                                </div>
                                                <div><small>{{ $project->tools }}</small></div>
                                            </li>
                                        @empty
                                            <li>Brak</li>
                                        @endforelse
                                    </ul>
                                </li>
                            @empty
                                <li>Brak</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
                <div class="pt-4">

                    <div class="h5">
                        Projekty prywatne
                    </div>
                    <div class="">
                        <ul class="list-unstyled">
                            @forelse($profile->user->privateProjects as $project)
                                <li class="pb-3">
                                    <div>

                                        <strong>{{ $project->name }}</strong> - {{ $project->description }}
                                    </div>
                                    <div><small>{{ $project->tools }}</small></div>
                                    <div><small><strong>Repozytorium:</strong> {{ $project->repo }}</small></div>
                                </li>
                            @empty
                                <li>Brak</li>
                            @endforelse

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
