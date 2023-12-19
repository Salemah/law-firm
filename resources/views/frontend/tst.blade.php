<button class="btn btn-sm btn-success my-2 appointment-modal"
    data-id="{{ $team->id }}" id="appointment-modal" title="Click To Appoinment">
{{ Carbon\Carbon::parse($team->from_time)->format('g:i A') }}
                                        </button>
