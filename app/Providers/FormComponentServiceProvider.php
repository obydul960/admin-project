<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;
class FormComponentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('bsText', 'components.form.text', ['name', 'value' => null, 'attributes' => []]);
        Form::component('bsTextArea', 'components.form.text_area', ['name', 'value' => null, 'attributes' => []]);
        Form::component('bsEmail', 'components.form.email', ['name', 'value' => null, 'attributes' => []]);
        Form::component('bsNumber', 'components.form.number', ['name', 'value' => null, 'attributes' => []]);
        Form::component('bsPassword', 'components.form.password', ['name', 'value' => null, 'attributes' => []]);
        Form::component('bsSelect', 'components.form.select', ['name', 'value' => null, 'attributes' => []]);
        Form::component('hidden', 'components.form.hidden', ['name', 'value' => null, 'attributes' => []]);
        Form::component('bsSubmit', 'components.form.submit', ['name', 'value' => null, 'attributes' => []]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
