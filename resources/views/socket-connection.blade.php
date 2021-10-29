@push('socket')
    <script type="text/javascript">
        const socketHost = "{{ config('socket.config.SOCKET_HOST') }}";
        const socketPort = "{{ config('socket.config.SOCKET_PORT') }}";
        window.socket = io(socketHost + ":" + socketPort);
        window.userChannel = "{{ getUser()->uid }}";
    </script>
@endpush
