<div class="articulos">
    <?php echo $this->Form->create('Articulo', array('type' => 'file')); ?>
    <fieldset>
        <legend>
            <?php __('Nuevo Artículo'); ?>
            <?php echo $this->Html->link(__('Listar Artículos', true), array('action' => 'index'), array('class' => 'button_link')); ?>
        </legend>
        <table class="edit">
            <tr>
                <td class="required"><span>Referencia</span></td>
                <td><?php echo $this->Form->input('ref', array('label' => false)); ?></td>
                <td><span>Código de Barras</span></td>
                <td><?php echo $this->Form->input('codigobarras', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td class="required"><span>Descripción</span></td>
                <td><?php echo $this->Form->input('nombre', array('label' => false)); ?></td>
                <td><span>Localización</span></td>
                <td><?php echo $this->Form->input('localizacion', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td><span>PVP</span></td>
                <td><?php echo $this->Form->input('precio_sin_iva', array('label' => false)); ?></td>
                <td><span>Último Precio de Coste</span></td>
                <td><?php echo $this->Form->input('ultimopreciocompra', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td class="required"><span>Almacén</span></td>
                <td colspan="3"><?php echo $this->Form->input('almacene_id', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td><span>Existencias</span></td>
                <td><?php echo $this->Form->input('existencias', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td><span>Stock Mínimo</span></td>
                <td><?php echo $this->Form->input('stock_minimo', array('label' => false)); ?></td>
                <td><span>Stock Máximo</span></td>
                <td><?php echo $this->Form->input('stock_maximo', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td><span>Familia</span></td>
                <td><?php echo $this->Form->input('familia_id', array('label' => false,'empty'=>true,'data-placeholder'=>'Seleccione la Familia...','class'=>'chzn-select-required')); ?></td>
                <td><span>Imágen Actual</span></td>
                <td>
                    <?php echo $this->Form->input('file', array('type' => 'file', 'label' => 'Imágen del Artículo')); ?>
                </td>
            </tr>
            <tr>
                <td><span>Observaciones</span></td>
                <td><?php echo $this->Form->input('observaciones', array('label' => false)); ?></td>
                <td class="required"><span>Proveedor habitual</span></td>
                <td><?php echo $this->Form->input('proveedore_id', array('label' => false,'data-placeholder'=>'Seleccione el Proveedor...','class'=>'chzn-select-required')); ?></td>
            </tr>
        </table>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>
