<footer>
    <div class="">
        <p class="pull-right">  DIGITAL AGENCY 2018  |
            <span class="lead"> {{--<i class="fa fa-paw"></i>--}}<a href="#" target="_blank">LardanSoft!</a></span>
        </p>
    </div>
    <div class="clearfix"></div>
</footer>


<script type="text/javascript">

    $(document).ready(function () {

        window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
                $(this).remove();
            });
        }, 3000);
    });
</script>