@extends('frontend.layouts.master')

@section('index')
    <section class="room-reservation">
        <div class="col-lg-4">
            <div class="room-booking">
                <h3>Your Reservation</h3>
                <form action="{{ route('roomReserve') }}" method="POST">
                @csrf
                    <div class="check-date">
                        <label for="date-in">Check In:</label>
                        <input type="text" class="date-input" id="date-in">
                        <i class="icon_calendar"></i>
                    </div>
                    <div class="check-date">
                        <label for="date-out">Check Out:</label>
                        <input type="text" class="date-input" id="date-out">
                        <i class="icon_calendar"></i>
                    </div>
   
                    <input type="submit" value="Check Availability">
                    <input type="hidden" name="room_id" value="{{ $rooms->id }}">
                </form>
            </div>
        </div>
    </section>

    <!-- Popup Modal -->
    <div class="modal fade" id="sessionModal" tabindex="-1" aria-labelledby="sessionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sessionModalLabel">Session Expired</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Your session has expired. Please log in again.
                </div>
                <div class="modal-footer">
                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Check for session and trigger the modal if no session exists -->
    @if (auth('customer')->check())
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var sessionModal = new bootstrap.Modal(document.getElementById('sessionModal'));
                sessionModal.show();
            });
        </script>
    @endif

@endsection
