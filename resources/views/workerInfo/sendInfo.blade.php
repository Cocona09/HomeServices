<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Send Worker Information</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/send.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
@include('layouts.admin.sidebar')
<div>
    @if(session()->has('sendSuccess'))
        <script>
            Swal.fire({
                title: "Good job!",
                text: " {{ session('sendSuccess') }}",
                icon: "success"
            });
        </script>
    @endif
</div>
<div class="formbold-main-wrapper">
    <div class="formbold-form-wrapper">
        <form id="workerForm" action="{{ route('assign.worker', $order->id) }}" method="POST">
            @csrf

            <!-- Assign Worker Field -->
            <div class="formbold-mb-5">
                <label for="worker_id" class="formbold-form-label">Assign Worker</label>
                <select name="worker_id" id="worker_id" class="formbold-form-input" required>
                    <option value="">Select a worker</option>
                    @foreach($workers as $worker)
                        <option value="{{ $worker->id }}"
                                data-firstname="{{ $worker->firstname }}"
                                data-lastname="{{ $worker->lastname }}"
                                data-job="{{ $worker->job }}"
                                data-age="{{ $worker->age }}"
                                data-gender="{{ $worker->gender }}"
                                data-phone="{{ $worker->phone }}">
                            {{ $worker->firstname }} {{ $worker->lastname }} - {{ $worker->job }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Display Worker Information Fields -->
            <div class="formbold-mb-5">
                <label for="worker_firstname" class="formbold-form-label">Worker First Name</label>
                <input type="text" name="worker_firstname" id="worker_firstname" class="formbold-form-input" readonly>
            </div>

            <div class="formbold-mb-5">
                <label for="worker_lastname" class="formbold-form-label">Worker Last Name</label>
                <input type="text" name="worker_lastname" id="worker_lastname" class="formbold-form-input" readonly>
            </div>

            <div class="formbold-mb-5">
                <label for="worker_job" class="formbold-form-label">Worker Job</label>
                <input type="text" name="worker_job" id="worker_job" class="formbold-form-input" readonly>
            </div>

            <div class="formbold-mb-5">
                <label for="worker_age" class="formbold-form-label">Worker Age</label>
                <input type="text" name="worker_age" id="worker_age" class="formbold-form-input" readonly>
            </div>

            <div class="formbold-mb-5">
                <label for="worker_gender" class="formbold-form-label">Worker Gender</label>
                <input type="text" name="worker_gender" id="worker_gender" class="formbold-form-input" readonly>
            </div>

            <div class="formbold-mb-5">
                <label for="worker_phone" class="formbold-form-label">Worker Phone</label>
                <input type="text" name="worker_phone" id="worker_phone" class="formbold-form-input" readonly>
            </div>

            <div>
                <button type="submit" class="formbold-btn">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('worker_id').addEventListener('change', function () {
        const selectedOption = this.options[this.selectedIndex];

        // Populate worker information fields with selected worker's data
        document.getElementById('worker_firstname').value = selectedOption.dataset.firstname || '';
        document.getElementById('worker_lastname').value = selectedOption.dataset.lastname || '';
        document.getElementById('worker_job').value = selectedOption.dataset.job || '';
        document.getElementById('worker_age').value = selectedOption.dataset.age || '';
        document.getElementById('worker_gender').value = selectedOption.dataset.gender || '';
        document.getElementById('worker_phone').value = selectedOption.dataset.phone || '';
    });
</script>
</body>
</html>
