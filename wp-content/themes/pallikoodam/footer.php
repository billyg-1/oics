    <?php
        /**
         * pallikoodam_hook_content_after hook.
         * 
         */
        do_action( 'pallikoodam_hook_content_after' );
    ?>

        <!-- **Footer** -->
        <footer id="footer">
            <div class="container">
            <?php
                /**
                 * pallikoodam_footer hook.
                 * 
                 * @hooked pallikoodam_ele_footer_template - 10
                 *
                 */
                do_action( 'pallikoodam_footer' );
            ?>
            </div>
        </footer><!-- **Footer - End** -->

    </div><!-- **Inner Wrapper - End** -->
        
</div><!-- **Wrapper - End** -->
<?php
    
    do_action( 'pallikoodam_hook_bottom' );

    wp_footer();
?>
</body>
</html>