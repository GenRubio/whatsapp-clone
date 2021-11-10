@push('extra_scripts')
    <script type="text/javascript">
        let privateKey = "{{ session()->has('privateKey') ? session('privateKey') : null }}";
        let privateKeyPassword = "{{ session()->has('privateKeyPassword') ? session('privateKeyPassword') : null }}";
        window.privateKey = privateKey ? privateKey : null;
        window.privateKeyPassword = privateKeyPassword ? privateKeyPassword : null;
    </script>
    <script src="{{ asset('js/library/particles-manager.js') }}" defer></script>
    <script src="{{ asset('js/library/particles.js') }}" defer></script>
@endpush
