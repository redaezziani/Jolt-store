<div
class=" aspect-square min-w-80"
>
    <div class="p-2 w-[33rem] text-right m-20 bg-white rounded shadow">
        {!! $chart->container() !!}
    </div>

<script src="{{ $chart->cdn() }}"></script>

{{ $chart->script() }}
</div>
