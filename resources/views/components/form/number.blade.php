<div class="form-group form-float">
    <div class="form-line">
        {{ Form::label($name, null,['class'=>'form-label']) }}
        {{ Form::number($name, $value, ['class' => 'form-control','required']) }}
    </div>
    <div class="help-info">Numbers only</div>
</div>