@extends('layouts.admin.index')

@section('content')
<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Booking Manual</h6>
                <form method="POST" action="{{ route('paymentAdmin') }}">
                    @csrf
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
                            console.log('Selected hour_id:', value);
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
                                    <button type="button" class="btn btn-outline-primary" onclick="change({{ $item->id }});">
                                        {!! $item->start_time.' - '.$item->end_time.'&#x00A;'.__('Rp.').number_format($item->price, 2, ',', '.') !!}
                                    </button>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <input type="hidden" name="time_id" id="time_id" value="0">
                    <div class="col-lg-12 mb-4 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Book Now</button>
                    </div>
                </form>
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

        document.addEventListener("DOMContentLoaded", function() {
            function change(value) {
            console.log('Selected hour_id:', value);
            document.getElementById("time_id").value = value;
        }
    });

        // Initial load with the default date
        updateBookedHours($('#bookingDate').val());

        // Handle change event for the date input
        $('#bookingDate').on('change', function () {
            var selectedDate = $(this).val();
            updateBookedHours(selectedDate);
        });
    });
</script>
@endsection
