<?php
$buscar_por = array(
    'id' => 'buscar_por',
    'name' => 'buscar_por',
    'class' => 'span12',
    'selected' => $this->input->post('buscar_por'),
    'options' => array(
        '' => 'Buscar por',
        '1' => 'CI / RIF',
        '2' => 'Nombre / Razón Social'
    )
);

$criterio = array(
    'id' => 'criterio',
    'name' => 'criterio',
    'class' => 'span12',
    'value' => $this->input->post('criterio')
);
?>
<?php echo $this->session->flashdata('msj') ?>
<?php echo form_open() ?>
<div class="row-fluid">
    <div class="span12">
        <div class="row-fluid">   
            <div class="span3 lightblue">
                <?php echo form_dropdown($buscar_por['name'], $buscar_por['options'], $buscar_por['selected'], ' class="' . $buscar_por['class'] . '"') ?>
            </div><!--/span-->
            <div class="span4 lightblue">
                <?php echo form_input($criterio) ?>
            </div><!--/span-->
            <div class="span2 lightblue">
                <?php echo form_submit('', 'Buscar', 'class="btn"') ?>
            </div><!--/span-->
        </div><!--/row-->
    </div><!--/span-->
</div><!--/row-->
<?php echo form_close() ?>
<div class="content-table-scroll">
    <?php echo $resultado ?>
</div>