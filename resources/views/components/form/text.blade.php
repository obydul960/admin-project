<div class="form-group form-float">
    <div class="form-line">
        {{ Form::label($name, null,['class'=>'form-label']) }}
        {{ Form::text($name, $value, ['class' => 'form-control','maxlength'=>'30','minlength'=>'2','required']) }}
    </div>
    <div class="help-info">Min. Value: 2, Max. Value: 30</div>
</div>