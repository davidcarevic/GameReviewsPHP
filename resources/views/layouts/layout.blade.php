
<script>
    const BASE_URL="{{ url("/") }}";
    let csrf = "{{ csrf_token() }}";
    let assetPath = "{{ asset("/") }}";
</script>
@include('delovi.header')


@yield('sadrzaj')

@include('delovi.footer')
