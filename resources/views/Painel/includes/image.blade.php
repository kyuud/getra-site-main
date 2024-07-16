<script>

    // ATUALIZANDO IMAGEM ATUAL EM TEMPO REAL
    $('input[name=image]').on('change', function ()
    {
        var src    = document.getElementById("new-image").files[0];
        var imagem = window.URL.createObjectURL(src);

        $('.image-atual').attr("src", imagem);
    });

