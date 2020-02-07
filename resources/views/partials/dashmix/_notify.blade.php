<script type="text/javascript">
    $(function () {
        @if(Session::has('success'))
            Dashmix.helpers('notify', {type: 'success', icon: 'fa fa-check mr-1', message: '{{ Session::get('success') }}'});
        @endif
        @if(Session::has('info'))
            Dashmix.helpers('notify', {type: 'info', icon: 'fa fa-info-circle mr-1', message: '{{ Session::get('info') }}'});
        @endif
        @if(Session::has('warning'))
            Dashmix.helpers('notify', {type: 'warning', icon: 'fa fa-exclamation mr-1', message: '{{ Session::get('warning') }}'});
        @endif
        @if(Session::has('error'))
            Dashmix.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: '{{ Session::get('error') }}'});
        @endif
        @if($errors->any())
            @foreach($errors->all() as $error)
                Dashmix.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: '{{ $error }}'});
            @endforeach
        @endif
    })

    function dashmixAjxNotify(type, message)
    {
        switch (type)
        {
            case 'success':
                Dashmix.helpers('notify', {type: 'success', icon: 'fa fa-check mr-1', message: message});
            break;
            case 'info':
                Dashmix.helpers('notify', {type: 'info', icon: 'fa fa-info-circle mr-1', message: message});
            break;
            case 'error':
                Dashmix.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: message});
            break;
            case 'warning':
                Dashmix.helpers('notify', {type: 'warning', icon: 'fa fa-exclamation mr-1', message: message});
            break;
        }
    }
</script>
