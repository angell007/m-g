<script src="{{ asset('js/jquery.min.js')}}"></script>
{{-- <script src="{{ asset('js/app.js')}}"></script> --}}
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{ asset('js/ruang-admin.min.js')}}"></script>
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('js/toastr.min.js')}}"></script>
<script src="{{asset('js/ekko-lightbox.js')}}"></script>
<script src="{{asset('apis/getAlerts.js')}}"></script>
<script>
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();

                $(this).ekkoLightbox({
                alwaysShowClose: true,
                onShown: function() {
                    console.log('Checking our the events huh?');
                },
                })
            });
</script>

<script>
    getAlerts()
    // document.onload= function() {
        setInterval(async function(){ 
            getAlerts()
        }, 3000);
    // }
</script>