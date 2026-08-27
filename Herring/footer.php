 <footer id="footer" class="footer">
          
      <div class="footer-grid">
  
        <!-- Column 1 -->
        <div class="footer-col col-left">
          
              <a href="<?php echo get_option("siteurl"); ?>"><img src="<?php echo get_template_directory_uri(); ?>/logo.png" style="max-width: 100%; height: auto; display: block; margin: auto;">


          <p class="mt-4">Independent Student Newspaper of Amsterdam University College</p>
          <div class="col-left-bottom">
            <p class="small">&copy; 2026 The Herring, All Rights Reserved</p>
              <div class="social-links">
                <a href="https://www.instagram.com/auc.the.herring/"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://www.facebook.com/auctheherring/"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.linkedin.com/company/the-herring-newspaper/posts/?feedView=all"><i class="fa-brands fa-linkedin"></i></a>
    
              </div>
          </div>
        </div>
  
        <!-- Column 2 -->
        <div class="footer-col col-center">
          <h4>Sign up for our Newsletter!</h3>
            <p>We will send biweekly newsletters of our best reporting, curated by the Herring editors, straight to your inbox. </p>
            <iframe width="100%" height="100%" scrolling="no" frameborder="0" src="https://theherring.org/?mailpoet_form_iframe=1" class="mailpoet_form_iframe" id="mailpoet_form_iframe" vspace="0" tabindex="0" onload="var _this = this; window.addEventListener('message', function(e) {if(e.data.MailPoetIframeHeight){_this.style.height = e.data.MailPoetIframeHeight;}})" marginwidth="0" marginheight="0" hspace="0" allowtransparency="true"></iframe>
        </div>
  
        <!-- Column 3 -->
        <div class="footer-col col-right">
          <div class="footer-nav">
            <a href="<?php echo herring_get_cat_url('archive'); ?>">Archive</a>
            <a href="https://revolut.me/federieq6i" target="_blank">Donate</a>
            <a href="<?php echo home_url('/tips-and-feedback'); ?>">Anonymous Tips / Feedback</a>
            <a class="dropdown-item" href="https://docs.google.com/forms/d/e/1FAIpQLSdvj1OdGjhS6gFuoP6Emk_xVFDSvYqx_rYr5P3dROXHQng7Qw/viewform">Guest Articles</a>
            <a href="<?php echo home_url('/conduct-and-ethics'); ?>">Ethics and Conduct</a>

          </div>
        </div>
  
      </div>
  
      <!-- Scroll Back to Top Button -->
      <a href="#" class="back-to-top" aria-label="Back to top">
        <i class="fa-solid fa-chevron-up"></i>
      </a>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous">
    </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <script src="https://jsdelivr.net"></script>
  </footer>
  <?php wp_footer(); ?>
</body>
</html>

