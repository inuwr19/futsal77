@extends('layouts.admin.index')

@section('content')
<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Booking Manual</h6>
                <form method="POST" action="{{ route('paymentAdmin') }}">
                    @csrf
                    {{-- <input id="datepicker" type="text" class="form-control" > --}}
                    <fieldset>
                        <input
                            type="date"
                            name="date"
                            id="bookingDate"
                            class="rounded py-2 px-4 border border-gray-300"
                            min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"
                            max="{{ \Carbon\Carbon::now()->addDays(30)->format('Y-m-d') }}" required>
                    </fieldset>
                    <hr>

                    <script>
                        function change(value) {
                            document.getElementById("time_id").value = value;
                        }
                    </script>

                    <div class="row" id="hoursContainer">
                        @foreach ($hours as $item)
                            <div class="col-md-3 mb-4">
                                @if (in_array($item->id, $bookedHours))
                                    <button class="btn btn-outline-secondary" disabled>
                                        {!! $item->start_time.' - '.$item->end_time.'&#x00A;'.__('Rp.').number_format($item->price, 2, ',', '.') !!}
                                        (Booked)
                                    </button>
                                @else
                                    <input type="button" class="btn btn-outline-primary"
                                        value="{!! $item->start_time.' - '.$item->end_time.'&#x00A;'.__('Rp.').number_format($item->price, 2, ',', '.') !!}"
                                        onclick="change({{ $item->id }});">
                                @endif
                            </div>
                        @endforeach
                        <input type="hidden" name="time_id" id="time_id" value="0">
                    </div>
                    <div class="col-lg-12 mb-4 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Book Now</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Check, Radio & Switch</h6>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Default checkbox
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                        Checked checkbox
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                    <label class="form-check-label" for="inlineCheckbox1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                    <label class="form-check-label" for="inlineCheckbox2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3"
                        disabled>
                    <label class="form-check-label" for="inlineCheckbox3">3 (disabled)</label>
                </div>
                <hr>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                        id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Default radio
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                        id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Default checked radio
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                        value="option1">
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                        value="option2">
                    <label class="form-check-label" for="inlineRadio2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3"
                        value="option3" disabled>
                    <label class="form-check-label" for="inlineRadio3">3 (disabled)</label>
                </div>
                <hr>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch"
                        id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox
                        input</label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch"
                        id="flexSwitchCheckChecked" checked>
                    <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox
                        input</label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch"
                        id="flexSwitchCheckDisabled" disabled>
                    <label class="form-check-label" for="flexSwitchCheckDisabled">Disabled switch checkbox
                        input</label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch"
                        id="flexSwitchCheckCheckedDisabled" checked disabled>
                    <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">Disabled checked
                        switch checkbox input</label>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form End -->
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Function to update booked hours based on the selected date
        function updateBookedHours(selectedDate) {
            $.ajax({
                url: '{{ route("getBookedHours") }}',
                type: 'GET',
                data: { date: selectedDate },
                success: function (data) {
                    // Update the hidden input with the selected date
                    $('#selectedDate').val(selectedDate);

                    // Dynamically populate the hoursContainer
                    var hoursContainer = $('#hoursContainer');
                    hoursContainer.empty();
                    @foreach ($hours as $item)
                        var buttonClass = $.inArray({{ $item->id }}, data.bookedHours) !== -1 ? 'btn-outline-secondary' : 'btn-outline-primary';
                        var button = '<div class="col-md-3 mb-4"><input type="button" class="btn ' + buttonClass + '" value="{!! $item->start_time.' - '.$item->end_time.'&#x00A;'.__('Rp.').number_format($item->price, 2, ',', '.') !!}" onclick="change({{ $item->id }})"></div>';
                        hoursContainer.append(button);
                    @endforeach
                }
            });
        }

        // Initial load with the default date
        updateBookedHours($('#bookingDate').val());

        // Handle change event for the date input
        $('#bookingDate').on('change', function () {
            var selectedDate = $(this).val();
            updateBookedHours(selectedDate);
        });
    });
</script>
