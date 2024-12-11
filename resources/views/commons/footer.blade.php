</div>
</div>


<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('assets/vendors/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>

<script src="{{ asset('assets/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('assets/js/template.js') }}"></script>
<script src="{{ asset('assets/js/settings.js') }}"></script>
<script src="{{ asset('assets/js/todolist.js') }}"></script>
<script src="{{ asset('assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/dashboard.js') }}"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>


@if(Session::has('error'))
<script>
  Swal.fire("Failed", '{{ Session::get("error") }}', "error");
</script>
@php Session::forget('error'); @endphp
@endif

@if(Session::has('success'))
<script>
  Swal.fire('Success', '{{ Session::get("success") }}', "success");
</script>
@php Session::forget('success'); @endphp
@endif

<script>
const HOURHAND = document.querySelector("#hour");
const MINUTEHAND = document.querySelector("#minute");
const SECONDHAND = document.querySelector("#second");

// function to get the current time
function updateTime() {
  const now = new Date(); // Get current date and time
  let hr = now.getHours(); // hours (24-hour format)
  let min = now.getMinutes(); // minutes
  let sec = now.getSeconds(); // seconds

  // converts current time into degrees of the 360 degree clock
  let hrPosition = (hr % 12) * 360 / 12 + (min * (360 / 60) / 12); // Adjust for 12-hour clock
  let minPosition = (min * 360 / 60) + (sec * (360 / 60) / 60); // Adjust for seconds within minutes
  let secPosition = sec * 360 / 60; // Adjust for seconds

  // position clock hands to degrees values calculated above using transform rotate
  HOURHAND.style.transform = "rotate(" + hrPosition + "deg)";
  MINUTEHAND.style.transform = "rotate(" + minPosition + "deg)";
  SECONDHAND.style.transform = "rotate(" + secPosition + "deg)";
}

// interval that automates the clock by calling the updateTime function every second
var interval = setInterval(updateTime, 1000);

// Initial positioning of the clock hands
updateTime();

</script>
<script>
function updateDate() {
  const today = new Date();
  const options = { weekday: 'long', year: 'numeric', month: 'numeric', day: 'numeric' };
  const formattedDate = today.toLocaleDateString('en-US', options);
  document.getElementById('date-display').textContent = formattedDate;
}

updateDate(); // Call function to display the date on page load
</script>
</body>

</html>