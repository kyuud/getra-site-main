<script>
    function showDiv()
    {       
        var quota = ($('#quota').val() == '' ? 0 : $('#quota').val());
    ​
        if (quota == 'Sim') {
            
            document.getElementById("quota_div").style.display = "block";
            document.getElementById("quota_div2").style.display = "block";
        } else {
            document.getElementById("quota_div").style.display = "none";
            document.getElementById("quota_div2").style.display = "none";
        }
    }
</script>