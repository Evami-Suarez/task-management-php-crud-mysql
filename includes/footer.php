<!-- script -->

<script>
    document.addEventListener("DOMContentLoaded", function() {
    var closeButton = document.querySelector(".btn-close");
    if (closeButton) {
        closeButton.addEventListener("click", function() {
            var alertElement = closeButton.closest(".alert");
            if (alertElement) {
                alertElement.style.display = "none";
            }
        });
    }
});
</script>
</body>
</html>