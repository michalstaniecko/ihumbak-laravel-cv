@forelse($projects as $project)

    {{$project->name}}

@empty

brak
@endforelse
