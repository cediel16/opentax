<?php
$cirif = array(
    'id' => 'cirif',
    'name' => 'cirif',
    'class' => 'span12',
    'value' => $contribuyente->cirif,
    'readonly' => ''
);

$nombre = array(
    'id' => 'nombre',
    'name' => 'nombre',
    'class' => 'span12',
    'value' => $contribuyente->nombre,
    'readonly' => ''
);

$direccion = array(
    'id' => 'direccion',
    'name' => 'direccion',
    'class' => 'span12',
    'rows' => 2,
    'value' => $contribuyente->direccion,
    'readonly' => ''
);

$estado = array(
    'name' => 'estado',
    'options' => $options_estados,
    'selected' => $contribuyente->estado_id,
    'extra' => 'class="span12" id="estado" disabled'
);

$municipio = array(
    'name' => 'municipio',
    'options' => $options_municipios,
    'selected' => $contribuyente->municipio_id,
    'extra' => 'class="span12" id="municipio" disabled'
);

$parroquia = array(
    'name' => 'parroquia',
    'options' => $options_parroquias,
    'selected' => $contribuyente->parroquia_id,
    'extra' => 'class="span12" id="parroquia" disabled',
);

$email = array(
    'id' => 'email',
    'name' => 'email',
    'class' => 'span12',
    'value' => $contribuyente->email,
    'readonly' => ''
);

$telefono1 = array(
    'id' => 'telefono1',
    'name' => 'telefono1',
    'class' => 'span12',
    'maxlength' => '11',
    'value' => $contribuyente->telefono1,
    'readonly' => ''
);

$telefono2 = array(
    'id' => 'telefono2',
    'name' => 'telefono2',
    'class' => 'span12',
    'maxlength' => '11',
    'value' => $contribuyente->telefono2,
    'readonly' => ''
);

$contribuyente_id = array(
    'id' => 'contribuyente_id',
    'name' => 'contribuyente_id',
    'value' => $contribuyente->id
);

$observacion = array(
    'id' => 'observacion',
    'name' => 'observacion',
    'class' => 'span12',
    'rows' => 2,
    'placeholder'=>'Observación',
    'value' => $this->input->post('observacion')
        
);
?>
<div class="row-fluid">
    <div class="span12">
        <div class="row-fluid">   
            <div class="span6 lightblue">
                <label>CI / RIF</label>
                <?php echo form_input($cirif) ?>
            </div><!--/span-->
            <div class="span6 lightblue">
                <label>Nombre / Razón Social</label>
                <?php echo form_input($nombre) ?>
            </div><!--/span-->
        </div><!--/row-->
        <div class="row-fluid">
            <div class="span12 lightblue">
                <label>Dirección de Habitación / Domicilio Fiscal</label>
                <?php echo form_textarea($direccion) ?>
            </div><!--/span-->
        </div><!--/row-->
    </div><!--/span-->
</div><!--/row-->
<div class="row-fluid">
    <div class="span12">
        <div class="row-fluid">
            <div class="span4 lightblue">
                <label>Estado</label>
                <?php echo form_dropdown($estado['name'], $estado['options'], $estado['selected'], $estado['extra']) ?>
            </div><!--/span-->
            <div class="span4 lightblue">
                <label>Municipio</label>
                <?php echo form_dropdown($municipio['name'], $municipio['options'], $municipio['selected'], $municipio['extra']) ?>
            </div><!--/span-->
            <div class="span4 lightblue">
                <label>Parroquia</label>
                <?php echo form_dropdown($parroquia['name'], $parroquia['options'], $parroquia['selected'], $parroquia['extra']) ?>
            </div><!--/span-->
        </div><!--/row-->
        <div class="row-fluid">
            <div class="span4 lightblue">
                <label>Correo electrónico</label>
                <?php echo form_input($email) ?>
            </div><!--/span-->
            <div class="span4 lightblue">
                <label>Teléfono de contacto</label>
                <?php echo form_input($telefono1) ?>
            </div><!--/span-->
            <div class="span4 lightblue">
                <label>Teléfono alternativo</label>
                <?php echo form_input($telefono2) ?>
            </div><!--/span-->
        </div><!--/row-->
    </div><!--/span-->
</div><!--/row-->
<hr>
<div class="row-fluid">
    <div class="alert alert-block alert-success span12">
        <h4 class="alert-heading">¿Estas seguro que deseas activar este contribuyente?</h4>
        <p>Este cambio es irreversible.</p>
        <?php echo form_open() ?>
        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span12 lightblue">
                        <?php echo form_hidden($contribuyente_id['name'], $contribuyente_id['value']) ?>
                        <?php echo form_textarea($observacion) ?>
                        <?php echo form_error($observacion['name']); ?>
                    </div><!--/span-->
                </div><!--/row-->
            </div><!--/span-->
        </div>
        <div class="span12 text-center">
            <?php echo anchor('contribuyentes/ver/' . $contribuyente->id, 'No', 'class="btn"') ?></a>
            <?php echo form_submit('', 'Sí', 'class="btn btn-success"') ?>
        </div>
        <?php echo form_close() ?>
    </div>
</div>
