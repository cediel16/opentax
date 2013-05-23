<div class="row-fluid">
    <div class="span12">
        <div class="row-fluid">   
            <div class="span6 lightblue">
                <label>RIF</label>
                <input type="text" class="span12">
            </div><!--/span-->
            <div class="span6 lightblue">
                <label>Razón Social</label>
                <input type="text" class="span12">
            </div><!--/span-->
        </div><!--/row-->
        <div class="row-fluid">
            <div class="span12 lightblue">
                <label>Domicilio fiscal</label>
                <textarea class="span12"></textarea>  
            </div><!--/span-->
        </div><!--/row-->
    </div><!--/span-->
</div><!--/row-->
<div class="row-fluid">
    <div class="span12">
        <div class="row-fluid">
            <div class="span4 lightblue">
                <label>Estado</label>
                <?php echo form_dropdown_estados('estado', 'class="span12"') ?>
            </div><!--/span-->
            <div class="span4 lightblue">
                <label>Municipio</label>
                <?php echo form_dropdown_municipios('municipio', 'class="span12"', 7) ?>
            </div><!--/span-->
            <div class="span4 lightblue">
                <label>Parroquia</label>
                <?php echo form_dropdown_parroquias('parroquia', 'class="span12"', 7) ?>
            </div><!--/span-->
        </div><!--/row-->
        <div class="row-fluid">
            <div class="span4 lightblue">
                <label>Correo electrónico</label>
                <input type="text" class="span12" />
            </div><!--/span-->
            <div class="span4 lightblue">
                <label>Teléfono</label>
                <input type="text" class="span12" />
            </div><!--/span-->
            <div class="span4 lightblue">
                <label>Fax</label>
                <input type="text" class="span12" />
            </div><!--/span-->
        </div><!--/row-->
    </div><!--/span-->
</div><!--/row-->
<div class="form-actions text-center">
    <button type="submit" class="btn">Cancelar</button>
    <button type="submit" class="btn">Limpiar</button>
    <button type="button" class="btn">Aceptar</button>
</div>