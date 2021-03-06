<div class="avisosrepuestos" style="width: 100%">
    <?php echo $this->Form->create('Avisosrepuesto', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Nuevo Aviso de repuesto'); ?></legend>
        <table>
            <tr>
                <td>
                    <?php echo $this->Form->input('numero', array('label' => 'Numero', 'default' => $numero)); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('fechahora', array('label' => 'Fecha', 'dateFormat' => 'DMY', 'timeFormat' => '24')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('estadosaviso_id', array('label' => 'Estado', 'default' => '1')); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $this->Form->input('avisotelefonico', array('label' => 'Aviso Telefónico')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('avisoemail', array('label' => 'Aviso por email')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('fechaaceptacion', array('label' => 'Fecha de aceptación', 'dateFormat' => 'DMY', 'empty' => '--')); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                    echo $this->Form->input('cliente_id', array(
                        'label' => 'Cliente',
                        'style' => 'width: 360px',
                        'class' => 'select_basico',
                        'div' => array(
                            'id' => 'ClienteSelectDiv'
                        ),
                        'empty' => '--- Seleccione un Cliente ---'));
                    echo $ajax->observeField('AvisosrepuestoClienteId', array(
                        'frequency' => '1',
                        'update' => 'CentrostrabajoSelectDiv',
                        'url' => array(
                            'controller' => 'centrostrabajos',
                            'action' => 'selectAvisosrepuestos'
                            ))
                    );
                    ?>
                </td>
                <td>
                    <?php
                    echo $this->Form->input('centrostrabajo_id', array(
                        'label' => 'Centro de Trabajo',
                        'style' => 'width: 360px',
                        'div' => array(
                            'id' => 'CentrostrabajoSelectDiv'
                        ),
                        'empty' => '--- Seleccione un centro de trabajo ---'));
                    echo $ajax->observeField('AvisosrepuestoCentrostrabajoId', array(
                        'frequency' => '1',
                        'update' => 'MaquinaSelectDiv',
                        'url' => array(
                            'controller' => 'maquinas',
                            'action' => 'selectAvisosrepuestos'
                            ))
                    );
                    ?>
                    <?php echo $this->Html->link(__('Nuevo Centro de Trabajo', true), array('controller' => 'centrostrabajos', 'action' => 'add_popup'), array('class' => 'button_link popup')); ?>
                </td>
                <td>
                    <?php
                    echo $this->Form->input('maquina_id', array(
                        'label' => 'Máquina',
                        'empty' => '--- Seleccione una máquina ---',
                        'div' => array(
                            'id' => 'MaquinaSelectDiv'
                        )
                    ));
                    ?>
                    <?php echo $this->Html->link(__('Nueva Máquina', true), array('controller' => 'maquinas', 'action' => 'add_popup'), array('class' => 'button_link popup')); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $this->Form->input('almacene_id', array('label' => 'Almacen de los Materiales')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('solicitapresupuesto', array('label' => 'Solicitar presupuesto')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('marcarurgente', array('label' => 'Urgente')); ?>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <?php echo $this->Form->input('confirmadopor', array('label' => 'Confirmado por:')); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $this->Form->input('enviara', array('label' => 'Enviar a:')); ?>
                </td>
                <td colspan="2">
                    <?php echo $this->Form->input('observaciones', array('label' => 'Observaciones')); ?>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <?php echo $this->Form->input('descripcion', array('label' => 'Descripción')); ?>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <?php echo $this->Form->input('file', array('type' => 'file', 'label' => 'Documento Adjunto')); ?>
                </td>
            </tr>
        </table>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>
