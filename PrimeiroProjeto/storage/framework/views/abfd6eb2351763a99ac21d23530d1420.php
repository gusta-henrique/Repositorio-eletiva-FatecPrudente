

<?php $__env->startSection('conteudo'); ?>

<form method="post" action="/resposta">
    <?php echo csrf_field(); ?>
<div class="mb-3">
              <label for="valor1" class="form-label">informe o primeiro valor</label>
              <input type="number" id="valor1" name="valor1" class="form-control" required="">
            </div><div class="mb-3">
              <label for="valor2" class="form-label">informe o segundo valor</label>
              <input type="text" id="valor2" name="valor2" class="form-control" required="">
            </div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\PrimeiroProjeto\resources\views/exercicio.blade.php ENDPATH**/ ?>