<footer id="footer">
    <div class="footer-top">
    <div class="container">
        <div class="footer-nav">
            <h3>quick links</h3>
            <ul class="menu">
                <li><a href="<?php echo e(url('popular-ads')); ?>">popular ads</a></li>
                <li><a href="<?php echo e(url('recent-ads')); ?>">recent ads</a></li>
                <li><a href="<?php echo e(url('dealers')); ?>">dealers</a></li>
                <li><a href="<?php echo e(url('page/how-to')); ?>">How to publish ads?</a></li>
            </ul>
        </div>
        <div class="footer-about">
              <p>
                  Sellnepal is a free online classified site of Nepal where you can buy, sell and advertise any used or brand new products or service faster and easier.</p>
                <p>Sellnepal.com is platform for both seekers and people offering services and products to be shared with internet users across Nepal and create a database of classifieds to find anything and everything either used(secondhand) or brand new products all over Nepal. You can do all this here at a website that begins with a very simple and modest design to use and will continuously look forward for development opportunities to serve you better !
                  Post free classifieds for sale, purchase, rentals and services related to jobs, real estate, education, automobile, pets, travel, electronics, home appliances, health etc. Find local classified advertisement ads for used and new products at best price in Nepal.
              </p>
        </div>
    </div>
    </div>
    <div class="copyright">
        <div class="container">
            Copyright &COPY; 2016 sellnepal.com.
            Designated trademarks and brands are the property of their respective owners. | Disclaimer, <a href="<?php echo e(url('page/termsandconditions')); ?>">Terms of Service</a> and
            <a href="<?php echo e(url('page/privacy-policy')); ?>">Privacy Policy</a>
        </div>
    </div>
</footer>
<?php echo $__env->yieldContent('extra-area'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="<?php echo e(asset('assets/js/sellnepal-jquery.min.js')); ?>"></script>
<?php /*<script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>*/ ?>
<?php /*<script src="<?php echo e(asset('assets/js/plugins.js')); ?>"></script>*/ ?>
<?php /*<script src="<?php echo e(asset('assets/js/chosen.jquery.min.js')); ?>"></script>*/ ?>
<script src="<?php echo e(asset('assets/js/scripts.min.js')); ?>"></script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-74405270-1', 'auto');
    ga('send', 'pageview');

</script>
<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>