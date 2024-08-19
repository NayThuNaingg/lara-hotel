@extends('frontend.layouts.master')

@section('index')
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 border">
                    <div class="room-booking m-4">
                        <h3>Your Reservation</h3>
                        <form action="{{route('postRoomReserved')}}" method="POST" autocomplete="off">
                            @csrf
                            <div class="check-date">
                                <label for="date-in">Check In:</label>
                                <input type="text" class="checkin" id="date-in" name="checkin" required />
                                <i class="icon_calendar"></i>
                                <div style="margin-left:40%;">
                                @if($errors->has('checkin'))
                                <small style="color:red">{{ $errors->first('checkin') }}</small>
                                @endif
                                </div>
                            </div>
                            <div class="check-date">
                                <label for="date-out">Check Out:</label>
                                <input type="text" class="checkout" id="date-out" name="checkout" required />
                                <i class="icon_calendar"></i>
                                <div style="margin-left:40%;">
                                @if($errors->has('checkout'))
                                <small style="color:red">{{ $errors->first('checkout') }}</small>
                                @endif
                                </div>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input extra_bed_select" id="extra_bed_select" value="1" name="is_extra_bed" />
                                <label class="form-check-label" for="extra_bed_select">Extra Bed</label>
                            </div>
                            <div class="check-date">
                                <label class="col-form-label" for="name">Name:</label>
                                <input type="text" class="form-control" placeholder="Your Name" name="name" id="name" required />
                                <div style="margin-left:40%;">
                                @if($errors->has('name'))
                                    <small style="color:red">{{ $errors->first('name') }}</small>
                                @endif
                                </div>
                            </div>
                            <div class="check-date">
                                <label class="col-form-label" for="phone">Phone:</label>
                                <input type="number" class="form-control" placeholder="09 XXX XXXX XXX" name="phone" id="phone" required />
                                <div style="margin-left:40%;">
                                @if($errors->has('phone'))
                                    <small style="color:red">{{ $errors->first('phone') }}</small>
                                @endif
                                </div>
                            </div>
                            <div class="check-date">
                                <label class="col-form-label" for="email">Email:</label>
                                <input type="email" class="form-control" placeholder="yourname@email.com" name="email" id="email" required />
                                <div style="margin-left:40%;">
                                @if($errors->has('email'))
                                    <small style="color:red">{{ $errors->first('email') }}</small>
                                @endif
                                </div>
                            </div>
                            <button type="submit" class="btn">Check Availability</button>
                            <input type="hidden" name="room_id" value="{{ $room->id }}">
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mt-3">
                        <div class="shadow-sm p-3 mb-5 bg-white rounded">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Item Name</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Room Price</td>
                                        <td class="price" id="price">{{ $room->price_per_day }} {{ getSiteSetting() !== null ? getSiteSetting()->price_unit : '' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Extra Bed Price</td>
                                        <td class="extra_bed" id="extra_bed">{{ $room->extra_bed_price }} {{ getSiteSetting() !== null ? getSiteSetting()->price_unit : '' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Total Days</td>
                                        <td class="daysDifference" id="daysDifference">{{ isset($room->daysDifference) ? $room->daysDifference : '1' }} Day(s)</td>
                                    </tr>
                                    <tr>
                                        <th>Total Price</th>
                                        <th class="total_price" id="total_price">{{ isset($room->total_price) ? $room->total_price : '0' }} {{ getSiteSetting() !== null ? getSiteSetting()->price_unit : '' }}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')

<script>
        $(document).ready(function() {
          $("#date-in").datepicker({
              minDate: 0,
              onSelect: function(selectedDate) {
                var minDate = new Date(selectedDate);
                minDate.setDate(minDate.getDate()+1);
                  $("#date-out").datepicker("option", "minDate", minDate);
                  $("#date-out").prop("disabled",false);
              }
          });

          $("#date-out").datepicker({
              minDate: 0
          });
      });
    </script>
<script>
    $(document).ready(function() {
        var roomPrice = {{ $room->price_per_day }};
        var extraBedPrice = {{ $room->extra_bed_price }};
        var priceUnit = "{{ getSiteSetting() !== null ? getSiteSetting()->price_unit : '' }}";

        function updatePriceDisplay() {
            var checkinDate = new Date($("#date-in").val());
            var checkoutDate = new Date($("#date-out").val());

            if (!isNaN(checkinDate) && !isNaN(checkoutDate)) {
                var daysDifference = Math.floor((checkoutDate - checkinDate) / (1000 * 60 * 60 * 24));
                var totalBasePrice = roomPrice * daysDifference;

                if ($(".extra_bed_select").is(":checked")) {
                    totalBasePrice += extraBedPrice * daysDifference;
                }

                $("#daysDifference").text(daysDifference + " Days");
                $("#total_price").text(formatPrice(totalBasePrice));
            } else {
                $("#total_price").text(formatPrice(roomPrice));
            }
        }

        function formatPrice(price) {
            return price.toFixed(2) + " " + priceUnit;
        }

        $(".extra_bed_select, .checkin, .checkout").change(function() {
            updatePriceDisplay();
        });

        updatePriceDisplay();
    });
</script>

@endsection
