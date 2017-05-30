@php
    $settings = \Laralum\Files\Models\Settings::first();
@endphp
<div uk-grid>
    @can('update', \Laralum\Events\Models\Settings::class)
    <div class="uk-width-1-1@s uk-width-1-5@l"></div>
    <div class="uk-width-1-1@s uk-width-3-5@l">
        <form class="uk-form-horizontal" method="POST" action="{{ route('laralum::files.settings.update') }}">
            {{ csrf_field() }}
            <fieldset class="uk-fieldset">

            <div class="uk-margin">
                <label class="uk-form-label">@lang('laralum_files::general.public_url')</label>
                <div class="uk-form-controls">
                    <input value="{{ old('navbar_color', $settings->public_url) }}" name="public_url" class="uk-input" type="text" placeholder="@lang('laralum_files::general.public_url')">
                    <small class="uk-text-meta">@lang('laralum_files::general.public_url')</small>
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">@lang('laralum_files::general.public_routes')</label>
                <div class="uk-form-controls">
                    <input class="uk-hidden" name="public_routes" value="0"/>
                    <label><input class="uk-checkbox" type="checkbox" name="public_routes" value="1" {{ !old('public_permissions', $settings->public_routes) ?: 'checked="checked"' }}> @lang('laralum_files::general.public_routes')</label>
                    <br>
                    <small class="uk-text-meta">@lang('laralum_files::general.public_routes_desc')</small>
                </div>
            </div>

            <div class="uk-margin uk-align-right">
                <button type="submit" class="uk-button uk-button-primary">
                    <span class="ion-forward"></span>&nbsp; @lang('laralum_files::general.save_settings')
                </button>
            </div>

            </fieldset>
        </form>
    </div>
    <div class="uk-width-1-1@s uk-width-1-5@l"></div>
    @else
        <div class="uk-width-1-1">
            <div class="content-background">
                <div class="uk-section uk-section-small uk-section-default">
                    <div class="uk-container uk-text-center">
                        <h3>
                            <span class="ion-minus-circled"></span>
                            @lang('laralum_files::general.unauthorized_action')
                        </h3>
                        <p>
                            @lang('laralum_files::general.unauthorized_desc')
                        </p>
                        <p class="uk-text-meta">
                            @lang('laralum_files::general.contact_webmaster')
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endcan
</div>
