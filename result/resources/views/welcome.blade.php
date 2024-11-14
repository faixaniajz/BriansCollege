@extends('layouts.app')

@section('content')
<br><br><br><br>
<br><div class="container mt-5 text-center">
    <h1 class="display-4">Results Coming Soon</h1>
    <p class="lead">The results will be available at 8:10 AM.</p>

    <!-- Countdown Timer -->
    <div id="countdown-timer" class="display-1 my-5" style="color: #C90514;">00:00:00</div>

    <p>Stay tuned!</p>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Set the target time to 8:00 AM today or the next day if past 8:00 AM
        let targetTime = new Date();
        targetTime.setHours(8, 10, 0, 0); // Set to 8:00 AM today

        // If the target time is in the past, set it to 8:00 AM the next day
        if (targetTime < new Date()) {
            targetTime.setDate(targetTime.getDate() + 1);
        }

        function updateCountdown() {
            const now = new Date();
            const remainingTime = targetTime - now;

            if (remainingTime > 0) {
                // Calculate hours, minutes, and seconds
                const hours = Math.floor((remainingTime / (1000 * 60 * 60)) % 24);
                const minutes = Math.floor((remainingTime / (1000 * 60)) % 60);
                const seconds = Math.floor((remainingTime / 1000) % 60);

                // Display the countdown
                document.getElementById('countdown-timer').innerText =
                    `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
            } else {
                // Display "Available Now" when the timer reaches zero
                document.getElementById('countdown-timer').innerText = "Available Now";
            }
        }

        // Update the countdown every second
        updateCountdown();
        setInterval(updateCountdown, 1000);
    });
</script>
@endsection
