<div class="form-group form-float">
    <div class="form-line">
        {{ Form::label($name, null,['class'=>'form-label']) }}
        {{ Form::textarea($name, $value, ['class' => 'form-control no-resize','cols'=>'30','rows'=>'5','required']) }}
    </div>
</div>