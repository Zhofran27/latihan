<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-4 mb-0 text-muted">© 2023 RPL, Inc</p>
    </footer>
</div>

<script>
    document.addEventListener("contextmenu", function(e){
    e.preventDefault();
    }, false);
</script>

<script type="text/javascript">
    $(document).ready(function (e) {
    $('#image').change(function(){
    let reader = new FileReader();
    reader.onload = (e) => {
    $('#prevFoto').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]);
    });
});
</script>

<script type="text/javascript">
    $(document).ready(function (er) {
    $('#ubahImg').change(function(){
    let reader2 = new FileReader();
    reader2.onload = (er) => {
    $('#prevImg').attr('src', er.target.result);
    }
    reader2.readAsDataURL(this.files[0]);
    });
});
</script>