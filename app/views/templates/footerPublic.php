<footer class="footer">
    <div class="row">
        <div class="col-lg-12">
            <p class="total_login">
                Total login attempts today:
                <?php
                if (isset($_SESSION['total_login_attempts_today'])) {
                   echo $_SESSION['total_login_attempts_today'];
                } else {
                    echo "1";
                }
                ?>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <p>Copyright &copy; <?php echo date('Y'); ?> </p>
        </div>
    </div>
</footer>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
</body>
</html>