    <!-- Vendor JS Files -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="https://threejs.org/examples/js/libs/stats.min.js"></script>
    <script src="{{ asset('customer') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('customer') }}/vendor/aos/aos.js"></script>
    <script src="{{ asset('customer') }}/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('customer') }}/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ asset('customer') }}/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('customer') }}/vendor/php-email-form/validate.js"></script>
    <script src="https://kit.fontawesome.com/dedca05a0a.js" crossorigin="anonymous"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('customer') }}/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function () {
            $(document).on('click', '.delete-item-btn', function () {
                var itemId = $(this).data('item-id');
                var deleteForm = $('#delete-' + itemId);

                if (confirm('Apakah Anda yakin ingin menghapus item ini?')) {
                    deleteForm.submit();
                }
            });
        });

    </script>
