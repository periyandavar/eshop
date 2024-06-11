
    
    <script src="<?php echo base_url();?>public/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url();?>public/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>public/assets/js/main.js"></script>


    <script src="<?php echo base_url();?>public/vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="<?php echo base_url();?>public/assets/js/dashboard.js"></script>
    <script src="<?php echo base_url();?>public/assets/js/widgets.js"></script>
    <script src="<?php echo base_url();?>public/vendors/jqvmap/dist/jquery.vmap.min.js"></script>

    <script src="<?php echo base_url();?>public/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>public/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="<?php echo base_url();?>public/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?php echo base_url();?>public/js/sweetalert/sweetalert.min.js"></script>
    <script src="<?php echo base_url();?>public/js/jquery.toaster.js"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

</body>

</html>
