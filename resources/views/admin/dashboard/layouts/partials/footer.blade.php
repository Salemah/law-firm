@php
    $dashboard_settings = \Illuminate\Support\Facades\DB::table('dashboard_settings')->first();
@endphp
<footer class="main-footer">
    <strong>Copyright &copy; {{ Carbon\Carbon::now()->format('Y') }} <a
            href="{{ $dashboard_settings->website }}">{{ $dashboard_settings->copyright }}</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.5
    </div>
</footer>
