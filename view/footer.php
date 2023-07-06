<footer>
  <div class="row">
    <div class="col-lg-12">
      <p>Copyright &copy; Your Website 2014</p>
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
</footer>
</div>
<!-- /.container -->

<!-- jQuery -->
<!-- <script src="./js/jquery.js"></script> -->
<!-- Bootstrap Core JavaScript -->
<script src="./js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
  const swiper = new Swiper(".swiper", {
    // Optional parameters
    direction: "horizontal",
    loop: true,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    // If we need pagination
    pagination: {
      el: ".swiper-pagination",
    },

    // Navigation arrows
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>
</body>

</html>