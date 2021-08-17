<script src="jss/jquery-2.2.4.min.js"></script>

<!-- JS | jquery plugin collection for this theme -->
<script src="jss/jquery-plugin-collection.js"></script>


                <div id="basic-coupon-clock" class="text-center font-36 pt-10 pb-10"></div>
                
              
            
            <!-- Final Countdown Timer Script -->
            <script type="text/javascript">
              $(document).ready(function() {
                $('#basic-coupon-clock').countdown('<?php echo $val['expiry_date']; ?>', function(event) {
                  $(this).html(event.strftime('%D days %H:%M:%S'));
                });
              });
            </script>

            <script src="jss/custom.js"></script>
