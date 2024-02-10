const boton = document.getElementById('downloadPdf');
boton.addEventListener('click', () => {
    
}); 
<script>
        console.log("HOLA😎");
        const boton = document.getElementById('downloadPdf');
        boton.addEventListener('click', () => {
            console.log('entro');
            <?php echo header('Content-Disposition:attachment; filename="' . $fichero . '"');?>;
        });
    </script>