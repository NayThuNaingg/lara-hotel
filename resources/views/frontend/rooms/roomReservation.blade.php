@extends('frontend.layouts.master')

@section('index')
    <section class="breadcrumb-section">
        <div class="container">
        <div class="col-lg-4">
            <div class="room-booking">
                <h3>Your Reservation</h3>
                <form action="" method="POST">
                @csrf
                    <div class="check-date">
                        <label for="date-in">Check In:</label>
                        <input type="text" class="date-input" id="date-in" readonly>
                        <i class="icon_calendar"></i>
                    </div>
                    <div class="check-date">
                        <label for="date-out">Check Out:</label>
                        <input type="text" class="date-input" id="date-out" readonly>
                        <i class="icon_calendar"></i>
                    </div>

                    <button type="submit">Check Availability</button>
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                </form>
            </div>
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
                    <a href="" class="btn btn-primary">Login</a>
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
