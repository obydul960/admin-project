<div class="form-group form-float">
    <div class="form-line">
        {{ Form::label($name, null,['class'=>'form-label']) }}
        {{ Form::password($name, $value, ['class' => 'form-control','maxlength'=>'30','minlength'=>'6','required']) }}
    </div>
    <div class="help-info">Only Password Min. Value: 6, Max. Value: 30</div>
</div>