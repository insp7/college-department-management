@if(session()->has('status'))
    <script>
        showToastr("{{ session('status') }}", "{{ session('title') }}", "{{ session('message') }}");
        {{ Session::forget('status') }}
    </script>
@endif
