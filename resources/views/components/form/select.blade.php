<div class="form-group form-float">
    <div class="form-line">
        {{--<select class="form-control">--}}
             {{--<option>d</option>--}}
        {{--</select>--}}
        {{ Form::select($name,$value,array_merge(['class' => 'form-control'], $attributes)) }}
    </div>
</div>